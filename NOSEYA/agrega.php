<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["csvData"])) {

    // Decode JSON data
    $csvData = json_decode($_POST["csvData"], true);

    // Add your database connection code here

    // Example: Insert data into a hypothetical "your_table" table
    foreach ($csvData as $row) {
        //$query = "INSERT INTO your_table (column1, column2, column3) VALUES (?, ?, ?)";
        //$stmt = $pdo->prepare($query);
        //$stmt->execute($row);
        echo $csvData[1][1]."<br>";
    }

    echo "<h2>Data added to the database successfully!</h2>";

} else {
    echo "Invalid request.";
}
?>
