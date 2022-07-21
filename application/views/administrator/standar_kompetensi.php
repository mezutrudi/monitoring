
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Halaman</strong>standar kompetensi</h2>
                        </div>
                        <div class="body">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                        <button type="button" data-color="teal" class="btn bg-teal waves-effect" id="tambahdata">Tambah Standar Kompetensi</button>
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Materi</th>
                                            <th>Nama Standar Kompetensi</th>
                                         
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                            <th>Materi</th>
                                            <th>Nama Standar Kompetensi</th>
                                         
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php  $no=1;
                                       
                                       foreach ($standar_kompetensi as $skd) {
                                            
                                        ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$skd->nama_materi?></td>
                                            <td><?=$skd->nama_standar_kompetensi?></td>
                                         
                                            <td>
                                               
                                                <a href="#" id="editdata" class="tag badge badge-success" 
                                                data-id_standar_kompetensi="<?=$skd->id_standar_kompetensi?>"
                                                data-id_materi="<?=$skd->id_materi?>"
                                                data-nama="<?=$skd->nama_standar_kompetensi?>"
                                                >Edit</a>
                                                <a href="#" id="hapusdata" class="tag badge badge-danger" 
                                                data-id_standar_kompetensi="<?=$skd->id_standar_kompetensi?>"
                                                >Hapus</a>
                                            </td>
                                          
                                        </tr>
                                        <?php  $no++; 
                                       }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel"><span id="judulmodal">Tambah</span> Standar Kompetensi</h4>
            </div>
            <div class="modal-body"> 
                            <form action="" method="POST">
                            <div class="form-group form-float">
                                <p class="card-inside-title">materi</p>
                                    <select class="form-control show-tick ms select2" data-placeholder="Select" name="id_materi" id="id_materi"> 
                                    <option value="0">-- Pilih Materi --</option>
                                    <?php
                                        foreach ($materi as $mr) {
                                            ?>
                                                  <option value="<?=$mr->id_materi?>"><?=$mr->nama_materi?></option>
                                            <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group form-float">
                                <p class="card-inside-title">Standar Kompetensi</p>
                                    <input type="text" class="form-control" placeholder="Nama Standar Kompetensi" name="nama_standar_kompetensi" id="nama_standar_kompetensi">
                                    <input type="hidden" class="form-control" id="idstandar_kompetensi">
                                </div>
                                
                               
                                
                             
                    <div class="modal-footer">
                    <button class="btn btn-raised btn-primary waves-effect" type="button" id="simpandata">SIMPAN</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">TUTUP</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    $('body').on('click', '#tambahdata',function () {
            $('#nama_standar_kompetensi').val("");
       
            $('#id_materi').val("0");
            $('#idstandar_kompetensi').val("");
           
           


          $('#judulmodal').text('Tambah');
          $('#simpandata').text('SIMPAN');
           $('#defaultModal').modal('show');
		})

    $('body').on('click', '#editdata',function () {
          
        var id_standar_kompetensi = $(this).data("id_standar_kompetensi");
        var nama_standar_kompetensi = $(this).data("nama");
        var id_materi = $(this).data("id_materi");
       
     
         
           $('#judulmodal').text('Edit');
           $('#nama_standar_kompetensi').val(nama_standar_kompetensi);
           $('#id_materi').val(id_materi);
           $('#idstandar_kompetensi').val(id_standar_kompetensi);
           $('#simpandata').text('EDIT');
         
           $('#defaultModal').modal('show');
		})
        $('body').on('click', '#hapusdata',function () {
          
          var id_standar_kompetensi = $(this).data("id_standar_kompetensi");
          
            swal({
		title: "Apakah Anda Yakin?",
		text: "akan terhapus permanen!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	  })
	  .then((willDelete) => {
		if (willDelete) {
				$.ajax({
					type: "POST",
					url: "<?=base_url('beranda-hapusstandar_kompetensi')?>",
					data: {id_standar_kompetensi:id_standar_kompetensi},
					dataType: "text",
					success: function (data) {
                        window.location="<?=base_url('beranda-standar_kompetensi')?>";
					}
	  });
		  swal("Berhasil! Data obat sudah terhapus!", {
			icon: "success",
		  });
		} else {
		  swal("Data anda masih aman!");
		}
	  });
         
       
           
     
          })

        $('#simpandata').click(function(){
          
           var nama_standar_kompetensi = $('#nama_standar_kompetensi').val();
           var id_materi = $('#id_materi').val();
          
           var idstandar_kompetensi = $('#idstandar_kompetensi').val();

           var tombol = $(this).text();

           if(tombol == 'SIMPAN'){
             
                if(id_materi == "0"){
                    swal("Materi masih kosong silakan isi terlebih dahulu");
                    $('#id_materi').focus();
                }else if(nama_standar_kompetensi == ""){
                    swal("Nama Standar Kompetensi masih kosong silakan isi terlebih dahulu");
                    $('#nama_standar_kompetensi').focus();
                }else{
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url('beranda-simpanstandar_kompetensi')?>",
                        data: {
                            nama_standar_kompetensi: nama_standar_kompetensi,
                            id_materi:id_materi
                        },
                        success: function (data) {
                            $('#defaultModal').modal('hide');
                            window.location="<?=base_url('beranda-standar_kompetensi')?>";
                        }
                    });
                }

           }else{
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url('beranda-editstandar_kompetensi')?>",
                        data: {
                            nama_standar_kompetensi: nama_standar_kompetensi,
                            idstandar_kompetensi: idstandar_kompetensi,
                            id_materi:id_materi
                        },
                        success: function (data) {
                            $('#defaultModal').modal('hide');
                            window.location="<?=base_url('beranda-standar_kompetensi')?>";
                        }
                    });
           }



           
		})
});
</script>



