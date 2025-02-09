<?php
   session_start();
   include  "header.php";
   include "connection.php"
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
                  <h2 class="text-xl font-bold mb-4">Add Book</h2>
                  <form class="max-w-md mx-auto" action="addBook.php" method="POST" enctype="multipart/form-data">
                     <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="name"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label  class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Books Name</label>
                     </div>
                     <div class="relative z-0 w-full mb-5 group">
                        <input type="file" name="bookImage"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label  class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Books Image</label>
                     </div>
                     <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="author"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label  class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Author Name</label>
                     </div>
                     <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="publisher"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Publisher</label>
                     </div>
                     <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                           <input type="text" name="number_of_page"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                           <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Number Of Page</label>
                        </div>
                     </div>
                     
                     <button type="submit" name="submit"class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                  </form>
               </div>
            </main>
         </div>
      </div>
   </body>
</html>
<?php
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('User not logged in! Please log in first.'); window.location.href='login.php';</script>";
    exit();
}

if (isset($_POST["submit"])) {
   $tm = md5(time());
   $fnm = $_FILES["bookImage"]["name"];
   $dst = "./books_image/".$tm.$fnm;
   $dst1 = "books_image/".$tm.$fnm;
   move_uploaded_file($_FILES["bookImage"]["tmp_name"], $dst);
    $user_id = $_SESSION['user_id']; // Get logged-in user's ID


    $name = mysqli_real_escape_string($link, $_POST['name']);
    $author = mysqli_real_escape_string($link, $_POST['author']);
    $publisher = mysqli_real_escape_string($link, $_POST['publisher']);
    $number_of_page = mysqli_real_escape_string($link, $_POST['number_of_page']);

    if (move_uploaded_file($_FILES["bookImage"]["tmp_name"], $dst)) {
      echo "File uploaded successfully!";
    } else {
      echo "File upload failed!";
    }
    // Debug: Check if users_id exists
    $user_check = mysqli_query($link, "SELECT id FROM users WHERE id = '$user_id'");
    if (mysqli_num_rows($user_check) == 0) {
        echo "<script>alert('Error: User ID does not exist in the users table.');</script>";
        exit();
    }

    // Insert query
    $query = "INSERT INTO book (name, bookImage, author, publisher, number_of_page, users_id) 
              VALUES ('$name', '$dst1','$author', '$publisher', '$number_of_page', '$user_id')";

    if (mysqli_query($link, $query)) {
        echo "<script>alert('Book Added Successfully!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "Error: " . mysqli_error($link); // Show SQL error
    }
}
?>
<?php
include "footer.php";
?>