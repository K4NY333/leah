<?php

$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'db_finals';

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && basename($_SERVER['HTTP_REFERER']) == 'admin.html') {
    $target_dir = __DIR__ . DIRECTORY_SEPARATOR . "uploadss" . DIRECTORY_SEPARATOR; 
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $itemName = mysqli_real_escape_string($conn, $_POST["itemName"]);
    $itemPrice = mysqli_real_escape_string($conn, $_POST["itemPrice"]);
    $itemCategory = mysqli_real_escape_string($conn, $_POST["itemCategory"]);
    $target_file = $target_dir . basename($_FILES["itemImage"]["name"]);
    $uploadOk = 1;

    if (file_exists($target_file)) {
        $message = "Sorry, file already exists.";
        $uploadOk = 0;
    }
    if ($_FILES["itemImage"]["size"] > 500000) {
        $message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        $message = "Sorry, your file was not uploaded.";
    } else {
        $sql = "INSERT INTO menu_items (name, price, category, image_path) VALUES ('$itemName', $itemPrice, '$itemCategory', '$target_file')";
        if (mysqli_query($conn, $sql)) {
            $message = "Item added successfully";
        } else {
            $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

} else {
    $message = "Invalid request method or not on the admin page.";
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<script>
    alert('<?php echo $message; ?>');
    window.history.back(); // Go back to the previous page after displaying the message
</script>

</body>
</html>
