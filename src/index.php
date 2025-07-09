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

// reCAPTCHA configuration
$recaptcha_site_key = '6LdD_-0qAAAAAAV8ip5yi3rdldxOChsGB3TXaQiw'; // Replace with your site key
$recaptcha_secret_key = '6LdD_-0qAAAAAA6fAeAkqw5I6DKP0EQNbo1Ci1D-'; // Replace with your secret key

// Variable untuk menyimpan status CAPTCHA
$captcha_valid = false;
$captcha_error = '';

// Proses pencarian ketika form disubmit
$search = '';
if (isset($_GET['search'])) {
    // Verifikasi CAPTCHA
    /* if (isset($_GET['g-recaptcha-response'])) {
        $captcha_response = $_GET['g-recaptcha-response']; */
        
        // Kirim permintaan verifikasi ke server reCAPTCHA
        /* $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$recaptcha_secret_key.'&response='.$captcha_response);
        $response_data = json_decode($verify_response); */
        
        /* if ($response_data->success) {
            $captcha_valid = true; */
            $search = $_GET['search'];
            //$search = $conn->real_escape_string($search); // Prevent SQL injection
            $query = "SELECT * FROM book WHERE title LIKE '%$search%' AND status = 'show'";
        /* } else {
            $captcha_error = 'CAPTCHA verification failed. Please try again.';
            $query = "SELECT * FROM book WHERE status = 'show'";
        } */
    /* } else {
        $captcha_error = 'Please complete the CAPTCHA verification.';
        $query = "SELECT * FROM book WHERE status = 'show'";
    } */
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
    <!-- reCAPTCHA API -->
    <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
</head>
<body>
    <div class="container">
        <h1>Book List</h1>

        <form method="GET" action="index.php">
            <input type="text" name="search" placeholder="Search by title" value="<?php echo htmlspecialchars($search); ?>">
            
            <!-- reCAPTCHA widget -->
            <!-- <div class="g-recaptcha" data-sitekey="<?php echo $recaptcha_site_key; ?>"></div> -->
            
            <!-- <?php if (!empty($captcha_error)): ?>
                <div class="error-message"><?php echo $captcha_error; ?></div>
            <?php endif; ?> -->
            
            <button type="submit">Search</button>
        </form>

        <div class="book-list">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="book-item">
                        <img src="<?php echo $row['img_url']; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                        <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                        <p><strong>Author:</strong> <?php echo htmlspecialchars($row['author']); ?></p>
                        <p><strong>Published Date:</strong> <?php echo htmlspecialchars($row['published_date']); ?></p>
                        <p><strong>Type:</strong> <?php echo htmlspecialchars($row['type']); ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No books found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

<?php
// Menutup koneksi database
$conn->close();
?>