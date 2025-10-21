<?php
include("db.php");
session_start();

// Clear the cart after checkout (optional)
$conn->query("DELETE FROM cart");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Order Successful | Domain Finder</title>
<style>
    body {
        margin: 0;
        font-family: "Segoe UI", Arial, sans-serif;
        background-color: #0d0d0d;
        color: #fff;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    header {
        background-color: #00A63F;
        padding: 20px 40px;
        text-align: center;
    }

    header h1 {
        color: white;
        font-size: 26px;
        margin: 0;
    }

    .container {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 40px 20px;
    }

    .success-icon {
        font-size: 100px;
        color: #00A63F;
        animation: pop 0.6s ease;
    }

    @keyframes pop {
        0% { transform: scale(0.5); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }

    h2 {
        font-size: 36px;
        margin: 20px 0 10px;
        color: #00A63F;
    }

    p {
        color: #ccc;
        font-size: 18px;
        margin: 10px 0;
    }

    .order-summary {
        background: #1a1a1a;
        border: 1px solid #222;
        border-radius: 8px;
        padding: 25px;
        width: 80%;
        max-width: 600px;
        margin-top: 30px;
        text-align: left;
    }

    .order-summary h3 {
        color: #00A63F;
        border-bottom: 1px solid #333;
        padding-bottom: 10px;
        margin-bottom: 15px;
    }

    .order-summary p {
        margin: 8px 0;
        color: #ccc;
    }

    .btn {
        display: inline-block;
        margin-top: 30px;
        background-color: #00A63F;
        color: white;
        padding: 12px 28px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 17px;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn:hover {
        background-color: #009233;
        box-shadow: 0 0 10px #00A63F;
    }

    footer {
        background-color: #1a1a1a;
        text-align: center;
        padding: 15px;
        color: #777;
        font-size: 14px;
        border-top: 1px solid #222;
    }
</style>
</head>
<body>

<header>
    <h1>Domain Finder</h1>
</header>

<div class="container">
    <div class="success-icon">✅</div>
    <h2>Payment Successful!</h2>
    <p>Thank you for your purchase. Your domain order has been placed successfully.</p>

    <div class="order-summary">
        <h3>Order Details</h3>
        <p><strong>Customer:</strong> <?php echo htmlspecialchars($_POST['fname'] . " " . $_POST['lname']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($_POST['email']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($_POST['phone']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($_POST['address']); ?></p>
        <p><strong>City:</strong> <?php echo htmlspecialchars($_POST['city']); ?></p>
        <p><strong>Country:</strong> <?php echo htmlspecialchars($_POST['country']); ?></p>
        <p><strong>Payment Method:</strong> <?php echo htmlspecialchars($_POST['payment']); ?></p>
    </div>

    <a href="index.php" class="btn">Search More Domains</a>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> Domain Finder | All Rights Reserved
</footer>

</body>
</html>
