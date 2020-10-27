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
                    <div class="card-body"><h5 class="card-title">Store</h5>
                        <table class="mb-0 table table-bordered" id="stocktable">
                           

                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Stock</th>
                                <th>Quantity</th>
                                <th>Unit</th>
                                <th>Category</th>
                                <th>DETAILS</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i=0;
                                foreach($storeresults as $row): $i++;
                                ?>
                                
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $row['stock'] ?></td>
                                <td><?= $row['quantity']  ?></td>
                                <td><?= $row['unit_name']  ?></td>
                                <td><?= $row['category_name']  ?></td>
                                <td><button class="btn-shadow dropdown-toggle btn btn-success" data-toggle="modal" data-target="#editstock" aria-haspopup="true" aria-expanded="false">Edit</button></td>
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

<!-- <?php 
$i=0;
foreach($test as $row): $i++;
?>
<td><?= $row->stock_id ?></td>
<?php endforeach ?> -->

<?php echo view('partials/footer') ?>