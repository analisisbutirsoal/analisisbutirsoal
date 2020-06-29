<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h3 style="display:inline-block;">Daftar Kelas</h3>
                            <a  style="display:inline-block; float:right;" class="btn btn-primary waves-effect waves-light" href="<?= site_url("admin/addKelas")?>">Tambah Data Kelas</a>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="no" data-editable="true">No</th>
                                        <th data-field="kelas" data-editable="true">Kelas</th>
                                        <th data-field="tahun" data-editable="true">Tahun Ajaran</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 0;
                                    foreach ($kelas as $kls) : ?>
                                    <tr>
                                        <td><?= ++$i; ?></td>
                                        <td><?= $kls['kelas']?></td>
                                        <td><?= $kls['tahun']?></td>
                                        <td>
                                            <button title="Edit" class="btn-default"><a href="<?= site_url("admin/editKelas/".$kls['kd_kelas'])?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                                            <button title="Trash" data-id="<?= $kls['kd_kelas']?>" class="btn-default delete-it"><i class="fa fa-trash-o" aria-hidden="true"></i></button>                                            
                                            <?php endforeach; ?>
                                            <script type="text/javascript">
                                                $(".delete-it").click(function(){
                                                    var id = $(this).data('id');
                                                    bootbox.confirm({ 
                                                        size: "small",
                                                        locale: "id",
                                                        message: "Yakin menghapus data ini?",
                                                        callback: 
                                                            function(result){
                                                                if(result)
                                                                    window.location = 'hapusKelas/' + id;
                                                            }
                                                    });
                                                });
                                            </script>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Static Table End -->