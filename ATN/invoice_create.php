<!DOCTYPE html>
<html lang="en">

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
            $sum = 'INSERT INTO public."invoice"("Customerid","Customername","Invoiceid","Invoicedate","Productid","Quantity") VALUES (\''.$customerid.'\',\''.$customername.'\',\''.$invoiceid.'\',\''.$invoicedate.'\',\'{"'.$productid[0].'"';

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


            $host = "ec2-3-234-85-177.compute-1.amazonaws.com";
            $database = "d4sbqi18abljpu";
            $user = "qhgbytlxmnxdsc";
            $port = "5432";
            $password = "51a7b6c1f816cab155a988a6e8f482dabfff5f18ea87d416f14dfd72b91a8ee8";

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
</html>
