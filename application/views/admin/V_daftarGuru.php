<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h3 style="display:inline-block;">Daftar Guru</h3>
                            <a  style="display:inline-blockl; float:right;" class="btn btn-primary waves-effect waves-light" href="<?= site_url("admin/addGuru")?>">Tambah Data Guru</a>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="foto"></th>
                                        <th data-field="username">NIP/NIK</th>
                                        <th data-field="nama" data-editable="true">Nama Lengkap</th>
                                        <th data-field="alamat" data-editable="true">Alamat</th>
                                        <th data-field="email" data-editable="true">Email</th>
                                        <th data-field="phone" data-editable="true">Phone</th>
                                        <th data-field="active" data-editable="true">Status</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($guru as $guru) : ?>
                                    <tr>
                                        <td><img width = "50px" id="foto" class="img-circle" src="<?= ($guru['foto'] == null) ? "#" : base_url()."upload/guru/".$guru['foto'];?>"/></td>
                                        <td><?= $guru['nip_nik']?></td>
                                        <td><?= $guru['nama']?></td>
                                        <td><?= $guru['alamat']?></td>
                                        <td><?= $guru['email']?></td>
                                        <td><?= $guru['phone']?></td>
                                        <td><?php if ($guru['active'] == 1) {
                                            echo "Aktif";
                                        } else {
                                            echo "Tidak Aktif";
                                        }?></td>
                                        <td>
                                            <button title="Edit" class="btn-default"><a href="<?= site_url("admin/editGuru/".$guru['nip_nik'])?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                                            <button title="Trash" class="btn-default delete-it" data-id="<?= $guru['nip_nik']?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
                                                                    window.location = 'hapusGuru/' + id;
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