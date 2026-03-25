<?php 

	include 'includes/header.php';


    /*
	 * Retrieve toy information from the database based on the toy ID.
	 * 
	 * @param PDO $pdo       An instance of the PDO class.
	 * @param string $id     The ID of the toy to retrieve.
	 * @return array|null    An associative array containing the toy information, or null if no toy is found.
	 */
	function get_toy(PDO $pdo, string $id = '') {
		                                                    // If no id provided, return all toys
		if ($id === '') {
			$sql = "SELECT * FROM toy;";
			$stmt = pdo($pdo, $sql);
			return $stmt->fetchAll();
		}

		                                                    // SQL query to retrieve toy information based on the toy ID
		$sql = "SELECT * 
			FROM toy
			WHERE toyID= :id;";	                        // :id is a placeholder for value provided later 
		                                                    // It's a parameterized query that helps prevent SQL injection attacks and ensures safer interaction with the database

		                                                    // Execute the SQL query using the pdo function and fetch the result
		$toy = pdo($pdo, $sql, ['id' => $id])->fetch();		// Associative array where 'id' is the key and $id is the value. Used to bind the value of $id to the placeholder :id in SQL query.

		return $toy;                                        // Return the toy information (associative array)
	}

	$toys = get_toy($pdo);                          // Retrieve all toys from the database using provided PDO connection
?>


<section class="toy-catalog">


    <?php foreach ($toys as $toy1): ?>
    <!-- TOY CARD START -->
    <div class="toy-card">
   	    <a href="toy.php?toynum=<?= htmlspecialchars($toy1['toyID'] ?? '') ?>">

			<!-- Display the toy image and update the alt text to the toy name -->
			<img src="<?= htmlspecialchars($toy1['img_src'] ?? '') ?>" alt="<?= htmlspecialchars($toy1['name'] ?? '') ?>">
		</a>

		<!-- Display the name of the toy -->
		<h2><?= htmlspecialchars($toy1['name'] ?? '') ?></h2>

		<!-- Display price of toy -->
		<p>$<?= htmlspecialchars($toy1['price'] ?? '') ?></p>
	  </div>
    <!-- TOY CARD END -->
    <?php endforeach; ?>

</section>

<?php include 'includes/footer.php'; ?>
