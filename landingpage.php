<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="cm.css">
</head>

<body>
<?php 
include("dbconn.php");

if(isset($_POST['submit']))
{
    $username = $_POST['un'];
    $password = $_POST['pw'];
    
               $sql = mysql_query("SELECT username,position FROM user_master WHERE username='$username' AND password='$password'");
               $numResult =mysql_num_rows($sql);
              if($numResult!=1)
              {
                echo 'wrong username or password or user type';
              }

              else{
            session_start();
              $_SESSION['username']=$username;
              
              header("location:transferreq.php");
              }
}
    ?>
    <div class="container-fluid">
        <nav id="sideNavParent" class="cm-landing-header">
            <div class="row ">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="col-md-offset-3">Inventory</div>
                </div>
                <div class="col-md-6 visible-md visible-lg"></div>
                <div class="col-md-3 visible-md visible-lg">
                    <div class="col-md-3">
                        <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-user"></span>&nbsp;Login</button>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-question-sign"></span>&nbsp;Info</button>
                    </div>
                </div>
                <div class="visible-xs visible-sm col-sm-6 col-xs-6">
                    <button class="button btn-primary pull-right" data-toggle="collapse" data-target="#menuHide"><span class="glyphicon glyphicon-menu-hamburger"></span></button>
                    <div class="visible-sm visible-xs cm-collapse">
                        <ul id="menuHide" class="collapse" data-parent="#sideNavParent">
                            <li>
                                <a href="#">Test1</a>
                            </li>
                            <li>
                                <a href="#">Test2</a>
                            </li>
                            <li>
                                <a href="#">Test3</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-xs-12 cm-landing-cover">
                <p>Welcome to SKRS Control Panel
                    <br>
                    <button>Go to Control Panel</button>
                </p>
            </div>
        </div>
    </div>

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Login</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="login.png" class="img-responsive cm-login-image">
                        </div>
                    </div>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Username">Username :</label>
                                    <input type="text" class="form-control" name="un" id="Username" placeholder="Username..." required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Username">Password :</label>
                                    <input type="password" class="form-control" name="pw" id="Password" placeholder="Password..." required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="submit">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>