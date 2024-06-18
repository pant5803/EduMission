<?php
// Start session
session_start();
if (!isset($_SESSION['user_id'])) {
    exit();
}

// Connect to database using MySQLi
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbms2023";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query database for student name and class
$user_id = $_SESSION['user_id'];
$sql = "SELECT name, class FROM student_data WHERE userid = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    // Retrieve student name and class from database
    $row = mysqli_fetch_assoc($result);
    $student_name = $row["name"];
    $class = $row["class"];
} else {
    echo "No results found.";
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* Style the navigation bar */
        .navbar {
            overflow: hidden;
            background-color: #333;
            position: fixed;
            top: 0;
            width: 100%;
        }

        /* Style the links inside the navigation bar */
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 17px;
        }

        /* Change the color of links on hover */
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Add a color to the active/current link */
        .navbar a.active {
            background-color: #4CAF50;
            color: white;
        }

        /* Style the content */
        .content {
            margin-top: 50px;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #333;
            font-size: 36px;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a class="active" href="#">Home</a>
        <a href="courses.php">Your Courses</a>
        <a href="inventory.php">Our Inventory</a>
        <a href="request_book.php">Request Donation</a>
        <a href="home.php" style="float:right">Logout</a>
    </div>

    <div class="content">
        <h2>Welcome to your Student Dashboard</h2>
        <?php
            // Display student name and class
            echo "<p><strong>Name:</strong> <span class='name'>$student_name</span></p>";
            echo "<p><strong>Class:</strong> <span class='class'>$class</span></p>";
        ?>
        <p>Here you can manage your courses and request book donations.</p>
        <p>Please select an option from the navigation bar above.</p>
    </div>

    <script>
        // Add animation to navbar links on hover
        const navbarLinks = document.querySelectorAll('.navbar a');
        navbarLinks.forEach(link => {
            link.addEventListener('mouseover', () => {
                link.style.backgroundColor = '#555';
            });
            link.addEventListener('mouseout', () => {
                link.style.backgroundColor = '';
            });
        });
    </script>
</body>
</html>