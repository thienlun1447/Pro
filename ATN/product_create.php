<!DOCTYPE html>
<html>
<body>

<h1>Sale revenue by Category</h1>

<?php
echo "This is income by different product category";
?>
<!--result:Hello World! kieu text-->
<?php
	$id = $_REQUEST["id"];
	$name = $_REQUEST["name"];
	$cat = $_REQUEST["cat"];
	$date = $_REQUEST["date"];
	$price = $_REQUEST["price"];
	$desc = $_REQUEST["desc"];
	
	echo $id;
	echo $name;
	echo $cat;
	echo $date;
	echo $price;
	echo $desc;

	$host = "ec2-18-233-83-165.compute-1.amazonaws.com";
	$database = "db24t10uekpnvh";
	$user = "jbuuiblgavnapv";
	$port = "5432";
	$password = "466bceba4becfc6ff658d160e30545aa26cc46dce8fe63d75b63453dc36a5325";
	
	$host_param_str = "host=".$host;
	$dbname_param_str = " dbname=".$database;
	$port_param_str = " port=".$port;
	$user_param_str = " user=".$user;
	$pass_param_str = " password=".$password;
	$sslmode_param_str = " sslmode=require";

	$connection_string = $host_param_str.$dbname_param_str.$port_param_str.$user_param_str.$pass_param_str.$sslmode_param_str;

	echo "<p>".$connection_string."</p>";

	$connection = pg_connect($connection_string);

	if ($connection === false){
		die("ERROR: Could not connect to database");
	} else
	{
		echo "SUCCESS: Connection to Heroku Postgres has been established";

		$product_query = 'INSERT INTO public."Product"(id,product_name,category,descriptions,price) VALUES (\''.$id.'\',\''.$name.'\',\''.$cat.'\',\''.$desc.'\','.$price.')';

		echo '<p>'.$product_query.'</p>';

		if (pg_query($connection,$product_query)){
			echo '<p>SUCCESS: Record is added succesfully. A new product is created</p>';
		}
		else{
			echo '<p>ERROR: Could not execute query</p>';
		}

	}
	
?>

</body>
</html>