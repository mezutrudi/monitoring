
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Halaman</strong>fakultas</h2>
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
                                            <th>Status</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Fakultas</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php  $no=1;
                                       
                                       foreach ($fakultas as $fk) {
                                            
                                        ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$fk->nama_fakultas?></td>
                                            <td><?=$fk->status?></td>
                                            <td>
                                               
                                                <a href="#" id="editdata" class="tag badge badge-success" 
                                                data-id_fakultas="<?=$fk->id_fakultas?>"
                                                data-nama="<?=$fk->nama_fakultas?>"
                                                data-status="<?=$fk->status?>"
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
                <h4 class="title" id="defaultModalLabel"><span id="judulmodal">Tambah</span> Fakultas</h4>
            </div>
            <div class="modal-body"> 
                            <form action="" method="POST">
                                <div class="form-group form-float">
                                <p class="card-inside-title">Fakultas</p>
                                    <input type="text" class="form-control" placeholder="Nama Fakultas" name="nama_fakultas" id="nama_fakultas">
                                    <input type="hidden" class="form-control" id="idfakultas">
                                </div>
                                <div class="form-group">
                                    <div class="radio inlineblock m-r-20">
                                    <p class="card-inside-title">Status</p>
                                        <input type="radio" name="status" id="ya" class="with-gap" value="Y" checked>
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
            $('#nama_fakultas').val("");
       
            $('#idfakultas').val("");
           
            $("#ya").removeAttr("checked");
            $("#tidak").removeAttr("checked");


          $('#judulmodal').text('Tambah');
          $('#simpandata').text('SIMPAN');
           $('#defaultModal').modal('show');
		})

    $('body').on('click', '#editdata',function () {
          
        var id_fakultas = $(this).data("id_fakultas");
        var nama_fakultas = $(this).data("nama");
        var status = $(this).data("status");

        if (status == "Y"){
            $("#ya").attr("checked","");
        }
        if (status == "T"){
            $("#tidak").attr("checked","");
        }
         
           $('#judulmodal').text('Edit');
           $('#nama_fakultas').val(nama_fakultas);
           $('#idfakultas').val(id_fakultas);
           $('#simpandata').text('EDIT');
         
           $('#defaultModal').modal('show');
		})


        $('#simpandata').click(function(){
          
           var nama_fakultas = $('#nama_fakultas').val();
           var status = $("[name=status]:checked").val() ;
           var idfakultas = $('#idfakultas').val();

           var tombol = $(this).text();

           if(tombol == 'SIMPAN'){
             
                if(nama_fakultas == ""){
                    swal("Nama Fakultas masih kosong silakan isi terlebih dahulu");
                    $('#nama_fakultas').focus();
                }else{
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url('beranda-simpanfakultas')?>",
                        data: {
                            nama_fakultas: nama_fakultas,
                            status: status,
                        },
                        success: function (data) {
                            $('#defaultModal').modal('hide');
                            window.location="<?=base_url('beranda-fakultas')?>";
                        }
                    });
                }

           }else{
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url('beranda-editfakultas')?>",
                        data: {
                            nama_fakultas: nama_fakultas,
                            status: status,
                            idfakultas: idfakultas,
                        },
                        success: function (data) {
                            $('#defaultModal').modal('hide');
                            window.location="<?=base_url('beranda-fakultas')?>";
                        }
                    });
           }



           
		})
});
</script>



