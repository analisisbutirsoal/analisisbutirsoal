        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list single-page-breadcome" style="margin: 20px 0px 0px 0px;">
                            <?php foreach ($desk as $desk): ?>
                            <table class="table-condensed">
                                    <tr>
                                        <td><b>Nama Ujian</b></td>
                                        <td> : </td>
                                        <td><?=$desk['nama_ujian']?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Kelas</b></td>
                                        <td> : </td>
                                        <td><?=$desk['kelas']." ".$desk['tahun']?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Mapel</b></td>
                                        <td> : </td>
                                        <td><?=$desk['nama_mapel']?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jumlah Soal</b></td>
                                        <td> : </td>
                                        <td><?=$desk['jumlah_soal']?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jumlah Siswa</b></td>
                                        <td> : </td>
                                        <td><?= $siswa?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tanggal Ujian</b></td>
                                        <td> : </td>
                                        <td><?php setlocale(LC_TIME, 'id'); echo strftime( "%A, %d %B %Y", strtotime($desk['tgl_ujian']))?></td>
                                    </tr>
                            </table>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="static-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                        <div class="sparkline8-list">
                        <?php if ($cek == 0 ) { ?>
                            <a href="<?= site_url("guru/buatAnalisis/" . $this->session->userdata('id_ud'))?>">Buat Analisis Soal</a>
                        <?php } else { ?>
                            <table class="table table-bordered">
                                <tr>
                                    <th class="text-center" colspan="7"><h4>Hasil Analisis</h4></th>
                                </tr>
                                <tr scope="col">
                                    <th class="text-center">Nomor Soal</th>
                                    <th class="text-center" colspan="2">Validitas</th>
                                    <th class="text-center" colspan="2">Tingkat Kesukaran</th>
                                    <th class="text-center" colspan="2">Daya Beda</th>
                                </tr>
                                <?php $i = 0; foreach ($hasil as $hasil) : ?>
                                <tr>
                                    <td class="text-center"><?= ++$i?></td>
                                    <td class="text-center"><?= $hasil['validitas']?></td>
                                    <td class="text-center"><?= $hasil['ket_validitas']?></td>
                                    <td class="text-center"><?= $hasil['tk_kesukaran']?></td>
                                    <td class="text-center"><?= $hasil['ket_tk_kesukaran']?></td>
                                    <td class="text-center"><?= $hasil['daya_beda']?></td>
                                    <td class="text-center"><?= $hasil['ket_daya_beda']?></td>
                                <?php endforeach;?>
                                </tr>
                                <tr>
                                    <th class="text-center" colspan="2">Reliabilitas</th>
                                    <td class="text-center" colspan="5"><?= $reliabilitas['reliabilitas']." (".$reliabilitas['ket_reliabilitas'].")"?></td>
                                </tr>
                            </table>
                        <?php }?>
                        </div>

                        <div class="breadcome-list single-page-breadcome" style="margin: 20px 0px 0px 0px;">
                            <h4>Kesimpulan</h4>
                            <table>
                                <tr>
                                    <td>Nomor soal yang ditolak</td>
                                    <td><?= $kesimpulan['tolak']?></td>
                                </tr>
                                <tr>
                                    <td>Nomor soal yang perlu direvisi</td>
                                    <td><?= $kesimpulan['revisi']?></td>
                                </tr>
                                <tr>
                                    <td>Nomor soal yang sukar bagi siswa</td>
                                    <td><?= $kesimpulan['sukar']?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>