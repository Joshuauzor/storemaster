<!-- validation message -->
<?php if (isset($validation)) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors() ?>
    </div>
<?php endif ?>
<!-- ends here -->

<!-- session message -->
<?php if (session()->get('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('success') ?>
    </div>
<?php endif ?>

<?php if (session()->get('error')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->get('error') ?>
    </div>
<?php endif ?>

<style>
    .errors li{
        list-style-type: none;
        width: 100%;
        text-align: center;
    }
    .errors ul{
        padding-bottom: 0;
        margin-bottom: 0;
    }
</style>
<!-- session message ends -->