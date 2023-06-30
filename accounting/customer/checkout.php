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
          <h1>CHECKOUT</h1>
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
	                            </tr>
	                        </thead>
	                        <tbody>
							
							<?php
								while($val = $orders1->fetch_object()){	
								$total += $val->item_price * $val->qty;
							?>
							<form method="post">
	                            <tr>
	                                <td><?php echo $val->item_name;?></td>   
									<td>₱ <?php echo number_format($val->item_price,2);?></td>
	                                <td>
	                                  	<?php echo $val->qty;?>
	                                </td>
									
	                                <td>₱ <?php echo number_format($val->item_price * $val->qty,2);?> </td>
	                               
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
					 <?php 
					 while($val1 = $checkout->fetch_object()){	?>
			            <h3>Payment Method : </h3>
						 <p> <?php 
							 if($val1->delivery_option ==1){ echo "Cash On Delivery"; } 
							 else if($val1->delivery_option ==2){ echo "GCASH"; } 
							 else if($val1->delivery_option ==3){ echo "Walk In"; } 
							 ?> 
						</p>
						
						<p> Please Pay exact amount of ₱ 
						
						<?php
						
						echo " <b>" .  number_format($total,2) . "</b>";
						
						?>
						</p>
						<?php if($val1->delivery_option ==2){?>
							<p> GCASH Number  : <b> +639 515 433 754 </b></p>
						<?php } ?>
						
					
						<input type="hidden" name="total" value="<?php echo $total;?>">
						 
			                <div class="btn-cart-totals">
			                    <button type="submit" class=" round-black-btn" name="confirm-order">Confirm Order</button>
			                </div>
			                <!-- /.btn-cart-totals -->
			        
					<?php } ?>
					</form>
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
