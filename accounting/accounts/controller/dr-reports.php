<?php
include('../controller/database.php');

if(isset($_POST['status'])){

$status   = $_POST['status'];
$datefrom = $_POST['datefrom'];
$dateend  = $_POST['dateend'];

$order = $mysqli->query("SELECT *,po.trans_code as transcode,sm.name as sm, SUM(po.qty*pi.item_price) as amount from pos_order AS po 
							LEFT JOIN pos_customer as pc on pc.customer_id  = po.customer_id
							LEFT JOIN pos_items as pi on pi.item_code  = po.item_code
							LEFT JOIN pos_payment as pp on pp.trans_code  = po.trans_code
							LEFT JOIN pos_salesman as sm on sm.sm_id  = pc.sm_id
							WHERE po.status ='$status' and  (DATE(po.created_at) between '$datefrom' and '$dateend')
							GROUP BY po.trans_code 
							ORDER BY po.order_id DESC");
							
} else {
	$order = $mysqli->query("SELECT *,po.trans_code as transcode,sm.name as sm, SUM(po.qty*pi.item_price) as amount from pos_order AS po 
							LEFT JOIN pos_customer as pc on pc.customer_id  = po.customer_id
							LEFT JOIN pos_items as pi on pi.item_code  = po.item_code
							LEFT JOIN pos_payment as pp on pp.trans_code  = po.trans_code
							LEFT JOIN pos_salesman as sm on sm.sm_id  = pc.sm_id
							GROUP BY po.trans_code 
							ORDER BY po.order_id DESC");
	
}
							
							
$inventory = $mysqli->query("SELECT a.* , b.name as category, c.name as supplier from pos_items a 
							LEFT JOIN pos_item_category b on b.category_id  = a.item_category_id
							LEFT JOIN pos_supplier c on c.supplier_id   = a.item_supplier_id");
							
							
							
							
if(isset($_POST['upload-receipt'])){
	
	$transcode = $_POST['transcode'];
	$letter    = $_POST['image1'];

	if ($letter == "") {
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		move_uploaded_file($_FILES["image"]["tmp_name"], "receipt/" . $_FILES["image"]["name"]);
		$location   =  $_FILES["image"]["name"];
	} else {
		if ($_FILES["image"]["name"] == "") {
			$location = $letter;
		} else {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"], "receipt/" . $_FILES["image"]["name"]);
			$location   =  $_FILES["image"]["name"];
		}
	}
	
	
	$mysqli->query("UPDATE pos_order  SET receipt     = '$location' 
										  WHERE trans_code       = '$transcode'");

		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Receipt is Successfully Uploaded",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "dr-reports.php";
							});
			</script>';
	
}