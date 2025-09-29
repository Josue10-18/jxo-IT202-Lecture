<?php
function getDB() {
    $host = 'sql1.njit.edu';
    $port = 3306;
    $dbname = 'jxo';
    $username = 'jxo';
    $password = 'Xavier#2090!!';

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $db = new mysqli($host, $username, $password, $dbname, $port);
        $db->set_charset("utf8mb4"); // recommended
        error_log(" Connected to $dbname on $host");
        return $db;
    } catch (mysqli_sql_exception $e) {
        error_log(" DB connection failed: " . $e->getMessage(), 0);
        die("Database connection failed.");
    }
}
?>
