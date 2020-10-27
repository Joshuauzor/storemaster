<?php echo view('partials/head') ?>
<?php echo view('partials/header') ?>
<?php echo view('partials/layout_settings') ?>
<?php echo view('partials/nav_bar') ?>
<?php echo view('partials/top_info') ?>

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Stock</h5>
                        <table class="mb-0 table table-bordered" id="stocktable">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Serial Number</th>
                                <th>QUANTITY</th>
                                <th>RACK NUMBER</th>
                                <th>REMARK</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i=0;
                                foreach($totalStock as $totalStock): $i++;
                                ?>
                                
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $totalStock['serial_number'] ?></td>
                                <td><?= $totalStock['quantity']  ?></td>
                                <td><?= $totalStock['rack_id']  ?></td>
                                <td><?= $totalStock['remark']  ?></td>
                                <td><button class="btn-shadow dropdown-toggle btn btn-success" data-toggle="modal" data-target="#editstock<?= $totalStock['id']?>" aria-haspopup="true" aria-expanded="false">Edit</button></td>
                                <td><a href="<?= base_url('home/deleteStock/'. $totalStock['id'] ) ?>"><button class="mb-2 mr-2 btn btn-danger">Delete</button></a>
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
</div>

<?php echo view('partials/footer') ?>