<html>
    <body>
        <h1>Sale revenue by Category</h1>
    </body>

    <?php
    echo "<p>This is the invoice submssion<p>";
    ?>

    <?php
        $cusid = $_REQUEST["customer_id"];
        $cusname = $_REQUEST["customer_name"];

        $invoiceid = $_REQUEST["invoice_id"];
        $invoicedate = $_REQUEST["invoice_date"];
        
        $invoice_product_id = $_REQUEST["invoice_productid"];
        $invoice_product_quantity = $_REQUEST["invoice_product_quantity"];

        echo "<p>".$cusid. "</p>";
        echo "<p>".$cusname. "</p>";
        echo "<p>".$invoiceid. "</p>";
        echo "<p>".$invoicedate. "</p>";

        for ($i = 0; $i < count($invoice_product_id); $i++){
            echo "<p>". $invoice_product_id[$i]."
            ".$invoice_product_quantity[$i]."</p>";
        }

        $host="ec2-3-233-43-103.compute-1.amazonaws.com";
        $database="daoeb2h1i4gref";
        $user = "ljguzytsklzppr";
        $port = "5432";
        $password = "88ba687e8bbe5cbd0741417086045a25cc5bb0d1b3d35ab35cfea4c48680e1fa";

        $host_param_str = "host=".$host;
        $dbname_param_str = "dbname=".$database;
        $port_param_str = "port=".$port;
        $user_param_str = "user=".$user;
        $pass_param_str = "password=".$password;
        $sslmode_param_str = "sslmode= require";

        $connection_string = $host_param_str.$dbname_param_str.$port_param_str.$user_param_str.$pass_param_str.$sslmode_param_str;
        
        echo "<p>".$connection_string."</p>";
        
        $connetion = pg_connect($connection_string);
        
        if ($connection === false){
            die("ERROR: Could not connect to the database");
        }else{
            echo "SUCCESS: Connection to Heroku Postgres has been established";

            $product_query = 'INSERT INTO public."Customer"(Email,Id,Name,Phone,Address) 
            VALUES (\''.$cusid.'\',\''.$cusname.'\',\''."Default".'\',\''."Default".'\','."Default".')';

            echo '<p>' .$product_query. '</p>';


		    if (pg_query($connection,$product_query)){
			    echo '<p>SUCCESS: Record is added succesfully. A new product is created</p>';
		    }else{
			    echo '<p>ERROR: Could not execute query</p>';
		    }
        }
    ?>
</html>