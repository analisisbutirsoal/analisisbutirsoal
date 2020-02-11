<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h3>Daftar Kelas</h3>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="kelas" data-editable="true">Kelas</th>
                                        <th data-field="tahun" data-editable="true">Tahun Ajaran</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($kelas as $kls) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $kls['kelas']?></td>
                                        <td><?= $kls['tahun']?></td>
                                        <td>
                                            <a href="<?= site_url("admin/editKelas/".$kls['kd_kelas'])?>"><i class="fa fa-pencil-square-o" style="margin-right: 10px " aria-hidden="true"></i></a>
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
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