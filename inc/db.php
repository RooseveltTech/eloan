<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $con = new PDO("sqlsrv:server = tcp:eloan.database.windows.net,1433; Database = eloandatabase", "eloandatabase", "Eloan123");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
// $connectionInfo = array("UID" => "eloandatabase", "pwd" => "Eloan123", "Database" => "eloandatabase", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
// $serverName = "tcp:eloan.database.windows.net,1433";
// $conn = sqlsrv_connect($serverName, $connectionInfo);
?>