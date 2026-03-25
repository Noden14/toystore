<?php

    /* Include header.php (connects to DB) */
    include 'includes/header.php';


    // Retrieve the value of the 'toynum' parameter from the URL query string
    // Example URL: .../toy.php?toynum=0001
    $toy_id = $_GET['toynum'] ?? null;


    /* Retrieve toy and manufacturer information based on toynum */
    function get_toy_with_manufacturer(PDO $pdo, string $toynum) {
        $sql = "SELECT t.*, 
                  m.name AS m_name, m.street AS m_address, m.city AS m_city,
                       m.state AS m_state, m.zip AS m_zip, m.phone AS m_phone, m.contact AS m_contact
                FROM toy t
              LEFT JOIN manuf m ON t.manID = m.manID
                WHERE t.toyID = :toynum";

        $stmt = pdo($pdo, $sql, ['toynum' => $toynum]);
        return $stmt->fetch();
    }


    /* Call function to retrieve toy information */
    $toy = null;
    if ($toy_id !== null) {
        $toy = get_toy_with_manufacturer($pdo, $toy_id);
    }

?>

<section class="toy-details-page container">
    <?php if ($toy): ?>
    <div class="toy-details-container">
        <div class="toy-image">

            <!-- Display the toy image and update the alt text to the toy name -->
            <img src="<?= htmlspecialchars($toy['img_src']) ?>" alt="<?= htmlspecialchars($toy['name']) ?>">

        </div>

        <div class="toy-details">

            <!-- Display the toy name -->
            <h1><?= htmlspecialchars($toy['name']) ?></h1>

            <h3>Toy Information</h3>

            <!-- Display the toy description -->
            <p><strong>Description:</strong> <?= htmlspecialchars($toy['description']) ?></p>

            <!-- Display the toy price -->
            <p><strong>Price:</strong> $ <?= htmlspecialchars($toy['price']) ?></p>

            <!-- Display the toy age range -->
            <p><strong>Age Range:</strong> <?= htmlspecialchars($toy['age_range']) ?></p>

            <!-- Display stock of toy -->
            <p><strong>Number In Stock:</strong> <?= htmlspecialchars($toy['in_stock']) ?></p>

            <br />

            <h3>Manufacturer Information</h3>

            <!-- Display the manufacturer name -->
            <p><strong>Name:</strong> <?= htmlspecialchars($toy['m_name']) ?> </p>

            <!-- Display the manufacturer address -->
            <p><strong>Address:</strong> <?= htmlspecialchars($toy['m_address']) ?>, <?= htmlspecialchars($toy['m_city']) ?>, <?= htmlspecialchars($toy['m_state']) ?> <?= htmlspecialchars($toy['m_zip']) ?></p>

            <!-- Display the manufacturer phone -->
            <p><strong>Phone:</strong> <?= htmlspecialchars($toy['m_phone']) ?></p>

            <!-- Display the manufacturer contact -->
            <p><strong>Contact:</strong> <?= htmlspecialchars($toy['m_contact']) ?></p>
        </div>
    </div>
    <?php else: ?>
        <p>Toy not found.</p>
    <?php endif; ?>
</section>

<?php include 'includes/footer.php'; ?>