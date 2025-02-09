<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/output.css">
</head>
<body>
<div class="flex-1 flex flex-col">
   <header class="flex items-center justify-between bg-white p-4 shadow">
      <div class="flex items-center">
         <h1 class=" font-bold text-4xl">Dashboard</h1>
         <div class=" font-bold bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-700 inline-block text-center ml-6 " >
         <?php
              echo "Welcome ".$_SESSION['username'];
             ?>
         </div>
      </div>
      <div class="flex items-center space-x-4">
      <a href="logout.php" class="bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-700 inline-block text-center"> Log Out</a>
      </div>
   </header>
</div>
</body>
</html>

