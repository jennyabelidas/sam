<?php
include('db.php');

if (isset($_POST['add_booking'])) {
    $guest_id = $_POST['guest_id'];
    $room_id = $_POST['room_id'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $total_amount = $_POST['total_amount'];

    $sql = "INSERT INTO bookings (guest_id, room_id, check_in, check_out, total_amount) VALUES ('$guest_id', '$room_id', '$check_in', '$check_out', '$total_amount')";
    $conn->query($sql);

    $conn->query("UPDATE rooms SET status = 'Booked' WHERE id = $room_id");
}

$guests = $conn->query("SELECT * FROM guests");
$rooms = $conn->query("SELECT * FROM rooms WHERE status = 'Available'");
?>
