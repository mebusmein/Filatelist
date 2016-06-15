<?php

//the connection

$config = new \Doctrine\DBAL\Configuration();

$connectionParams = array(

    //db name:user:password:location:dbname
    'url' => 'mysql://root:root@localhost/test',
);
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);


//the query

$sql = "SELECT * FROM areas";

$stmt = $conn->query($sql);


//printing query

while($row = $stmt->fetch()) {

    echo $row["arID"];

}