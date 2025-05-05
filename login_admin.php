<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Elegant Red</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to bottom right, #8b0000, #b22222);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
    }

    .login-card {
      background: rgba(255, 255, 255, 0.07);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.15);
      padding: 40px 30px;
      border-radius: 20px;
      color: #fff;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 0 30px rgba(139, 0, 0, 0.2);
    }

    .login-card h3 {
      margin-bottom: 25px;
      font-weight: bold;
      color: #ffdddd;
    }

    .form-control {
      background-color: rgba(255, 255, 255, 0.1);
      color: #fff;
      border: none;
      padding: 12px;
      border-radius: 10px;
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

    .show-password-btn {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      padding: 6px 10px;
      font-size: 14px;
      background-color: transparent;
      border: none;
      color:rgb(8, 8, 8);
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
      color: #ffcfcf;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-card text-center">
    <img src="image/Neuronworks.png" alt="Logo" class="logo">
    <h3>Welcome Back</h3>
    <form action="login-admin.php" method="post">
      <div class="mb-3">
        <input type="email" class="form-control" name="email" placeholder="Enter Email:" required>
      </div>
      <div class="mb-3 position-relative">
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password:" required>
        <button type="button" class="show-password-btn" onclick="togglePassword()">Show</button>
      </div>
      <input type="submit" class="btn btn-red w-100" value="Login" name="login">
    </form>
  </div>

  <script>
    function togglePassword() {
      const passwordField = document.getElementById('password');
      const button = event.target;
      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        button.textContent = 'Hide';
      } else {
        passwordField.type = 'password';
        button.textContent = 'Show';
      }
    }
  </script>
</body>
</html>
