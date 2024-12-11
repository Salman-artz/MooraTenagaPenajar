<div class="wrapper content-wrapper">
    <br>
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Table Matriks Normalisasi</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content" style="display: none;">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <?php 
                                $allHeaders = [];
                                foreach ($matriks_normalisasi as $data) {
                                    foreach ($data as $key => $value) {
                                        if (strpos($key, 'C') === 0) {
                                            $allHeaders[$key] = $key;
                                        }
                                    }
                                }
                                foreach ($allHeaders as $header): ?>
                                    <th class="text-center"><?= strtoupper($header); ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 0; foreach ($matriks_normalisasi as $id => $data): $no++; ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <?php foreach ($allHeaders as $header): ?>
                                    <td class="text-center"><?= isset($data[$header]) ? $data[$header] : '-'; ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Table Optimalisasi</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content" style="display: none;">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <<?php 
                                $allHeaders = [];
                                foreach ($matriks_normalisasi as $data) {
                                    foreach ($data as $key => $value) {
                                        if (strpos($key, 'C') === 0) {
                                            $allHeaders[$key] = $key;
                                        }
                                    }
                                }
                                foreach ($allHeaders as $header): ?>
                                    <th class="text-center"><?= strtoupper($header); ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; foreach ($optimalisasi as $id => $data): $no++; ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <?php foreach ($allHeaders as $header): ?>
                                        <td class="text-center"><?= isset($data[$header]) ? $data[$header] : '-'; ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Table Nilai Yi</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content" style="display: none;">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th class="text-center">Max</th>
                                <th class="text-center">Min</th>
                                <th class="text-center">Yi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; foreach ($nilai_yi as $data): $no++; ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td class="text-center"><?= $data['max']; ?></td>
                                    <td class="text-center"><?= $data['min']; ?></td>
                                    <td class="text-center"><?= $data['yi']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Table Ranking</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content" style="display: none;">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-center">Id Pengajar</th>
                                <th>Nama</th>
                                <th class="text-center">Yi</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; foreach ($ranking as $data): $no++; ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td class="text-center">A<?= $data['id_pengajar']; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td class="text-center"><?= $data['yi']; ?></td>
                                    <td><?= $data['status']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
