<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

    include("../includes/functions.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_SESSION["focused"] == md5("reg")) { //reg
            if($_POST["user_reg"] != "" AND $_POST["pass_reg"] != "" AND $_POST["pass2_reg"] != "" AND $_POST["email"] != "") {
                if($_POST["pass_reg"] == $_POST["pass2_reg"]) {
                    $query = "INSERT INTO 
                                users(id, 
                                      username,         
                                      pass, 
                                      email, 
                                      reg_date,
                                      profile_pic) 
                            VALUES(0, 
                                   '".$_POST["user_reg"]."', 
                                   '".md5($_POST["pass_reg"])."', 
                                   '".$_POST["email"]."', 
                                   CURRENT_TIMESTAMP,
                                   'unknown')";
                    $q = $mysqli->query($query);
                    $_SESSION["new_reg"] = md5(true);
                } else header("location: login.php");
            } else header("location: login.php");
        } else if($_SESSION["focused"] == md5("login")) { //login
            if($_POST["user"] != "" AND $_POST["pass"] != "") {
                $query = $mysqli->query("SELECT * FROM users WHERE username = '".$_POST["user"]."' AND pass = '".md5($_POST["pass"])."'");
                if($query->num_rows != 0){
                    $rows = $query->fetch_array(MYSQLI_ASSOC);

                    $_SESSION["logged"] = md5(true);
                    $_SESSION["id"] = $rows["id"];
                    $_SESSION["new_login"] = md5(true);

                    header("location: ../index.php");
                } else {
                    $_SESSION["incorrect_login"] = md5(true);
                }
            } else header("location: login.php");
        }
        unset($_SESSION["focused"]);
    }
    if(isset($_SESSION["logged"]) && $_SESSION["logged"] == md5(true)) header("location: ../index.php");

    $_SESSION["focused"] = md5("login");
?>

<html>
    <head>
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/bootstrap.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>

        <link rel="icon" href="../img/login.png" />

        <title>Login</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-xs-0"></div>
                <div switched="false" class="floating-div col-md-4 col-xs-12">
                    <form action="login.php" method="post">
                        <h1 class="login-title">
                            <img src="../img/torrent.png" align="absmiddle" width="64" />
                            madranszkiSeeds
                        </h1>
                        <h3 class="login-subtitle">Sign In</h3>

                        <div id="login" focused="true">
                            <input type="hidden" class="from" name="from" value="<?php echo md5("login"); ?>" />
                            <input type="text" name="user" placeholder="Username" class="login-input" />
                            <input type="password" name="pass" placeholder="Password" class="login-input" /><br>

                            <input type="submit" name="submit" value="Login" class="login-submit" /><br>

                            <div class="wrong-input"></div>

                            <h4 id="showreg">Create an account</h4>
                        </div>

                        <div id="reg" focused="false">
                            <input type="hidden" class="from" name="from_reg" value="<?php echo md5("reg"); ?>" />
                            <input type="text" name="user_reg" placeholder="Username" class="login-input" />
                            <input type="password" name="pass_reg" placeholder="Password" class="login-input" />
                            <input type="password" name="pass2_reg" placeholder="Repeat password" class="login-input" />
                            <input type="email" name="email" placeholder="Your e-mail address" class="login-input" /><br>

                            <input type="submit" name="submit" value="Register" class="login-submit" /><br>

                            <div class="wrong-input">Passwords does not match</div>

                            <h4 id="showlogin">Already registered? Log in</h4>
                        </div>
                    </form>
                </div>
                <div id="aside" class="col-md-4 col-xs-0">
                    <?php
                        if(isset($_SESSION["incorrect_login"]) AND $_SESSION["incorrect_login"] == md5(true)) {
                            echo "<div class='aside-box-red' style='margin-top: 180%'><img class='close-aside-box' width='20' src='../img/close.png'>Invalid username or password</div>";
                        }
                        if(isset($_SESSION["new_reg"])) {
                            echo "<div class='aside-box-green' style='margin-top: 180%'><img class='close-aside-box' width='20' src='../img/close.png'>Your registration was successfull! You can now log in.</div>";
                        }
                        unset($_SESSION["new_reg"]);
                        unset($_SESSION["incorrect_login"]);
                    ?>
                </div>
            </div>
            <div class="row" id="aside-m" style="width: 100%">
                <div class="col-xs-12">
                    <?php
                    if(isset($_SESSION["incorrect_login"]) AND $_SESSION["incorrect_login"] == md5(true)) {
                        echo "<div class='aside-box-red'><img class='close-aside-box' width='20' src='../img/close.png'>Invalid username or password</div>";
                        $_SESSION["incorrect_login"] = null;
                    }
                    if(isset($_SESSION["new_reg"]) AND $_SESSION["new_reg"] == md5(true)) {
                        echo "<div class='aside-box-green'><img class='close-aside-box' width='20' src='../img/close.png'>Your registration was successfull! You can now log in.</div>";
                        $_SESSION["new_reg"] = null;
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
