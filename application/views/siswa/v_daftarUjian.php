        <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h3 style="display:inline-block;">Daftar Ujian</h3>
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
                                                <th data-field="jmlSoal">Jumlah Soal</th>
                                                <th data-field="mulai">Waktu Mulai</th>
                                                <th data-field="durasi">Durasi Waktu</th>
                                                <th data-field="action"></th>
                                            </tr>
                                        </thead>
                                        <?php foreach ($ujian as $ujian) : ?>
                                        <tbody>
                                            <tr>
                                                <td><?= $ujian['nama_ujian']?></td>
                                                <td><?= $ujian['nama_mapel']?></td>
                                                <td><?= $ujian['kelas'].' '.$ujian['tahun']?></td>
                                                <td><?= date("d-m-Y", strtotime($ujian['tgl_ujian']))?></td>
                                                <td><?= $ujian['jumlah_soal']?></td>
                                                <td><?= date("h:i A", strtotime($ujian['mulai_ujian']))?></td>
                                                <td><?= date_diff(new DateTime($ujian['mulai_ujian']), new DateTime($ujian['selesai_ujian']))->i.' menit'?></td>
                                                <td>
                                                    <?php if ($status > 0) {?>
                                                        <a href="<?= site_url('siswa/hasilUjian/'.$ujian['id_ud'])?>"><button class="btn btn-info">Review</button></a>
                                                    <?php } else {?>
                                                        <a href="<?= site_url('siswa/mulaiUjian/'.$ujian['id_ud'])?>"><button id="btnMulai" class="btn btn-success">Mulai</button></a>
                                                    <?php }?>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <input id="tglUjian" type="text" value="<?= $ujian['tgl_ujian']?>" style="display:none">
                                        <?php endforeach;?>
                                    </table>
                                    <script type="text/javascript">
                                        var today = new Date();
                                        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                                        var tglUjian = document.getElementById("tglUjian").value;
                                        if (date === tglUjian) {
                                            document.getElementById("btnMulai").disabled = false;
                                        } else {
                                            document.getElementById("btnMulai").disabled = false;
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
