<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            background-color: #f8f8f8;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: relative;
            z-index: 1;
        }

        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            z-index: -1;
        }

        header h1 {
            margin: 0;
            font-weight: 700;
            font-size: 28px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        nav ul {
            list-style-type: none;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #ffcc00;
        }

        .banner {
            background-image: url(../images/banner.jpg);
            color: #fff;
            padding: 50px;
            text-align: center;
            border-bottom: 5px solid #ffcc00;
        }

        .banner h2 {
            font-size: 36px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .btn {
            display: inline-block;
            background: #333;
            color: #fff;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .btn:hover {
            background: #555;
        }

        .features {
            display: flex;
            justify-content: space-around;
            padding: 50px 0;
        }

        .feature {
            text-align: center;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .feature:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
            box-shadow: 0 -2px 5px rgba(0,0,0,0.1);
        }

        footer p {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <header>
        <a class="navbar-brand" href="#"><img src="./source/logo.png" alt="Logo" style="position: absolute; top: 20px; left: 20px; width: 120px; height: auto;"></a>
        <br>
        <br>
        <nav>
            <ul>
                <li><a href="#">Edit</a></li>
                <li><a href="#">About PU e-canteen</a></li>
                <li><a href="#">Develolper contact</a></li>
                <li><a href="#">Privacy and policy</a></li>
            </ul>
        </nav>
    </header>
    
    <section class="banner">
        <h2>PU e-canteen Vendor</h2>
        <p> be a good seller, your food is your mirror.</p>
        <a href="form.php" class="btn">Edit</a>
    </section>
    
    <section class="features">
        <div class="feature">
            <h3>Corner Store</h3>
            <p> Edit your own store!.</p>
        </div>
        <div class="feature">
            <h3>Warung Mamih</h3>
            <p>Eat pricly pay cheaply.</p>
        </div>
        <div class="feature">
            <h3>Day light store</h3>
            <p>Lopen for 24 hours.</p>
        </div>
    </section>
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Our Website. All rights reserved.</p>
    </footer>
</body>
</html>
