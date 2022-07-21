
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Halaman</strong>materi</h2>
                        </div>
                        <div class="body">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                        <button type="button" data-color="teal" class="btn bg-teal waves-effect" id="tambahdata">Tambah Materi</button>
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Materi</th>
                                         
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Materi</th>
                                           
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php  $no=1;
                                       
                                       foreach ($materi as $fk) {
                                            
                                        ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$fk->nama_materi?></td>
                                         
                                            <td>
                                               
                                                <a href="#" id="editdata" class="tag badge badge-success" 
                                                data-id_materi="<?=$fk->id_materi?>"
                                                data-nama="<?=$fk->nama_materi?>"
                                                >Edit</a>
                                                <a href="#" id="hapusdata" class="tag badge badge-danger" 
                                                data-id_materi="<?=$fk->id_materi?>"
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
                <h4 class="title" id="defaultModalLabel"><span id="judulmodal">Tambah</span> Materi</h4>
            </div>
            <div class="modal-body"> 
                            <form action="" method="POST">
                                <div class="form-group form-float">
                                <p class="card-inside-title">Materi</p>
                                    <input type="text" class="form-control" placeholder="Nama Materi" name="nama_materi" id="nama_materi">
                                    <input type="hidden" class="form-control" id="idmateri">
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
            $('#nama_materi').val("");
       
            $('#idmateri').val("");
           
           


          $('#judulmodal').text('Tambah');
          $('#simpandata').text('SIMPAN');
           $('#defaultModal').modal('show');
		})

    $('body').on('click', '#editdata',function () {
          
        var id_materi = $(this).data("id_materi");
        var nama_materi = $(this).data("nama");
       
     
         
           $('#judulmodal').text('Edit');
           $('#nama_materi').val(nama_materi);
           $('#idmateri').val(id_materi);
           $('#simpandata').text('EDIT');
         
           $('#defaultModal').modal('show');
		})
        $('body').on('click', '#hapusdata',function () {
          
          var id_materi = $(this).data("id_materi");
          
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
					url: "<?=base_url('beranda-hapusmateri')?>",
					data: {id_materi:id_materi},
					dataType: "text",
					success: function (data) {
                        window.location="<?=base_url('beranda-materi')?>";
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
          
           var nama_materi = $('#nama_materi').val();
           var idmateri = $('#idmateri').val();

           var tombol = $(this).text();

           if(tombol == 'SIMPAN'){
             
                if(nama_materi == ""){
                    swal("Nama Materi masih kosong silakan isi terlebih dahulu");
                    $('#nama_materi').focus();
                }else{
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url('beranda-simpanmateri')?>",
                        data: {
                            nama_materi: nama_materi,
                        },
                        success: function (data) {
                            $('#defaultModal').modal('hide');
                            window.location="<?=base_url('beranda-materi')?>";
                        }
                    });
                }

           }else{
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url('beranda-editmateri')?>",
                        data: {
                            nama_materi: nama_materi,
                            idmateri: idmateri,
                        },
                        success: function (data) {
                            $('#defaultModal').modal('hide');
                            window.location="<?=base_url('beranda-materi')?>";
                        }
                    });
           }



           
		})
});
</script>



