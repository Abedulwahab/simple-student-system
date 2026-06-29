<?php
include "connection.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Student not found");
}

if (isset($_POST['update'])) {
    $name  = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE students SET name='$name', email='$email' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        $error = mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 40%;
            margin: 60px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-top: 0;
        }

        label {
            display: block;
            margin: 12px 0 6px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #007bff;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            font-size: 14px;
        }

        .btn-update {
            background-color: #007bff;
            width: 100%;
            margin-top: 15px;
        }

        .btn-update:hover {
            background-color: #0069d9;
        }

        .back-link {
            display: inline-block;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .error {
            background: #ffe5e5;
            color: #b30000;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 12px;
        }

        .note {
            text-align: center;
            color: #666;
            font-size: 13px;
            margin-top: -8px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Student</h2>
    <div class="note">Editing student ID: <?= $row['id'] ?></div>

    <?php if (!empty($error)) { ?>
        <div class="error">Error: <?= $error ?></div>
    <?php } ?>

    <form method="post">
        <label>Name</label>
        <input type="text" name="name" value="<?= $row['name'] ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?= $row['email'] ?>" required>

        <input class="btn btn-update" type="submit" name="update" value="Update">
    </form>

    <a class="back-link" href="index.php">← Back to Students</a>
</div>

</body>
</html>
