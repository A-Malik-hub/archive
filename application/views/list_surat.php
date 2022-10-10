<div class="content-wrapper">
<section class="content-header">
      <h1>
        Data Arsip Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(''); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Arsip Surat</li>
      </ol>
	  <div>
		</div>
    </section>
	<div class="card mb-3">
			<div>
				<?php echo form_open('surat/search') ?>
				<input type="text" name="keyword" class="form-control" placeholder="Cari Surat">
				<button type="submit" class="btn btn-success">Cari</button>
				<?php echo form_close();?>
			</div>
		<div class="card-header">
		</div>
			<div class="card-body">
				<div class="table-responsive">
				<?php echo $this->session->flashdata('message'); ?>
					<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No. Surat</th>
								<th>Kategori</th>
								<th>Judul</th>
								<th>Waktu Pengarsipan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($surat as $srt): ?>
								<tr>
									<td width="150">
										<?php echo $srt->nomor ?>
									</td>
									<td>
										<?php echo $srt->kategori ?>
									</td>
									<td>
										<?php echo $srt->judul ?>
									</td>
									<td>
										<?php echo $srt->waktu ?>
									</td>
									<td>
									<a onclick="deleteConfirm('<?php echo site_url('surat/delete/'.$srt->id) ?>')"
											 href="#!" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
									</td>
									<td><?php echo anchor('surat/download/'.$srt->id,'<div class="btn btn-warning btn-sm "><i class="fa fa-download"> Unduh</i></div>') ?></td>
									<td><?php echo anchor('surat/detail/'.$srt->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-search-plus"> Lihat</i></div>') ?></td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
							<button class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Arsipkan Surat</button>
						</div>
					</div>
				</div>
	<!-- Modal Tambah Arsip -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h3 class="modal-title" id="exampleModalLabel">Tambah Data Arsip</h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<?php echo form_open_multipart('surat/add_surat'); ?>
				<div class="form-group">
					<label>Nomor Surat*</label>
					<input type="varchar" name="nomor" class="form-control" placeholder="Masukan Nomor Surat" required>
				</div>

				<div class="form-group">
					<label>Kategori*</label>
					<select name="kategori" class="form-control" required>
						<option>Undangan</option>
						<option>Pengumuman</option>
						<option>Nota Dinas</option>
						<option>Pemberitahuan</option>
					</select>
				</div>

				<div class="form-group">
					<label>Judul*</label>
					<input type="varchar" name="judul" class="form-control" placeholder="Masukan Judul Surat" required>
				</div>
				<div class="form-group">
					<label>Upload Dokumen / File*</label>
					<input type="file" name="dokumen" class="form-control">
				</div>
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><< Kembali</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			<?php echo form_close(); ?>
			<p>* = Wajib diisi</p>
		</div>
	</div>
	</div>

</div>
<script>
		function deleteConfirm(url){
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>
