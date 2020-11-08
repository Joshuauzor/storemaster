<?php echo view('partials/head') ?>
<?php echo view('partials/header') ?>
<?php echo view('partials/layout_settings') ?>
<?php echo view('partials/nav_bar') ?>
<?php echo view('partials/top_info') ?>


<div class="container text-center">
    <div class="row"> 
        <div class="col0-md-12">
            <div class="widget-content-left">
                <?php if($userdata->profile_pics != ''): ?>
                    <div class="btn-group">
                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                            <img width="70" class="rounded-circle" src="<?= $userdata->profile_pics ?>" alt="profile pics">
                        </a>   
                    </div>
                <?php else: ?>
                    <div class="btn-group">
                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                            <img width="70" class="rounded-circle" src="<?= base_url('assets/images/icon-avatar.png')?>" alt="profile pics">
                        </a>   
                    </div>
                <?php endif ?>
            </div>
            <div class="form-group">
                <form action="<?= base_url('home/uploadavatar') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-control">
                            <input type="file" name="avatar" id="">
                    </div>
                    <input type="submit" value="Upload" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
                    

<?php echo view('partials/footer') ?>

    