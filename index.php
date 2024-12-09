<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="head">Albums</header>
    <main class="grid-container">
    <div class="container">
        <?php
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

        // SQL query to fetch albums
        $sql = "SELECT Albums.name AS album_name, Albums.artist_id as artist_id, Albums.image_url AS image_url 
                FROM Albums";
        $result = $conn->query($sql);

        // Check if any records found
        if ($result->num_rows > 0) {
            // Loop through results and generate HTML
            while ($row = $result->fetch_assoc()) {
                echo '<section class="card">';
                echo '<div class="imagesection">';
                echo '<img src="' . $row["image_url"] .'" width="100px" height="100px" alt="HappyFace" / >';
                echo '</div>';
                echo '<h1>' . $row["album_name"] . '</h1>';
                echo '<a href="artists.php?id=' . $row['artist_id'] . '">View Artist</a>';
                echo '</section>';
            }
        } else {
            echo '<p>No albums found.</p>';
        }

        

        // Close connection
        $conn->close();
        ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Album Collection</p>
    </footer>
</body>
</html>