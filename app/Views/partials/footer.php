                <div class="app-wrapper-footer">
                            <div class="app-footer">
                                <div class="app-footer__inner">
                                    <div class="app-footer-left">
                                        <ul class="nav">
                                            <li class="nav-item">
                                                Store Master &copy;2020  Powered by  <a href="https://www.endeavourafrica.com/" target="_blank">Endeavour Africa group </a>      
                                            </li>
                                        </ul>
                                    </div>
                                
                                </div>
                            </div>
                        </div>    </div>
                    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
            </div>
        </div>
        <script type="text/javascript" src="<?=base_url('./assets/scripts/main.js')?>"></script>
        <script>
            // searches just a row
            // function search() {
            //     // Declare variables
            //     var input, filter, table, tr, td, i, txtValue;
            //     input = document.getElementById("search");
            //     filter = input.value.toUpperCase();
            //     table = document.getElementById("stocktable");
            //     tr = table.getElementsByTagName("tr");

            //     // Loop through all table rows, and hide those who don't match the search query
            //     for (i = 0; i < tr.length; i++) {
            //         td = tr[i].getElementsByTagName("td")[0];
            //         if (td) {
            //             txtValue = td.textContent || td.innerText;
            //             if (txtValue.toUpperCase().indexOf(filter) > -1) {
            //                 tr[i].style.display = "";
            //             } 
            //             else {
            //                 tr[i].style.display = "none";
            //             }
            //         }
            //     }
            // }
            // searches just a row

       

            let filter  = document.querySelector('#search')

            let tr = document.getElementsByTagName("tr")

            let all_tr_td_text = []

            function search(){

                // i ignored the first row because that those are the labels, so i started the loop from one
                all_tr_td_text = []

                for(i = 1;i<tr.length;i++){
                    let td = tr[i].getElementsByTagName("td")
                    let curr_tr_text = ''
                    
                    for(j = 0;j<td.length;j++){
                        
                    curr_tr_text+=td[j].innerHTML
                    }

                    all_tr_td_text.push(curr_tr_text)
                        
                }

                for(let i = 0;i<all_tr_td_text.length;i++){
                    if(all_tr_td_text[i].toLowerCase().indexOf(filter.value.toLowerCase()) == -1){
                        tr[i+1].style.display = 'none'
                    }
                    else{
                        tr[i+1].style.display = ''
                    }
                }
            }


            // EVERY TIME A USER TYPES, THIS FUNCTION WILL BE FIRED.... :)
            filter.onkeyup =()=> search();

            // manage the add 
            var stock_value; 
            $(document).ready(function(){
                $('#stock').on('change', function(){
                    stock_value = $(this).val();
                    // alert(stock_value)
                    if(stock_value == ''){
                        $('#barcode').prop('disabled', true);
                    }
                    else{
                        $('#barcode').prop('disabled', false);
                    }
                })
            })

        </script>
    </body>
</html>

<!-- Edit total Store modal-->

<?php 
// $i=0;
// foreach($totalStock as $totalStock): $i++; 
// ?>
    <div class="modal fade bd-example-modal-lg" id="editstock" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">STOCK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">EDIT STOCK</h5>
                                            <form class="" action="<?= base_url('home/editstock') ?>" method="POST">
                                                <div class="position-relative form-group">
                                                    <input name="id" id="exampleEmail" value=""  type="hidden" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail" class="">Serial Number</label>
                                                    <input name="serial_number" id="exampleEmail" value="" placeholder="Add Name/Model" type="text" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label for="examplePassword" class="">Quantity</label>
                                                    <input name="quantity" id="examplePassword" value="" placeholder="Input Available Quantity" value="" type="number" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label for="exampleSelect" class="">Rack</label>
                                                    <select name="rack_id" id="exampleSelect" class="form-control" required>
                                                        <option value="" selected disabled></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label for="exampleText" class="">Remark</label>
                                                    <textarea name="remark" id="exampleText" class="form-control" placeholder="This option is optional"></textarea>
                                                </div>
                                                <button class="mt-1 btn btn-secondary" type="reset">Reset</button>
                                                <button class="mt-1 btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php //endforeach ?>


