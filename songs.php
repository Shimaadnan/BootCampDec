<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="head">Songs</header>
<?php
// Get the artist ID from the query parameter
if (isset($_GET['id'])) {
    $artistId = intval($_GET['id']); 
    echo "Artist ID: " . $artistId;

     // Database connection
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "BootCampDec";

     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);

     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }

     // SQL query to fetch artists
     $sql = "SELECT Songs.name AS song_name, Songs.duration AS song_duration
             FROM Artists
             WHERE Artists.ID = $artistId";

     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
        // Loop through results and generate HTML
        while ($row = $result->fetch_assoc()) {
        echo '<div class="song-info">';
        echo '<h2>' . $row['song_name'] . '</h2>';
        echo '<p>Duration: ' . $row['song_duration'] . '</p>';
        echo '</div>';
        }
    } else {
        echo '<p>No artists found.</p>';
    }

} else {
    echo "No artist selected.";
}
?>
</body>
</html>