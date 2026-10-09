<?php
session_start();
include "../config.php";

function generateTrackingNumber() {
    return "REM-" . rand(10000000, 99999999);
}

if (isset($_POST['add_package'])) {
    $tracking_number = generateTrackingNumber();
    $sender_name = $_POST['sender_name'];
    $sender_address = $_POST['sender_address'];
    $sender_phone = $_POST['sender_phone'];
    $receiver_name = $_POST['receiver_name'];
    $receiver_address = $_POST['receiver_address'];
    $receiver_phone = $_POST['receiver_phone'];
    $receiver_email = $_POST['receiver_email'];
    $weight = $_POST['weight'];
    $type = $_POST['type'];
    $ship_date = $_POST['ship_date'];
    $status = $_POST['status'];
    $location = $_POST['location'];
    $details = $_POST['details'];
    $duty_fees = $_POST['duty_fees'];
    $pickup_date = $_POST['pickup_date'];
    $expect_delivery_date = $_POST['expect_delivery_date'];

    // Upload image
    $image_name = "";
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../uploads/";
        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
        $image_name = time() . "_" . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    $sql = "INSERT INTO packages 
        (tracking_number, sender_name, sender_address, sender_phone, receiver_name, receiver_address, receiver_phone, receiver_email, weight, type, ship_date, status, location, last_update, details, duty_fees, pickup_date, expect_delivery_date, image) 
        VALUES 
        ('$tracking_number', '$sender_name', '$sender_address', '$sender_phone', '$receiver_name', '$receiver_address', '$receiver_phone', '$receiver_email', '$weight', '$type', '$ship_date', '$status', '$location', NOW(), '$details', '$duty_fees', '$pickup_date', '$expect_delivery_date', '$image_name')";

    if ($conn->query($sql) === TRUE) {
        $package_id = $conn->insert_id;
        // Insert first history record
        $conn->query("INSERT INTO package_history (package_id, status, location, comment, changed_by) VALUES ($package_id, 'Order Confirmed', '$location', 'Initial package entry created', 'admin')");
        $success = "Package added successfully! Tracking Number: $tracking_number";
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Package</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

<!-- Sidebar -->
<aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-gradient-to-b from-indigo-600 via-purple-600 to-pink-500 text-white transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-50">
  <div class="p-6 text-2xl font-bold border-b border-white/20">Admin Panel</div>
  <nav class="p-4 space-y-3">
    <a href="dashboard.php" class="block py-2 px-4 rounded hover:bg-white/20 transition">Dashboard</a>
    <a href="add_package.php" class="block py-2 px-4 rounded hover:bg-white/20 transition">Add Package</a>
    <a href="packages.php" class="block py-2 px-4 rounded hover:bg-white/20 transition">All Packages</a>
     <a href="add_history.php" class="block py-2 px-4 bg-white/20">History</a>
    <a href="logout.php" class="block py-2 px-4 rounded hover:bg-white/20 transition">Logout</a>
  </nav>
</aside>

<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40 md:hidden"></div>

<main class="flex-1 md:ml-64 p-6 w-full">
  <div class="bg-white shadow-lg rounded-xl w-full max-w-3xl p-6">
    <h2 class="text-2xl font-bold text-gray-700 mb-6">Add New Package</h2>

   <form method="post" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4">

    <!-- Sender -->
    <div>
        <label class="block text-gray-600 mb-1">Sender Name</label>
        <input type="text" name="sender_name" required class="w-full border p-2 rounded-lg">
    </div>
    <div>
        <label class="block text-gray-600 mb-1">Sender Address</label>
        <input type="text" name="sender_address" required class="w-full border p-2 rounded-lg">
    </div>
    <div>
        <label class="block text-gray-600 mb-1">Sender Phone</label>
        <input type="text" name="sender_phone" required class="w-full border p-2 rounded-lg">
    </div>

    <!-- Receiver -->
    <div>
        <label class="block text-gray-600 mb-1">Receiver Name</label>
        <input type="text" name="receiver_name" required class="w-full border p-2 rounded-lg">
    </div>
    <div>
        <label class="block text-gray-600 mb-1">Receiver Address</label>
        <input type="text" name="receiver_address" required class="w-full border p-2 rounded-lg">
    </div>
    <div>
        <label class="block text-gray-600 mb-1">Receiver Phone</label>
        <input type="text" name="receiver_phone" required class="w-full border p-2 rounded-lg">
    </div>
    <div>
        <label class="block text-gray-600 mb-1">Receiver Email</label>
        <input type="email" name="receiver_email" required class="w-full border p-2 rounded-lg">
    </div>

    <!-- Shipment Info -->
    <div>
        <label class="block text-gray-600 mb-1">Weight (kg)</label>
        <input type="text" name="weight" required class="w-full border p-2 rounded-lg">
    </div>
    <div>
        <label class="block text-gray-600 mb-1">Type</label>
        <select name="type" class="w-full border p-2 rounded-lg">
            <option>Air Freight</option>
            <option>Sea Freight</option>
            <option>Land Freight</option>
        </select>
    </div>
    <div>
        <label class="block text-gray-600 mb-1">Ship Date</label>
        <input type="date" name="ship_date" required class="w-full border p-2 rounded-lg">
    </div>
    <div>
        <label class="block text-gray-600 mb-1">Status</label>
        <select name="status" class="w-full border p-2 rounded-lg">
            <option>Order Confirmed</option>
            <option>Picked by Courier</option>
            <option>On The Way</option>
            <option>Custom Hold</option>
            <option>Delivered</option>
        </select>
    </div>
    <div>
        <label class="block text-gray-600 mb-1">Location</label>
        <input type="text" name="location" required class="w-full border p-2 rounded-lg">
    </div>

    <!-- New Fields -->
    <div>
        <label class="block text-gray-600 mb-1">Duty Fees (USD)</label>
        <input type="text" name="duty_fees" class="w-full border p-2 rounded-lg">
    </div>
    <div>
        <label class="block text-gray-600 mb-1">Pickup Date</label>
        <input type="date" name="pickup_date" class="w-full border p-2 rounded-lg">
    </div>
    <div>
        <label class="block text-gray-600 mb-1">Expected Delivery Date</label>
        <input type="date" name="expect_delivery_date" class="w-full border p-2 rounded-lg">
    </div>

    <!-- Details -->
    <div class="md:col-span-2">
        <label class="block text-gray-600 mb-1">Details</label>
        <textarea name="details" rows="3" class="w-full border p-2 rounded-lg"></textarea>
    </div>
    <div class="md:col-span-2">
        <label class="block text-gray-600 mb-1">Parcel Image</label>
        <input type="file" name="image" class="w-full border p-2 rounded-lg">
    </div> 

    <div class="md:col-span-2">
        <button type="submit" name="add_package" 
            class="w-full bg-gradient-to-r from-green-400 to-blue-500 text-white px-6 py-3 rounded-lg shadow hover:opacity-90">
            ➕ Add Package
        </button>
    </div>
</form>

  </div>

  <?php if (isset($success)) { ?>
  <script>Swal.fire({icon:'success',title:'Success',text:'<?php echo $success; ?>'});</script>
  <?php } ?>
  <?php if (isset($error)) { ?>
  <script>Swal.fire({icon:'error',title:'Error',text:'<?php echo $error; ?>'});</script>
  <?php } ?>
</main>

<script>
const menuBtn=document.getElementById('menuBtn');
const sidebar=document.getElementById('sidebar');
const overlay=document.getElementById('overlay');
if(menuBtn){menuBtn.addEventListener('click',()=>{sidebar.classList.toggle('-translate-x-full');overlay.classList.toggle('hidden');});}
if(overlay){overlay.addEventListener('click',()=>{sidebar.classList.add('-translate-x-full');overlay.classList.add('hidden');});}
</script>
</body>
</html>
