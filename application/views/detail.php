<div class="content-wrapper">
	<section class="content">
		<h3><strong>Detail Surat</strong></h3>
		<div class="card">
		<div class="table">
            <div class="form-group">
               <th><b>Nomor Surat : </b></th>
                <td><?php echo $detail->nomor ?></td>
            </div>
            <div class="form-group">
                 <th><b>Kategori : </b></th>
                <td><?php echo $detail->kategori ?></td>
            </div>
            <div class="form-group">
                <th><b>Judul : </b></th>
                <td><?php echo $detail->judul ?></td>
            </div>
            <div class="form-group">
                <th><b>Waktu Pengarsipan : </b></th>
                <td><?php echo $detail->waktu ?></td>
            </div>
        </div>
			<tr>
				<td>
					<iframe src="<?php echo base_url(); ?>assets/dokumen/<?php echo $detail->dokumen ?>" frameborder="20" width="100%" height="600px"></iframe>
				</td>
			</tr>
		</div>
		<a href="<?php echo base_url('surat/index')?>" class="btn btn-primary">Kembali</a>
		<a href="<?php echo base_url('surat/download/') .$detail->id ?>" class="btn btn-warning"> Unduh</a>
		<a href="<?php echo base_url('surat/edit/') .$detail->id?>" class="btn btn-success">Edit Data/File</a>
	</section>
</div>
