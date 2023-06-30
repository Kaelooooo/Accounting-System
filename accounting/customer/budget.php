<?php include('header.php');?>
<?php include('controller/order.php');?>
  <body>
  <?php include('nav.php');?>
  <br><br><br><br><br>
    <div class="wrapper">
      <div class="container">


        <div class="sub-container">

          <!-- Start of Budget -->
          <div class="total-amount-container">
            <h3>Budget</h3>
            <p class="hide error" id="budget-error">
            Invalid amount. It cannot be negative or empty.
            </p>
            <input type="text" id="total-amount" min="0" placeholder="Enter Amount" 
            oninput="this.value = this.value.replace(/[^0-9.]|([.](?=.*[.]))/g, '')"/>
            <button class="submit" id="total-amount-button">Set Amount</button>
          </div>
          <!-- End of Budget -->

          <!-- Start of Expences -->
          <div class="user-amount-container">
            <h3>Expenses</h3>
            <p class="hide error" id="product-title-error">
            Invalid input. Please input valid values.
            </p>
            <input
              type="text"
              class="product-title"
              id="product-title"
              placeholder="Name of Expenses"
              
            />
            <input type="text" id="user-amount" min="0" placeholder="Enter Amount" oninput="this.value = this.value.replace(/[^0-9.,-]|([.,-](?=.*[.,-]))/g, '')"/>
            <button class="submit" id="check-amount">Check Expense</button>
          </div>
        </div>
         <!-- End of Expences -->

        <!-- Start of Output -->
       
        <div class="output-container flex-space">
          <div>
            <p>Total Budget</p>
            <span id="amount">0</span>
          </div>
          <div>
            <p>Expenses</p>
            <span id="expenditure-value">0</span>
          </div>
          <div>
            <p>Balance</p>
            <span id="balance-amount">0</span>
          </div>
        </div>
      </div>
      
      <!-- End of Output -->

      <!-- Start of List -->
      <div class="list">
        <h3>Expense List</h3>
        <div class="list-container" id="list"></div>
        <button class="submit" id="download-button">PDF</button>
      </div>
      <a href="menu.php"><button class="submit" >Back</button></a>
    </div>
    <!--End of List -->
    
    <!-- Script -->
    
    <!--PDF JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <!--External JS-->
    <script src="assets/js/add-on.js"></script>
    <script src="assets/js/download.js"></script>

    <?php include('footer.php');?>

  </body>
</html>