<!-- Edit total store modal ends -->

<!-- Edit Stock -->
<?php 
    $i=0;
    foreach($totalStock as $row): $i++;
    ?>
    <div class="modal fade bd-example-modal-lg" id="Edit-stock<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">STOCK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">EDIT STOCK</h5>
                                            <form class="" action="<?= base_url('master/editstock') ?>" method="POST">
                                                <div class="position-relative form-group">
                                                    <input name="id" id="exampleEmail" value="<?= $row->id?>"  type="hidden" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail" class="">Stock Name</label>
                                                    <input name="name" id="exampleEmail" value="<?= $row->stock_name?>" placeholder="Input Stock Name" type="text" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label for="exampleSelect" class="">Category</label>
                                                    <select name="category" id="exampleSelect" class="form-control" required>
                                                        <option value="" selected disabled>Choose Category</option>
                                                        <?php 
                                                        $i=0;
                                                        foreach($totalCategory as $row): $i++;
                                                        ?>
                                                        <option value="<?= $row['id']?>"><?= $row['category_name']?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label for="exampleSelect" class="">Supplier</label>
                                                    <select name="supplier" id="exampleSelect" class="form-control" required>
                                                        <option value="" selected disabled>Choose Supplier</option>
                                                        <?php 
                                                        $i=0;
                                                        foreach($totalSupplier as $row): $i++;
                                                        ?>
                                                        <option value="<?= $row['id']?>"><?= $row['supplier_name']?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label for="exampleSelect" class="">Unit</label>
                                                    <select name="unit" id="exampleSelect" class="form-control" required>
                                                        <option value="" selected disabled>Choose Unit</option>
                                                        <?php 
                                                        $i=0;
                                                        foreach($totalUnit as $row): $i++;
                                                        ?>
                                                        <option value="<?= $row['id']?>"><?= $row['unit_name']?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label for="exampleSelect" class="">Order</label>
                                                    <select name="order" id="exampleSelect" class="form-control" required>
                                                        <option value="" selected disabled>Choose Order</option>
                                                        <?php 
                                                        $i=0;
                                                        foreach($totalOrder as $row): $i++;
                                                        ?>
                                                        <option value="<?= $row['id']?>"><?= $row['ord_name']?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <button class="mt-1 btn btn-secondary" type="reset">Reset</button>
                                                <button class="mt-1 btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach ?>
<!-- stock Ends -->

<!-- Edit Category -->
<?php 
    $i=0;
    foreach($totalCategory as $row): $i++;
    ?>
    <div class="modal fade bd-example-modal-lg" id="Edit-category<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">EDIT CATEGORY</h5>
                                            <form class="" action="<?= base_url('master/editcategory') ?>" method="POST">
                                                <div class="position-relative form-group">
                                                    <input name="id" id="exampleEmail" value="<?= $row['id']?>"  type="hidden" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail" class="">Category Name</label>
                                                    <input name="name" id="exampleEmail" value="<?= $row['category_name']?>" placeholder="Input Category Name" type="text" class="form-control" required>
                                                </div>
                                                <button class="mt-1 btn btn-secondary" type="reset">Reset</button>
                                                <button class="mt-1 btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- Category Ends -->

<!-- Edit Unit -->
<?php 
    $i=0;
    foreach($totalUnit as $row): $i++;
    ?>
    <div class="modal fade bd-example-modal-lg" id="edit-unit<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">EDIT UNIT</h5>
                                            <form class="" action="<?= base_url('master/editunit') ?>" method="POST">
                                                <div class="position-relative form-group">
                                                    <input name="id" id="exampleEmail" value="<?= $row['id']?>"  type="hidden" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail" class="">Unit Name</label>
                                                    <input name="name" id="exampleEmail" value="<?= $row['unit_name']?>" placeholder="Input Unit Name" type="text" class="form-control" required>
                                                </div>
                                                <button class="mt-1 btn btn-secondary" type="reset">Reset</button>
                                                <button class="mt-1 btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- Unit Ends -->

