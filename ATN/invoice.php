<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INVOICE</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">


	<link rel="stylesheet" href="jquery mobile 1.4.5/jquery.mobile-1.4.5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="jquery mobile 1.4.5/jquery-1.11.1.min.js"></script>
    <script src="jquery mobile 1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body> 
	
	<div data-role="page" id="atn_home">
		<div data-role="header">
			<h2>PRODUCT - ATN COMPANY</h2>
			<p>Please input a new product here</p>
		</div>

		<div data-role="main" class="ui-content">
			<form action="invoice_create.php" method="post">
                <h3>Customer information</h3>
				<p>
					<label for="customerID">Customer ID<sup>*</sup></label>
					<input type="text" name="customer_ID" id="customerID">
				</p>
				<p>
					<label for="customerName">Customer Name<sup>*</sup></label>
					<input type="text" name="customer_Name" id="customerName">
				</p>

                <h3>Invoice Information</h3>
				<p>
					<label for="invoiceID">Invoice ID</label>
					<input type="text" name="invoice_ID" id="invoiceID" />
				</p>
				<p>
					<label for="invoiceDate">Invoice Date</label>
					<input type="date" name="invoice_Date" id="invoiceDate" />
				</p>
				
                <div data-role="collapsible" data-collapsed="false">
                    <h4>This is a collapsible list items</h4>
                    <ul class="content-list" data-role="listview"></ul>
                </div>
                
                <button id="btnAddProduct" class="ui-btn ui-btn-inline">Add a product</button>
                
				<input type="submit" value="Submit">
				<input type="reset" value="Reset">
			</form>
		</div>

		<div data-role="footer" data-position="fixed">
			<h4>Navigation</h4>
					<div data-role="navbar">
						<ul>
							<li><a href="#atn_home" data-role="button" >Home</a></li>
							<li><a href="invoice.php" data-role="button" >Invoice</a></li>
						</ul>
					</div>  
		</div>
		
		<script>
			$(document).ready(function () {
				$("#btnAddProduct").click(function () {
					var newli = 
						"<li>Product ID: <input name='invoice_productID' type='text'> Quantity: <input name=type='text'></li>";
						$("ul.content-list").append(newli);
						$("ul.content-list").listview("refresh");
				})
			})
		</script>
	</div> 
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>