<?php echo view('partials/head') ?>
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="login-row">
                <div class="col-md-6 form">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h2><b>Store Master</b></h2><h5>Register</h5>
                            
                            <hr>
                            Register to manage store items
                            <form class="login" action="<?= base_url('auth/register') ?>" method="POST">
                                <!-- validation messages begins -->
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
                                <!-- validation messages end -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Enter First Name" name="firstname" value="<?= set_value('firstname')?>" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                         <!-- error message-->
                                        <div class="input-group mb-3" style="margin-top: -3%;">
                                                <?php if (isset($validation)) : ?>
                                                    <?php if($validation->hasError('firstname')):  ?>
                                                        <span class="text-danger"><?= $validation->getError('firstname') ?></span>
                                                    <?php endif ?>
                                                <?php endif ?>
                                            </div>
                                        <!-- ends here -->
                                        <div class="input-group mb-3">
                                            <select class="form-control" name="sex" id="sex" required>
                                                <option value="" selected>-- Select Gender --</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- error message-->
                                        <div class="input-group mb-3" style="margin-top: -3%;">
                                            <?php if (isset($validation)) : ?>
                                                <?php if($validation->hasError('sex')):  ?>
                                                    <span class="text-danger"><?= $validation->getError('sex') ?></span>
                                                <?php endif ?>
                                            <?php endif ?>
                                        </div>
                                        <!-- ends here -->

                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control" placeholder="Enter Email" name="email" value="<?= set_value('email') ?>" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- error message-->
                                        <div class="input-group mb-3" style="margin-top: -3%;">
                                            <?php if (isset($validation)) : ?>
                                                <?php if($validation->hasError('email')):  ?>
                                                    <span class="text-danger"><?= $validation->getError('email') ?></span>
                                                <?php endif ?>
                                            <?php endif ?>
                                        </div>
                                        <!-- ends here -->

                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Enter Position" name="position" value="<?= set_value('position') ?>" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-phone"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- error message-->
                                        <div class="input-group mb-3" style="margin-top: -3%;">
                                            <?php if (isset($validation)) : ?>
                                                <?php if($validation->hasError('position')):  ?>
                                                    <span class="text-danger"><?= $validation->getError('position') ?></span>
                                                <?php endif ?>
                                            <?php endif ?>
                                        </div>
                                        <!-- ends here -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname" value="<?= set_value('lastname') ?>" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- error message-->
                                        <div class="input-group mb-3" style="margin-top: -3%;">
                                            <?php if (isset($validation)) : ?>
                                                <?php if($validation->hasError('lastname')):  ?>
                                                    <span class="text-danger"><?= $validation->getError('lastname') ?></span>
                                                <?php endif ?>
                                            <?php endif ?>
                                        </div>
                                        <!-- ends here -->

                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" placeholder="Enter Phone Number" name="phone" value="<?= set_value('phone') ?>" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-phone"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- error message-->
                                        <div class="input-group mb-3" style="margin-top: -3%;">
                                            <?php if (isset($validation)) : ?>
                                                <?php if($validation->hasError('phone')):  ?>
                                                    <span class="text-danger"><?= $validation->getError('phone') ?></span>
                                                <?php endif ?>
                                            <?php endif ?>
                                        </div>
                                        <!-- ends here -->

                                        <div class="input-group mb-3">
                                            <input type="hidden" name="{csrf_token}" value="{csrf_hash}">
                                            <input type="password" class="form-control" placeholder="Enter Password" name="password" value="<?= set_value('password') ?>" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div> 

                                        <!-- error message-->
                                        <div class="input-group mb-3" style="margin-top: -3%;">
                                            <?php if (isset($validation)) : ?>
                                                <?php if($validation->hasError('password')):  ?>
                                                    <span class="text-danger"><?= $validation->getError('password') ?></span>
                                                <?php endif ?>
                                            <?php endif ?>
                                        </div>
                                        <!-- ends here -->

                                        <div class="input-group mb-3">
                                            <input type="hidden" name="{csrf_token}" value="{csrf_hash}">
                                            <input type="password" class="form-control" placeholder="Re-Enter Password" name="confirm_password" value="<?= set_value('confirm_password')?>" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div>  

                                        <!-- error message-->
                                        <div class="input-group mb-3" style="margin-top: -3%;">
                                            <?php if (isset($validation)) : ?>
                                                <?php if($validation->hasError('confirm_password')):  ?>
                                                    <span class="text-danger"><?= $validation->getError('confirm_password') ?></span>
                                                <?php endif ?>
                                            <?php endif ?>
                                        </div>
                                        <!-- ends here -->

                                    </div>

                                    <div class="input-group mb-3" style="margin: 0 2%;">
                                            <input type="hidden" name="{csrf_token}" value="{csrf_hash}">
                                            <input type="password" class="form-control" placeholder="Enter Master Code" name="master_code" value="<?= set_value('master_code')?>" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                    </div> 

                                    <!-- error message-->
                                    <div class="input-group mb-3" style="margin-top: -3%;">
                                        <?php if (isset($validation)) : ?>
                                            <?php if($validation->hasError('master_code')):  ?>
                                                <span class="text-danger"><?= $validation->getError('master_code') ?></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </div>
                                    <!-- ends here -->
                                
                                </div>
                                <button class="mt-1 btn btn-primary btn-lg btn-block">Register</button>
                            </form>
                            
                        </div>
                        
                        <ul class="nav">
                            <li class="nav-item align-items-center" id="login" style="margin-left: 2%;">
                                <a href="<?= base_url() ?>">Already have an Account? Login</a>
                            </li>
                        </ul>
                        <ul class="nav footer">
                                <li class="nav-item">
                                Store Master &copy;2020  Powered by  <a href="https://www.endeavourafrica.com/" target="_blanka">Endeavour Africa group </a>      
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        body{
            background-color: grey;
        }
        .col{
            display: flex;
            justify-content: space-between;
        }
        .login{
            margin-top: 2%;
        }
        .card{
            /* background-color: red; */
            text-align: center;
            margin: 9% 0 15% 50%;
            width: 100%;
        }
        /* #login{
            margin: auto;
            width: 50%;
            padding-bottom: 2%;
        } */
        .footer{
            margin: 0 0 2% 1%;
        }
        
    </style>
    <script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>



