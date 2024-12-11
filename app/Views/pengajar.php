<div class="wrapper">
    <h1>Data Pengajar</h1>
    <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah Data</button>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0; foreach ($datapengajar as $data): $no++; ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $data['id']; ?>">Edit</button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?= $data['id']; ?>">Hapus</button>
                        </td>
                    </tr>

                    <div class="modal fade" id="editModal<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="/pengajar/update/<?= $data['id']; ?>" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Data Pengajar</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']; ?>" required>
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

                    <div class="modal fade" id="deleteModal<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="/pengajar/delete/<?= $data['id']; ?>" method="get">
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
            <form action="/pengajar/create" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Pengajar</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama pengajar" required>
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
