<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://bankas.lt/app.js"></script>
    <link rel="stylesheet" href="http://bankas.lt/app.css">
    <!-- titlus galima suprogramutoi kad keistusi automatiskai -->
    <title> <?= $title ?? 'Untitled' ?> </title>
</head>
<body>
<nav>
    <ul>
        <li><a class="active" href="#">Home</a></li>
        <li><a class="active" href="#">About</a></li>
        <li><a class="active" href="#">Services</a></li>
        <li><a class="active" href="#">Contact</a></li>
        <li><a class="active" href="#">Feedback</a></li>
        <button>Login</button>
    </ul>
</nav>
