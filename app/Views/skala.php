<div class="wrapper wrapper-content">
    <h1>Data Skala</h1>
    <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah Data</button>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Value</th>
                    <th>Keterangan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0; foreach ($skala as $s): $no++; ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $s['namakriteria']; ?></td>
                        <td><?= $s['value']; ?></td>
                        <td><?= $s['keterangan']; ?></td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $s['id']; ?>">Edit</button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?= $s['id']; ?>">Hapus</button>
                        </td>
                    </tr>

                    <div class="modal fade" id="editModal<?= $s['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="/skala/update/<?= $s['id']; ?>" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Data Skala</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="idkriteria" class="form-label">Kriteria</label>
                                            <select class="form-control" id="idkriteria" name="idkriteria" disabled>
                                                <?php foreach ($kriteria as $k): ?>
                                                    <option value="<?= $k['id']; ?>" <?= $s['idkriteria'] == $k['id'] ? 'selected' : ''; ?>>
                                                        <?= $k['namakriteria']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="value" class="form-label">Value</label>
                                            <input type="number" class="form-control" id="value" name="value" value="<?= $s['value']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $s['keterangan']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteModal<?= $s['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="/skala/delete/<?= $s['id']; ?>" method="get">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Data</h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
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
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/skala/create" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Skala</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="idkriteria" class="form-label">Kriteria</label>
                        <select class="form-control" id="idkriteria" name="idkriteria" required>
                            <option value="">Pilih Kriteria</option>
                            <?php foreach ($kriteria as $k): ?>
                                <option value="<?= $k['id']; ?>"><?= $k['namakriteria']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="value" class="form-label">Value</label>
                        <input type="number" class="form-control" id="value" name="value" placeholder="Masukkan value" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
