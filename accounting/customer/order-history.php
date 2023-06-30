<?php include('header.php');?>
<?php include('controller/order-history.php');?>
<body>
<?php include('nav.php');?>
  <main id="main">
    <div style="height:60px;"></div>
    <!-- ======= About Section ======= -->
    <section id="about"  class="section-bg">
      <div class="container" >

		<div class="row">
		<div class="col-lg-3 position-relative about-img">
                <div class="list-group">
				  <a href="orders.php" class="list-group-item list-group-item-action "><i class="bi bi-list"></i> Orders</li></a>
				  <a href="order-history.php" class="list-group-item list-group-item-action active"><i class="bi bi-journal-check"></i> Order History</li></a>
				</div> 
        </div>
		<div class="col-lg-9 ">
		<div class="container">

        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h4>Order History</h4>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-hover" id="table_id">
                        <thead>
                            <tr>
                                <th data-priority="1">Transaction Code</th>
                                <th>Total Price</th>
                                <th>Mode of Payment</th>
                                <th>Date Ordered</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
						<?php while($val1 = $checkout1->fetch_object()){	?>
                            <tr>
                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#view-details<?php echo $val1->trans_code;?>"><?php echo $val1->transcode;?></a></td>
                                <td>₱ <?php 
								if($val1->delivery_option == 'Deliver'){ 
									$deliverfee = 30;
									} else {
									$deliverfee = 0;
									}
									echo number_format($val1->price + $deliverfee,2);?>
								</td>
								 <td><?php 
								 if($val1->delivery_option==1){ echo 'Cash On Delivery'; } 	
								 if($val1->delivery_option==2){ echo 'GCASH'; } 
								 if($val1->delivery_option==3){ echo 'Walk-In'; } 
								?></td>
								<td><?php echo $val1->date_added;?></td>
                                <td><?php 
								if($val1->order_status==0){ echo 'Pending'; } 	
								else if($val1->order_status==1){ echo 'Approved'; } 
								?></td>
                            </tr>
						<div class="modal fade" id="view-details<?php echo $val1->trans_code;?>" tabindex="-1">
						<div class="modal-dialog modal-dialog-centered">
						  <div class="modal-content">
							<div class="modal-header">
							  <h5 class="modal-title"> Order Details </h5>
							  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
							<?php
							echo $transcode  = $val1->trans_code;
							$orders1    = $mysqli->query("SELECT a.* ,b.* from pos_order a left join pos_items b on a.item_code = b.item_code where a.trans_code='$transcode' ");
							while($val2 = $orders1->fetch_object()){	
							?>
							 <div class="alert alert-info">
								Item Name : <?php echo $val2->item_name;?><br>
								Price : <?php echo number_format($val2->item_price,2);?><br>
								Qty : <?php echo $val2->qty;?><br>
								Total : <?php echo number_format($val2->item_price * $val2->qty,2);?>
							</div>
							<?php } ?>
							</div>
							<div class="modal-footer">
							  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						  </div>
						</div>
					</div>
				
						<?php } ?>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>

    </div>

		  </div>
		  </div>
    </section><!-- End About Section -->

   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
  </main><!-- End #main -->
<?php include('footer.php');?>
