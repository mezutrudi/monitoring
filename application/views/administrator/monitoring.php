
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Halaman</strong>Hasil Monitoring</h2>
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
                                            <th>Dosen</th>
                                            <th>Jumlah Mahasiswa</th>
                                            <th>Jumlah Tuntas</th>
                                            <th>Jumlah Belum Tuntas</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Dosen</th>
                                            <th>Jumlah Mahasiswa</th>
                                            <th>Jumlah Tuntas</th>
                                            <th>Jumlah Belum Tuntas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php  $no=1;
                                       
                                       foreach ($monitoring as $mo) {
                                       
                                        ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$mo->nama_dosen?></td>
                                            <td><?=$mo->total?></td>
                                            <td><?=$mo->total_y?> Mahasiswa</td>
                                            <td><?=$mo->total_n?> Mahasiswa</td>
                                            <td>
                                               
                                                <a href="#" id="detailmonitoring" class="btn btn-success" 
                                                data-nama_dosen="<?=$mo->nama_dosen?>"
                                                data-id_dosen="<?=$mo->id_dosen?>"
                                                >Detail</a>
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
                                            <th>Standar Kompetensi</th>
                                            <th>Ketuntasan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataketuntasan">
                                        
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
    
    $('body').on('click', '#detailmonitoring',function () {
      
        var id_dosen = $(this).data("id_dosen");
        var nama_dosen = $(this).data("nama_dosen");
        $("#nmdosen").html(nama_dosen);
        $('#largeModal').modal('show');

        $.ajax({
            type: "POST",
            url: "<?=base_url('beranda-datamonitoring')?>",
            data: {
                id_dosen: id_dosen
                },

            success: function (data) {
                $('#dataketuntasan').html(data);
                
            }
        });


		})


      
});
</script>



