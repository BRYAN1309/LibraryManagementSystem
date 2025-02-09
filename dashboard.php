<?php
session_start();
include "header.php";
include "connection.php";

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('User not logged in! Please log in first.'); window.location.href='login.php';</script>";
    exit();
}

// Get the logged-in user ID
$user_id = $_SESSION['user_id'];

// Fetch books belonging to the logged-in user
$query = "SELECT * FROM book WHERE users_id = ?";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard | LMS</title>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
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
          <li><a href="#" class="flex items-center p-2 hover:bg-blue-700 rounded"><i class="fas fa-home w-6"></i><span class="ml-3">Home</span></a></li>
          <li><a href="addBook.php" class="flex items-center p-2 hover:bg-blue-700 rounded"><i class="fas fa-file-alt w-6"></i><span class="ml-3">Add Book</span></a></li>
          <li><a href="searchBooks.php" class="flex items-center p-2 hover:bg-blue-700 rounded"><i class="fas fa-palette w-6"></i><span class="ml-3">Search Books</span></a></li>
        </ul>
      </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <main class="p-6">
        <div class="bg-white p-6 rounded-lg shadow">
          <h2 class="text-xl font-semibold mb-4">Book List</h2>
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">ID Buku</th>
                  <th scope="col" class="px-6 py-3">Nama</th>
                  <th scope="col" class="px-6 py-3">Photo</th>
                  <th scope="col" class="px-6 py-3">Author</th>
                  <th scope="col" class="px-6 py-3">Publisher</th>
                  <th scope="col" class="px-6 py-3">Number of Pages</th>
                  <th scope="col" class="px-6 py-3 text-center w-12">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row = mysqli_fetch_array($res)) { ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                  <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo $row['bookId']; ?>
                  </td>
                  <td class="px-6 py-4">
                    <?php echo $row['name']; ?>
                  </td>
                  <td class="px-6 py-4">
                    <img src="<?php echo $row['bookImage']; ?>" height="100" width="100" alt="Book Image">
                  </td>
                  <td class="px-6 py-4">
                    <?php echo $row['author']; ?>
                  </td>
                  <td class="px-6 py-4">
                    <?php echo $row['publisher']; ?>
                  </td>
                  <td class="px-6 py-4">
                    <?php echo $row['number_of_page']; ?>
                  </td>
                  <td class="px-6 py-4 text-center">
                    <div class="flex justify-center space-x-4 lef">
                      <a href="editBook.php?bookId=<?php echo $row['bookId']; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> 
                      <a href="viewBook.php?bookId=<?php echo $row['bookId']; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a> 
                      <a href="delete.php?bookId=<?php echo $row['bookId']; ?>" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                    </div>
                  </td>
                </tr>
                <?php } ?>
                <?php if (mysqli_num_rows($res) == 0) { ?>
                <tr>
                  <td colspan="7" class="px-6 py-4 text-center text-gray-500">No books found</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>
  </div>

  <?php include "footer.php"; ?>
</body>
</html>
