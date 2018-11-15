<?php

class DatabaseConn
{
    private static $conn;

    function getInstance()
    {
        if (DatabaseConn::$conn == null) {
            $serverName = "localhost";
            $userName = "root";
            $password = "qwerty";
            DatabaseConn::$conn = new mysqli($serverName, $userName, $password, "addressbook");
            // Check connection
            if (DatabaseConn::$conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        }
        return DatabaseConn::$conn;
    }
}


class AddressBook
{
    static function createAddressBook($name)
    {
        $newTable = "CREATE TABLE $name(
        fname varchar(25),
        lname varchar(25),
        address varchar(100),
        city varchar(20),
        state varchar(20),
        pin int(7),
        mobile bigint(11) NOT  NULL UNIQUE KEY)";

        $tt = DatabaseConn::getInstance();
        //var_dump($tt);
        $tt->query($newTable);
    }
    static function removeAddressBook()
    {
        $adName = AddressBook::showAddressBook();
        $removeTb = "DROP TABLE $adName";
        DatabaseConn::getInstance()->query($removeTb);

    }

    static function showAddressBook()
    {
        $tableList = [];
        $showTable = "SHOW TABLES";
        $ss = DatabaseConn::getInstance()->query($showTable);
        
        $i = 1;
        while ($table = $ss->fetch_assoc()) {
            
            echo $i++ . " " . $table["Tables_in_addressbook"] . "\n";
            array_push($tableList, $table["Tables_in_addressbook"]);
        }
        echo "select table number\n";
        $num = trim(fgets(STDIN));
        if (is_numeric($num) && $num > 0 && $num <= sizeof($tableList)) {
            return $tableList[(int)$num - 1];
        } else {
            echo "invalid input\n";
        }
    }

}

class AddressFunction
{
    static function addAddress($fname, $lname, $address, $city, $state, $zip, $mobile, $tableName)
    {
        $put = "INSERT INTO $tableName(fname,lname,address,city,state,pin,mobile)
        values('".$fname."','".$lname."','".$address."','".$city."','".$state."',".$zip.",".$mobile.")";
        echo $put."\n";
        DatabaseConn::getInstance()->query($put);
    }

    static function showAddress($tableName)
    {
        
        $ss = DatabaseConn::getInstance()->query( "select * from as54 ORDER BY fname,lname,pin");

        while($data = $ss->fetch_assoc()){
            echo "name: ".$data['fname']." ".$data['lname']."\n";
            echo "address: ".$data['address']."\n";
            echo $data['city']." ".$data['state']."\n";
            echo "zip: ".$data['pin']."\n";
            echo "mobile: ".$data['mobile']."\n";
            echo "--------------------------------\n";
        }
    }

    static function searchAd($fname,$lname,$table)
    {
        $sql = "select * from $table where fname='".$fname."' and lname ='".$lname."'";
        $ss = DatabaseConn::getInstance()->query($sql);
        //var_dump($ss);
        while($data = $ss->fetch_assoc()){
            echo "name: ".$data['fname']." ".$data['lname']."\n";
            echo "address: ".$data['address']."\n";
            echo $data['city']." ".$data['state']."\n";
            echo "zip: ".$data['pin']."\n";
            echo "mobile: ".$data['mobile']."\n";
            echo "--------------------------------\n";
        }
    }
}


//databaseConn::getInstance();
//print_r(showAddressBook());
//AddressBook::createAddressBook("as5214");
//removeAddressBook();
//echo AddressBook::removeAddressBook();
AddressFunction::searchAd("chirag","verma","as54");
//AddressFunction::addAddress("sar", "sa", "fdscdsf", "rewa", "mp", 486001, 000000, $name);
?>