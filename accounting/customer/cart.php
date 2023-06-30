<?php include('header.php');?>
<?php include('controller/order.php');?>
<body>
<?php include('nav.php');?>
  <main id="main">
    <div style="height:60px;"></div>
    <!-- ======= About Section ======= -->
    <section id="about"  class="section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h1>MY CART</h1>
        </div>

   
	<div class="cart-wrap">
		<div class="container">
	        <div class="row">
			 <?php if(isset($_GET['updated'])){?>
				<div class="alert alert-info alert-dismissable">
					<strong>Order Updated!</strong> 
				</div>
		    <?php } else if(isset($_GET['deleted'])){?>
				<div class="alert alert-warning alert-dismissable">
					<strong>Order Deleted!</strong> 
				</div>
		    <?php } ?>
			    <div class="col-lg-8">
			        <div class="table table-cart">
	                    <table>
	                        <thead>
	                            <tr>
						
	                                <th>Name</th>
	                                <th>Price</th>
	                                <th>Quantity</th>
	                                <th>Total</th>
	                                <th style="text-align: center">Action</th>
									<th style = "text-align: center; ">Image</th>
	                            </tr>
	                        </thead>
	                        <tbody>
							
							<?php
								while($val = $orders->fetch_object()){	
								$total += $val->item_price * $val->qty;
							?>
							<form method="post">
	                            <tr>
	                                <td style="width:100px"><?php echo $val->item_name;?></td>   
									<td style="width:100px">₱<?php echo number_format($val->item_price,2);?></td>
	                                <td>
	                                  	<input type="number" name="cnt" class="form-control" min="1" value="<?php echo $val->qty;?>" style="width:85px" >	
	                                </td> 
									
	                                <td style="width:100px">₱<?php echo number_format($val->item_price * $val->qty,2);?> </td>
	                                <td style="width:100px"> 
	                                  	<input type="hidden" name="order_id" class="form-control" value="<?php echo $val->order_id;?>" >	
										<button type="submit" class="btn btn-sm btn-info" name="update-cart" style="width:100px"> Update </button> 
										<button  type="submit" class="btn btn-sm btn-warning" name="delete-cart" style="width:100px"> Remove </button> 
									</td>
									<td style = "text-align: center; "><img src="../customer/assets/img/<?php echo $val->image;?>" width="210px"></td>
	                              
	                            </tr>
							</form>
							<?php } ?>  
	                        </tbody>
	                    </table>
	                  
			        </div>
			        <!-- /.table-cart -->
			    </div>
			    <!-- /.col-lg-8 -->
			    <div class="col-lg-4">
			        <div class="cart-totals">
			           <form method="post">
						<p>
							PAYMENT METHOD : 
										<select  class="form-control" name="delivery_option" id="delivery_option" required>
											<option value=""> - Select - </option>
											<option value="1"> Cash On Delivery </option>
											<option value="2"> GCASH </option>
											<option value="3"> Walk In </option>
										</select>
						</p>
						
						<hr>
						 <h3>Cart Totals</h3>
			                <table>
			                    <tbody>
			                        <tr>
			                            <td>Subtotal</td>
			                            <td class="subtotal">₱ <?php echo number_format($total,2);?></td>
			                        </tr>
			                       
									<hr>
			                        <tr class="total-row">
			                            <td>Total</td>
			                            <td class="price-total">₱ <?php echo number_format($total,2);?></td>
			                        </tr>
			                    </tbody>
			                </table>
							<input type="hidden" value="<?php echo $total;?>" name="total">
			                <div class="btn-cart-totals">
			                    <button class="checkout round-black-btn" type="submit" name="checkout-order">Proceed to Checkout</a>
			                </div>
						</form>
			                <!-- /.btn-cart-totals -->
			            <!-- /form -->
			        </div>
			        <!-- /.cart-totals -->
			    </div>
			    <!-- /.col-lg-4 -->
			</div>
		</div>
	</div>
	

      </div>
    </section><!-- End About Section -->

    
  </main><!-- End #main -->
<?php include('footer.php');?>
