<body>
<?php
        $customerid = $_REQUEST["customer_id"];
        $customername = $_REQUEST["customer_name"];
        $invoiceid = $_REQUEST["invoice_id"];
        $invoicedate = $_REQUEST["invoice_date"];
        $productid = $_REQUEST["invoice_product_id"];
        $quantity = $_REQUEST["invoice_product_quantity"];

        echo "<p>".$customerid."</p>";
        echo "<p>".$customername."</p>";
        echo "<p>".$invoiceid."</p>";
        echo "<p>".$invoicedate."</p>";


        for($i = 0; $i < count($productid); $i++){
            echo "<p>".$productid[$i]."_".$quantity[$i]."</p>";
        }
        $sum_id = "";
        $sum_qua ="";
        $sum = 'INSERT INTO public."Invoice"("Customerid","Customername","Invoiceid","Invoicedate","Productid","Quantity") VALUES (\''.$customerid.'\',\''.$customername.'\',\''.$invoiceid.'\',\''.$invoicedate.'\',\'{"'.$productid[0].'"';

        for($i = 1; $i < count($productid); $i++){
            $sum_id = ',"'.$productid[$i].'"';
            $sum = $sum.$sum_id;        
        }
        $sum = $sum.'}\',\'{"'.$quantity[0].'"';
        

        for($i = 1; $i < count($quantity); $i++){
            $sum_qua = ',"'.$quantity[$i].'"';
            $sum = $sum.$sum_qua;
        }
        $sum = $sum.'}\')';
        echo "<p>".$sum."</p>";


        $host = "ec2-184-73-198-174.compute-1.amazonaws.com";
        $database = "dee1kdrja9ig32";
        $user = "qmgxwwmiogtjzs";
        $port = "5432";
        $password = "6868691f1c3fbca6d0dd16d9c7b8e51069ee7613e025e27ce21912cbda387338";

        $connection_string = "host=".$host." dbname=".$database." user=".$user." port=".$port." password=".$password." sslmode=require";
        $connection = pg_connect($connection_string);
        if ($connection === false) {
            die ("ERROR: Could not connect to database");
        } 
        else {
            echo "SUCCESS: Connection to Heroku Postgres has been established";


            if (pg_query($connection, $sum)) {
                echo '<p>SUCCESS: Record is added successfully. A new customer is created</p>';
            }
            else {
                echo '<p>ERROR: Could not execute query</p>';
            }
        }
?>
</body>