<?php
session_start();
include "header.php";
include "connection.php";

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('User not logged in! Please log in first.'); window.location.href='login.php';</script>";
    exit();
}

// Get book ID from URL
if (!isset($_GET['bookId']) || empty($_GET['bookId'])) {
    die("Invalid book ID. bookId parameter missing in URL.");
}

$book_id = $_GET['bookId'];
$user_id = $_SESSION['user_id'];

// Fetch book details
$query = "SELECT * FROM book WHERE bookId = ? AND users_id = ?";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "ii", $book_id, $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    echo "<script>alert('Book not found or unauthorized access!'); window.location.href='dashboard.php';</script>";
    exit();
}

$book = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $number_of_page = $_POST['number_of_page'];
    $book_id = $_POST['bookId']; // Get bookId from form submission

    // Update book details
    $updateQuery = "UPDATE book SET name = ?, author = ?, publisher = ?, number_of_page = ? WHERE bookId = ? AND users_id = ?";
    $stmt = mysqli_prepare($link, $updateQuery);
    mysqli_stmt_bind_param($stmt, "sssiii", $name, $author, $publisher, $number_of_page, $book_id, $user_id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Book updated successfully!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Failed to update book.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Dashboard | LMS</title>
      <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="styles/output.css">
   </head>
   <body class="bg-gray-100">
      <div class="flex h-screen">
         <!-- Sidebar -->
         <nav class="w-72 bg-blue-900 text-white flex flex-col">
            <div class="p-5">
               <div class="flex items-center mb-6">
                  <h1 class="text-5xl font-bold">LMS</h1>
               </div>
               <ul class="space-y-4">
                  <li><a href="dashboard.php" class="flex items-center p-2 hover:bg-blue-700 rounded"><i class="fas fa-home w-6"></i><span class="ml-3">Home</span></a></li>
                  <li><a href="addBook.php" class="flex items-center p-2 hover:bg-blue-700 rounded"><i class="fas fa-file-alt w-6"></i><span class="ml-3">Add Book</span></a></li>
                  <li><a href="searchBooks.php" class="flex items-center p-2 hover:bg-blue-700 rounded"><i class="fas fa-palette w-6"></i><span class="ml-3">Search Books</span></a></li>
                 
               </ul>
            </div>
         </nav>
         <!-- Main Content -->
         <div class="flex-1 flex flex-col">
            <!-- Content -->
            <main class="p-6">
               <div class="bg-white p-6 rounded-lg shadow">
                  <h2 class="text-xl font-bold mb-4">Edit Book</h2>
                  <form class="max-w-md mx-auto" action="editBook.php?bookId=<?php echo $book_id; ?>" method="POST">
                     <input type="hidden" name="bookId" value="<?php echo $book_id; ?>">
                     
                     <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="name" value="<?php echo $book['name']; ?>" required class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                        <label class="absolute text-sm text-gray-500 peer-focus:text-blue-600">Book Name</label>
                     </div>
                     
                     <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="author" value="<?php echo $book['author']; ?>" required class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                        <label class="absolute text-sm text-gray-500 peer-focus:text-blue-600">Author Name</label>
                     </div>

                     <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="publisher" value="<?php echo $book['publisher']; ?>" required class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                        <label class="absolute text-sm text-gray-500 peer-focus:text-blue-600">Publisher</label>
                     </div>

                     <div class="relative z-0 w-full mb-5 group">
                        <input type="number" name="number_of_page" value="<?php echo $book['number_of_page']; ?>" required class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                        <label class="absolute text-sm text-gray-500 peer-focus:text-blue-600">Number of Pages</label>
                     </div>

                     <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Edit</button>
                  </form>
               </div>
            </main>
         </div>
      </div>
   </body>
</html>

<?php include "footer.php"; ?>
