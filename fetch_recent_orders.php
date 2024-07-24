<?php
include("config.php");

$tableName = "orders";
$columns = ['id', 'customer_name', 'total', 'created_at', 'status'];
$fetchData = fetch_data($conn, $tableName, $columns);

function fetch_data($db, $tableName, $columns) {
    if (empty($db)) {
        return "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        return "Columns name must be defined in an indexed array";
    } elseif (empty($tableName)) {
        return "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName ORDER BY id DESC";
        $result = $db->query($query);

        if ($result == true) {
            if ($result->num_rows > 0) {
                return mysqli_fetch_all($result, MYSQLI_ASSOC);
            } else {
                return "No Data Found";
            }
        } else {
            return mysqli_error($db);
        }
    }
}

echo json_encode($fetchData);
?>
