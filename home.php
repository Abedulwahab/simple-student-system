<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f7fa;
        }

        /* Navbar */
        .navbar {
            background-color: #0d6efd;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .navbar h2 {
            margin: 0;
            font-size: 22px;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .login-btn {
            background-color: white;
            color: #0d6efd;
            padding: 8px 18px;
            text-decoration: none;
            border-radius: 20px;
            font-weight: bold;
            transition: 0.3s;
        }

        .login-btn:hover {
            background-color: #e9ecef;
        }

        /* Main content */
        .container {
            width: 85%;
            margin: 50px auto;
            text-align: center;
        }

        .container img {
            width: 65%;
            max-width: 650px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .welcome {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .desc {
            font-size: 16px;
            color: #555;
            margin-bottom: 40px;
        }

        /* Cards */
        .options {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            width: 260px;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        .card p {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .card a {
            display: inline-block;
            padding: 10px 22px;
            background-color: #0d6efd;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            transition: 0.3s;
        }

        .card a:hover {
            background-color: #0b5ed7;
        }

        /* Footer */
        .footer {
            margin-top: 60px;
            padding: 15px;
            text-align: center;
            color: #777;
            font-size: 14px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <h2>Student System</h2>

    <div class="nav-right">
        <?php if (isset($_SESSION['user'])) { ?>
            <span>Welcome, <?= $_SESSION['user'] ?></span>
        <?php } else { ?>
            <a href="login.php" class="login-btn">Login</a>
        <?php } ?>
    </div>
</div>

<!-- Main Content -->
<div class="container">

    <!-- Image -->
    <img src="students.jpg" alt="Students">

    <div class="welcome">
        Welcome to the Student Management System
    </div>

    <div class="desc">
        Manage students easily. Add new students, view the list, and update their information in one place.
    </div>

    <!-- Options -->
    <div class="options">
        <div class="card">
            <h3>View Students</h3>
            <p>See all registered students in the system.</p>
            <a href="index.php">View</a>
        </div>

        <div class="card">
            <h3>Add Student</h3>
            <p>Add a new student quickly and easily.</p>
            <a href="add.php">Add</a>
        </div>
    </div>

</div>

<div class="footer">
    © 2026 Student Management System
</div>

</body>
</html>
