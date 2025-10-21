<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Domain Finder | GoDaddy Clone</title>
<style>
    body {
        margin: 0;
        font-family: "Segoe UI", Arial, sans-serif;
        background-color: #111;
        color: #fff;
    }

    /* Header */
    header {
        background-color: #00A63F;
        padding: 20px 40px;
        text-align: left;
    }

    header h1 {
        color: #fff;
        font-size: 26px;
        margin: 0;
        letter-spacing: 1px;
        font-weight: bold;
    }

    /* Main Section */
    .hero {
        text-align: center;
        padding: 100px 20px;
        background: linear-gradient(180deg, #111 0%, #1a1a1a 100%);
    }

    .hero h2 {
        font-size: 36px;
        color: #00A63F;
        margin-bottom: 20px;
    }

    .hero p {
        color: #ccc;
        font-size: 18px;
        margin-bottom: 40px;
    }

    .search-box {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .search-box input[type="text"] {
        width: 350px;
        padding: 14px;
        border-radius: 6px;
        border: 1px solid #333;
        outline: none;
        font-size: 16px;
        background-color: #222;
        color: #fff;
        transition: all 0.3s ease;
    }

    .search-box input[type="text"]:focus {
        border-color: #00A63F;
        box-shadow: 0 0 8px rgba(0,166,63,0.5);
    }

    .search-box button {
        background-color: #00A63F;
        color: white;
        border: none;
        padding: 14px 25px;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    .search-box button:hover {
        background-color: #008e36;
    }

    /* Footer */
    footer {
        background-color: #1a1a1a;
        text-align: center;
        padding: 20px;
        color: #888;
        font-size: 14px;
        position: fixed;
        bottom: 0;
        width: 100%;
        border-top: 1px solid #222;
    }

    /* Cart Link */
    .cart-link {
        position: absolute;
        right: 40px;
        top: 25px;
        font-size: 16px;
        background: #fff;
        color: #00A63F;
        padding: 6px 12px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
    }

    .cart-link:hover {
        background: #00A63F;
        color: #fff;
    }
</style>
</head>
<body>

<header>
    <h1>Domain Finder</h1>
    <a href="cart.php" class="cart-link">🛒 View Cart</a>
</header>

<section class="hero">
    <h2>Find the Perfect Domain Name</h2>
    <p>Search millions of domain names and make your idea come alive today.</p>

    <form action="search.php" method="GET" class="search-box">
        <input type="text" name="query" placeholder="Type your domain name here..." required>
        <button type="submit">Search</button>
    </form>
</section>

<footer>
    &copy; <?php echo date("Y"); ?> Domain Finder | A GoDaddy Clone Project
</footer>

</body>
</html>
