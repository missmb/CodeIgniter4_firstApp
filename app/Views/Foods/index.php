<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/food/create" class="btn btn-primary">Add Food</a>
            <h1 class="mt-2 ">Food List</h1>
            <?php if (session()->getFlashdata('aaa')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('aaa'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($food as $f) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $f['cover']; ?>" alt="" class="cover"></td>
                            <td><?= $f['title']; ?></td>
                            <td>
                                <a href="/food/<?= $f['slug']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>