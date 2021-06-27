<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-2">
    <div class="row mb-2">
        <div class="col">
            <a href="<?= base_url() ?>" type="submit" name="" value="draft" class="btn btn-danger  ">Back</a>

        </div>
    </div>
    <div class="row">
        <div class="col ">
            <div class="card ">
                <div class="card-header bg-success text-white">
                    <h5> Tambah Jasa </h5>
                </div>
                <div class="card-body">

                    <form action="/jasa/save" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Nama Jasa</label>
                            <input type="text" name="nama_jasa" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Jenis Jasa</label>
                            <input type="text" name="jenis_jasa" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" cols="30" rows="10" placeholder=""></textarea required>
                        </div>
                       
                        <button type="submit" name="status" value="published" class="btn btn-success ">Tambah</button>
                        <!-- <br> -->
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>