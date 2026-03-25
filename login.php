<?php

  require_once __DIR__ . '/includes/database-connection.php';



  require_once __DIR__ . '/includes/session.php';



  
  if ($logged_in) {                                       // If already logged in  
    header('Location: profile.php');                     // Redirect to profile page 
    exit;                                               // Stop further code running
  }    



  if ($_SERVER["REQUEST_METHOD"] == "POST") {         // Check if the form was submitted
    $username = $_POST['username'];                  // Get the username the user sent
    $password = $_POST['password'];                 // Get the password the user sent



    $user = authenticate($pdo, $username, $password);



    if ($user) {                               // If user data returned
      login($user);                           // Call the login function to update session data                                             
      header('Location: profile.php');       // Redirect to profile page 
      exit;                                 // Stop further code running 
    }
  }

    
  include 'includes/header.php';
    
?> 

<div id="content" class="login-container animate-bottom">
    <h1>Log In</h1>
    <hr />

    <form method="POST" action="login.php" class="login-form">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <input type="submit" value="Log In" class="submit-btn">
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
