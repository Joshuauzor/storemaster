<?php echo view('partials/head') ?>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="login-row">
                    <div class="col-md-6 form">
                        <div class="main-card mb-3 card">
                            <div class="card-body"><h2><b>Store Master</b></h2><h5>Activate</h5>
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
                            </div>

                            <ul class="nav footer">
                                
                                    <li class="nav-item">
                                    Store Master &copy;<script> document.write(new Date().getFullYear()) </script>   Powered by  <a href="https://www.endeavourafrica.com/" target="_blank">Endeavour Africa group </a>      
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



