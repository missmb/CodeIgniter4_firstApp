<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Form Add Data Food</h2>
            <form action="/foods/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" autofocus value="<?= old('title'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('title'); ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="origin" class="col-sm-2 col-form-label">Original From</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('origin')) ? 'is-invalid' : ''; ?>" id="origin" name="origin" value="<?= old('origin'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('origin'); ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="detail" class="col-sm-2 col-form-label">Detail</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="detail" name="detail" value="<?= old('detail'); ?>">
                    </div>
                </div>





                <div class="form-group row">
                    <label for="cover" class="col-sm-2 col-form-label">Cover</label>
                    <div class="col-sm-2">
                        <img src="/img/default.jpg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('cover')) ? 'is-invalid' : ''; ?>" id="cover" name="cover" onchange="previewImage()">
                        <div class="invalid-feedback"><?= $validation->getError('cover'); ?></div>
                            <label class="custom-file-label" for="cover">Choose Cover</label>
                        </div>
                    </div>
                </div>



                
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Add Data Food</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>