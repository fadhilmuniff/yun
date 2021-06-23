<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 ">
            <div class="card ">
                <div class="card-header bg-success text-white">
                    <h5> Tambah Kelas </h5>
                </div>
                <div class="card-body">

                    <form action="/kelas/save" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Nama Mentor</label>
                            <input type="text" name="nama_mentor" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Keterangan</label>
                            <textarea name="keterangan" class="form-control" cols="30" rows="10" placeholder=""></textarea required>
                        </div>
                        <div class="form-group">
                            <label for="title">Harga</label>
                            <input  type="number" name="harga" class="form-control" placeholder="Rp"required>
                        </div>
                        <div class="form-group">
                            <label for="title">Link</label>
                            <input type="text" name="link" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Materi</label>
                            <input type="file" name="materi" class="form-control" placeholder="" required>
                        </div>
                        <button type="submit" name="status" value="published" class="btn btn-success btn-block">Tambah Kelas</button>
                        <!-- <br> -->
                        <a href="<?= base_url() ?>" type="submit" name="" value="draft" class="btn btn-light btn-block ">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>