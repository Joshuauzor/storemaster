            <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <!-- <li class="app-sidebar__heading">Home</li> -->
                                <li>
                                    <a href="<?= base_url('home') ?>" class="mm-active">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Home
                                    </a>
                                </li>
                                <!-- <li class="app-sidebar__heading">UI Components</li> -->
                              
                                <li>
                                    <a href="tables-regular.html">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Stock
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="<?= base_url('store') ?>">
                                                <i class="metismenu-icon">
                                                </i>Total Store
                                            </a>
                                        </li>
                                        <li>
                                            <a href="components-accordions.html">
                                                <i class="metismenu-icon">
                                                </i>Stock Less than Minimal
                                            </a>
                                        </li>
                                        <li>
                                            <a href="components-notifications.html">
                                                <i class="metismenu-icon">
                                                </i>Out of Stock
                                            </a>
                                        </li>
                                        <!-- <li>
                                            <a href="<?= base_url('home/addStock') ?>">
                                                <i class="metismenu-icon">
                                                </i>Add Stock
                                            </a>
                                        </li> -->
                                         <!--<li>
                                            <a href="components-progress-bar.html">
                                                <i class="metismenu-icon">
                                                </i>Progress Bar
                                            </a>
                                        </li>
                                        <li>
                                            <a href="components-tooltips-popovers.html">
                                                <i class="metismenu-icon">
                                                </i>Tooltips &amp; Popovers
                                            </a>
                                        </li>
                                        <li>
                                            <a href="components-carousel.html">
                                                <i class="metismenu-icon">
                                                </i>Carousel
                                            </a>
                                        </li>
                                        <li>
                                            <a href="components-calendar.html">
                                                <i class="metismenu-icon">
                                                </i>Calendar
                                            </a>
                                        </li>
                                        <li>
                                            <a href="components-pagination.html">
                                                <i class="metismenu-icon">
                                                </i>Pagination
                                            </a>
                                        </li>
                                        <li>
                                            <a href="components-scrollable-elements.html">
                                                <i class="metismenu-icon">
                                                </i>Scrollable
                                            </a>
                                        </li>
                                        <li>
                                            <a href="components-maps.html">
                                                <i class="metismenu-icon">
                                                </i>Maps
                                            </a>
                                        </li> -->
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        Shelve
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <?php 
                                        $i=0;
                                        foreach($totalOrder as $row): $i++;
                                        ?>
                                        <li>
                                            <a href="elements-buttons-standard.html">
                                                <i class="metismenu-icon"></i>
                                                <?= $row['ord_name'] ?>
                                            </a>
                                        </li>
                                        <?php endforeach ?>

                                        <!-- <li>
                                            <a href="elements-dropdowns.html">
                                                <i class="metismenu-icon">
                                                </i>Rack 2
                                            </a>
                                        </li>
                                        <li>
                                            <a href="elements-icons.html">
                                                <i class="metismenu-icon">
                                                </i>Rack 3
                                            </a>
                                        </li>
                                        <li>
                                            <a href="elements-badges-labels.html">
                                                <i class="metismenu-icon">
                                                </i>Rack 4
                                            </a>
                                        </li>
                                        <li>
                                            <a href="elements-cards.html">
                                                <i class="metismenu-icon">
                                                </i>Rack 5
                                            </a>
                                        </li>
                                        <li>
                                            <a href="elements-list-group.html">
                                                <i class="metismenu-icon">
                                                </i>Rack 6
                                            </a>
                                        </li>
                                        <li>
                                            <a href="elements-navigation.html">
                                                <i class="metismenu-icon">
                                                </i>Rack 7
                                            </a>
                                        </li>
                                        <li>
                                            <a href="elements-utilities.html">
                                                <i class="metismenu-icon">
                                                </i>Rack 8
                                            </a>
                                        </li>
                                        <li>
                                            <a href="elements-utilities.html">
                                                <i class="metismenu-icon">
                                                </i>Rack 9
                                            </a>
                                        </li>
                                        <li>
                                            <a href="elements-utilities.html">
                                                <i class="metismenu-icon">
                                                </i>Rack 10
                                            </a>
                                        </li>
                                        <li>
                                            <a href="elements-utilities.html">
                                                <i class="metismenu-icon">
                                                </i>Rack 11
                                            </a>
                                        </li>
                                        <li>
                                            <a href="elements-utilities.html">
                                                <i class="metismenu-icon">
                                                </i>Rack 12
                                            </a>
                                        </li> -->
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?= base_url('master') ?>">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Master
                                        <i class="metismenu-state-icon caret-left"></i>
                                    </a>
                                </li>
                                <li >
                                    <a href="tables-regular.html">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Settings
                                    </a>
                                </li>
                                <!-- <li class="app-sidebar__heading">Widgets</li>
                                <li>
                                    <a href="dashboard-boxes.html">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Dashboard Boxes
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Forms</li>
                                <li>
                                    <a href="forms-controls.html">
                                        <i class="metismenu-icon pe-7s-mouse">
                                        </i>Forms Controls
                                    </a>
                                </li>
                                <li>
                                    <a href="forms-layouts.html">
                                        <i class="metismenu-icon pe-7s-eyedropper">
                                        </i>Forms Layouts
                                    </a>
                                </li>
                                <li>
                                    <a href="forms-validation.html">
                                        <i class="metismenu-icon pe-7s-pendrive">
                                        </i>Forms Validation
                                    </a>
                                </li> -->
                                <li>
                                    <a href="<?= base_url('auth/logout')?>">
                                        <i class="metismenu-icon pe-7s-edit">
                                        </i>Logout
                                    </a>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div> 