<?php include("db.php"); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout | Domain Finder</title>
<style>
    body {
        margin: 0;
        font-family: "Segoe UI", Arial, sans-serif;
        background-color: #0d0d0d;
        color: #fff;
    }

    header {
        background-color: #00A63F;
        padding: 20px 40px;
        position: relative;
    }

    header h1 {
        margin: 0;
        color: white;
        font-size: 26px;
    }

    .back-link {
        position: absolute;
        right: 40px;
        top: 20px;
        background: white;
        color: #00A63F;
        padding: 8px 14px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
    }

    .back-link:hover {
        background: #00A63F;
        color: white;
    }

    h2 {
        text-align: center;
        margin-top: 40px;
        color: #00A63F;
        font-size: 32px;
    }

    .checkout-container {
        width: 80%;
        max-width: 900px;
        margin: 40px auto;
        background: #1a1a1a;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0,0,0,0.6);
        padding: 40px;
    }

    form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
    }

    label {
        display: block;
        color: #00A63F;
        font-weight: bold;
        margin-bottom: 6px;
    }

    input, select {
        width: 100%;
        padding: 10px;
        border: 1px solid #333;
        border-radius: 6px;
        background-color: #111;
        color: #fff;
        font-size: 15px;
        transition: 0.3s;
    }

    input:focus, select:focus {
        border-color: #00A63F;
        outline: none;
        box-shadow: 0 0 5px #00A63F;
    }

    .full-width {
        grid-column: span 2;
    }

    .summary {
        margin-top: 40px;
        background: #111;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #222;
    }

    .summary h3 {
        color: #00A63F;
        margin-bottom: 15px;
        font-size: 22px;
    }

    .summary p {
        color: #ccc;
        font-size: 16px;
        margin: 8px 0;
    }

    .summary strong {
        color: #00A63F;
    }

    .pay-btn {
        display: block;
        width: 100%;
        margin-top: 30px;
        background-color: #00A63F;
        color: white;
        border: none;
        padding: 14px 0;
        border-radius: 6px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    .pay-btn:hover {
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
        margin-top: 40px;
    }

    @media (max-width: 700px) {
        form {
            grid-template-columns: 1fr;
        }
        .checkout-container {
            width: 90%;
            padding: 25px;
        }
    }
</style>
</head>
<body>

<header>
    <h1>Checkout</h1>
    <a href="cart.php" class="back-link">← Back to Cart</a>
</header>

<h2>💳 Secure Checkout</h2>

<div class="checkout-container">
    <form action="process_checkout.php" method="POST">
        <div>
            <label>First Name</label>
            <input type="text" name="fname" required>
        </div>

        <div>
            <label>Last Name</label>
            <input type="text" name="lname" required>
        </div>

        <div>
            <label>Email Address</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label>Phone Number</label>
            <input type="text" name="phone" required>
        </div>

        <div class="full-width">
            <label>Billing Address</label>
            <input type="text" name="address" required>
        </div>

        <div>
            <label>City</label>
            <input type="text" name="city" required>
        </div>

        <div>
            <label>Country</label>
            <select name="country" required>
                <option value="">Select Country</option>
                <option value="Pakistan">Pakistan</option>
                <option value="USA">United States</option>
                <option value="UK">United Kingdom</option>
                <option value="India">India</option>
            </select>
        </div>

        <div class="full-width">
            <label>Payment Method</label>
            <select name="payment" required>
                <option value="">Select Payment Method</option>
                <option value="Credit Card">Credit Card</option>
                <option value="PayPal">PayPal</option>
                <option value="Bank Transfer">Bank Transfer</option>
            </select>
        </div>

        <button type="submit" class="pay-btn">Complete Payment 💳</button>
    </form>

    <div class="summary">
        <h3>Order Summary</h3>
        <?php
        $sql = "SELECT domains.name, domains.extension, domains.price 
                FROM cart 
                JOIN domains ON cart.domain_id = domains.id";
        $result = $conn->query($sql);
        $total = 0;

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>{$row['name']}{$row['extension']} - <strong>\${$row['price']}</strong></p>";
                $total += $row['price'];
            }
            echo "<hr><p><strong>Total: \${$total}</strong></p>";
        } else {
            echo "<p>Your cart is empty.</p>";
        }
        ?>
    </div>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> Domain Finder | Secure Checkout
</footer>

</body>
</html>
