<?php
include('db.php');

// Add Room
if (isset($_POST['add_room'])) {
    $room_number = $_POST['room_number'];
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];

    $sql = "INSERT INTO rooms (room_number, room_type, price) VALUES ('$room_number', '$room_type', '$price')";
    $conn->query($sql);
}

// Fetch Rooms
$rooms = $conn->query("SELECT * FROM rooms");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Room Management</title>
</head>
<body>
    <h2>Room Management</h2>

    <!-- Add Room Form -->
    <form method="POST" action="">
        <label>Room Number:</label>
        <input type="text" name="room_number" required><br>
        <label>Room Type:</label>
        <input type="text" name="room_type" required><br>
        <label>Price:</label>
        <input type="number" name="price" step="0.01" required><br>
        <button type="submit" name="add_room">Add Room</button>
    </form>

    <!-- Room List -->
    <h3>Rooms</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Room Number</th>
            <th>Room Type</th>
            <th>Status</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php while ($room = $rooms->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $room['id']; ?></td>
                <td><?php echo $room['room_number']; ?></td>
                <td><?php echo $room['room_type']; ?></td>
                <td><?php echo $room['status']; ?></td>
                <td><?php echo $room['price']; ?></td>
                <td>
                    <a href="update_room.php?id=<?php echo $room['id']; ?>">Edit</a> |
                    <a href="delete_room.php?id=<?php echo $room['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
