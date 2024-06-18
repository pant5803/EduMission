<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: admin_login.php');
    exit();
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbms2023";
$conn = mysqli_connect($servername, $username, $password, $dbname);

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_GET['delivered'])) {
    $id = $_GET['delivered'];
    $sql = "UPDATE book_donations SET delivered = 'Y' WHERE id = $id";
    mysqli_query($conn, $sql);
    $sql = "SELECT * FROM book_donations WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host = 'tls://smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'blancavern3@gmail.com';
        $mail->Password = 'nnpixmqiluurveci'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;


        $mail->setFrom('blancavern3@gmail.com', 'Book Donation Team');
        $mail->addAddress('luckyjoshi615@gmail.com');
        $mail->Subject = "Your book donation has been delivered!";
        $mail->Body = "Dear Donor"  . ",\n\nWe wanted to let you know that your book donation of " . $row['title'] . " by " . $row['author'] . " (ISBN: " . $row['isbn'] . ") in " . $row['condition'] . " condition has been delivered. We hope you are satisfied with our service and thank you for your generosity.\n\nBest regards,\nThe Book Donation Team";
        $mail->send();
    } catch (Exception $e) {
        echo "Error sending email: " . $mail->ErrorInfo;
    }
}

$sql = "SELECT * FROM book_donations WHERE delivered = 'N' and status='approved'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>

        .navbar {
            overflow: hidden;
            background-color: #333;
            font-family: Arial, sans-serif;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }


        .navbar a.active {
            background-color: #4CAF50;
            color: white;
        }


        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #0074D9;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .delivered-btn {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .delivered-btn:hover {
            background-color: #66ff66;
        }
        .content {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="admin_page.php">Pending Donations</a>
        <a href="admin_deliv.php" class="active">Book Delivery</a>
        <a href="admin_new_req.php" >Student Approval Requests</a>
        <a href="home.php" style="float: right;">Logout</a>
    </div>
    <div class="content">
    <h1>Book Delivery</h1>
    <?php if (mysqli_num_rows($result) > 0): ?>
    <table>
        <tr>
            <th>User ID</th>
            <th>ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Condition</th>
            <th>Mark as Delivered</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['isbn']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['author']; ?></td>
                <td><?php echo $row['condition']; ?></td>
                <td><button class="delivered-btn" onclick="location.href='admin_deliv.php?delivered=<?php echo $row['id']; ?>'">Mark as Delivered</button></td>
            </tr>
        <?php endwhile; ?>
    </table>
        </div>
        <?php else: ?>
        <p>No pending book donations.</p>
    <?php endif; ?>
</body>
</html>