<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Daftar Guru</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="username">NIP/NIK</th>
                                        <th data-field="nama" data-editable="true">Nama Lengkap</th>
                                        <th data-field="email" data-editable="true">Email</th>
                                        <th data-field="phone" data-editable="true">Phone</th>
                                        <th data-field="active" data-editable="true">Status</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($guru as $guru) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $guru['username']?></td>
                                        <td><?= $guru['nama']?></td>
                                        <td><?= $guru['email']?></td>
                                        <td><?= $guru['phone']?></td>
                                        <td><?php if ($guru['aktif'] == 1) {
                                            echo "Aktif";
                                        } else {
                                            echo "Tidak Aktif";
                                        }?></td>
                                        <td></td>
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