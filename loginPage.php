<!DOCTYPE HTML>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" type="image/x-icon" href="img/website_icon.png" />
    <link rel="stylesheet" type="text/css" href="login.css?<?= time()?>" />
    <script src="actions.js?<?= time()?>"></script>

    <script src="https://kit.fontawesome.com/6bed2e30fa.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    session_start();
    if ($_SESSION["role"] == "admin") {
        $link = "admin/index.php";
        echo "Your Are Logged In<br>";
        die("<a href={$link}> Back To Main Menu </a>");
    } else if ($_SESSION["role"] == "manager") {
        $link = "manager/index.php";
        echo "Your Are Logged In<br>";
        die("<a href={$link}> Back To Main Menu </a>");
    } else if ($_SESSION["role"] == "student") {
        $link = "student/index.php";
        echo "Your Are Logged In<br>";
        die("<a href={$link}> Back To Main Menu </a>");
    }
    ?>

    <div class="login">
        <div class="loginContainer">

            <form id="loginForm" name="loginForm" method="POST" action="backendLogin.php" onsubmit="return validateLogin()">
                <h2>Login</h2>

                <label><b>Username</b></label>
                <input type="text" id="username" name="username" placeholder="Enter Username" required />

                <label><b>Password</b></label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required />

                <label><b>Select User Type</b></label>
                <select id="userRole" name="role">
                    <option value="admin">Admin</option>
                    <option value="manager">Accomodation Manager</option>
                    <option selected value="student">Student</option>
                </select>
                <button type="submit" class="blueSubmit">Login</button>

            </form>
        </div>
    </div>

</body>

</html>
<HTML>