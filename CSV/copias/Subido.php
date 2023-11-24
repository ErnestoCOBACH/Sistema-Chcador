<?php
session_start();

// Check if the file path is stored in the session
if (isset($_SESSION["file_path"])) {
    // Access the file path stored in the session
    $filePath = $_SESSION["file_path"];

    // Perform processing on the file or display information
    echo "File received on Page 2: " . $filePath;

    // Redirect to the next page (Page 3 in this case)
    //header("Location: process_page3.php");
    exit();
} else {
    // Handle the case when no file path is found in the session
    echo "No file received on Page 2.";
}
?>
