<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>User login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="container text-center">
      <div class="form-signin">
        <i class="fas fa-user-tie mb-4 fa-7x"></i>
        <h1 class="h3 mb-3 font-weight-normal">User Management</h1>
        <label for="inputEmail" class="sr-only">Nickname</label>
        <input type="email" id="txt-login-nickname" class="form-control" placeholder="Nickname" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="txt-login-password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="button" id="btn-login">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; Made by Ángel Cáceres in one day </p>
      </div>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <script src="js/actions.js" type="text/javascript"></script>
  <script src="js/functions.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      if(localStorage.getItem("token"))
      {
        $(location).attr('href','http://localhost/users-client/index.php');
      }
    });
  </script>
</html>
