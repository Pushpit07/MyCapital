<?php

session_start();
?>

<!DOCTYPE html>

<html lang = "en">
    <head>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/header_buttons.css">
        <script src="https://kit.fontawesome.com/4630ffd9fd.js" crossorigin="anonymous"></script>
        <title></title>
    </head>

    <body style="background-color: grey">
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <a class="navbar-brand" href="#" style="font-size: 25px;">
                <i class="fas fa-coins" style="font-size: 30px;"></i>
                MyCapital
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                        <a class="nav-link" href="header.php" style="font-size: 20px;">Home <span class="sr-only">(current)</span></a>
                      </li>
              
                      <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </li> -->
                </ul>
                    
                    <?php

                    if(isset($_SESSION['userID'])){
                        echo '<form action="logout.inc.php" method="post">
                              <button class="logoutbutton logoutbutton1" type="submit" name="logout-submit">Logout</button>
                              </form>';
                    }
                    
                    else{
                        echo '<form action="login.inc.php" method="post">
                                <input class="email" type="text" name="email" placeholder="  Email" required>
                                <input class="email" type="password" name="pwd" placeholder="  Password" required>
                                <button class="button button1" type="submit" name="login-submit" >Login</button>
                              </form>
                              <a class="signbut" href="signup.php">Signup</a>';
                        }
                    ?>
                    
            </div>
        </nav>
    </body>
</html>