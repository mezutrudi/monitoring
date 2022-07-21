
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Halaman</strong>prodi</h2>
                        </div>
                        <div class="body">
                        <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                        <button type="button" data-color="teal" class="btn bg-teal waves-effect" id="tambahdata">Tambah Fakultas</button>
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Fakultas</th>
                                            <th>Nama Prodi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Fakultas</th>
                                            <th>Nama Prodi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php  $no=1;
                                       
                                       foreach ($prodi as $pro) {
                                            
                                        ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$pro->nama_fakultas?></td>
                                            <td><?=$pro->nama_prodi?></td>
                                            <td><?=$pro->status?></td>
                                            <td>
                                               
                                                <a href="#" id="editdata" class="tag badge badge-success" 
                                                data-id_prodi="<?=$pro->id_prodi?>"
                                                data-id_fakultas="<?=$pro->id_fakultas?>"
                                                data-nama_prodi="<?=$pro->nama_prodi?>"
                                                data-status="<?=$pro->status?>"
                                                >Edit</a>
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
                <h4 class="title" id="defaultModalLabel"><span id="judulmodal">Tambah</span> Prodi</h4>
            </div>
            <div class="modal-body"> 
                            <form action="" method="POST">
                                <div class="form-group form-float">
                                <p class="card-inside-title">Fakultas</p>
                                    <select class="form-control show-tick ms select2" data-placeholder="Select" name="fakultas" id="fakultas"> 
                                    <option value="0">-- Pilih Fakultas --</option>
                                    <?php
                                        foreach ($fakultas as $fkl) {
                                            ?>
                                                  <option value="<?=$fkl->id_fakultas?>"><?=$fkl->nama_fakultas?></option>
                                            <?php
                                        }
                                    ?>
                                  

                                            
                                    </select>
                                    <input type="hidden" class="form-control" id="idprodi">
                                </div>

                                <div class="form-group form-float">
                                <p class="card-inside-title">Nama Prodi</p>
                                    <input type="text" class="form-control" placeholder="Nama Prodi" name="nama_prodi" id="nama_prodi">
                                  
                                </div>

                                <div class="form-group">
                                    <div class="radio inlineblock m-r-20">
                                    <p class="card-inside-title">Status</p>
                                        <input type="radio" name="status" id="ya" class="with-gap" value="Y">
                                        <label for="ya">Ya</label>
                                    </div>                                
                                    <div class="radio inlineblock">
                                        <input type="radio" name="status" id="tidak" class="with-gap" value="T" >
                                        <label  for="tidak">Tidak</label>
                                    </div>
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
            $('#fakultas').val("0");
       
            $('#nama_prodi').val("");
           
            $('#idprodi').val("");
            $("#ya").removeAttr("checked");
            $("#tidak").removeAttr("checked");


          $('#judulmodal').text('Tambah');
          $('#simpandata').text('SIMPAN');
           $('#defaultModal').modal('show');
		})

    $('body').on('click', '#editdata',function () {
          
        var id_prodi = $(this).data("id_prodi");
        var id_fakultas = $(this).data("id_fakultas");
        var nama_prodi = $(this).data("nama_prodi");
        var status = $(this).data("status");

        if (status == "Y"){
            $("#ya").attr("checked","");
        }
        if (status == "T"){
            $("#tidak").attr("checked","");
        }
         
           $('#judulmodal').text('Edit');

           $('#idprodi').val(id_prodi);
           $('#fakultas').val(id_fakultas);
           $('#nama_prodi').val(nama_prodi);
           $('#status').val(status);

           $('#simpandata').text('EDIT');
         
           $('#defaultModal').modal('show');
		})


        $('#simpandata').click(function(){
          
           var idprodi = $('#idprodi').val();
           var id_fakultas = $('#fakultas').val();
           var status = $("[name=status]:checked").val() ;

           var nama_prodi = $('#nama_prodi').val();

           var tombol = $(this).text();

           if(tombol == 'SIMPAN'){
             
                if(id_fakultas == ""){
                    swal("Fakultas masih kosong silakan isi terlebih dahulu");
                    $('#id_fakultas').focus();
                }else if(nama_prodi == ""){
                    swal("Nama Prodi masih kosong silakan isi terlebih dahulu");
                    $('#nama_prodi').focus();
                
                }else{
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url('beranda-simpanprodi')?>",
                        data: {
                            id_fakultas: id_fakultas,
                            nama_prodi: nama_prodi,
                            status: status,
                        },
                        success: function (data) {
                            $('#defaultModal').modal('hide');
                            window.location="<?=base_url('beranda-prodi')?>";
                        }
                    });
                }

           }else{
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url('beranda-editprodi')?>",
                        data: {
                            id_fakultas: id_fakultas,
                            nama_prodi: nama_prodi,
                            status: status,
                            idprodi: idprodi,
                        },
                        success: function (data) {
                            $('#defaultModal').modal('hide');
                            window.location="<?=base_url('beranda-prodi')?>";
                        }
                    });
           }



           
		})
});
</script>
