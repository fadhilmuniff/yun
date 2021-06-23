<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3 ">
    <div class="row ">
        <div class="col">
            <h2>Daftar Kelas</h3>
                <div class="card ">
                    <?php if (session()->getFlashData('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashData('success') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <a class="btn btn-success" href="<?= base_url('kelas/tambahKelas') ?>" c>Tambah Kelas</a>
                        <div class="table-responsive">
                            <table class="table mt-2">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Mentor</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Materi</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($kelas as $k) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>

                                            <td><?= $k['nama_mentor'] ?></td>
                                            <td><?= $k['keterangan'] ?></td>
                                            <td>Rp <?= number_format($k['harga']) ?></td>
                                            <td><?= $k['link'] ?></td>
                                            <td>
                                                <a href="<?= base_url('uploads/materi/' . $k['materi']); ?>"><?= $k['materi']; ?></a>
                                            </td>
                                            <td><?php if ($k['status'] == 1) : ?>
                                                    Aktif
                                                <?php else : ?>
                                                    Tidak Aktif
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('kelas/delete/' . $k['id'])  ?>" class="btn btn-danger" onclick="return confirm('yakin?');">Delete</a>
                                                <a href="<?= base_url('kelas/editKelas/' . $k['id'])  ?>" class="btn btn-success">Edit</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php $i; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>