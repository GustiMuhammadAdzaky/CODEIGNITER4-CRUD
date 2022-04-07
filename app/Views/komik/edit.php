<!-- 10:34 Tutorial CodeIgniter 4 untuk PEMULA | 10. Validation -->

<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>




<div class="container">
    <h1></h1>
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Komik</h2>
            <form action="/komik/update/<?= $komik['id']; ?>" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="slug" value="<?= $komik["slug"]; ?>">
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= $validation->hasError('judul')? 'is-invalid' : '' ?>"
                            id="judul" name="judul" autofocus
                            Value="<?= (old('judul')) ? old('judul') : $komik['judul']; ?>">
                        <!-- Diatas Adalah Operator Ternary Yang Artinya adalah = Jika ada judul lama return Judul lama, jika tidak ada 
                            ambil dari data data dan Variable $komik -->
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penulis" name="penulis"
                            value="<?= $komik['penulis']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penerbit" name="penerbit"
                            value="<?= $komik['penerbit']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sampul" name="sampul"
                            value="<?= $komik['sampul']; ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </form>
        </div>
    </div>
</div>



<?= $this->endSection() ?>