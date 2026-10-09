<?php
session_start();
include "../config.php";

// Protect route
if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
$admin = $_SESSION['admin'];

// --- Handle Add History ---
if(isset($_POST['add_history'])){
    $package_id = $_POST['package_id'];
    $status = $_POST['status'];
    $location = $_POST['location'];
    $comment = $_POST['comment'];

    $stmt = $conn->prepare("INSERT INTO package_history (package_id, status, location, comment, changed_by) 
                            VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $package_id, $status, $location, $comment, $admin);

    if($stmt->execute()){
        echo "<script>Swal.fire('Success', 'History added successfully!', 'success');</script>";
    } else {
        echo "<script>Swal.fire('Error', 'Failed to add history!', 'error');</script>";
    }
}

// --- Handle Delete History ---
if(isset($_POST['delete_history'])){
    $id = $_POST['id'];
    $conn->query("DELETE FROM package_history WHERE id=$id");
    echo "<script>Swal.fire('Deleted', 'History entry deleted!', 'success');</script>";
}

// --- Handle Update History ---
if(isset($_POST['update_history'])){
    $id = $_POST['id'];
    $status = $_POST['status'];
    $location = $_POST['location'];
    $comment = $_POST['comment'];

    $stmt = $conn->prepare("UPDATE package_history SET status=?, location=?, comment=?, changed_by=? WHERE id=?");
    $stmt->bind_param("ssssi", $status, $location, $comment, $admin, $id);

    if($stmt->execute()){
        echo "<script>Swal.fire('Updated', 'History updated successfully!', 'success');</script>";
    } else {
        echo "<script>Swal.fire('Error', 'Failed to update!', 'error');</script>";
    }
}

// --- Fetch Packages for Dropdown ---
$packages = $conn->query("SELECT id, tracking_number FROM packages ORDER BY id DESC");

// --- If a package is selected ---
$selected_package = isset($_GET['package_id']) ? $_GET['package_id'] : null;
$histories = [];
if($selected_package){
    $histories = $conn->query("SELECT * FROM package_history WHERE package_id=$selected_package ORDER BY created_at DESC");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Package History</title>
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
    <h1 class="text-2xl font-bold mb-6">📦 Package History Management</h1>

    <!-- Select Package -->
    <form method="get" class="mb-6 flex gap-4">
        <select name="package_id" required class="border p-2 rounded-lg w-full md:w-1/3">
            <option value="">Select a Package</option>
            <?php while($pkg = $packages->fetch_assoc()){ ?>
                <option value="<?= $pkg['id'] ?>" <?= $selected_package==$pkg['id'] ? 'selected' : '' ?>>
                    #<?= $pkg['tracking_number'] ?>
                </option>
            <?php } ?>
        </select>
        <button type="submit" class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white px-6 py-2 rounded-lg shadow hover:opacity-90">
            View History
        </button>
    </form>

    <?php if($selected_package): ?>
    <!-- Add History Form -->
    <form method="post" class="bg-white shadow p-6 rounded-lg mb-8 grid grid-cols-1 md:grid-cols-2 gap-4">
        <input type="hidden" name="package_id" value="<?= $selected_package ?>">

        <div>
            <label class="block text-gray-600">Status</label>
            <select name="status" required class="w-full border p-2 rounded-lg">
                <option>Order Confirmed</option>
                <option>Picked by Courier</option>
                <option>On The Way</option>
                <option>Custom Hold</option>
                <option>Delivered</option>
            </select>
        </div>

        <div>
            <label class="block text-gray-600">Location</label>
            <input type="text" name="location" class="w-full border p-2 rounded-lg">
        </div>

        <div class="md:col-span-2">
            <label class="block text-gray-600">Comment</label>
            <textarea name="comment" rows="2" class="w-full border p-2 rounded-lg"></textarea>
        </div>

        <div class="md:col-span-2">
            <button type="submit" name="add_history" 
                    class="bg-gradient-to-r from-green-400 to-blue-500 text-white px-6 py-2 rounded-lg shadow hover:opacity-90 w-full">
                ➕ Add History
            </button>
        </div>
    </form>

    <!-- History Records -->
    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="w-full border-collapse">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Location</th>
                    <th class="p-3 text-left">Comment</th>
                    <th class="p-3 text-left">Changed By</th>
                    <th class="p-3 text-left">Created At</th>
                    <th class="p-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if($histories && $histories->num_rows > 0): ?>
                    <?php while($row = $histories->fetch_assoc()): ?>
                        <tr class="border-t">
                            <td class="p-3"><?= $row['id'] ?></td>
                            <td class="p-3"><?= $row['status'] ?></td>
                            <td class="p-3"><?= $row['location'] ?></td>
                            <td class="p-3"><?= $row['comment'] ?></td>
                            <td class="p-3"><?= $row['changed_by'] ?></td>
                            <td class="p-3"><?= $row['created_at'] ?></td>
                            <td class="p-3 flex gap-2">
                                <!-- Edit -->
                                <button 
                                    onclick="openEditModal(<?= $row['id'] ?>,'<?= $row['status'] ?>','<?= $row['location'] ?>','<?= $row['comment'] ?>')" 
                                    class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</button>

                                <!-- Delete -->
                                <form method="post" onsubmit="return confirm('Delete this history?');">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <button type="submit" name="delete_history" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="7" class="p-3 text-center">No history found</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-xl font-bold mb-4">Edit History</h2>
        <form method="post" class="grid gap-4">
            <input type="hidden" name="id" id="edit_id">

            <div>
                <label class="block text-gray-600">Status</label>
                <select name="status" id="edit_status" class="w-full border p-2 rounded-lg">
                    <option>Order Confirmed</option>
                    <option>Picked by Courier</option>
                    <option>On The Way</option>
                    <option>Custom Hold</option>
                    <option>Delivered</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-600">Location</label>
                <input type="text" name="location" id="edit_location" class="w-full border p-2 rounded-lg">
            </div>

            <div>
                <label class="block text-gray-600">Comment</label>
                <textarea name="comment" id="edit_comment" rows="2" class="w-full border p-2 rounded-lg"></textarea>
            </div>

            <div class="flex gap-2">
                <button type="submit" name="update_history" 
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg w-full">Update</button>
                <button type="button" onclick="closeEditModal()" 
                        class="bg-gray-400 text-white px-4 py-2 rounded-lg w-full">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditModal(id,status,location,comment){
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_status').value = status;
    document.getElementById('edit_location').value = location;
    document.getElementById('edit_comment').value = comment;
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editModal').classList.add('flex');
}
function closeEditModal(){
    document.getElementById('editModal').classList.add('hidden');
    document.getElementById('editModal').classList.remove('flex');
}
</script>

</body>
</html>
