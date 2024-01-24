<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM todos WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: todo.php");
        exit();
    } else {
        echo json_encode(array('success' => false, 'message' => $stmt->error));
    }

    $stmt->close();
}
?>
