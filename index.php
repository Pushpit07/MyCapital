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

    <style type="text/css">
      *{
        font-family: sans-serif;
      }

      body{
        background-image: url('images/money_bills.jpg'); 
        background-size: cover;
      }

        .layer {
          background-color:rgba(0,0,0,0.4); 
          width:100%; 
          height:90%;
        }

        .text{
          size: cover;  
          font-family: Arvo;
          margin-left: 535px;
          padding-top: 140px;
          color: #d1d1e0;
          font-size: 85px;
        }

        .text2{
          size: cover; 
          height:490px; 
          font-family: Arvo;
          margin-left: 650px;
          padding-top: 60px;
          font-size: 40px;
          color: #d1d1e0;
        }

      }
    </style>

    <body>
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
                        <a class="nav-link" href="homepage.php" style="font-size: 20px;">HomePage <span class="sr-only">(current)</span></a>
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
        <div class="layer">
          <div class="text">Welcome to MyCapital</div>
          <div class="text2">Please login or signup to continue!</div>
        </div>
    </body>
</html>
