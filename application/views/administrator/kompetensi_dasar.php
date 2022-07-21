
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Halaman</strong>kompetensi dasar</h2>
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
                                            <th>Nama Mahasiswa</th>
                                            <th>Nama Kompetensi dasar</th>
                                         
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Nama Kompetensi dasar</th>
                                         
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php  $no=1;
                                       
                                       foreach ($kompetensi_dasar as $kd) {
                                            
                                        ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$kd->nama_standar_kompetensi?></td>
                                            <td><?=$kd->nama_kompetensi_dasar?></td>
                                         
                                            <td>
                                               
                                                <a href="#" id="editdata" class="tag badge badge-success" 
                                                data-id_kompetensi_dasar="<?=$kd->id_kompetensi_dasar?>"
                                                data-id_standar_kompetensi="<?=$kd->id_standar_kompetensi?>"
                                                data-nama="<?=$kd->nama_kompetensi_dasar?>"
                                                >Edit</a>
                                                <a href="#" id="hapusdata" class="tag badge badge-danger" 
                                                data-id_kompetensi_dasar="<?=$kd->id_kompetensi_dasar?>"
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
                <h4 class="title" id="defaultModalLabel"><span id="judulmodal">Tambah</span>Kompetensi Dasar</h4>
            </div>
            <div class="modal-body"> 
                            <form action="" method="POST">
                            <div class="form-group form-float">
                                <p class="card-inside-title">Standar Kompetensi</p>
                                    <select class="form-control show-tick ms select2" data-placeholder="Select" name="id_standar_kompetensi" id="id_standar_kompetensi"> 
                                    <option value="0">-- Pilih Standar Kompetensi --</option>
                                    <?php
                                        foreach ($standar_kompetensi as $skd) {
                                            ?>
                                                  <option value="<?=$skd->id_standar_kompetensi?>"><?=$skd->nama_standar_kompetensi?></option>
                                            <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group form-float">
                                <p class="card-inside-title">Kompetensi Dasar</p>
                                    <input type="text" class="form-control" placeholder="Nama Kompetensi Dasar" name="nama_kompetensi_dasar" id="nama_kompetensi_dasar">
                                    <input type="hidden" class="form-control" id="idkompetensi_dasar">
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
            $('#nama_kompetensi_dasar').val("");
       
            $('#id_standar_kompetensi').val("0");
            $('#idkompetensi_dasar').val("");
           
           


          $('#judulmodal').text('Tambah');
          $('#simpandata').text('SIMPAN');
           $('#defaultModal').modal('show');
		})

    $('body').on('click', '#editdata',function () {
          
        var id_kompetensi_dasar = $(this).data("id_kompetensi_dasar");
        var nama_kompetensi_dasar = $(this).data("nama");
        var id_standar_kompetensi = $(this).data("id_standar_kompetensi");
       
     
         
           $('#judulmodal').text('Edit');
           $('#nama_kompetensi_dasar').val(nama_kompetensi_dasar);
           $('#id_standar_kompetensi').val(id_standar_kompetensi);
           $('#idkompetensi_dasar').val(id_kompetensi_dasar);
           $('#simpandata').text('EDIT');
         
           $('#defaultModal').modal('show');
		})
        $('body').on('click', '#hapusdata',function () {
          
          var id_kompetensi_dasar = $(this).data("id_kompetensi_dasar");
          
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
					url: "<?=base_url('beranda-hapuskompetensi_dasar')?>",
					data: {id_kompetensi_dasar:id_kompetensi_dasar},
					dataType: "text",
					success: function (data) {
                        window.location="<?=base_url('beranda-kompetensi_dasar')?>";
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
          
           var nama_kompetensi_dasar = $('#nama_kompetensi_dasar').val();
           var id_standar_kompetensi = $('#id_standar_kompetensi').val();
          
           var idkompetensi_dasar = $('#idkompetensi_dasar').val();

           var tombol = $(this).text();

           if(tombol == 'SIMPAN'){
             
                if(id_standar_kompetensi == "0"){
                    swal("Standar Kompetensi masih kosong silakan isi terlebih dahulu");
                    $('#id_standar_kompetensi').focus();
                }else if(nama_kompetensi_dasar == ""){
                    swal("Nama Standar Kompetensi masih kosong silakan isi terlebih dahulu");
                    $('#nama_kompetensi_dasar').focus();
                }else{
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url('beranda-simpankompetensi_dasar')?>",
                        data: {
                            nama_kompetensi_dasar: nama_kompetensi_dasar,
                            id_standar_kompetensi:id_standar_kompetensi
                        },
                        success: function (data) {
                            $('#defaultModal').modal('hide');
                            window.location="<?=base_url('beranda-kompetensi_dasar')?>";
                        }
                    });
                }

           }else{
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url('beranda-editkompetensi_dasar')?>",
                        data: {
                            nama_kompetensi_dasar: nama_kompetensi_dasar,
                            idkompetensi_dasar: idkompetensi_dasar,
                            id_standar_kompetensi:id_standar_kompetensi
                        },
                        success: function (data) {
                            $('#defaultModal').modal('hide');
                            window.location="<?=base_url('beranda-kompetensi_dasar')?>";
                        }
                    });
           }



           
		})
});
</script>



