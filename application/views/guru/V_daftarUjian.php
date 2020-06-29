<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h3 style="display:inline-block;">Daftar Ujian</h3>
                            <a  style="display:inline-blockl; float:right;" class="btn btn-primary waves-effect waves-light" href="<?= site_url("guru/addUjian")?>">Tambah Ujian</a>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="nama">Nama Ujian</th>
                                        <th data-field="mapel">Mata Pelajaran</th>
                                        <th data-field="kelas">Kelas</th>
                                        <th data-field="tglUjian">Tanggal Ujian</th>
                                        <th data-field="nilai">Daftar Nilai</th>
                                        <th data-field="hasil">Hasil Analisis</th>
                                        <th data-field="active"></th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($ujian as $ujian) : ?>
                                    <tr>
                                        <td><?= $ujian['nama_ujian']?></td>
                                        <td><?= $ujian['nama_mapel']?></td>
                                        <td><?= $ujian['kelas'].' '.$ujian['tahun']?></td>
                                        <td><?= date("d-m-Y", strtotime($ujian['tgl_ujian']))?></td>
                                        <td><a href="<?= site_url("guru/daftarNilai/" . $ujian['id_ud'])?>">Lihat Nilai</a></td>
                                        <td><a href="#">Lihat Hasil Analisis</a></td>
                                        <td>
                                            <?php if ($ujian['active'] == 0) {?>
                                                <a href="<?= site_url("guru/cekActivate/" . $ujian['id_ud'])?>"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            <?php } else {?>
                                                <a href="<?= site_url("guru/cekActivate/" . $ujian['id_ud'])?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <?php }?>
                                        </td>
                                        <td>
                                            <button title="Edit" class="btn-default"><a href="<?= site_url("guru/editUjian/".$ujian['id_ud'])?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                                            <button title="Trash" class="btn-default delete-it" data-id="<?= $ujian['id_ud']?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
                                                                    window.location = 'hapusUjian/' + id;
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