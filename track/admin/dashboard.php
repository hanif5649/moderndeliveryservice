<?php
session_start();
include "../config.php";

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

// Fetch total packages
$total_sql = "SELECT COUNT(*) as total FROM packages";
$total_result = $conn->query($total_sql);
$total_packages = $total_result->fetch_assoc()['total'];

// Fetch recent packages (limit 5)
$recent_sql = "SELECT * FROM packages ORDER BY id DESC LIMIT 5";
$recent_packages = $conn->query($recent_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

  <!-- Sidebar -->
 <!-- Sidebar -->
<aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-gradient-to-b from-indigo-600 via-purple-600 to-pink-500 text-white transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-50">
  <div class="p-6 text-2xl font-bold border-b border-white/20">Admin Panel</div>
  <nav class="p-4 space-y-3">
    <a href="dashboard.php" class="block py-2 px-4 rounded hover:bg-white/20 transition">Dashboard</a>
    <a href="add_package.php" class="block py-2 px-4 rounded hover:bg-white/20 transition">Add Package</a>
    <a href="packages.php" class="block py-2 px-4 rounded hover:bg-white/20 transition">All Packages</a>
     <a href="add_history.php" class="block py-2 px-4 rounded hover:bg-white/20 transition">History</a>
          <a href="setting.php" class="block py-2 px-4 rounded hover:bg-white/20 transition">Setting</a>
    <a href="logout.php" class="block py-2 px-4 rounded hover:bg-white/20 transition">Logout</a>
  </nav>
</aside>


  <!-- Overlay (mobile) -->
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40 md:hidden"></div>

  <!-- Main Content -->
  <main class="flex-1 md:ml-64 p-6 w-full">

    <!-- Top Bar -->
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Admin Dashboard</h1>
      <!-- Mobile Menu Button -->
      <button id="menuBtn" class="md:hidden bg-blue-600 text-white p-2 rounded focus:outline-none">
        ☰
      </button>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
      <div class="bg-white shadow rounded-lg p-6 text-center">
        <h3 class="text-lg font-semibold text-gray-600">Total Packages</h3>
        <p class="text-3xl font-bold text-blue-700 mt-2"><?php echo $total_packages; ?></p>
      </div>
    </div>

    <!-- Recent Packages -->
    <div class="bg-white shadow rounded-lg p-6">
      <h2 class="text-xl font-bold text-gray-700 mb-4">Recently Added Packages</h2>
      <div class="overflow-x-auto">
        <table class="w-full border-collapse">
          <thead>
            <tr class="bg-gray-200 text-left text-sm font-medium text-gray-600">
              <th class="p-3">Tracking #</th>
              <th class="p-3">Sender</th>
              <th class="p-3">Receiver</th>
              <th class="p-3">Status</th>
              <th class="p-3">Image</th>
            </tr>
          </thead>
          <tbody class="text-sm">
            <?php while($row = $recent_packages->fetch_assoc()): ?>
              <tr class="border-b hover:bg-gray-50">
                <td class="p-3"><?php echo $row['tracking_number']; ?></td>
                <td class="p-3"><?php echo $row['sender_name']; ?></td>
                <td class="p-3"><?php echo $row['receiver_name']; ?></td>
                <td class="p-3"><?php echo $row['status']; ?></td>
                <td class="p-3">
                  <?php if(!empty($row['image'])): ?>
                    <img src="../uploads/<?php echo $row['image']; ?>" alt="Package" class="w-12 h-12 object-cover rounded">
                  <?php else: ?>
                    <span class="text-gray-400">No Image</span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>

  </main>

  <!-- JS for Sidebar Toggle -->
  <script>
    const menuBtn = document.getElementById('menuBtn');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    menuBtn.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
    });

    overlay.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    });
  </script>
</body>
</html>
