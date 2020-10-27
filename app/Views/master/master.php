<?php echo view('partials/head') ?>
<?php echo view('partials/header') ?>
<?php echo view('partials/layout_settings') ?>
<?php echo view('partials/nav_bar') ?>
<?php echo view('partials/top_info') ?>


    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav" style="margin-top: -2%;">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#stock">
                <span>Stock</span>
            </a>
        </li>
        <li class="nav-item">
            <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#Category">
                <span>Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#Supplier">
                <span>Supplier</span>
            </a>
        </li>
        <li class="nav-item">
            <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#Unit">
                <span>Unit</span>
            </a>
        </li>  
        <li class="nav-item">
            <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#Order">
                <span>Shelve</span>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <!-- stock tab -->
        <div class="tab-pane tabs-animation fade show active" id="stock" role="tabpanel">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Stock</h5>
                            <button class="mb-2 mr-2 btn-transition btn btn-outline-focus" data-toggle="modal" data-target="#add-stock" aria-haspopup="true" aria-expanded="false">Add</button>
                            <table class="mb-0 table table-bordered" id="stocktable">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Stock</th>
                                    <th>Category</th>
                                    <th>Supplier</th>
                                    <th>Unit</th>
                                    <th>Shelve</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i=0;
                                    foreach($totalStock as $row): $i++;
                                    ?>
                                    
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $row->stock_name ?></td>
                                    <td><?= $row->category_name ?></td>
                                    <td><?= $row->supplier_name ?></td>
                                    <td><?= $row->unit_name ?></td>
                                    <td><?= $row->ord_name ?></td>
                                    <td><button class="btn-shadow dropdown-toggle btn btn-success" data-toggle="modal" data-target="#Edit-stock<?= $row->id ?>" aria-haspopup="true" aria-expanded="false">Edit</button></td>
                                    <td><a href="<?= base_url('master/deleteStock/'. $row->id ) ?>"><button class="mb-2 mr-2 btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                                
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>   
            </div>
        </div>


        <!-- Category tab -->
        <div class="tab-pane tabs-animation fade" id="Category" role="tabpanel">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Category</h5> 
                            <button class="mb-2 mr-2 btn-transition btn btn-outline-focus" data-toggle="modal" data-target="#add-category" aria-haspopup="true" aria-expanded="false">Add</button>
                            <table class="mb-0 table table-bordered" id="stocktable">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Category</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- foreach -->
                                <?php 
                                    $i=0;
                                    foreach($totalCategory as $row): $i++;
                                    ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $row['category_name'] ?></td>
                                    <td><button class="btn-shadow dropdown-toggle btn btn-success" data-toggle="modal" data-target="#Edit-category<?= $row['id']?>" aria-haspopup="true" aria-expanded="false">Edit</button></td>
                                    <td><a href="<?= base_url('master/deleteCategory/'.$row['id'] ) ?>"><button class="mb-2 mr-2 btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                                <!-- endforeach -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>   
            </div>
        </div>

        <!-- Unit -->
        <div class="tab-pane tabs-animation fade" id="Unit" role="tabpanel">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Unit</h5>
                            <button class="mb-2 mr-2 btn-transition btn btn-outline-focus" data-toggle="modal" data-target="#add-unit" aria-haspopup="true" aria-expanded="false">Add</button>
                            <table class="mb-0 table table-bordered" id="stocktable">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Unit</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- foreach -->
                                <?php 
                                    $i=0;
                                    foreach($totalUnit as $row): $i++;
                                    ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $row['unit_name'] ?></td>
                                    <td><button class="btn-shadow dropdown-toggle btn btn-success" data-toggle="modal" data-target="#edit-unit<?= $row['id']?>" aria-haspopup="true" aria-expanded="false">Edit</button></td>
                                    <td><a href="<?= base_url('master/deleteUnit/'.$row['id'] ) ?>"><button class="mb-2 mr-2 btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                                <!-- endforeach -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>   
            </div>
        </div>


        <!-- Supplier -->
        <div class="tab-pane tabs-animation fade" id="Supplier" role="tabpanel">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Supplier</h5>
                            <button class="mb-2 mr-2 btn-transition btn btn-outline-focus" data-toggle="modal" data-target="#add-supplier" aria-haspopup="true" aria-expanded="false">Add</button>
                            <table class="mb-0 table table-bordered" id="stocktable">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Supplier</th>
                                    <th>Address</th>
                                    <th>Description</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- foreach -->
                                <?php 
                                    $i=0;
                                    foreach($totalSupplier as $row): $i++;
                                    ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $row['supplier_name'] ?></td>
                                    <td><?= $row['address'] ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <td><button class="btn-shadow dropdown-toggle btn btn-success" data-toggle="modal" data-target="#edit-supplier<?= $row['id']?>" aria-haspopup="true" aria-expanded="false">Edit</button></td>
                                    <td><a href="<?= base_url('master/deleteSupplier/'.$row['id'] ) ?>"><button class="mb-2 mr-2 btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                                <!-- endforeach -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>   
            </div>
        </div>

        <!-- Order -->
        <div class="tab-pane tabs-animation fade" id="Order" role="tabpanel">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Shelve</h5>
                            <button class="mb-2 mr-2 btn-transition btn btn-outline-focus" data-toggle="modal" data-target="#add-order" aria-haspopup="true" aria-expanded="false">Add</button>
                            <table class="mb-0 table table-bordered" id="stocktable">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>SHELVE</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- foreach -->
                                <?php 
                                    $i=0;
                                    foreach($totalOrder as $row): $i++;
                                    ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $row['ord_name'] ?></td>
                                    <td><button class="btn-shadow dropdown-toggle btn btn-success" data-toggle="modal" data-target="#edit-order<?= $row['id']?>" aria-haspopup="true" aria-expanded="false">Edit</button></td>
                                    <td><a href="<?= base_url('master/deleteOrder/'.$row['id'] ) ?>"><button class="mb-2 mr-2 btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                                <!-- endforeach -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
                    

<?php echo view('partials/footer') ?>