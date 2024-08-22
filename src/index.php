<?php
$servername = "db"; // Nama service MySQL di docker-compose
$username = "user"; // Username MySQL
$password = "password"; // Password MySQL
$database = "mydatabase"; // Nama database

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Proses pencarian
$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM book WHERE (title LIKE '%$search%' OR author LIKE '%$search%') AND status = 'show'";
} else {
    $query = "SELECT * FROM book WHERE status = 'show'";
}

// execute the query
$result = $conn->query($query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <h1>Book List</h1>

        <form method="GET" action="index.php">
            <input type="text" name="search" placeholder="Search by title or author" value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Search</button>
        </form>

        <div class="book-list">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="book-item">
                    <img src="<?php echo $row['img_url']; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                    <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                    <p><strong>Author:</strong> <?php echo htmlspecialchars($row['author']); ?></p>
                    <p><strong>Published Date:</strong> <?php echo htmlspecialchars($row['published_date']); ?></p>
                    <p><strong>Type:</strong> <?php echo htmlspecialchars($row['type']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>

<?php
// Menutup koneksi database
$conn->close();
?>
