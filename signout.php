<?php
session_start();
session_destroy(); // Clear all login data
header("Location: index.html");
exit;
?>
