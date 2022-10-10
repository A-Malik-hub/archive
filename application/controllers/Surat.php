<?php

class Surat extends CI_Controller {

	public function index(){
		$this->load->model('surat_model');
		$data['surat'] = $this->surat_model->show_data()->result();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('list_surat', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/modal');

		
	}

	public function add_surat(){
		$nomor 		= $this->input->post('nomor');
		$kategori 	= $this->input->post('kategori');
		$judul 		= $this->input->post('judul');
		$dokumen	= $_FILES['dokumen'];
		if ($dokumen=''){}else{
			$config['upload_path']		=	'./assets/dokumen';
			$config['allowed_types']	=	'pdf';
			$config['overwrites']		=	true;

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('dokumen')){
				echo "Upload gagal"; die();
			}else{
				$dokumen = $this->upload->data('file_name');
			}
		}

		$data = array(
			'nomor'			=> $nomor,
			'kategori'		=> $kategori,
			'judul'			=> $judul,
			'dokumen'		=> $dokumen
		);

		$this->surat_model->input_data($data, 'tb_surat');
		$this->session->set_flashdata('message','
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Data Berhasil Ditambahkan!.
			</div>
		');
		redirect('surat/index');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->surat_model->delete_data($where, 'tb_surat');
		$this->session->set_flashdata('message','
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Data Dihapus!.
			</div>
		');
		redirect('surat/index');
	}

	public function edit($id){
		$where = array('id' =>$id);
		$data['surat'] = $this->surat_model->edit_data($where,'tb_surat')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('edit_surat', $data);
		$this->load->view('templates/footer');
	}
	
	public function update(){
		$id 		= $this->input->post('id');
		$nomor 		= $this->input->post('nomor');
		$kategori 	= $this->input->post('kategori');
		$judul		= $this->input->post('judul');
		$dokumen	= $_FILES['dokumen'];
		if ($dokumen=''){}else{
			$config['upload_path']		=	'./assets/dokumen';
			$config['allowed_types']	=	'pdf';
			$config['overwrites']		=	true;

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('dokumen')){
				echo "Upload gagal";
			}else{
				$dokumen = $this->upload->data('file_name');
			}
		}

		$data = array(
			'nomor'			=> $nomor,
			'kategori'		=> $kategori,
			'judul'			=> $judul,
			'dokumen'		=> $dokumen,
		);

		$where = array(
			'id'	=> $id
		);

		$this->surat_model->update_data($where,$data,'tb_surat');
		$this->session->set_flashdata('message','
			<div class="alert alert-info alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Data Berhasil Diubah!.
			</div>
		');
		redirect('surat/index');
	}

	public function detail($id){
		$this->load->model('surat_model');
		$detail = $this->surat_model->detail_data($id);
		$data['detail'] = $detail;
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail', $data);
		$this->load->view('templates/footer');
	}

	function download($id){
		$data = $this->db->get_where('tb_surat',['id'=>$id])->row();
		force_download('./assets/dokumen/'.$data->dokumen,NULL);
	}

	public function search(){
		$keyword = $this->input->post('keyword');
		$data['surat'] = $this->surat_model->get_keyword($keyword);

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('list_surat', $data);
		$this->load->view('templates/footer');

	}
}

?>
