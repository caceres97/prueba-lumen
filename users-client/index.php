<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>User management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
              <a class="navbar-brand mx-auto" href="#">USER MANAGEMENT</a>
            </li>
          </ul>
          <!-- <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="user-options" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                User Options
              </a>
              <div class="dropdown-menu" aria-labelledby="user-options">
                <a class="dropdown-item" href="#">Update users</a>
                <a class="dropdown-item" href="#">Logout</a>
              </div>
            </li>
          </ul> -->
        </div>
      </nav>
    </header>
    <div class="container-fluid">
      <br>
      <div class="row">
        <div class="col-3">
          <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i class="fas fa-home"></i> Home</a>
            <a class="list-group-item list-group-item-action" id="list-users-list" data-toggle="list" href="#list-users" role="tab" aria-controls="users"><i class="fas fa-users"></i> Users</a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings"><i class="fas fa-cog"></i> Settings</a>
            <a class="list-group-item list-group-item-action" id="btn-logout" href="index.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </div>
        </div>
        <div class="col-9">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
              <div class="row" id="index-users">

              </div>
            </div>
            <div class="tab-pane fade" id="list-users" role="tabpanel" aria-labelledby="list-users-list">
              <div class="row">
                <div class="col-lg-6">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="txt-firstnames">First name</label>
                        <input type="text" class="form-control" id="txt-firstnames">
                        <input type="hidden" class="form-control" id="txt-id">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="txt-lastnames">Last name</label>
                        <input type="text" class="form-control" id="txt-lastnames">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Nickname</label>
                    <input type="text" class="form-control" id="txt-nickname">
                  </div>
                  <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="txt-password">
                  </div>
                  <div class="form-group">
                   <label for="txt-remark">Profile text</label>
                   <textarea class="form-control" id="txt-remark" rows="2"></textarea>
                 </div>
                </div>
                <div class="col-lg-6">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" id="usr-btn-save" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                    <button type="button" id="usr-btn-clear" class="btn btn-primary"><i class="fas fa-broom"></i> Clear</button>
                  </div>
                  <br>
                  <br>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nickname</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody id="user-table">

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
              <div class="form-inline">
                <div class="form-group mb-2">
                  <label for="staticEmail2" class="sr-only">Update password</label>
                  <input type="text" readonly class="form-control-plaintext" value="Update nickname">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <label for="inputPassword2" class="sr-only">Nickname</label>
                  <input type="text" class="form-control" id="txt-config-nickname" placeholder="Nickname">
                </div>
                <button id="btn-set-nickname" type="button" class="btn btn-primary mb-2">Do it!</button>
              </div>
              <div class="form-inline">
                <div class="form-group mb-2">
                  <label for="staticEmail2" class="sr-only">Update password</label>
                  <input type="text" readonly class="form-control-plaintext" value="Update password">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <label for="inputPassword2" class="sr-only">Password</label>
                  <input type="password" class="form-control" id="txt-config-password-old" placeholder="Old Password">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <label for="inputPassword2" class="sr-only">Password</label>
                  <input type="password" class="form-control" id="txt-config-password-new" placeholder="New Password">
                </div>
                <button id="btn-set-password" type="button" class="btn btn-primary mb-2">Do it!</button>
              </div>
            </div>
          </div>
        </div>
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
      if(!localStorage.getItem("token"))
      {
        $(location).attr('href','http://35.232.1.82/users-client/login.php');
      }
      usrLoadTable();
      usrUsers();
    });
  </script>
</html>
