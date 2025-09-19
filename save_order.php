<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $items = $_POST['items'];
    $payment = $_POST['payment'];
    $total = $_POST['total'];

    $sql = "INSERT INTO orders (customer_name, customer_phone, customer_address, order_items, payment_method, total_price) 
            VALUES ('$name','$phone','$address','$items','$payment','$total')";

    if ($conn->query($sql) === TRUE) {
        echo "Order saved successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
