<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ToDo App</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
        require 'database.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $new = (string)$_POST['new'];

            $stmt = $mysqli->prepare("insert into todos (title) values (?)");
            if (!$stmt) {
                printf("Query Prep Failed: %s\n", $mysqli->error);
                exit;
            }

            $stmt->bind_param('s', $new);
            
            if ($stmt->execute()) {
                $creation_successful = true;
                header("Location: {$_SERVER['REQUEST_URI']}");
                exit();
            }

            $stmt->close();
        }
        ?>

        <h1>ToDo List:</h1>
        <form method="POST" action="todo.php">
            <label for="new">Add new todo:</label>
            <input type="text" id="new" name="new" required>
        </form>

        <?php
            $stmt = $mysqli->prepare("select title, id from todos");
            $stmt->execute();
            $stmt->bind_result($item, $id);

            while($stmt->fetch()){
                echo '<input type="checkbox">';
                echo '<span>'.htmlentities($item).'</span><br>';
                ?>
                <form method="POST" action="delete.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <input type="submit" value="Delete">
                </form>
                <?php
            }
            $stmt->close();
        ?>

    </body>
</html>