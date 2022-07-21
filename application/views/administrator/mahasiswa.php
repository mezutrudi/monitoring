
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Halaman</strong>mahasiswa</h2>
                        </div>
                        <div class="body">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                        <button type="button" data-color="teal" class="btn bg-teal waves-effect" id="tambahdata">Tambah Mahasiswa</button>
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Tahun Akademik</th>
                                            <th>Jurusan</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Telpon</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Tahun Akademik</th>
                                            <th>Jurusan</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Telpon</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php  $no=1;
                                       
                                       foreach ($mahasiswa as $mhs) {
                                            if($mhs->jenkel == "L"){
                                                $jenis ="Laki-laki";
                                            }else{
                                                $jenis ="Perempuan";
                                            }
                                        ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$mhs->nim?></td>
                                            <td><?=$mhs->tahun?></td>
                                            <td><?=$mhs->nama_prodi?></td>
                                            <td><?=$mhs->nama_mahasiswa?></td>
                                            <td><?=$jenis?></td>
                                            <td><?=$mhs->telp?></td>
                                            <td><?=$mhs->status?></td>
                                            <td>
                                               
                                                <a href="#" id="editdata" class="tag badge badge-success" 
                                                data-id_mahasiswa="<?=$mhs->id_mahasiswa?>"
                                                data-id_prodi="<?=$mhs->id_prodi?>"
                                                data-tahun_akademik="<?=$mhs->id_tahun_akademik?>"
                                                data-nim="<?=$mhs->nim?>"
                                                data-nama_mahasiswa="<?=$mhs->nama_mahasiswa?>"
                                                data-jenkel="<?=$mhs->jenkel?>"
                                                data-alamat="<?=$mhs->alamat?>"
                                                data-tempat="<?=$mhs->tempat_lahir?>"
                                                data-tgl="<?=$mhs->tgl_lahir?>"
                                                data-alamat="<?=$mhs->alamat?>"
                                                data-telp="<?=$mhs->telp?>"
                                                data-status="<?=$mhs->status?>"
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
                <h4 class="title" id="defaultModalLabel"><span id="judulmodal">Tambah</span> Mahasiswa</h4>
            </div>
            <div class="modal-body"> 
                            <form action="" method="POST">
                            <div class="form-group form-float">
                                <p class="card-inside-title">Tahun Akademik</p>
                                    <select class="form-control show-tick ms select2" data-placeholder="Select" name="tahun_akademik" id="tahun_akademik"> 
                                    <option value="0">-- Pilih JurusaTahun Akademik --</option>
                                    <?php
                                        foreach ($tahun as $th) {
                                            ?>
                                                  <option value="<?=$th->id_tahun_akademik?>"><?=$th->tahun?></option>
                                            <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            <div class="form-group form-float">
                                <p class="card-inside-title">Jurusan</p>
                                    <select class="form-control show-tick ms select2" data-placeholder="Select" name="prodi" id="prodi"> 
                                    <option value="0">-- Pilih Jurusan --</option>
                                    <?php
                                        foreach ($prodi as $pro) {
                                            ?>
                                                  <option value="<?=$pro->id_prodi?>"><?=$pro->nama_prodi?></option>
                                            <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            <div class="form-group form-float">
                                <p class="card-inside-title">NIM Mahasiswa</p>
                                    <input type="number" class="form-control" placeholder="NIM Mahasiswa" name="nim" id="nim">
                               
                                </div>
                                <div class="form-group form-float">
                                    <p class="card-inside-title">Nama Mahasiswa</p>
                                    <input type="text" class="form-control" placeholder="Nama Mahasiswa" name="nama_mahasiswa" id="nama_mahasiswa">
                                    <input type="hidden" class="form-control" id="id_mahasiswa">
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
                                    <p class="card-inside-title">Tempat Tanggal Lahir</p>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                    <div class="form-group">                                    
                                    <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" id="tempat_lahir">                               
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">                                   
                                    <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" id="tanggal_lahir">                                  
                                    </div>
                                </div>
                                </div>
                                   
                                   
                                    
                                </div>
                                <div class="form-group form-float">
                                <p class="card-inside-title">Telpn Mahasiswa</p>
                                    <input type="number" class="form-control" placeholder="Telpn Mahasiswa" name="telpn" id="telpn">
                               
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

            $('#tahun_akademik').val("0");
            $('#prodi').val("0");
            $('#nim').val("");
            $('#nama_mahasiswa').val("");
            $('#id_mahasiswa').val("");
            $('#tempat_lahir').val("");
            $('#tanggal_lahir').val("");
       
       
            $('#alamat').val("");
            $('#telpn').val("");
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

        var id_mahasiswa = $(this).data("id_mahasiswa");
        var id_prodi = $(this).data("id_prodi");
        var tahun_akademik = $(this).data("tahun_akademik");
        var nim = $(this).data("nim");
        var nama_mahasiswa = $(this).data("nama_mahasiswa");
        var jenkel = $(this).data("jenkel");
        var alamat = $(this).data("alamat");
        var tempat = $(this).data("tempat");
        var tgl = $(this).data("tgl");
        var telp = $(this).data("telp");
        var status = $(this).data("status");
      
        if (status == "Y"){
            $("#ya").attr("checked","");
        }
        if (status == "T"){
            $("#tidak").attr("checked","");
        }
         
        if (jenkel == "L"){
            $("#laki").attr("checked","");
        }
        if (jenkel == "P"){
            $("#perempuan").attr("checked","");
        }
          
            $('#tahun_akademik').val(tahun_akademik);
            $('#prodi').val(id_prodi);
            $('#nim').val(nim);
            $('#nama_mahasiswa').val(nama_mahasiswa);
            $('#id_mahasiswa').val(id_mahasiswa);
       
            $('#alamat').val(alamat);
            $('#tempat_lahir').val(tempat);
            $('#tanggal_lahir').val(tgl);
            $('#telpn').val(telp);

            $('#passwordsimpan').val("");
            $('#passwordedit').val("");
           

           $('#judulmodal').text('Edit');
           $('#simpandata').text('EDIT');
           $('#defaultModal').modal('show');
		})


        $('#simpandata').click(function(){
            var tahun_akademik =$('#tahun_akademik').val();
            var id_prodi =$('#prodi').val();
           var id_mahasiswa = $('#id_mahasiswa').val();
           var nim = $('#nim').val();
           var nama_mahasiswa = $('#nama_mahasiswa').val();
           var alamat = $('#alamat').val();
           var tempat =$('#tempat_lahir').val();
           var tgl =  $('#tanggal_lahir').val();
           var telpn = $('#telpn').val();
           var passsimpan = $('#passwordsimpan').val();
           var passedit = $('#passwordedit').val();
           
         
           var status = $("[name=status]:checked").val() ;
           var jenkel = $("[name=jenkel]:checked").val() ;

           var tombol = $(this).text();

           if(tombol == 'SIMPAN'){
             
                if(tahun_akademik == "0"){
                    swal("Tahun akademik masih kosong silakan isi terlebih dahulu");
                    $('#tahun_akademik').focus();
                }else if(id_prodi == "0"){
                    swal("Prodi masih kosong silakan isi terlebih dahulu");
                    $('#prodi').focus();
                }else if(nim == ""){
                    swal("NIM masih kosong silakan isi terlebih dahulu");
                    $('#nim').focus();
                }else if(nama_mahasiswa == ""){
                    swal("Nama Mahasiswa masih kosong silakan isi terlebih dahulu");
                    $('#nama_mahasiswa').focus();
                }else if(alamat == ""){
                    swal("alamat masih kosong silakan isi terlebih dahulu");
                    $('#alamat').focus();
                }else if(tempat == ""){
                    swal("Tempat Lahir masih kosong silakan isi terlebih dahulu");
                    $('#tempat_lahir').focus();
                }else if(tgl == ""){
                    swal("Tanggal Lahir masih kosong silakan isi terlebih dahulu");
                    $('#tanggal_lahir').focus();
                }else if(telpn == ""){
                    swal("Telpn masih kosong silakan isi terlebih dahulu");
                    $('#telpn').focus();
                
                }else if(passsimpan == ""){
                    swal("Password masih kosong silakan isi terlebih dahulu");
                    $('#passwordsimpan').focus();

                }else{
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url('beranda-simpanmahasiswa')?>",
                        data: {
                            tahun_akademik:tahun_akademik,
                            id_prodi:id_prodi,
                            nim: nim,
                            nama_mahasiswa: nama_mahasiswa,
                            alamat: alamat,
                            tempat:tempat,
                            tgl:tgl,
                            telpn: telpn,
                            status:status,
                            jenkel:jenkel,
                            passsimpan: passsimpan,
                        },
                        success: function (data) {
                            $('#defaultModal').modal('hide');
                            window.location="<?=base_url('beranda-mahasiswa')?>";
                        }
                    });
                   
                }

           }else{
               if(passedit == ""){
                $.ajax({
                        type: "POST",
                        url: "<?=base_url('beranda-edittanpamahasiswa')?>",
                        data: {
                            id_mahasiswa:id_mahasiswa,
                            tahun_akademik:tahun_akademik,
                            id_prodi:id_prodi,
                            nim: nim,
                            nama_mahasiswa: nama_mahasiswa,
                            alamat: alamat,
                            tempat:tempat,
                            tgl:tgl,
                            telpn: telpn,
                            status:status,
                            jenkel:jenkel,
                        },
                        success: function (data) {
                            $('#defaultModal').modal('hide');
                            window.location="<?=base_url('beranda-mahasiswa')?>";
                        }
                    });

               }else{
                $.ajax({
                        type: "POST",
                        url: "<?=base_url('beranda-editmahasiswa')?>",
                        data: {
                            id_mahasiswa:id_mahasiswa,
                            tahun_akademik:tahun_akademik,
                            id_prodi:id_prodi,
                            nim: nim,
                            nama_mahasiswa: nama_mahasiswa,
                            alamat: alamat,
                            tempat:tempat,
                            tgl:tgl,
                            telpn: telpn,
                            status:status,
                            jenkel:jenkel,
                            passedit:passedit,
                        },
                        success: function (data) {
                            $('#defaultModal').modal('hide');
                            window.location="<?=base_url('beranda-mahasiswa')?>";
                        }
                    });
               }
                   
           }



           
		})
});
</script>



