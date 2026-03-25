<?php

	require_once __DIR__ . '/includes/session.php';


	logout();											// Call the logout function to terminate session
	header('Location: index.php');						// Redirect to index page
?>
