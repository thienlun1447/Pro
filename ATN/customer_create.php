<!DOCTYPE html>
<html>
<body>
    <h1>Customer</h1>

    <?php
        echo "This is Customer";
    ?>

    <?php
        $id = $_REQUEST["id"];
        $name = $_REQUEST["name"];
        $telephonenumber = $_REQUEST["phone"];
        $address = $_REQUEST["address"];

        echo $id;
        echo $name;
        echo $telephonenumber;
        echo $address;

        $host = "ec2-18-233-83-165.compute-1.amazonaws.com";
        $database = "db24t10uekpnvh";
        $user = "jbuuiblgavnapv";
        $port = "5432";
        $password = "466bceba4becfc6ff658d160e30545aa26cc46dce8fe63d75b63453dc36a5325";

        $connection_string = "host=".$host." dbname=".$database." user=".$user." port=".$port." password=".$password." sslmode=require";
        $connection = pg_connect($connection_string);

        if ($connection === false) {
            die ("ERROR: Could not connect to database");
        } 
        else {
            echo "SUCCESS: Connection to Heroku Postgres has been established";

            $customer_query = 'INSERT INTO public."Customer"("Customerid", "Customername", "Telephonenumber", "Address") VALUES
            (\''.$id.'\',\''.$name.'\',\''.$telephonenumber.'\',\''.$address.'\')';
            
            echo $customer_query;

            if (pg_query($connection, $customer_query)) {
                echo '<p>SUCCESS: Record is added successfully. A new customer is created</p>';
            }
            else {
                echo '<p>ERROR: Could not execute query</p>';
            }
        }

    ?>
</body>
</html>