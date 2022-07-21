
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Halaman</strong>Tahun Akademik</h2>
                        </div>
                        <div class="body">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                        <button type="button" data-color="teal" class="btn bg-teal waves-effect" id="tambahdata">Tambah Tahun Akademik</button>
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Semester</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Semester</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php  $no=1;
                                       
                                       foreach ($tahun as $th) {
                                            if($th->status_semester == 0){
                                                $semester = "Ganjil";
                                            }else{
                                                $semester = "Genap";
                                            }
                                        ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$th->tahun?></td>
                                            <td><?=$semester?></td>
                                            <td><?=$th->status?></td>
                                            <td>
                                               
                                                <a href="#" id="editdata" class="tag badge badge-success" 
                                                data-id_th="<?=$th->id_tahun_akademik?>"
                                                data-th="<?=$th->tahun?>"
                                                data-semester="<?=$th->status_semester?>"
                                                data-status="<?=$th->status?>"
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
<!-- Modal Dialogs ====== --> 
<!-- Default Size -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel"><span id="judulmodal">Tambah</span> Tahun Pelajaran</h4>
            </div>
            <div class="modal-body"> 
                            <form action="" method="POST">
                                <div class="form-group form-float">
                                <p class="card-inside-title">Tahun Akademik</p>
                                    <input type="number" class="form-control" placeholder="Tahun" name="tahun" id="tahun">
                                    <input type="hidden" class="form-control" id="idth">
                                </div>
                                <div class="form-group form-float">
                                <p class="card-inside-title">Semester</p>
                               
                              
                                    <select class="form-control show-tick ms select2" data-placeholder="Select" name="status_semester" id="status_semester"> 
                                    <option value="">-- Pilih Semester --</option>
                                            <option value="0">Ganjil</option>
                                            <option value="1">Genap</option>
                                    </select>
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
            $('#status_semester').val("");
            $('#tahun').val("");
            $('#idth').val("");
           
            $("#ya").removeAttr("checked");
            $("#tidak").removeAttr("checked");


          $('#judulmodal').text('Tambah');
          $('#simpandata').text('SIMPAN');
           $('#defaultModal').modal('show');
		})

    $('body').on('click', '#editdata',function () {
          
        var idth = $(this).data("id_th");
        var th = $(this).data("th");
        var semester = $(this).data("semester");
        var status = $(this).data("status");
        
        if (status=="Y"){
            $("#ya").attr("checked","");
        }
        if (status=="T"){
            $("#tidak").attr("checked","");
        }
           $('#judulmodal').text('Edit');
           $('#tahun').val(th);
           $('#status_semester').val(semester);
           $('#idth').val(idth);
           $('#simpandata').text('EDIT');
         
           $('#defaultModal').modal('show');
		})


   
        $('body').on('click', '#simpandata',function () {
           var tahun = $('#tahun').val();
        //    var status = $('.status').val();
           var semester =  $('#status_semester').val();
        var status =  $("[name=status]:checked").val() 
           var idth = $('#idth').val();

           var tombol = $(this).text();

           if(tombol == 'SIMPAN'){
               
                if(tahun == ""){
                    swal("Tahun masih kosong silakan isi terlebih dahulu");
                    $('#tahun').focus();
                }else if(semester == ""){
                    swal("Semester masih kosong silakan isi terlebih dahulu");
                    $('#status_semester').focus();
                    
                }else{
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url('beranda-simpantahun')?>",
                        data: {
                            tahun: tahun,
                            semester: semester,
                            status: status,
                        },
                        success: function (data) {
                            $('#defaultModal').modal('hide');
                            window.location="<?=base_url('beranda-tahun_akademik')?>";
                        }
                    });
                }

           }else{
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url('beranda-edittahun')?>",
                        data: {
                            tahun: tahun,
                            semester: semester,
                            status: status,
                            idth: idth,
                        },
                        success: function (data) {
                            $('#defaultModal').modal('hide');
                            window.location="<?=base_url('beranda-tahun_akademik')?>";
                        }
                    });
           }



           
		})
});
</script>

