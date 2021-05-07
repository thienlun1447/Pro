<!DOCTYPE html>
<html>
<?php
    echo "This is the invoice submssion";
    ?>

    <?php
        $cusid = $_REQUEST["customer_id"];
        $cusname = $_REQUEST["customer_name"];

        $invoiceid = $_REQUEST["invoice_id"];
        $invoicedate = $_REQUEST["invoice_date"];
        
        $invoice_product_id = $_REQUEST["invoice_product_id"];
        $invoice_product_quantity = $_REQUEST["invoice_product_quantity"];

        echo "<p>".$cusid."</p>";
        echo "<p>".$cusname."</p>";
        echo "<p>".$invoiceid."</p>";
        echo "<p>".$invoicedate."</p>";
        echo "<p>".$invoice_product_id."</p>";
        echo "<p>".$invoice_product_quantity."</p>";

        $product_id = "";
        for ($i = 0; $i < count($invoice_product_id); $i++){
            $product_id .= $invoice_product_id[$i].",";
        }

        $product_quantity = "";
        for ($i = 0; $i < count($invoice_product_quantity); $i++){
            $product_quantity .= $invoice_product_quantity[$i].",";
        }

        $host="ec2-3-233-43-103.compute-1.amazonaws.com";
        $database="daoeb2h1i4gref";
        $user = "ljguzytsklzppr";
        $port = "5432";
        $password = "88ba687e8bbe5cbd0741417086045a25cc5bb0d1b3d35ab35cfea4c48680e1fa";

        $host_param_str = "host=".$host;
	    $dbname_param_str = " dbname=".$database;
	    $port_param_str = " port=".$port;
	    $user_param_str = " user=".$user;
	    $pass_param_str = " password=".$password;
	    $sslmode_param_str = " sslmode=require";

        $connection_string = $host_param_str.$dbname_param_str.$port_param_str.$user_param_str.$pass_param_str.$sslmode_param_str;

        
        
        $connection = pg_connect($connection_string);
        
        if ($connection === false){
            die("ERROR: Could not connect to the database");
        }else{
            echo "SUCCESS: Connection to Heroku Postgres has been established";

            $invoice_query = 'INSERT INTO public."invoice"("customer_id" , "customer_name" , "invoice_id" , "invoice_date" , "invoice_product_id" ,"invoice_product_quantity") VALUES 
            (\''.$cusid.'\',\''.$cusname.'\',\''.$invoiceid.'\',\''.$invoicedate.'\',\''.$invoice_product_id[0].'\',\''.$invoice_product_quantity[0].'\')';
            
            echo '<p>'.$invoice_query.'</p>';


		    if (pg_query($connection,$invoice_query)){
			    echo '<p>SUCCESS: Record is added succesfully. A new product is created</p>';
		    }else{
			    echo '<p>ERROR: Could not execute query</p>';
		    }
        }
    ?>
    
</html>