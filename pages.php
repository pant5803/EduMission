<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('login.jpg');
            background-size: cover;
        }
        .card {
            margin: 20px;
            text-align: center;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            border-radius: 5px;
            overflow: hidden;
        }
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: contain;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .card-text {
            font-size: 16px;
            margin-bottom: 20px;
        }
        .btn {
            font-size: 16px;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Org. Name</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container">
    <div class="row">
    <div class="col-md-4">
        <div class="card">
            <img src="Donor.avif" alt="Donor Login">
            <div class="card-body">
                <h5 class="card-title">Donor Login</h5>
                <p class="card-text">Login as a donor</p>
                <a href="donor_login.php" class="btn btn-primary">Donor Login</a>
                <a href="donor_signup.php" class="btn btn-primary">Donor Signup</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img src="student.webp" alt="Student Login">
            <div class="card-body">
                <h5 class="card-title">Student Login</h5>
                <p class="card-text">Login as a student</p>
                <a href="student_login.php" class="btn btn-primary">Student Login</a>
                <a href="student_signup.php" class="btn btn-primary">Student Signup</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img src="parent.avif" alt="Parent Login">
            <div class="card-body">
                <h5 class="card-title">Parent Login</h5>
                <p class="card-text">Login as a parent</p>
                <a href="parent_login.php" class="btn btn-primary">Parent Login</a>
                <a href="parent_signup.php" class="btn btn-primary">Parent Signup</a>
            </div>
        </div>
    </div>
</div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>