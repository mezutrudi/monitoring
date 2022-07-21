
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Halaman</strong>Cetak Sertifikat</h2>
                            <br/>
                            <h2>Jumlah Standar Kompetensi yang harus diselesaikan adalah <strong><?=$jmlskd?></strong></h2>
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
                                            <th>Ketentasan</th>
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
                                            <th>Ketuntasan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php  $no=1;
                                       
                                       foreach ($mahasiswa as $mhs) {

                                        $capaian =  $this->m_administrator->hitung_tuntas('tb_monitoring','id_mahasiswa',$mhs->id_mahasiswa)->num_rows();


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
                                            <td><?=$capaian?>/<?=$jmlskd?></td>
                                            <td>
                                        <?php
                                        if($capaian >=$jmlskd){
                                            ?>
                                              <a href="<?=base_url('administrator/sertifikat/')?><?=$mhs->id_mahasiswa?>" target="_blank" class="btn btn-primary">
                                            <i class="zmdi zmdi-print"></i> Cetak</a>
                                            <?php
                                        }else{
                                            ?>
                                              <a  class="btn btn-danger disabled">
                                            <i class="zmdi zmdi-alert-triangle"></i> </a>
                                            <?php
                                        }
                                        ?>
                      
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




<script>
$(document).ready(function () {

});
</script>



