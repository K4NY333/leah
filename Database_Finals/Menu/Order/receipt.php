<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'db_finals';

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $jsonInput = file_get_contents('php://input');
    $requestData = json_decode($jsonInput, true);
    $orderItems = $requestData['orderItems'];
    $nickname = mysqli_real_escape_string($conn, $requestData['nickname']);
    $address = mysqli_real_escape_string($conn, $requestData['address']);
    $pnumber = mysqli_real_escape_string($conn, $requestData['pnumber']);
    $total = floatval($requestData['total']);

    error_log("Received orderItems: " . print_r($orderItems, true));
    error_log("Received nickname: " . $nickname);
    error_log("Received address: " . $address);
    error_log("Received pnumber: " . $pnumber);
    error_log("Received total: " . $total);

    $userSql = "INSERT INTO user_info (nickname, address, pnumber) VALUES ('$nickname', '$address', '$pnumber')";
    if (mysqli_query($conn, $userSql)) {
        $user_id = mysqli_insert_id($conn);

    foreach ($orderItems as $item) {
        $itemId = $item['id'];
        $itemName = $item['name'];
        $itemPrice = $item['price'];

        $sql = "INSERT INTO receipt (user_id, item_id, item_name, item_price) VALUES ('$user_id', '$itemId', '$itemName', '$itemPrice')";

        error_log("Executing SQL: " . $sql);
    if (mysqli_query($conn, $sql)) {
        echo "Record added successfully\n";
    } else {
        echo "Error inserting record: " . mysqli_error($conn) . "\n";
    }
}

        $updateTotalSql = "UPDATE receipt SET total_price = '$total' WHERE user_id = '$user_id'";
        error_log("Executing SQL: " . $updateTotalSql);

    if (mysqli_query($conn, $updateTotalSql)) {
        echo "Total price added successfully\n";
    } else {
        echo "Error updating total price: " . mysqli_error($conn) . "\n";
}
    } else {
        echo "Error inserting user information: " . mysqli_error($conn) . "\n";
    }
    mysqli_close($conn);
}
?>