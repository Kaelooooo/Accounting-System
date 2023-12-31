<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/inventory.php');?>
<style>
.ui-autocomplete {
	z-index: 2150000000;
}
</style>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Inventory Records</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
		  <li class="breadcrumb-item">Inventory</li>
          <li class="breadcrumb-item">Items</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><button class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#add-item"> <i class="bi bi-plus-square"></i> Add Item </button></h5>

              <!-- Table with stripped rows -->
              <table class="table" id="inventory-report">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Photo</th>
                    <th scope="col"  class="text-center">Item Code</th>
                    <th scope="col"  class="text-center">Item Name</th>
                    <th scope="col"  class="text-center">Price</th>
                    <th scope="col"  class="text-center">Qty</th>
                    <th scope="col"  class="text-center">Unit</th>
                    <th scope="col"  class="text-center">Critical Level</th>
                    <th scope="col"  class="text-center">Supplier</th>
                    <th scope="col"  class="text-center">Category</th>
                    <th scope="col"  class="text-center">Date Added</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $customer->fetch_object()){ ?>
				<?php if($val->item_critical_level == $val->item_qty){?>
                  <tr bgcolor="#FFCCCB">
				<?php } else { ?>
				  <tr>
				<?php } ?>
                    <td class="text-center"><img src="items/<?php echo $val->image;?>" width="200px"></td>
                    <td class="text-center"><?php echo $val->item_code;?></td>
                    <td class="text-center"><?php echo $val->item_name;?></td>
                    <td class="text-center"><?php echo $val->item_price;?></td>
                    <td class="text-center"><?php if($val->item_qty <= 0) { echo 0;} else { echo $val->item_qty; };?></td>
                    <td class="text-center"><?php echo $val->item_unit;?></td>
                    <td class="text-center"><?php echo $val->item_critical_level;?></td>
                    <td class="text-center"><?php echo $val->supplier;?></td>
                    <td class="text-center"><?php echo $val->category;?></td>
                    <td class="text-center"><?php echo $val->date_added;?></td>
                    <td class="text-center">
						<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-item<?php echo $val->item_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete-item<?php echo $val->item_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
				  
				  
					 <div class="modal fade" id="edit-item<?php echo $val->item_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Inventory</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						<form class="row g-3" method="post" enctype="multipart/form-data">
						   <div class="row">
							<div class="col-6">
								<div class="col-12">
								  <label for="inputNanme4" class="form-label">Item Code: </label>
								  <input type="text" class="form-control" name="item_code" value="<?php echo $val->item_code;?>" required>
								  <input type="hidden" class="form-control" name="id" value="<?php echo $val->item_id;?>" required>
								</div>
								<div class="col-12">
								  <label for="inputNanme4" class="form-label">Item Name: </label>
								  <input type="text" class="form-control" name="item_name" value="<?php echo $val->item_name;?>" required>
								</div>
								<div class="col-12">
								  <label for="inputNanme4" class="form-label">Item Price: </label>
								  <input type="text" class="form-control" name="item_price" value="<?php echo $val->item_price;?>" required>
								</div>
								<div class="col-12">
								  <label for="inputNanme4" class="form-label">Item Quantity: </label>
								  <input type="text" class="form-control" name="item_qty"  value="<?php echo $val->item_qty;?>" required>
								</div>
								<div class="col-12" id="item-category">
								  <label for="inputNanme4" class="form-label">Supplier: </label>
								  <select class="form-control" name="supplier" required>
									<option value=""> - Select Supplier - </option>
									<?php
										$category = $mysqli->query("SELECT * from pos_supplier");
											while($val2 = $category->fetch_object()){
												if($val->item_supplier_id == $val2->supplier_id){
												echo "<option value=". $val2->supplier_id  ." selected>" .  $val2->name . "</option>";
												} else {
												echo "<option value=". $val2->supplier_id  .">" .  $val2->name . "</option>";
												}
											}
									?>
								  </select>
								</div>
							</div>
							<div class="col-6">
								<div class="col-12">
								  <label for="inputNanme4" class="form-label">Item Unit: </label>
								  <input type="text" class="form-control" name="item_unit" value="<?php echo $val->item_unit;?>" required>
								</div>
								<div class="col-12">
								  <label for="inputNanme4" class="form-label">Item Critical Level: </label>
								  <input type="text" class="form-control" name="item_critical_level" value="<?php echo $val->item_critical_level;?>" required>
								</div>
								
								<div class="col-12">
								  <label for="inputNanme4" class="form-label">Item Status: </label>
								  <select class="form-control" name="item_status" required>
									<option value=""> - Select Status - </option>
									<option value="1"> Normal Add </option>
								  </select>
								</div>
								<div class="col-12">
								  <label for="inputNanme4" class="form-label">Item Category: </label>
								  <select class="form-control" name="item_category_id" required>
									<option value=""> - Select Category - </option>
									<?php
										$category = $mysqli->query("SELECT * from pos_item_category");
											while($val2 = $category->fetch_object()){
												if($val->item_category_id == $val2->category_id){
													echo "<option value=". $val2->category_id ." selected>" .  $val2->name . "</option>";
												} else {
													echo "<option value=". $val2->category_id .">" .  $val2->name . "</option>";
												}
											}
									?>
								  </select>
								</div>
								<div class="col-12">
							  <label for="inputNanme4" class="form-label">Date Delivered: </label>
								<input type="date" class="form-control" name="date_delivered" value="<?php echo $val->date_delivered;?>">

							</div>
							</div>
							<div class="col-12">
							<div class="col-12" id="item-supplier-1" >
							  <label for="inputNanme4" class="form-label">Item Image: </label>
							 	<input type="file" class="form-control" name="image"  >
							 	<input type="hidden" class="form-control" name="image1" value="<?php echo $val->image;?>"  >
							</div>
						</div>
							</div>
						
								<div class="modal-footer">
								  <button type="submit" class="btn btn-primary" name="update-item">Save </button>
								  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								</div>
								</form>
						</div>
						</div>
						</div>
					</div>
					
					 <div class="modal fade" id="delete-item<?php echo $val->item_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Item</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Item Data?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->item_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-item">Delete </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
					  </div>
					</div>
					</div>
                <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
	
	    <div class="modal fade" id="add-item" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Item Receiving Form</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post" enctype="multipart/form-data">
						<div class="col-6">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Item Code: </label>
							  <input type="text" class="form-control item_code" name="item_code" id="item_code" required>
							  <input type="hidden" class="form-control" name="add_status" id="add_status" >
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Item Name: </label>
							  <input type="text" class="form-control" name="item_name" id="item_name" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Item Price: </label>
							  <input type="text" class="form-control" name="item_price" id="item_price"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Item Quantity: </label>
							  <input type="text" class="form-control" name="item_qty"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							</div>
							<div class="col-12" id="item-category">
							  <label for="inputNanme4" class="form-label">Supplier: </label>
							  <select class="form-control" name="supplier" required>
								<option value=""> - Select Supplier - </option>
								<?php
									$category = $mysqli->query("SELECT * from pos_supplier");
										while($val2 = $category->fetch_object()){
											echo "<option value=". $val2->supplier_id  .">" .  $val2->name . "</option>";
										}
								?>
							  </select>
							</div>
						</div>
						<div class="col-6">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Item Unit: </label>
							  <input type="text" class="form-control" name="item_unit" id="item_unit" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Item Critical Level: </label>
							  <input type="text" class="form-control" name="item_critical_level" id="item_critical_level"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Item Status: </label>
							  <select class="form-control" name="item_status" required>
								<option value=""> - Select Status - </option>
								<option value="1"> Normal Add </option>
							  </select>
							</div>
							<div class="col-12" id="item-supplier-1" style="display:none;">
							  <label for="inputNanme4" class="form-label">Item Supplier: </label>
							 	<input type="text" class="form-control" name="item_supplier_id_1" id="item_supplier_id_1" >
							</div>
							<div class="col-12" id="item-category">
							  <label for="inputNanme4" class="form-label">Item Category: </label>
							  <select class="form-control" name="item_category_id" id="item_category_id" required>
								<option value=""> - Select Category - </option>
								<?php
									$category = $mysqli->query("SELECT * from pos_item_category");
										while($val2 = $category->fetch_object()){
											echo "<option value=". $val2->category_id .">" .  $val2->name . "</option>";
										}
								?>
							  </select>
							</div>
							
							<div class="col-12" id="item-category-1" style="display:none;">
							  <label for="inputNanme4" class="form-label">Item Category: </label>
							 	<input type="text" class="form-control" name="item_category_id_1" id="item_category_id_1" >
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Date Delivered: </label>
								<input type="date" class="form-control" name="date_delivered" >

							</div>
						</div>
						<div class="col-12">
							<div class="col-12" id="item-supplier-1" >
							  <label for="inputNanme4" class="form-label">Item Image: </label>
							 	<input type="file" class="form-control" name="image" required>
							</div>
						</div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-item">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>
		
		
  </main><!-- End #main -->

<?php include('footer.php');?>