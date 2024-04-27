<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk Angkasa Raya</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="icon" type="image/x-icon" href="asset\image 1.png">
</head>
<body>
  <img src="asset\image 1.png" alt="Lambang Sekolah">
  <div class="wrapper">
    <div class="form-wrapper sign-in">
      <form action="dashboard.php" id="form" class="form">
        <h2 class="log">Login</h2>
        <div class="input-group">
          <input id="username" class="username" name="username" type="text" required>
          <label for="username">Username</label>
          <div class="error"></div>
        </div>
        <div class="input-group">
          <input id="password" class="password" name="password" type="password" required>
          <label for="password">Password</label>
          <div class="error"></div>
        </div>
        <div class="remember">
          <label><input type="checkbox"> Remember me</label>
        </div>
        <button class="btn-login" id="btn-login" type="submit">Login</button>
        <div class="signUp-link">
          <p>Don't have an account? <a href="#" class="signUpBtn-link">Sign Up</a></p>
        </div>
      </form>
    </div>
    <div class="form-wrapper sign-up">
      <form action="dashboard.php" class="form">
        <h2 class="su">Sign Up</h2>
        <div class="input-group">
          <input id="username-signup" class="username-signup" name="username-signup" type="text" required>
          <label for="username-signup">Username</label>
          <div class="error"></div>
        </div>
        <div class="input-group">
          <input id="email" class="email" name="email" type="email" required>
          <label for="email">Email</label>
          <div class="error"></div>
        </div>
        <div class="input-group">
          <input id="password-signup" class="password-signup" name="password-signup" type="password" required>
          <label for="password-signup">Password</label>
          <div class="error"></div>
        </div>
        <div class="input-group">
          <input id="confirm-password" class="confirm-password" name="confirm-password" type="password" required>
          <label for="confirm-password">Confirm Password</label>
          <div class="error"></div>
        </div>
        <div class="remember">
          <label><input type="checkbox"> I agree to the terms & conditions</label>
        </div>
        <button class="btn-signup" id="btn-signup" type="submit">Sign Up</button>
        <div class="signUp-link">
          <p>Already have an account? <a href="#" class="signInBtn-link">Sign In</a></p>
        </div>
      </form>
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>