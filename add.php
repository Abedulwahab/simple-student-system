<?php
include "connection.php";

if (isset($_POST['save'])) {
    $name  = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students (name, email) VALUES ('$name', '$email')";

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
    <title>Add Student</title>

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

        .btn-save {
            background-color: #28a745;
            width: 100%;
            margin-top: 15px;
        }

        .btn-save:hover {
            background-color: #218838;
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
    </style>
</head>
<body>

<div class="container">
    <h2>Add Student</h2>

    <?php if (!empty($error)) { ?>
        <div class="error">Error: <?= $error ?></div>
    <?php } ?>

    <form method="post">
        <label>Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <input class="btn btn-save" type="submit" name="save" value="Save">
    </form>

    <a class="back-link" href="index.php">← Back to Students</a>
</div>

</body>
</html>
