<?php
include('db.php');

$id = $_GET['id'];
$room = $conn->query("SELECT * FROM rooms WHERE id = $id")->fetch_assoc();

if (isset($_POST['update_room'])) {
    $room_number = $_POST['room_number'];
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];

    $sql = "UPDATE rooms SET room_number = '$room_number', room_type = '$room_type', price = '$price' WHERE id = $id";
    $conn->query($sql);

    header("Location: rooms.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Room</title>
</head>
<body>
    <h2>Update Room</h2>

    <form method="POST" action="">
        <label>Room Number:</label>
        <input type="text" name="room_number" value="<?php echo $room['room_number']; ?>" required><br>
        <label>Room Type:</label>
        <input type="text" name="room_type" value="<?php echo $room['room_type']; ?>" required><br>
        <label>Price:</label>
        <input type="number" name="price" step="0.01" value="<?php echo $room['price']; ?>" required><br>
        <button type="submit" name="update_room">Update Room</button>
    </form>
</body>
</html>
