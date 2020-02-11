<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h3>Daftar Guru</h3>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="username">NIP/NIK</th>
                                        <th data-field="nama" data-editable="true">Nama Lengkap</th>
                                        <th data-field="alamat" data-editable="true">Alamat</th>
                                        <th data-field="email" data-editable="true">Email</th>
                                        <th data-field="phone" data-editable="true">Phone</th>
                                        <th data-field="jabatan" data-editable="true">Jabatan</th>
                                        <th data-field="mapel" data-editable="true">Mapel</th>
                                        <th data-field="active" data-editable="true">Status</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($guru as $guru) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $guru['nip_nik']?></td>
                                        <td><?= $guru['nama']?></td>
                                        <td><?= $guru['alamat']?></td>
                                        <td><?= $guru['email']?></td>
                                        <td><?= $guru['phone']?></td>
                                        <td><?= $guru['jabatan']?></td>
                                        <td>Mapel</td>
                                        <td><?php if ($guru['active'] == 1) {
                                            echo "Aktif";
                                        } else {
                                            echo "Tidak Aktif";
                                        }?></td>
                                        <td>
                                            <a href="<?= site_url("admin/editGuru/".$guru['nip_nik'])?>"><i class="fa fa-pencil-square-o" style="margin-right: 10px " aria-hidden="true"></i></a>
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