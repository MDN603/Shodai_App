<?php
include 'database/database.php';
// Add products into the cart table
if (isset($_POST['pid'])) {
	$pid = $_POST['pid'];
	$pname = $_POST['pname'];
	$pprice = $_POST['pprice'];
	$pimage = $_POST['pimage'];
	$pqty = $_POST['pqty'];
	$total_price = $pprice * $pqty;

    $stmt = "SELECT p_id FROM cart WHERE p_id ='$pid' ";
	$res = $db->query($stmt);
	if($res->num_rows > 0){
		echo '
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
  Item already in your cart!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	}else{
		$sql = "INSERT into cart (p_id,p_name,p_price,p_image,qty,total) VALUES ('$pid','$pname','$pprice','$pimage','$pqty','$total_price')";
		$result = $db->query($sql);
		if($result){
			echo '
		<div class="alert alert-success alert-dismissible fade show" role="alert">
  Item Added!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
		}
	}
}

// Get no.of items available in the cart table
if (isset($_POST['cartItem']) && isset($_POST['cartItem']) == 'cart_item') {
	 $stmt = "SELECT * FROM cart ";
	$res = $db->query($stmt);
	$row = $res->num_rows;
	echo $row;
}

// Remove single items from cart
if (isset($_GET['remove'])) {
	$id = $_GET['remove'];

	$stmt = $db->prepare('DELETE FROM cart WHERE id=?');
	$stmt->bind_param('i', $id);
	$stmt->execute();

	$_SESSION['showAlert'] = 'block';
	$_SESSION['message'] = 'Item removed from the cart!';
	header('location:cart.php');
}

// Remove all items at once from cart
if (isset($_GET['clear'])) {
	$stmt = $db->prepare("DELETE FROM cart WHERE customer_id ='$sessionid'");
	$stmt->execute();
	$_SESSION['showAlert'] = 'block';
	$_SESSION['message'] = 'All Item removed from the cart!';
	header('location:cart.php');
}

// Set total price of the product in the cart table
if (isset($_POST['qty'])) {
	$qty = $_POST['qty'];
	$pid = $_POST['pid'];
	$pprice = $_POST['pprice'];

	$tprice = $qty * $pprice;

	$stmt = $db->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
	$stmt->bind_param('isi', $qty, $tprice, $pid);
	$stmt->execute();
}

// Checkout and save customer info in the orders table
if (isset($_POST['action']) && isset($_POST['action']) == 'order' && $_POST['products'] != '') {
	$mo_id = $_POST['mo_id'];
	$retailer_id = $_POST['retailer_id'];
	$products = $_POST['products'];
	$note = $_POST['note'];
	$grand_total = $_POST['grand_total'];
	$pmode = $_POST['pmode'];

	$data = '';

	$stmt = $db->prepare('INSERT INTO orders (mo_id,retailer_id,pmode,products,amount,note)VALUES(?,?,?,?,?,?)');
	$stmt->bind_param('ssssss', $mo_id, $retailer_id, $pmode, $products, $grand_total, $note);
	$stmt->execute();
	$stmt2 = $db->prepare("DELETE FROM cart WHERE customer_id ='$sessionid'");
	$stmt2->execute();
	$data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
								<h2 class="text-success">Your Order Placed Successfully!</h2>
								<h4 class="bg-danger rounded p-2">Items Purchased : ' . $products . '</h4>
								<h4>Total Amount Paid : ' . number_format($grand_total, 2) . '</h4>
								<h4>Payment Mode : ' . $pmode . '</h4>
								<hr>
								<button class="btn btn-success" id="continue_shopping">Continue Shopping</button>
								<button class="btn btn-success" id="track">Order Track</button>
						  </div>';
	echo $data;
}
