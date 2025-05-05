<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign Up - Elegant Red</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(135deg, #8b0000, #b22222);
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .signup-card {
      background: rgba(255, 255, 255, 0.07);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      padding: 40px;
      width: 100%;
      max-width: 450px;
      color: #fff;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
    }

    .signup-card h3 {
      color: #ffeaea;
      margin-bottom: 25px;
      font-weight: 600;
    }

    .form-control {
      background-color: rgba(255, 255, 255, 0.1);
      border: none;
      color: white;
      border-radius: 10px;
      padding: 12px;
    }

    .form-control:focus {
      background-color: rgba(255, 255, 255, 0.2);
      outline: none;
      box-shadow: none;
    }

    .form-control::placeholder {
      color: #f3cfcf;
    }

    .btn-red {
      background-color: #e60000;
      border: none;
      color: white;
      padding: 12px;
      font-weight: bold;
      border-radius: 10px;
      transition: background-color 0.3s ease;
    }

    .btn-red:hover {
      background-color: #cc0000;
    }

    .logo-container {
    display: inline-block;
    background-color: rgba(255, 255, 255, 0.15); /* semi-transparent white */
    padding: 10px;
    border-radius: 12px;
    backdrop-filter: blur(4px);
    }
    .logo {
    width: 100px;
    height: auto;
    }


    a {
      color: #ffcccc;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    .alert {
      background-color: rgba(255, 255, 255, 0.1);
      color: #ffeaea;
      border: 1px solid rgba(255, 255, 255, 0.3);
    }
  </style>
</head>
<body>

  <div class="signup-card text-center">
    <img src="image/Neuronworks.png" alt="Logo" class="logo" />
    <h3>Sign Up</h3>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        require_once "db_conn.php";

        $fullName = htmlspecialchars(trim($_POST["fullname"]));
        $email = htmlspecialchars(trim($_POST["email"]));
        $password = $_POST["password"];
        $passwordRepeat = $_POST["repeat_password"];
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $errors = [];

        if (empty($fullName) || empty($email) || empty($password) || empty($passwordRepeat)) {
            $errors[] = "All fields are required.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }
        if (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters long.";
        }
        if ($password !== $passwordRepeat) {
            $errors[] = "Passwords do not match.";
        }

        if (empty($errors)) {
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                $errors[] = "Email already exists!";
            }
        }

        if (empty($errors)) {
            $sql = "INSERT INTO users (email, name, password, role) VALUES (?, ?, ?, 'user')";
            $stmt = mysqli_prepare($conn, $sql);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "sss", $email, $fullName, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success mt-3'>You are registered successfully.</div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Something went wrong. Please try again later.</div>";
            }
        } else {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger mt-2'>" . htmlspecialchars($error) . "</div>";
            }
        }
    }
    ?>

    <form action="" method="post">
      <div class="mb-3">
        <input type="text" class="form-control" name="fullname" placeholder="Full Name" required />
      </div>
      <div class="mb-3">
        <input type="email" class="form-control" name="email" placeholder="Email" required />
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password" required />
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password" required />
      </div>
      <button type="submit" name="submit" class="btn btn-red w-100">Sign Up</button>
    </form>
    <p class="mt-3">Already have an account? <a href="index.php">Login here</a></p>
  </div>

</body>
</html>
