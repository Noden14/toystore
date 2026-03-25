<?php

    include 'includes/header.php';



            
	require_login($logged_in);                              // Redirect user if not logged in
	$username = $_SESSION['username'];                      // Retrieve the username from the session data
    $custID   = $_SESSION['custID'];                        // Retrieve the custID from the session data



    function get_orders(PDO $pdo, string $custID) {
        $sql = "SELECT o.*, t.name AS toy_name, t.img_src AS toy_image
                FROM orders o
                LEFT JOIN toy t ON o.toyID = t.toyID
                WHERE o.custID = :custID
                ORDER BY o.date_ordered DESC";

        return pdo($pdo, $sql, ['custID' => $custID])->fetchAll();
    }



    $orders = get_orders($pdo, $custID);

	
?>

<main class="container profile-page">

    <h1>Welcome, <?= htmlspecialchars($username) ?>!</h1>

    <?php if (!$orders): ?>
        <div class="no-orders">
            <p>You have no orders yet.</p>
        </div>

    <?php else: ?>
        <div class="orders-container">

            <?php foreach ($orders as $order): ?>

                <div class="order-card">

                    <img src="<?= htmlspecialchars($order['toy_image']) ?>" alt="<?= htmlspecialchars($order['toy_name']) ?>">

                    <div class="order-info">

                        <p><strong>Order Number:</strong> <?= htmlspecialchars($order['orderID']) ?></p>

                        <p><strong>Toy:</strong> <?= htmlspecialchars($order['toy_name']) ?></p>

                        <p><strong>Quantity:</strong> <?= htmlspecialchars($order['quantity']) ?></p>

                        <p><strong>Date Ordered:</strong> <?= htmlspecialchars($order['date_ordered']) ?></p>

                        <p><strong>Delivery Address:</strong> <?= htmlspecialchars($order['deliv_addr']) ?></p>

                        <p><strong>Delivery Date:</strong> <?= htmlspecialchars($order['date_deliv'] ?? 'Pending') ?></p>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</main>

<?php include 'includes/footer.php'; ?>