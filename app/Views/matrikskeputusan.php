<div class="wrapper">
    <h1>Matriks Keputusan</h1>
    <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah Data</button>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengajar</th>
                    <?php foreach ($kriteria as $k): ?>
                        <th><?= $k['namakriteria']; ?></th>
                    <?php endforeach; ?>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=0;foreach ($dataByPengajar as $idPengajar => $pengajarData): $no++ ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $pengajarData['nama']; ?></td>
                        <?php foreach ($kriteria as $k): ?>
                            <td><?= isset($pengajarData['data'][$k['id']]) ? $pengajarData['data'][$k['id']] : '-'; ?></td>
                        <?php endforeach; ?>
                        <td class="text-center">
                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal<?= $idPengajar; ?>">Edit</button>
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?= $idPengajar; ?>">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/matrikskeputusan/save" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Matriks Keputusan</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="idpengajar" class="form-label">Pengajar</label>
                        <select class="form-control" id="idpengajar" name="idpengajar" required>
                            <option value="">Pilih Pengajar</option>
                            <?php foreach ($pengajar as $p): ?>
                                <option value="<?= $p['id']; ?>"><?= $p['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php foreach ($kriteria as $k): ?>
                        <div class="mb-3">
                            <label for="kriteria_<?= $k['id']; ?>" class="form-label"><?= $k['namakriteria']; ?></label>
                            <select class="form-control" id="kriteria_<?= $k['id']; ?>" name="kriteria[<?= $k['id']; ?>]" required>
                                <option value="">Pilih Skala</option>
                                <?php foreach ($skalaOptions as $skala): ?>
                                    <?php if ($skala['idkriteria'] == $k['id']): ?>
                                        <?php $skalaGabungan = ($skala['value'] ?? '-') . ' (' . ($skala['keterangan'] ?? '-') . ')';?>
                                        <option value="<?= $skala['id']; ?>"><?= $skalaGabungan?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($dataByPengajar as $idPengajar => $pengajarData): ?>
    <div class="modal fade" id="editModal<?= $idPengajar; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/matrikskeputusan/save" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Matriks Keputusan <?= $pengajarData['nama']?></h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="idpengajar" value="<?= $idPengajar; ?>">
                        <?php foreach ($kriteria as $k): ?>
                            <div class="mb-3">
                                <label for="kriteria_<?= $k['id']; ?>" class="form-label"><?= $k['namakriteria']; ?></label> 
                                <select class="form-control" id="kriteria_<?= $k['id']; ?>" name="kriteria[<?= $k['id']; ?>]" required>
                                    <option value="">Pilih Skala</option>
                                    <?php foreach ($skalaOptions as $skala): ?>
                                        <?php if ($skala['idkriteria'] == $k['id']): ?>
                                            <?php $skalaGabungan = ($skala['value'] ?? '-') . ' (' . ($skala['keterangan'] ?? '-') . ')';?>
                                            <option value="<?= $skala['id']; ?>"
                                                <?php
                                                if (isset($pengajarData['data'][$k['id']]) && $pengajarData['data'][$k['id']] == $skalaGabungan) {
                                                    echo 'selected';}?>>
                                                <?= $skalaGabungan; ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<?php foreach ($dataByPengajar as $idPengajar => $pengajarData): ?>
    <div class="modal fade" id="deleteModal<?= $idPengajar; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/matrikskeputusan/delete/<?= $idPengajar; ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data Matriks Keputusan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus semua data untuk pengajar <strong><?= $pengajarData['nama']; ?></strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
