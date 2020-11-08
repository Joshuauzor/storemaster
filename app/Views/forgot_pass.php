<?php echo view('partials/head') ?>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="login-row">
                    <div class="col-md-6 form">
                        <div class="main-card mb-3 card">
                            <div class="card-body"><h2><b>Store Master</b></h2><h5>Forgot Password</h5>
                                <hr>
                                
                                <!-- validation messages beging -->
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
                                <form class="login" method="post" action="<?= base_url('auth/forgot_pass') ?>">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Enter Email" name="email" value="<?= set_value('email') ?>" required>
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
                                   
                                    <!-- <div class="input-group mb-3">
                                        <input type="hidden" name="{csrf_token}" value="{csrf_hash}">
                                        <input type="password" class="form-control" placeholder="Enter Password" name="password" value="<?= set_value('password') ?>" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div> -->

                                    <!-- error message-->
                                        <!-- <div class="input-group mb-3" style="margin-top: -3%;">
                                            <?php if (isset($validation)) : ?>
                                                <?php if($validation->hasError('password')):  ?>
                                                    <span class="text-danger"><?= $validation->getError('password') ?></span>
                                                <?php endif ?>
                                            <?php endif ?>
                                        </div> -->
                                    <!-- ends here -->

                                    <!-- <div class="col">
                                        <div class="checkbox">
                                            <input type="checkbox" name="remember" id=""> <b>Remember me?</b>
                                        </div>
                                        <div class="forgot">
                                            <a href="3"><b>Forgot password?</b></a>
                                        </div>
                                    </div> -->
                                    <ul class="nav">
                                        <li class="nav-item align-items-center" id="login" style="margin: 1% 0;">
                                            <a href="<?= base_url('auth') ?>">Back to Login</a>
                                        </li>
                                    </ul>
                                    <button class="mt-1 btn btn-primary btn-lg btn-block">Verify</button>
                                </form>
                            </div>

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
                text-align: center;
                margin: 20% 0 20% 65%;
                width: 70%;
            }
            .footer{
                margin: 0 0 2% 1%;
            }
            
        </style>

    <script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>



