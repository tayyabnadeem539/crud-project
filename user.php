<?php

require_once("config2.php");

if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $pass = $_POST['pass'];
    $age = $_POST['age'];

    $query = "INSERT INTO person (name, email, city, password, age)
              VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param(
        $stmt,
        "ssssi",
        $name,
        $email,
        $city,
        $pass,
        $age
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Data sent successfully');</script>";
    } else {
        echo "<script>alert('Data sending failed');</script>";
    }

    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<style>
 * {
    box-sizing: border-box;
}

body {
    margin: 0;
    min-height: 100vh;
    background: linear-gradient(135deg, #fff1eb, #ffd6c9);
    font-family: Arial, sans-serif;
}

.navbar {
    min-height: 76px;
    padding: 12px 0;
    background: #ffffff !important;
    border-bottom: 1px solid #ffe0d6;
}

.navbar-brand {
    font-size: 26px;
    color: #b52b2b !important;
}

.navbar-brand span {
    color: #e85d5d;
}

.nav-link {
    color: #632626 !important;
    font-weight: 500;
    margin: 0 8px;
    transition: 0.3s ease;
}

.nav-link:hover,
.nav-link.active {
    color: #c92f3d !important;
}

.navbar-btn {
    background: linear-gradient(135deg, #c92f3d, #e85d5d);
    color: white !important;
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    font-weight: 600;
    transition: 0.3s ease;
}

.navbar-btn:hover {
    background: linear-gradient(135deg, #a92330, #d94646);
    color: white !important;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(201, 47, 61, 0.25);
}

.navbar-toggler {
    border-color: #f0b7aa;
}

.navbar-toggler:focus {
    box-shadow: 0 0 0 0.15rem rgba(201, 47, 61, 0.15);
}

/* ================= FORM SECTION ================= */

.form-section {
    min-height: calc(100vh - 76px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 50px 20px;
}

/* ================= FORM CARD ================= */

.form-card {
    width: 100%;
    max-width: 520px;
    background: #ffffff;
    border-radius: 25px;
    padding: 35px;
    box-shadow: 0 15px 45px rgba(180, 45, 45, 0.18);
    border: 1px solid #ffe0d6;
}

.form-title {
    color: #b52b2b;
    font-weight: 700;
    font-size: 30px;
}

.form-subtitle {
    color: #9b7770;
    font-size: 14px;
}

.form-label {
    color: #632626;
    font-weight: 600;
}

.form-control,
.form-select {
    border: 1px solid #f0b7aa;
    border-radius: 12px;
    padding: 12px 15px;
    background-color: #fffaf8;
}

.form-control:focus,
.form-select:focus {
    border-color: #d94b4b;
    box-shadow: 0 0 0 0.2rem rgba(217, 75, 75, 0.15);
    background-color: #ffffff;
}

.form-check-label {
    color: #9b7770;
}

.form-check-input:checked {
    background-color: #c92f3d;
    border-color: #c92f3d;
}

.btn-submit {
    background: linear-gradient(135deg, #c92f3d, #e85d5d);
    color: white;
    border: none;
    border-radius: 12px;
    padding: 13px;
    font-weight: 600;
    transition: 0.3s ease;
}

.btn-submit:hover {
    background: linear-gradient(135deg, #a92330, #d94646);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(201, 47, 61, 0.25);
}

/* ================= RESPONSIVE ================= */

@media (max-width: 991px) {

    .navbar-nav {
        padding: 15px 0;
    }

    .navbar-btn {
        display: inline-block;
        margin-bottom: 10px;
    }
}

@media (max-width: 576px) {

    .form-section {
        padding: 30px 15px;
    }

    .form-card {
        padding: 25px 20px;
        border-radius: 20px;
    }

    .form-title {
        font-size: 25px;
    }
}
</style>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">

            <a class="navbar-brand fw-bold" href="#">
                Backend<span>  Project</span>
            </a>

            <button 
                class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">

                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>

                <a href="#" class="btn navbar-btn">
                    Get Started
                </a>

            </div>
        </div>
    </nav>


    <!-- Form Section -->
    <main class="form-section">

        <div class="form-card">

            <div class="text-center mb-4">
                <h2 class="form-title">Create Your Account</h2>
                <p class="form-subtitle">
                    Enter your details to get started
                </p>
            </div>

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your full name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email" placeholder="example@gmail.com" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" name="city" placeholder="Enter your city" required>
                    <!-- <select class="form-select" required>
                        <option selected disabled>Select your city</option>
                        <option>Karachi</option>
                        <option>Lahore</option>
                        <option>Islamabad</option>
                        <option>Rawalpindi</option>
                        <option>Faisalabad</option>
                        <option>Multan</option>
                    </select> -->
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Create a strong password" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Age</label>
                    <input type="number" class="form-control" name="age" placeholder="Enter your age" min="1" max="100" required>
                </div>

                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" required>
                    <label class="form-check-label">
                        I agree to the terms and conditions
                    </label>
                </div>

                <button type="submit" name="register" class="btn btn-submit w-100">
                    Create Account
                </button>

            </form>

        </div>

    </main>

</body>

</html>