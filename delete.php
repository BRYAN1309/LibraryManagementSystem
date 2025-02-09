<?php
session_start();
include "connection.php"; // Ensure this file correctly sets $link
include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Book</title>
    <link rel="stylesheet" href="styles/output.css">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>
<div class="fixed inset-0 flex items-center justify-center">
    <div class="border rounded-lg shadow relative max-w-sm bg-white">
        <div class="flex justify-end p-2">
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <div class="p-6 pt-0 text-center">
            <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete this book?</h3>
            <form method="POST" action="">
                <input type="hidden" name="book_id" value="<?php echo isset($_GET['bookId']) ? htmlspecialchars($_GET['bookId']) : ''; ?>">
                <button type="submit" name="delete"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                    Yes, I'm sure
                </button>
                <a href="dashboard.php"
                    class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center">
                    No, cancel
                </a>
            </form>
        </div>
    </div>
</div>

</body>
</html>

<?php
if (isset($_POST["delete"])) {
    if (!empty($_POST['book_id'])) {
        include "connection.php"; // Make sure $link is available

        $book_id = intval($_POST['book_id']); // Ensure it's an integer for safety

        // Prepare the delete statement
        $query = "DELETE FROM book WHERE bookId = ?";
        $stmt = mysqli_prepare($link, $query);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $book_id);
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Book deleted successfully!'); window.location.href='dashboard.php';</script>";
            } else {
                echo "<script>alert('Error deleting book!'); window.location.href='dashboard.php';</script>";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('Failed to prepare the statement!'); window.location.href='dashboard.php';</script>";
        }
    } else {
        echo "<script>alert('No book selected for deletion!'); window.location.href='dashboard.php';</script>";
    }
}
?>
