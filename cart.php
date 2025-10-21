<?php include("db.php"); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Your Cart | Domain Finder</title>
<style>
    body {
        margin: 0;
        font-family: "Segoe UI", Arial, sans-serif;
        background-color: #111;
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

    table {
        width: 85%;
        margin: 40px auto;
        border-collapse: collapse;
        background: #1a1a1a;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 12px rgba(0,0,0,0.5);
    }

    th, td {
        padding: 16px;
        text-align: center;
        border-bottom: 1px solid #333;
    }

    th {
        background-color: #00A63F;
        color: white;
        font-size: 18px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    td {
        color: #ddd;
        font-size: 16px;
    }

    tr:hover {
        background-color: #222;
    }

    .remove-btn {
        background-color: #ff4444;
        color: white;
        border: none;
        padding: 8px 14px;
        border-radius: 4px;
        cursor: pointer;
        transition: 0.3s;
    }

    .remove-btn:hover {
        background-color: #cc0000;
    }

    .total-row td {
        font-weight: bold;
        font-size: 18px;
        color: #00A63F;
        background-color: #222;
    }

    .buttons {
        text-align: center;
        margin-top: 30px;
    }

    .buttons a, .buttons button {
        background-color: #00A63F;
        color: white;
        padding: 12px 24px;
        margin: 10px;
        border: none;
        border-radius: 6px;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    .buttons a:hover, .buttons button:hover {
        background-color: #008e36;
    }

    .empty {
        text-align: center;
        color: #aaa;
        font-size: 18px;
        background: #1a1a1a;
        padding: 40px;
        width: 60%;
        margin: 60px auto;
        border-radius: 8px;
    }

    footer {
        background-color: #1a1a1a;
        text-align: center;
        padding: 15px;
        color: #777;
        font-size: 14px;
        border-top: 1px solid #222;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
</style>
</head>
<body>

<header>
    <h1>Your Cart</h1>
    <a href="index.php" class="back-link">← Back to Search</a>
</header>

<h2>🛒 Domain Cart</h2>

<?php
$sql = "SELECT cart.id AS cart_id, domains.name, domains.extension, domains.price 
        FROM cart 
        JOIN domains ON cart.domain_id = domains.id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Domain</th>
                <th>Price</th>
                <th>Action</th>
            </tr>";
    $total = 0;

    while ($row = $result->fetch_assoc()) {
        $total += $row['price'];
        echo "<tr>
                <td>{$row['name']}{$row['extension']}</td>
                <td>\${$row['price']}</td>
                <td>
                    <form method='POST' action='remove_from_cart.php'>
                        <input type='hidden' name='cart_id' value='{$row['cart_id']}'>
                        <button type='submit' class='remove-btn'>Remove</button>
                    </form>
                </td>
            </tr>";
    }

    echo "<tr class='total-row'>
            <td>Total</td>
            <td colspan='2'>\$" . number_format($total, 2) . "</td>
          </tr>
          </table>";

    echo "<div class='buttons'>
            <a href='index.php'>🔍 Continue Shopping</a>
            <a href='checkout.php'>💳 Proceed to Checkout</a>
          </div>";
} else {
    echo "<div class='empty'>Your cart is empty. <br><br>Start searching for domains now!</div>";
}
?>

<footer>
    &copy; <?php echo date("Y"); ?> Domain Finder | A GoDaddy Clone Project
</footer>

</body>
</html>