<!-- Supplier  -->
<?php 
    $i=0;
    foreach($totalSupplier as $row): $i++;
    ?>
    <div class="modal fade bd-example-modal-lg" id="edit-supplier<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">EDIT SUPPLIER</h5>
                                            <form class="" action="<?= base_url('master/editsupplier') ?>" method="POST">
                                                <div class="position-relative form-group">
                                                    <input name="id" id="exampleEmail" value="<?= $row['id']?>"  type="hidden" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail" class="">Supplier Name</label>
                                                    <input name="name" id="exampleEmail" value="<?= $row['supplier_name']?>" placeholder="Input Supplier's Name" type="text" class="form-control" required>
                                                </div>
                                                <button class="mt-1 btn btn-secondary" type="reset">Reset</button>
                                                <button class="mt-1 btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- Supplier Ends -->

<!-- Shelve  -->
<?php 
    $i=0;
    foreach($totalOrder as $row): $i++;
    ?>
    <div class="modal fade bd-example-modal-lg" id="edit-order<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Shelve</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">EDIT SHELVE</h5>
                                            <form class="" action="<?= base_url('master/editorder') ?>" method="POST">
                                                <div class="position-relative form-group">
                                                    <input name="id" id="exampleEmail" value="<?= $row['id']?>"  type="hidden" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail" class="">Shelve Name</label>
                                                    <input name="name" id="exampleEmail" value="<?= $row['ord_name']?>" placeholder="Input Order Name" type="text" class="form-control" required>
                                                </div>
                                                <button class="mt-1 btn btn-secondary" type="reset">Reset</button>
                                                <button class="mt-1 btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>


<!-- EDIT UNIT ENDS -->
<!-- 
    *
    *
    *
    *
 -->

<!-- Add Store modal-->

