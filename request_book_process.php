<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: home.php');
    exit();
}

// Connect to database
$conn = new mysqli('localhost', 'root', '', 'dbms2023');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Get book ID from form submission
$book_id = $_POST['book_id'];

// Prepare SQL statement to select book with given ID
$stmt = $conn->prepare('SELECT * FROM book_donations WHERE isbn = ?');
$stmt->bind_param('s', $book_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if book exists in database
if ($result->num_rows > 0) {
    // Delete one book from database
    $stmt = $conn->prepare('DELETE FROM book_donations WHERE isbn = ? LIMIT 1');
    $stmt->bind_param('s', $book_id);
    $stmt->execute();

    // Print success message
    echo 'One book has been deleted from the database.';

    // Close database connection
    $stmt->close();
    $conn->close();
} else {
    // Close database connection
    $stmt->close();
    $conn->close();

    // Redirect to error page
    header('Location: request_book_error.php');
    exit();
}
?>