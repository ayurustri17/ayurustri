<?php $this->load->view('template/header');?>
<div class="box">
	<div class="box-header">
		Form Input Data Buku
	</div>
	<div class="box-body">
	<form action="<?php echo base_url() ?>index.php/Welcome/Simpanbuku" method="POST">
		Id Buku	<input type="text" name="id_buku" class="form-control">
		Nama Buku	<input type="text" name="nama_buku" class="form-control">
		Jenis Buku      	  	<input type="text" name="jenis_buku" class="form-control">
		Penulis Buku   <input type="text" name="penulis_buku" class="form-control">
		Penerbit Buku 			<input type="text" name="penerbit_buku" class="form-control">
		<br>
		<button class="btn btn-primary btn-md pull-right" type="submit">SIMPAN</button>
	</form>
</div>
</div>

<div class="box">
	<div class="box-header">
		<div class="box-body">
			<table class="table table-bordered table-hover">
	<tr>
		<td>id buku</td>
		<td>nama buku</td>
		<td>jenis buku</td>
		<td>penulis buku</td>
		<td>penerbit buku</td>
		<td>Aksi</td>
	</tr>
	<?php foreach ($data_buku as $tampilkan) {
	echo "<tr>";
		echo "<td> $tampilkan->id_buku</td>";
		echo "<td> $tampilkan->nama_buku</td>";
		echo "<td> $tampilkan->jenis_buku</td>";
		echo "<td> $tampilkan->penulis_buku</td>";
		echo "<td> $tampilkan->penerbit_buku</td>";
		echo "<td><a href='Editbuku/$tampilkan->id_buku'<button class='btn btn-warning btn-xs'>Edit</button></a><button class='btn btn-danger btn-xs' onClick='hapus($tampilkan->id_buku)'>Hapus</button></td>";
	echo "</tr>";
	}?>
</table>
		</div>
	</div>
</div>

<!-- JS -->
<script>
	function hapus(id){
		$('#form_hapus')[0].reset();
		$.ajax({
			url : "<?php echo base_url('index.php/Welcome/getidbuku') ?>/"+id,
			type :"GET",
			dataType:"JSON",
			success: function(data){
				$('[name="id_buku"]').val(data.id_buku);
				$('#modal-default').modal('show');
			},
			error :function(jqXHR,textStatus,errorThrown){
				alert('Gagal Ambil Data ajax');
			}
		})
	}
</script>
<!-- Modal -->
		 <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pesan Hapus Data</h4>
              </div>
              <div class="modal-body">
              <form action="<?php echo base_url() ?>index.php/Welcome/Hapusbuku"method="POST" id="form_hapus">
              	<input type="hidden" name="id_buku" value="">
              	Apakah Data Tersebut akan dihapus?<br>
                
              </div>
              <div class="modal-footer">
              	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">TIDAK</button>
                <button type="submit" class="btn btn-primary pull-right">YA</button>
              </form>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>