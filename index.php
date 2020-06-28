<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
    
    <div class = "container">
        
        <div class="row justify-content-md-center text-center">
            <?php
                include("./assets/inc/conn.php");
                if(isset($_POST["login_email"]) && isset($_POST["login_password"]))
                {
                    if(!empty($_POST["login_email"]) && !empty($_POST["login_password"]))
                    {
                        $email = $_POST["login_email"];
                        $password = $_POST["login_password"];

                        $sql_login = "SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'";
                        $query_login = mysqli_query($conn, $sql_login);
                        if(mysqli_num_rows($query_login)){
                            $fetch_login = mysqli_fetch_assoc($query_login);
                            $_SESSION['user_id'] = $fetch_login['id'];
                            header("location: home.php");
                        }else{
                            $sql_login_admin = "SELECT * FROM admin WHERE email = '".$email."' AND password = '".$password."'";
                            $query_login_admin = mysqli_query($conn, $sql_login_admin);
                            if(mysqli_num_rows($query_login_admin)){
                                $fetch_login_admin = mysqli_fetch_assoc($query_login_admin);
                                $_SESSION['admin'] = $fetch_login_admin['id'];
                                header("location: ./admin/record_borrow_out.php");
                            }else{
                                echo "<script lang = 'javascript'>alert('Incorrect Login Details');</script>";
                            }
                        }
                    }else
                    {
                        echo "<script lang = 'javascript'>alert('Complete Filling Form Before Submitting');</script>";
                    }
                }
            
            ?>
            <form action="index.php" method = "POST" class = "login-form" id = "login" onsubmit = "loginValidation()">
                <div>
                    <h1>Login</h1>
                </div>
                <div>
                    <input type="text" name="login_email" id="email" class = "form-control" placeholder = "Enter Email">
                </div>
                <div>
                    <input type="password" name="login_password" id="password" class = "form-control" placeholder= "Enter Password">
                </div>
                <div>
                    <button class = "btn btn-outline-light bg_black">Login</button>
                </div>
            </form>
            
        </div>

    </div>

    <script src= "./assets/bootstrap/js/bootstrap.js"></script>
    <script src= "./assets/js/jquery-3.4.1.js"></script>
    <script src= "./assets/js/script.js"></script>
    <script src= "./assets/js/common.min.js"></script>
    <script src= "./assets/js/custom.min.js"></script>
    <script src= "./assets/js/settings.js"></script>
    <script src= "./assets/js/gleek.js"></script>
    <script src= "./assets/js/styleSwitcher.js"></script>
</body>
</html>