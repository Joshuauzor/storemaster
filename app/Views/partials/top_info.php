
                  <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>Store Master
                                        <div class="page-title-subheading">Manage Items in the store.
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <button type="button" data-toggle="tooltip" title="Online" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                                        <i class="fa fa-star"></i>
                                    </button>
                                    <!-- test -->
                                    <div class="d-inline-block dropdown">
                                        <form action="<?= base_url('home/export') ?>" method="post">
                                            <button  class="btn-shadow dropdown-toggle btn btn-info">
                                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                                    <i class="fa fa-business-time fa-w-20"></i>
                                                </span>
                                                Export
                                            </button>
                                        </form>
                                        <!-- <button type="button" data-toggle="modal" data-target="#editstock" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-business-time fa-w-20"></i>
                                            </span>
                                            Edit Stock
                                        </button> -->
                                    </div>
                                    <!-- test -->
                                    <div class="d-inline-block dropdown">
                                        <button type="button" data-toggle="modal" data-target="#addstore" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-business-time fa-w-20"></i>
                                            </span>
                                            Add Store
                                        </button>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <!-- validation messages beging -->
                        <?php echo view('partials/validationMessages') ?>
                        <!-- validation messages end -->