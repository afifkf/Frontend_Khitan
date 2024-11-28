<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard with Sidebar</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #2c3e50;
            color: white;
            padding-top: 20px;
            position: fixed; /* Keeps sidebar fixed on scroll */
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 15px;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        .content {
            margin-left: 250px; /* Adjust this margin to match the width of the sidebar */
            padding: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>My Sidebar</h2>
        <a href="#home">Home</a>
        <a href="#services">Services</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
    </div>

</body>
</html>
