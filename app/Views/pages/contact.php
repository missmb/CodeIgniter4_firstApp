<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">

            <h1>Contact Us!</h1>
            <?php foreach ($address as $a) : ?>
                <ul>
                    <li><?= $a['type']; ?></li>
                    <li><?= $a['address']; ?></li>
                    <li><?= $a['country']; ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>