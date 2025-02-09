<?php
session_start();
include "connection.php";
include "header.php";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id']; // Get the logged-in user's ID

// Periksa apakah formulir pencarian telah dikirim
if (isset($_POST['search'])) {
    $bookId = $_POST['book_id'];
    $query = "SELECT * FROM book WHERE bookId = ? AND users_id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "ii", $bookId, $userId);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
} else {
    $query = "SELECT * FROM book WHERE users_id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
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
            <div class="p-6">
               <h2 class="text-xl font-semibold mb-4">Search Book</h2>
               <form method="POST" action="" class="mb-4">
                  <input type="text" name="book_id" placeholder="Enter Book ID" class="border p-2 rounded">
                  <button type="submit" name="search" class="bg-blue-900 hover:bg-blue-700 text-white px-4 py-2 rounded">Search</button>
               </form>
               <div class="bg-white p-6 rounded-lg shadow">
                  <table class="w-full text-sm text-left text-gray-500">
                     <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                           <th class="px-6 py-3">ID Buku</th>
                           <th class="px-6 py-3">Nama</th>
                           <th class="px-6 py-3">Photo</th>
                           <th class="px-6 py-3">Author</th>
                           <th class="px-6 py-3">Publisher</th>
                           <th class="px-6 py-3">Number of pages</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php while ($row = mysqli_fetch_array($res)) { ?>
                        <tr class="border-b hover:bg-gray-50">
                           <td class="px-6 py-4"><?php echo $row['bookId']; ?></td>
                           <td class="px-6 py-4"><?php echo $row['name']; ?></td>
                           <td class="px-6 py-4">
                              <img src="<?php echo $row['bookImage']; ?>" height="100" width="100" alt="Book Image">
                           </td>
                           <td class="px-6 py-4"><?php echo $row['author']; ?></td>
                           <td class="px-6 py-4"><?php echo $row['publisher']; ?></td>
                           <td class="px-6 py-4"><?php echo $row['number_of_page']; ?></td>
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
<?php
include "footer.php"
?>
