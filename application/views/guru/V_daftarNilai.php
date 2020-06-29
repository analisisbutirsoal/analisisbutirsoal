<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline8-list">
                    <h3 style="text-align:center;">Daftar Nilai</h3>
                    <div class="col-lg-6" style="margin-bottom:20px;">
                        <table style="width:80%; line-height:35px;">
                            <?php foreach($desk as $desk) : ?>
                            <tr>
                                <td><b>Nama Ujian</b></td>
                                <td> : </td>
                                <td><?= $desk['nama_ujian']?></td>
                            </tr>
                            <tr>
                                <td><b>Mata Pelajaran</b></td>
                                <td> : </td>
                                <td><?= $desk['nama_mapel']?></td>
                            </tr>
                            <tr>
                                <td><b>Kelas</b></td>
                                <td> : </td>
                                <td><?= $desk['kelas'].' '.$desk['tahun']?></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Ujian</b></td>
                                <td> : </td>
                                <td><?php setlocale(LC_TIME, 'id'); echo strftime( "%d %B %Y", strtotime($desk['tgl_ujian']))?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <div class="product-status-wrap">
                        <div class="asset-inner">
                            <table>
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="nama">Nama</th>
                                        <th data-field="waktu">Waktu</th>
                                        <th data-field="benar">Benar</th>
                                        <th data-field="salah">Salah</th>
                                        <th data-field="kosong">Kosong</th>
                                        <th data-field="nilai">Nilai</th>
                                        <th data-field="ket">Ket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; foreach ($nilai as $nilai) : ?>
                                    <tr>
                                        <td><?= ++$i?></td>
                                        <td><?= $nilai['nama']?></td>
                                        <td><?= $nilai['waktu']?></td>
                                        <td><?= $nilai['benar']?></td>
                                        <td><?= $nilai['salah']?></td>
                                        <td><?= $nilai['kosong']?></td>
                                        <td><?= $nilai['nilai']?></td>
                                        <td><?= ($nilai['nilai'] == null) ? "Belum Tuntas" : (($nilai['nilai'] < $nilai['nilaiKKM']) ? "Belum Tuntas" : "Tuntas" )?></td>
                                    </tr>
                                <?php endforeach;?>
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