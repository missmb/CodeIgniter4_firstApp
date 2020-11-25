<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $food['cover']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $food['title']; ?></h5>
                            <p class="card-text"><b>From : </b><?= $food['origin']; ?></p>
                            <p class="card-text"><small class="text-muted"><?= $food['detail']; ?></small></p>
                            <a href="/food/edit/<?= $food['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/food/<?= $food['id']; ?>" method="POST" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE" id="">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete')">Delete</button>
                            </form>
                            <br><br>
                            <a href="/foods">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
