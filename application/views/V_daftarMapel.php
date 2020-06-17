<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h3>Daftar Mata Pelajaran</h3>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="no" data-editable="true">No</th>
                                        <th data-field="nama" data-editable="true">Nama Mapel</th>
                                        <th data-field="kelas" data-editable="true">Kelas</th>
                                        <th data-field="guru" data-editable="true">Nama Guru</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; foreach ($mapel as $mapel) : ?>
                                    <tr>
                                        <td><?= ++$i; ?></td>
                                        <td><?= $mapel['nama_mapel']?></td>
                                        <td><?= $mapel['kelas'].' '.$mapel['tahun']?></td>
                                        <td><?= $mapel['nama']?></td>
                                        <td>
                                            <button title="Edit" class="btn-default"><a href="<?= site_url("admin/editMapel/".$mapel['id_md'])?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                                            <button title="Trash" class="btn-default"><a href="<?= site_url("admin/hapusMapel/".$mapel['id_md'])?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
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