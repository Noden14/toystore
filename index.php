<?php 

	include 'includes/header.php';


    /*
 	 * Retrieve all toys from the database.
 	 * 
 	 * @param PDO $pdo       An instance of the PDO class.
 	 * @return array          An array of associative arrays containing toy information.
 	 */
    function get_toy(PDO $pdo) {
        // SQL query to retrieve all toys
        $sql = "SELECT * FROM toy;";

        // Execute the SQL query using the pdo function and fetch all results
        $toys = pdo($pdo, $sql)->fetchAll();

        return $toys; // Return array of toys
    }

    $toys = get_toy($pdo); // Retrieve all toys from the database using provided PDO connection
?>


<section class="toy-catalog">


    <!-- TOY CARD START -->
    <?php foreach ($toys as $toy1): ?>
    <div class="toy-card">
    	<!-- Link to the toy details page with toy ID -->
    	<a href="toy.php?toynum=<?= htmlspecialchars($toy1['toyID'] ?? '') ?>">

    		<!-- Display the toy image and alt text using toy name -->
    		<img src="<?= htmlspecialchars($toy1['image'] ?? '') ?>" alt="<?= htmlspecialchars($toy1['name'] ?? '') ?>">
    	</a>

    	<!-- Display the toy name -->
    	<h2><?= htmlspecialchars($toy1['name'] ?? '') ?></h2>

    	<!-- Display the toy price -->
    	<p>$<?= htmlspecialchars($toy1['price'] ?? '') ?></p>
    </div>
    <?php endforeach; ?>
    <!-- TOY CARD END -->


    <!-- TO-DO: Display the rest of the toys in the database

                Hint 1: You could copy/paste the toy-card block for each toy, but this would be repetitive.

                Hint 2: Instead, how could you modify the get_toy() function so it returns ALL toys
                        from the database instead of just one?

                Hint 3: Once you have an array of toys, how could you use a PHP loop to display
                        each toy inside a toy-card?
    -->



</section>

<?php include 'includes/footer.php'; ?>
