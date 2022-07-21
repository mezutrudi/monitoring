
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Halaman</strong>Setting Dosen</h2>
                        </div>
                        <div class="body">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                        <button type="button" data-color="teal" class="btn bg-teal waves-effect" id="tambahdata">Tambah Setting Dosen</button>
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Dosen</th>
                                            <th>Jumlah Mahasiswa</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Dosen</th>
                                            <th>Jumlah Mahasiswa</th>
                                           
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="dosensetting">
                                      
                                     
                                      
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

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Mahasiswa dari Dosen: <span id="nmdosen"></span></h4>
            </div>
            <div class="modal-body"> 
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Tahun Akademik</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datamahasiswa">
                                        
                                    </tbody>
                                </table>
                            </div>                           
            </div>
            <div class="modal-footer">
              
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="tambahSetting" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Setting Mahasiswa</h4>
            </div>
            <div class="modal-body"> 
            <div class="form-group form-float">
                                <p class="card-inside-title">Data Dosen</p>
                                    <select class="form-control show-tick ms select2" data-placeholder="Select" name="dosensettingmahasiswa" id="dosensettingmahasiswa"> 
                                    <option value="0">-- Pilih Dosen --</option>
                                    <?php
                                        foreach ($dosen as $dn) {
                                            ?>
                                                  <option value="<?=$dn->id_dosen?>"><?=$dn->nama_dosen?></option>
                                            <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mahasiswadosen">
                                        
                                    </tbody>
                                </table>
                            </div>                           
            </div>
            <div class="modal-footer">
              
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    
    $('#dosensetting').load("<?=base_url('beranda-dosensetting')?>");




    $('body').on('click', '#tambahdata',function () {

        $('#dosensettingmahasiswa').val("0");
           $('#tambahSetting').modal('show');

           $.ajax({
            type: "POST",
            url: "<?=base_url('beranda-mahasiswadosen')?>",

            success: function (data) {
                $('#mahasiswadosen').html(data);
                $('#dosensetting').load("<?=base_url('beranda-dosensetting')?>");
                
            }
        });
		})
    $('body').on('click', '#detailmhs',function () {
        var id_dosen = $(this).data("id_dosen");
        var nama_dosen = $(this).data("nama_dosen");
        $("#nmdosen").html(nama_dosen);
     

        $('#largeModal').modal('show');

        $.ajax({
            type: "POST",
            url: "<?=base_url('beranda-datamahasiswa')?>",
            data: {
                id_dosen: id_dosen
                },

            success: function (data) {
                $('#datamahasiswa').html(data);
                
            }
        });

		})

    $('body').on('click', '#tambahsetting',function () {
        var id_mahasiswa = $(this).data("id_mahasiswa");
        var id_tahun_akademik = $(this).data("id_tahun_akademik");
        var dosen = $('#dosensettingmahasiswa').val();
        mythis = this;
       if(dosen=="0"){
        swal("Nama Dosen masih kosong silakan isi terlebih dahulu");
        $('#dosensettingmahasiswa').focus();
       }else{
        $.ajax({
            type: "POST",
            url: "<?=base_url('beranda-simpandosenmahasiswa')?>",
            data: {
                id_mahasiswa: id_mahasiswa,
                id_tahun_akademik:id_tahun_akademik,
                dosen:dosen,
                },

            success: function (data) {
                $('#dosensetting').load("<?=base_url('beranda-dosensetting')?>");
                $(mythis).closest("tr").fadeOut();
                
            }
        });
       }
		})

$('tbody').on('click', '.hapussetting',function() {
         var id = $(this).data("id");
        
         mydata = {id:id}
         mythis = this;

     swal({
        title: "Apakah Anda Yaqin?",
        text: "Akan menghapus data terebut secara permanen",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {

            $.ajax({
                type: "POST",
                 url: "<?=base_url('beranda-hapusmahasiswa')?>",
                data: mydata,
                success: function (data) {
                        $('#dosensetting').load("<?=base_url('beranda-dosensetting')?>");
                        $(mythis).closest("tr").fadeOut();
                  
                }
            });
            swal("Info! Data telah berhasil terhapus secara permanen", {
            icon: "success",
            });
        } else {
            swal("Data anda Aman, tidak terhapus");
        }
    });
});



      
});
</script>



