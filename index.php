<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accomodation Management System</title>
    <link rel="icon" type="image/x-icon" href="img/website_icon.png" />
    <link rel="stylesheet" type="text/css" href="generalStyle1.css?<?=time()?>" />

    <script src="https://kit.fontawesome.com/6bed2e30fa.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <?php 
    header("Location: loginPage.php");
    ?>
    <div class="top-nav">
        <img src="img/website_icon.png" style="float:left">
        <a href="loginPage.html" style="float:right;font-size:20px; padding:0 10px 10px 0;">Login</a>
    </div>

    <div class="container">

        <div class="side-nav">
            <a class="sel" href="guestPage.html"><i class="fa-solid fa-house"></i>Dashboard</a>
            <a href="college.html"><i class="fa-solid fa-building-columns"></i>College</a>
        </div>

        <div class="main-body">
            <div class="sub-top-nav">
                <h2>Dashboard</h2>
                <a href="guestPage.html" style="color: darkblue;"><b>Dashboard</b></a>
            </div>

            <div class="page-info">
                <p>pageInfo</p>
            </div>
        </div>

    </div>

</body>
</html>