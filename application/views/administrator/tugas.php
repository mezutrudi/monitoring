
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Halaman</strong>Tugas Mahasiswa</h2>
                        </div>
                        <div class="body">
                <div class="col-lg-12">
                    <div class="card">
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
                                            <td>
                                               
                                                <a href="#" id="detailnilai" class="tag badge badge-success" 
                                                data-id_mahasiswa="<?=$mhs->id_mahasiswa?>"
                                                data-nama_mahasiswa="<?=$mhs->nama_mahasiswa?>"
                                                >Detail Nilai</a>
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


<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Tugas dari <span id="nmmahasiswa"></span></h4>
            </div>
            <div class="modal-body"> 
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kompetensi Dasar</th>
                                            <th>File</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datanilai">
                                        
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
   

    $('body').on('click', '#detailnilai',function () {
        

        var id_mahasiswa = $(this).data("id_mahasiswa");
        var nama_mahasiswa = $(this).data("nama_mahasiswa");
        $("#nmmahasiswa").html(nama_mahasiswa);
     

        $('#largeModal').modal('show');

        $.ajax({
            type: "POST",
            url: "<?=base_url('beranda-nilaimahasiswa')?>",
            data: {
                id_mahasiswa: id_mahasiswa
                },

            success: function (data) {
                $('#datanilai').html(data);
                
            }
        });

		})


     
});
</script>



