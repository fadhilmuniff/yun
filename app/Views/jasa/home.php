<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3 mb-5">
    <div class="row">
        <div class="col">
            <?php if (session()->getFlashData('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashData('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <h4>Nama : Yuni Afrianty Alfadilla
            </h4>
            <h4>NIM : 6701194073 </h4>
            <h4>Kelas : D3SI-43-03</h4>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <a class="btn btn-primary" href="<?= base_url('jasa/tambah') ?>">Tambah Jasa</a>
        </div>
    </div>
    <div class="row ">

        <div class="col">
            <div class="card shadow">

                <div class="card-header">
                    <h4> Master Data Jasa</h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table ">
                            <thead class="">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Jasa</th>
                                    <th scope="col">Jenis Jasa</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($result as $r) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>

                                        <td><?= $r['nama_jasa'] ?></td>
                                        <td><?= $r['jenis_jasa'] ?></td>
                                        <td><?= $r['alamat'] ?></td>
                                        <td><?= $r['deskripsi'] ?></td>
                                        <td>

                                            <a href="<?= base_url('jasa/edit/' . $r['id'])  ?>" class="btn btn-success ">Edit</a>
                                            <a href="<?= base_url('jasa/delete_jasa/' . $r['id'])  ?>" class="btn btn-danger mt-1" onclick="return confirm('Delete Jasa?');">Delete</a>
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