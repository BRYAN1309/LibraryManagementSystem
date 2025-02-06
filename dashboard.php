

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
          <div class="ml-4">
            <p class="text-sm">Welcome,</p>
          </div>
        </div>
        <ul class="space-y-4">
          <li><a href="#" class="flex items-center p-2 hover:bg-blue-700 rounded"><i class="fas fa-home w-6"></i><span class="ml-3">Home</span></a></li>
          <li><a href="#" class="flex items-center p-2 hover:bg-blue-700 rounded"><i class="fas fa-file-alt w-6"></i><span class="ml-3">Forms</span></a></li>
          <li><a href="#" class="flex items-center p-2 hover:bg-blue-700 rounded"><i class="fas fa-palette w-6"></i><span class="ml-3">UI Elements</span></a></li>
          <li><a href="#" class="flex items-center p-2 hover:bg-blue-700 rounded"><i class="fas fa-table w-6"></i><span class="ml-3">Tables</span></a></li>
          <li><a href="#" class="flex items-center p-2 hover:bg-blue-700 rounded"><i class="fas fa-chart-bar w-6"></i><span class="ml-3">Data Presentation</span></a></li>
        </ul>
      </div>
      <div class="mt-auto p-5">
        <a href="#" class="flex items-center p-2 hover:bg-blue-700 rounded"><i class="fas fa-sign-out-alt w-6"></i><span class="ml-3">Log out</span></a>
      </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Header -->
      <header class="flex items-center justify-between bg-white p-4 shadow">
        <div class="flex items-center">
          <button class="text-gray-500 mr-4 text-2xl"><i class="fas fa-bars"></i></button>
          <h1 class="text-lg font-bold">Dashboard</h1>
        </div>
        <div class="flex items-center space-x-4">
          <input 
            type="text" 
            placeholder="Search for..." 
            class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200"
          />
          <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Log Out</button>
         
          <img src="/profile.jpg" alt="User Profile" class="w-8 h-8 rounded-full" />
        </div>
      </header>

      <!-- Content -->
      <main class="p-6">
        <div class="bg-white p-6 rounded-lg shadow">
          <h2 class="text-xl font-semibold mb-4">Plain Page</h2>
          <p>Add content to the page...</p>
        </div>
      </main>
    </div>
  </div>
</body>
</html>