<div class="modal fade bd-example-modal-lg" id="addstore" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">STORE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tab-content">
                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">ADD STORE</h5>
                                        <form class="" action="<?= base_url('store') ?>" method="POST">
                                            <!-- <div class="position-relative form-group">
                                                <label for="exampleEmail" class="">Name</label>
                                                <input name="model" id="exampleEmail" placeholder="Add Name/Model" type="text" class="form-control" required>
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="examplePassword" class="">Quantity</label>
                                                <input name="quantity" id="examplePassword" placeholder="Input Available Quantity" type="number" class="form-control" required>
                                            </div> -->
                                            <div class="position-relative form-group">
                                                <label for="exampleSelect" class="">Stock</label>
                                                <select name="stock" id="stock" class="form-control" required>
                                                    <option value="" selected disabled>Choose Stock</option>
                                                    <?php foreach($allStock as $row): ?>
                                                    <option value="<?= $row['id'] ?>"><?= $row['stock_name'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="examplePassword" class="">Scan Bar Code</label>
                                                <input name="barcode" id="barcode" placeholder="Scan Bar Code" type="text" class="form-control" required disabled="">
                                            </div>
                                            <button class="mt-1 btn btn-secondary" type="reset">Reset</button>
                                            <button class="mt-1 btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Add Stock modal-->

<div class="modal fade bd-example-modal-lg" id="add-stock" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">STOCK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tab-content">
                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">ADD STOCK</h5>
                                        <form class="" action="<?= base_url('master/addstock') ?>" method="POST">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail" class="">Name</label>
                                                <input name="name" id="exampleEmail" placeholder="Add Stock Name" type="text" class="form-control" required>
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="exampleSelect" class="">Category</label>
                                                <select name="category" id="exampleSelect" class="form-control" required>
                                                    <option value="" selected disabled>Choose Category</option>
                                                    <?php 
                                                    $i=0;
                                                    foreach($totalCategory as $row): $i++;
                                                    ?>
                                                    <option value="<?= $row['id']?>"><?= $row['category_name']?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="exampleSelect" class="">Supplier</label>
                                                <select name="supplier" id="exampleSelect" class="form-control" required>
                                                    <option value="" selected disabled>Choose Supplier</option>
                                                    <?php 
                                                    $i=0;
                                                    foreach($totalSupplier as $row): $i++;
                                                    ?>
                                                    <option value="<?= $row['id']?>"><?= $row['supplier_name']?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="exampleSelect" class="">Unit</label>
                                                <select name="unit" id="exampleSelect" class="form-control" required>
                                                    <option value="" selected disabled>Choose Unit</option>
                                                    <?php 
                                                    $i=0;
                                                    foreach($totalUnit as $row): $i++;
                                                    ?>
                                                    <option value="<?= $row['id']?>"><?= $row['unit_name']?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="exampleSelect" class="">Order</label>
                                                <select name="order" id="exampleSelect" class="form-control" required>
                                                    <option value="" selected disabled>Choose Order</option>
                                                    <?php 
                                                    $i=0;
                                                    foreach($totalOrder as $row): $i++;
                                                    ?>
                                                    <option value="<?= $row['id']?>"><?= $row['ord_name']?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <button class="mt-1 btn btn-secondary" type="reset">Reset</button>
                                            <button class="mt-1 btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Category modal-->

<div class="modal fade bd-example-modal-lg" id="add-category" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">CATEGORY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tab-content">
                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">ADD CATEGORY</h5>
                                        <form class="" action="<?= base_url('master/addcategory') ?>" method="POST">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail" class="">Name</label>
                                                <input name="name" id="exampleEmail" placeholder="Input Category Name" type="text" class="form-control" required>
                                            </div>
                                            <button class="mt-1 btn btn-secondary" type="reset">Reset</button>
                                            <button class="mt-1 btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Unit modal-->

<div class="modal fade bd-example-modal-lg" id="add-unit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">UNIT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tab-content">
                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">ADD UNIT</h5>
                                        <form class="" action="<?= base_url('master/addunit') ?>" method="POST">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail" class="">Name</label>
                                                <input name="name" id="exampleEmail" placeholder="Input Unit" type="text" class="form-control" required>
                                            </div>
                                            <button class="mt-1 btn btn-secondary" type="reset">Reset</button>
                                            <button class="mt-1 btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Supplier modal-->

<div class="modal fade bd-example-modal-lg" id="add-supplier" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">SUPPLIER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tab-content">
                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">ADD SUPPLIER</h5>
                                        <form class="" action="<?= base_url('master/addsupplier') ?>" method="POST">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail" class="">Name</label>
                                                <input name="name" id="exampleEmail" placeholder="Input Supplier" type="text" class="form-control" required>
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="examplePassword" class="">Address</label>
                                                <input name="address" id="examplePassword" placeholder="Input Address" type="text" class="form-control">
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="exampleText" class="">Description</label>
                                                <textarea name="description" id="exampleText" class="form-control" placeholder="This option is optional"></textarea>
                                            </div>
                                            <button class="mt-1 btn btn-secondary" type="reset">Reset</button>
                                            <button class="mt-1 btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Shelve modal-->

<div class="modal fade bd-example-modal-lg" id="add-order" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Shelve</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tab-content">
                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">ADD SHELVE</h5>
                                        <form class="" action="<?= base_url('master/addorder') ?>" method="POST">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail" class="">Name</label>
                                                <input name="name" id="exampleEmail" placeholder="Input Shelve" type="text" class="form-control" required>
                                            </div>
                                            <button class="mt-1 btn btn-secondary" type="reset">Reset</button>
                                            <button class="mt-1 btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>