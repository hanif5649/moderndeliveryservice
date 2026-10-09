<?php
session_start();
include "../config.php";

// Protect route
if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$admin = $_SESSION['admin'];
$msg = "";

// Fetch admin record
$sql = "SELECT * FROM admin WHERE username='$admin' LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$admin_id = $row['id'];
$stored_password = $row['password'];

// Handle password change
if(isset($_POST['change_password'])){
    $current = md5($_POST['current_password']);
    $new = md5($_POST['new_password']);
    $confirm = md5($_POST['confirm_password']);

    if($current !== $stored_password){
        $msg = "<script>Swal.fire('Error','Current password is incorrect!','error');</script>";
    } elseif($new !== $confirm){
        $msg = "<script>Swal.fire('Error','New passwords do not match!','error');</script>";
    } else {
        $update = $conn->query("UPDATE admin SET password='$new' WHERE id='$admin_id'");
        if($update){
            $msg = "<script>Swal.fire('Success','Password changed successfully!','success');</script>";
        } else {
            $msg = "<script>Swal.fire('Error','Something went wrong!','error');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Sidebar -->
<aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-gradient-to-b from-purple-600 via-pink-500 to-red-500 text-white transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-50">
  <div class="p-6 text-2xl font-bold border-b border-white/20">Admin Panel</div>
  <nav class="p-4 space-y-3">
    <a href="dashboard.php" class="block py-2 px-4 rounded hover:bg-white/20 transition">Dashboard</a>
    <a href="add_package.php" class="block py-2 px-4 rounded hover:bg-white/20 transition">Add Package</a>
    <a href="packages.php" class="block py-2 px-4 rounded hover:bg-white/20 transition">All Packages</a>
     <a href="add_history.php" class="block py-2 px-4 bg-white/20">History</a>
    <a href="logout.php" class="block py-2 px-4 rounded hover:bg-white/20 transition">Logout</a>
  </nav>
</aside>

<!-- Overlay (mobile) -->
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40 md:hidden"></div>

<!-- Main Content -->
<main class="flex-1 md:ml-64 p-6 w-full">

  <!-- Top Bar -->
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">All Packages</h1>
    <button id="menuBtn" class="md:hidden bg-gradient-to-r from-pink-600 to-red-500 text-white p-2 rounded">
      ☰
    </button>
  </div>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">⚙️ Settings - Change Password</h1>

    <?= $msg ?>

    <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg mx-auto">
        <form method="post" class="grid gap-4">
            <div>
                <label class="block text-gray-600 mb-1">Current Password</label>
                <input type="password" name="current_password" required class="w-full border p-2 rounded-lg">
            </div>

            <div>
                <label class="block text-gray-600 mb-1">New Password</label>
                <input type="password" name="new_password" required class="w-full border p-2 rounded-lg">
            </div>

            <div>
                <label class="block text-gray-600 mb-1">Confirm New Password</label>
                <input type="password" name="confirm_password" required class="w-full border p-2 rounded-lg">
            </div>

            <button type="submit" name="change_password"
                    class="bg-gradient-to-r from-green-400 to-blue-500 text-white px-6 py-2 rounded-lg shadow hover:opacity-90">
                🔑 Change Password
            </button>
        </form>
    </div>
</div>


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
