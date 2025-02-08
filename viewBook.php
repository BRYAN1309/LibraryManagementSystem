<?php
session_start();
include "header.php";
include "connection.php";

// Pastikan parameter bookId tersedia
if (!isset($_GET['bookId'])) {
    echo "<script>alert('Buku tidak ditemukan!'); window.location.href='dashboard.php';</script>";
    exit();
}

$bookId = $_GET['bookId'];
$query = "SELECT * FROM book WHERE bookId = ?";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "i", $bookId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$book = mysqli_fetch_assoc($result);

// Jika buku tidak ditemukan
if (!$book) {
    echo "<script>alert('Buku tidak ditemukan!'); window.location.href='dashboard.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku | LMS</title>
    <link rel="stylesheet" href="styles/output.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-bold mb-4">Detail Buku</h2>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <tr><th class="px-6 py-3">Photo</th><td><img src="<?php echo $book['bookImage']; ?>" alt="Book Image" class="w-48 h-64"></td></tr>
                <tr><th class="px-6 py-3">Judul</th><td><?php echo $book['name']; ?></td></tr>
                <tr><th class="px-6 py-3">Author</th><td><?php echo $book['author']; ?></td></tr>
                <tr><th class="px-6 py-3">Publisher</th><td><?php echo $book['publisher']; ?></td></tr>
                <tr><th class="px-6 py-3">Number of Pages</th><td><?php echo $book['number_of_page']; ?></td></tr>
            </table>
            <a href="dashboard.php" class="text-blue-500 hover:underline mt-4 inline-block">Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>
<?php
include "footer.php";
?>
