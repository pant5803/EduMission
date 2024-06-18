<!DOCTYPE html>
<html>
<head>
    <title>Donor Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* Style the navbar */
        .navbar {
            overflow: hidden;
            background-color: #333;
            font-family: Arial, sans-serif;
        }

        /* Style the links inside the navbar */
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        /* Change the color of the active link */
        .navbar a.active {
            background-color: #4CAF50;
            color: white;
        }

        /* Style the content */
        .content {
            margin-top: 50px;
            padding: 20px;
            animation: fade-in 0.5s ease;
            background-color: #f2f2f2;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Animations */
        @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Additional styles */
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
        <a href="donate.php">Financial Donation</a>
        <a href="donate_books.php">Donate books</a>
        <a href="give_my_receipt.php">Request Receipt</a>
        <a href="show_my_receipts.php">Show receipt numbers</a>
        <a href="show_my_books.php">Show Book donation status</a>
        <a href="home.php" style="float:right">Logout</a>
    </div>

    <div class="content">
        <h2>Welcome to the Donor Dashboard</h2>
        <p>Here you can manage your donations and view your donation history.</p>
        <p>Please select an option from the navbar above.</p>
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