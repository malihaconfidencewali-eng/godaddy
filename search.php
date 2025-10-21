<?php
include("db.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #111;
            color: white;
            padding: 30px;
        }
        h2 {
            text-align: center;
            color: #00A63F;
        }
        table {
            width: 85%;
            margin: 30px auto;
            border-collapse: collapse;
            background: #1a1a1a;
            box-shadow: 0 0 10px rgba(0,0,0,0.4);
        }
        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #333;
        }
        th {
            background-color: #00A63F;
            color: white;
            text-transform: uppercase;
        }
        tr:hover {
            background-color: #222;
        }
        button {
            background-color: #00A63F;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #008e36;
        }
        a {
            color: #00A63F;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .no-results {
            text-align: center;
            padding: 20px;
            background: #1a1a1a;
            width: 60%;
            margin: 30px auto;
            border-radius: 6px;
            color: #ccc;
        }
    </style>
</head>
<body>
    <h2>Search Results for "<?php echo htmlspecialchars($_GET['query']); ?>"</h2>

    <table>
        <tr>
            <th>Domain</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php
        $input = strtolower(trim($_GET['query']));
        $input = $conn->real_escape_string($input);

        $name = $input;
        $extension = '';

        // If input has dot, separate name and extension
        if (strpos($input, '.') !== false) {
            list($name, $ext) = explode('.', $input, 2);
            $extension = '.' . $ext;
        }

        // Build SQL query
        if ($extension) {
            $sql = "SELECT * FROM domains WHERE name = '$name' AND extension = '$extension'";
        } else {
            $sql = "SELECT * FROM domains WHERE name LIKE '%$name%'";
        }

        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}{$row['extension']}</td>
                        <td>\${$row['price']}</td>
                        <td>
                            <form method='POST' action='add_to_cart.php'>
                                <input type='hidden' name='domain_id' value='{$row['id']}'>
                                <button type='submit'>Add to Cart</button>
                            </form>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No domains found. Try another search!</td></tr>";
        }
        ?>
    </table>

    <div style="text-align:center;">
        <a href='index.php'>🔍 New Search</a> | 
        <a href='cart.php'>🛒 View Cart</a>
    </div>
</body>
</html>
