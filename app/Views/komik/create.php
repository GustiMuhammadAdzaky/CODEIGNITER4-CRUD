<!-- 10:34 Tutorial CodeIgniter 4 untuk PEMULA | 10. Validation -->

<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>




<div class="container">
    <h1></h1>
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah data komik</h2>
            <form action="/komik/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control  
                        <?= $validation->hasError('judul')
                            ? 'is-invalid'
                            : '' ?>" id="judul" name="judul" autofocus>
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penulis" name="penulis"
                            value="<?= old('penulis'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penerbit" name="penerbit"
                            value="<?= old('penerbit'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control <?= $validation->hasError('sampul')
                            ? 'is-invalid'
                            : '' ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                id="sampul" for="Sampul" name="sampul">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>



<?= $this->endSection() ?>