<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
            <div class="card ">
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <div class="card-header bg-success text-white">
                    <h5> Edit Kelas </h5>
                </div>
                <div class="card-body">
                    <form action="/kelas/edit" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" class="form-control" placeholder="" required value="<?= $kelas['id'] ?>">

                        <div class="form-group">
                            <label for="title">Nama Mentor</label>
                            <input type="text" name="nama_mentor" class="form-control" placeholder="" required value="<?= $kelas['nama_mentor'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="title">Keterangan</label>
                            <textarea name="keterangan" class="form-control" cols="30" rows="10" placeholder="keterangan kelas"><?= $kelas['keterangan'] ?></textarea required value="">
                        </div>
                        <div class="form-group">
                            <label for="title">Harga</label>
                            <input  type="number" name="harga" class="form-control" placeholder="Rp"required value="<?= $kelas['harga'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="title">Link</label>
                            <input type="text" name="link" class="form-control" placeholder="" required value="<?= $kelas['link'] ?>">
                        </div>

                        <div class="">
                            <label for="title">Materi</label>
                            <input type="text" name="materi" class="form-control" placeholder="" required value="<?= $kelas['materi'] ?>" readonly>
                            <input  type="file" name="materi" class="form-control" >
                        </div>
                        <div class="form-group mt-1">
                        <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="status"  >
                                <?php if ($kelas['status'] == 1) : ?>
                                <option selected value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                                <?php else : ?>
                                <option value="1">Aktif</option>
                                <option selected value="0">Tidak Aktif</option>
                                <?php endif; ?>
                                
                                </select>
                            
                        </div>

                        <div class="form-group">
                        </div>
                        <button type="submit" name="submit"  class="btn btn-success btn-block">Save</button>
                        <!-- <br> -->
                        <a href="<?= base_url() ?>" type="submit" name="" value="draft" class="btn btn-light btn-block ">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>