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

	$host = "ec2-3-233-43-103.compute-1.amazonaws.com";
	$database = "dsgvfqb4nqvl8";
	$user = "uztsaaqvbykjov";
	$port = "5432";
	$password = "7fd9b55f2fb49a7eb00b798b7747a4d4250f574dbc241f3f434f1bad6022eafb";
	
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