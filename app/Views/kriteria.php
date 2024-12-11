<div class="wrapper wrapper-content">
    <h1>Data Kriteria</h1>
    <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah Data</button>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kriteria</th>
                    <th>Kriteria</th>
                    <th>Tipe</th>
                    <th>Bobot</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0; foreach ($kriteria as $data): $no++; ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $data['kodekriteria']; ?></td>
                        <td><?= $data['namakriteria']; ?></td>
                        <td><?= $data['jenis']; ?></td>
                        <td><?= $data['bobot']; ?></td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $data['id']; ?>">Edit</button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?= $data['id']; ?>">Hapus</button>
                        </td>
                    </tr>

                    <div class="modal inmodal" id="editModal<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="/kriteria/update/<?= $data['id']; ?>" method="post">
                                <div class="modal-header">
                                        <h5 class="modal-title">Edit Data Kriteria</h5>
                                </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="kodekriteria" class="form-label">Kode Kriteria</label>
                                            <input type="text" class="form-control" id="kodekriteria" name="kodekriteria" value="<?= $data['kodekriteria']; ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="namakriteria" class="form-label">Kriteria</label>
                                            <input type="text" class="form-control" id="namakriteria" name="namakriteria" value="<?= $data['namakriteria']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jenis" class="form-label">Tipe</label>
                                            <select class="form-control" id="jenis" name="jenis" required>
                                                <option value="Benefit" <?= $data['jenis'] === 'Benefit' ? 'selected' : ''; ?>>Benefit</option>
                                                <option value="Cost" <?= $data['jenis'] === 'Cost' ? 'selected' : ''; ?>>Cost</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="bobot" class="form-label">Bobot</label>
                                            <input type="number" step="0.01" class="form-control" id="bobot" name="bobot" value="<?= $data['bobot']; ?>" required>
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

                    <div class="modal inmodal" id="deleteModal<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="/kriteria/delete/<?= $data['id']; ?>" method="get">
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

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/kriteria/create" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Kriteria</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kodekriteria" class="form-label">Kode Kriteria</label>
                        <input type="text" class="form-control" id="kodekriteria" name="kodekriteria" placeholder="Masukkan kode kriteria" required>
                    </div>
                    <div class="mb-3">
                        <label for="namakriteria" class="form-label">Kriteria</label>
                        <input type="text" class="form-control" id="namakriteria" name="namakriteria" placeholder="Masukkan nama kriteria" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Tipe</label>
                        <select class="form-control" id="jenis" name="jenis" required>
                            <option value="Benefit">Benefit</option>
                            <option value="Cost">Cost</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bobot" class="form-label">Bobot</label>
                        <input type="number" step="0.01" class="form-control" id="bobot" name="bobot" placeholder="Masukkan bobot" required>
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

</div>