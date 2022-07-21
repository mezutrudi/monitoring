
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Halaman</strong>dosen</h2>
                        </div>
                        <div class="body">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                        <button type="button" data-color="teal" class="btn bg-teal waves-effect" id="tambahdata">Tambah Dosen</button>
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIDN</th>
                                            <th>Nama Dosen</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>No</th>
                                            <th>NIDN</th>
                                            <th>Nama Dosen</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php  $no=1;
                                       
                                       foreach ($dosen as $ds) {
                                            if($ds->jenkel == "L"){
                                                $jenis ="Laki-laki";
                                            }else{
                                                $jenis ="Perempuan";
                                            }
                                        ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$ds->nidn?></td>
                                            <td><?=$ds->nama_dosen?></td>
                                            <td><?=$jenis?></td>
                                            <td><?=$ds->status?></td>
                                            <td>
                                               
                                                <a href="#" id="editdata" class="tag badge badge-success" 
                                                data-id_dosen="<?=$ds->id_dosen?>"
                                                data-nidn="<?=$ds->nidn?>"
                                                data-nama="<?=$ds->nama_dosen?>"
                                                data-jenis="<?=$ds->jenkel?>"
                                                data-alamat="<?=$ds->alamat?>"
                                                data-jenjang="<?=$ds->jenjang?>"
                                                data-telp="<?=$ds->telp?>"
                                                data-status="<?=$ds->status?>"
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
                <h4 class="title" id="defaultModalLabel"><span id="judulmodal">Tambah</span> Dosen</h4>
            </div>
            <div class="modal-body"> 
                            <form action="" method="POST">
                            <div class="form-group form-float">
                                <p class="card-inside-title">NIDN Dosen</p>
                                    <input type="number" class="form-control" placeholder="NIDN Dosen" name="nidn" id="nidn">
                               
                                </div>
                                <div class="form-group form-float">
                                    <p class="card-inside-title">Nama Dosen</p>
                                    <input type="text" class="form-control" placeholder="Nama Dosen" name="nama_dosen" id="nama_dosen">
                                    <input type="hidden" class="form-control" id="id_dosen">
                                </div>
                                <div class="form-group">
                                    <div class="radio inlineblock m-r-20">
                                    <p class="card-inside-title">Jenis Kelamin</p>
                                        <input type="radio" name="jenkel" id="laki" class="with-gap" value="L" checked>
                                        <label for="laki">Laki-laki</label>
                                    </div>                                
                                    <div class="radio inlineblock">
                                        <input type="radio" name="jenkel" id="perempuan" class="with-gap" value="P" >
                                        <label  for="perempuan">Perempuan</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <p class="card-inside-title">Alamat</p>
                                    <textarea rows="4" class="form-control no-resize" id="alamat" placeholder="isi alamat dengan benar"></textarea>
                                    
                                </div>
                                <div class="form-group form-float">
                                <p class="card-inside-title">Telpn Dosen</p>
                                    <input type="number" class="form-control" placeholder="Telpn Dosen" name="telpn" id="telpn">
                               
                                </div>
                                <div class="form-group form-float">
                                <p class="card-inside-title">Jenjang</p>
                               
                              
                                    <select class="form-control show-tick ms select2" data-placeholder="Select" name="jenjang" id="jenjang"> 
                                    <option value="0">-- Pilih Semester --</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                    </select>
                                </div>
                                <div id="aktifSimpan">
                                    <div class="form-group form-float">
                                    <p class="card-inside-title">Password</p>
                                        <input type="password" class="form-control" placeholder="Isi password" name="passwordsimpan" id="passwordsimpan">
                                
                                    </div>
                                </div>

                                <div id="aktifEdit">
                                    <div class="form-group form-float">
                                    <p class="card-inside-title">Password *) Kosong jika tidak mau diedit</p>
                                        <input type="password" class="form-control" placeholder="Isi password" name="passwordedit" id="passwordedit">
                                
                                    </div>
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
        $('#aktifEdit').css("display","none");
        $('#aktifSimpan').css("display","block");

            $('#nidn').val("");
            $('#nama_dosen').val("");
            $('#id_dosen').val("");
       
            $('#alamat').val("");
            $('#telpn').val("");
            $('#jenjang').val("0");
            $('#passwordsimpan').val("");
            $('#passwordedit').val("");
           
            $("#ya").removeAttr("checked");
            $("#tidak").removeAttr("checked");

            $("#laki").removeAttr("checked");
            $("#perempuan").removeAttr("checked");

            // $("#ya").prop("checked", true);
            // $("#laki").prop("checked", true);


          $('#judulmodal').text('Tambah');
          $('#simpandata').text('SIMPAN');
           $('#defaultModal').modal('show');
		})

    $('body').on('click', '#editdata',function () {
        $('#aktifEdit').css("display","block");
        $('#aktifSimpan').css("display","none");

        var id_dosen = $(this).data("id_dosen");
        var nidn = $(this).data("nidn");
        var nama = $(this).data("nama");
        var jenis = $(this).data("jenis");
        var alamat = $(this).data("alamat");
        var jenjang = $(this).data("jenjang");
        var telp = $(this).data("telp");
        var status = $(this).data("status");

        if (status == "Y"){
            $("#ya").attr("checked","");
        }
        if (status == "T"){
            $("#tidak").attr("checked","");
        }
         
        if (jenis == "L"){
            $("#laki").attr("checked","");
        }
        if (jenis == "P"){
            $("#perempuan").attr("checked","");
        }
          
            $('#nidn').val(nidn);
            $('#nama_dosen').val(nama);
            $('#id_dosen').val(id_dosen);
       
            $('#alamat').val(alamat);
            $('#telpn').val(telp);
            $('#jenjang').val(jenjang);
            $('#passwordsimpan').val("");
            $('#passwordedit').val("");
           

           $('#judulmodal').text('Edit');
           $('#simpandata').text('EDIT');
           $('#defaultModal').modal('show');
		})


        $('#simpandata').click(function(){
          
           var id_dosen = $('#id_dosen').val();
           var nidn = $('#nidn').val();
           var nama_dosen = $('#nama_dosen').val();
           var alamat = $('#alamat').val();
           var telpn = $('#telpn').val();
           var passsimpan = $('#passwordsimpan').val();
           var passedit = $('#passwordedit').val();
           
           var jenjang = $('#jenjang').val();
           var status = $("[name=status]:checked").val() ;
           var jenkel = $("[name=jenkel]:checked").val() ;

           var tombol = $(this).text();

           if(tombol == 'SIMPAN'){
             
                if(nidn == ""){
                    swal("NIDN masih kosong silakan isi terlebih dahulu");
                    $('#nidn').focus();
                }else if(nama_dosen == ""){
                    swal("Nama Dosen masih kosong silakan isi terlebih dahulu");
                    $('#nama_dosen').focus();
                }else if(alamat == ""){
                    swal("alamat masih kosong silakan isi terlebih dahulu");
                    $('#alamat').focus();
                }else if(telpn == ""){
                    swal("Telpn masih kosong silakan isi terlebih dahulu");
                    $('#telpn').focus();
                }else if(jenjang == ""){
                    swal("Jenjang masih kosong silakan isi terlebih dahulu");
                    $('#jenjang').focus();
                }else if(passsimpan == ""){
                    swal("Password masih kosong silakan isi terlebih dahulu");
                    $('#passwordsimpan').focus();

                }else{
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url('beranda-simpandosen')?>",
                        data: {
                           
                            nidn: nidn,
                            nama_dosen: nama_dosen,
                            alamat: alamat,
                            telpn: telpn,
                            jenjang: jenjang,
                            status:status,
                            jenkel:jenkel,
                            passsimpan: passsimpan,
                        },
                        success: function (data) {
                            $('#defaultModal').modal('hide');
                            window.location="<?=base_url('beranda-dosen')?>";
                        }
                    });
                   
                }

           }else{
               if(passedit == ""){
                $.ajax({
                        type: "POST",
                        url: "<?=base_url('beranda-edittanpadosen')?>",
                        data: {
                            id_dosen:id_dosen,
                            nidn: nidn,
                            nama_dosen: nama_dosen,
                            alamat: alamat,
                            telpn: telpn,
                            jenjang: jenjang,
                            status:status,
                            jenkel:jenkel,
                        },
                        success: function (data) {
                            $('#defaultModal').modal('hide');
                            window.location="<?=base_url('beranda-dosen')?>";
                        }
                    });

               }else{
                $.ajax({
                        type: "POST",
                        url: "<?=base_url('beranda-editdosen')?>",
                        data: {
                            id_dosen:id_dosen,
                            nidn: nidn,
                            nama_dosen: nama_dosen,
                            alamat: alamat,
                            telpn: telpn,
                            jenjang: jenjang,
                            status:status,
                            jenkel:jenkel,
                            passedit:passedit
                        },
                        success: function (data) {
                            $('#defaultModal').modal('hide');
                            window.location="<?=base_url('beranda-dosen')?>";
                        }
                    });
               }
                   
           }



           
		})
});
</script>



