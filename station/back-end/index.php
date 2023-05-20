
<?php include('login_user_process.php');?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <script src="../front-end/static/js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="../front-end/static/css/main.css">

</head>
<body class="log-in-body">
    <div id="card">
    <div id="card-content">
      <div id="card-title">
        <p> Please Login First.</p>
        <?php include("login_user_errors.php");?>
      </div>
          <form  style="max-width:500px;margin:auto" method="post" action="index.php">

          <div class="input-container">
              <i class="fa fa-key icon"></i>
                <select required class="input-field" autocomplete="off" name="usertype" >
                  <option>Select User Type</option>
                  <option value="Admin">Admin</option>
                  <option value="Staff">Staff</option>
                </select>
            </div>

            <div class="input-container">
              <i class="fa fa-user icon"></i>
              <input class="input-field" type="text"  name="username" autocomplete="off" required="required" placeholder="Username">
            </div>

            

            <div class="input-container">
              <i class="fa fa-key icon"></i>
              <input class="input-field" type="password" autocomplete="off" required="required" placeholder="Password" name="password">
            </div>
            <button type="submit"  name="user-login-btn" class="log-in-btn">Log In</button>

      </form>
    </div>
  </div>

</body>
</html>
