<?php
include('../controller/database.php');


$top5 = $mysqli->query("SELECT a.* , b.* , (sum(a.qty)* b.item_price) total from pos_order a 
LEFT JOIN pos_items b on b.item_code = a.item_code where a.status = 1 GROUP BY a.item_code ORDER BY total desc limit 5");

$sales = $mysqli->query("SELECT a.* , b.* from pos_order a 
							LEFT JOIN  pos_items b on b.item_code = a.item_code
							");

while($valsales = $sales->fetch_object()){ 
		$totalsales =  $valsales->qty * $valsales->item_price;
}



$orders = $mysqli->query("SELECT count(*)totalorders from pos_order where status =1");
while($valorders = $orders->fetch_object()){ 
		$totalorders =  $valorders->totalorders;
}


$customers = $mysqli->query("SELECT count(*)customers from pos_customer");
while($valcustomers = $customers->fetch_object()){ 
		$totalcustomers =  $valcustomers->customers;
}

$suppliers = $mysqli->query("SELECT count(*)suppliers from pos_supplier");
while($valsuppliers = $suppliers->fetch_object()){ 
		$totalsuppliers =  $valsuppliers->suppliers;
}

$salesman = $mysqli->query("SELECT count(*)salesman from pos_salesman");
while($valsalesman = $salesman->fetch_object()){ 
		$totalsalesman =  $valsalesman->salesman;
}

$item = $mysqli->query("SELECT count(*)item from pos_items");
while($valitem = $item->fetch_object()){ 
		$totalitem =  $valitem->item;
}