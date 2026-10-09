<?php
session_start();
include "../config.php";

// DELETE handler
if (isset($_POST['delete_package'])) {
    $id = $_POST['id'];
    $conn->query("DELETE FROM packages WHERE id='$id'");
    $success = "Package deleted successfully!";
}

// EDIT handler
if (isset($_POST['edit_package'])) {
    $id = $_POST['id'];
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

    // Handle image update if new file is uploaded
    $image_sql = "";
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../uploads/";
        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);

        $image_name = time() . "_" . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_sql = ", image='$image_name'";
        }
    }

    $sql = "UPDATE packages SET 
        sender_name='$sender_name',
        sender_address='$sender_address',
        sender_phone='$sender_phone',
        receiver_name='$receiver_name',
        receiver_address='$receiver_address',
        receiver_phone='$receiver_phone',
        receiver_email='$receiver_email',
        weight='$weight',
        type='$type',
        ship_date='$ship_date',
        status='$status',
        location='$location',
        details='$details',
        duty_fees='$duty_fees',
        pickup_date='$pickup_date',
        expect_delivery_date='$expect_delivery_date',
        last_update=NOW()
        $image_sql
        WHERE id='$id'";

    if ($conn->query($sql)) {
        $success = "Package updated successfully!";
    } else {
        $error = "Error updating package!";
    }
}

// Fetch packages
$packages = $conn->query("SELECT * FROM packages ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Packages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

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

  <div class="bg-white shadow-lg rounded-xl p-6">
    <h2 class="text-2xl font-bold text-gray-700 mb-6">📦 All Packages</h2>
    <div class="overflow-x-auto">
      <table class="w-full border-collapse border border-gray-200 text-sm">
        <thead class="bg-gradient-to-r from-green-400 to-blue-500 text-white">
          <tr>
            <th class="p-2 text-left">Tracking</th>
            <th class="p-2">Sender</th>
            <th class="p-2">Receiver</th>
            <th class="p-2">Status</th>
            <th class="p-2">Location</th>
            <th class="p-2">Ship Date</th>
            <th class="p-2">Pickup</th>
            <th class="p-2">Delivery</th>
            <th class="p-2">Duty</th>
            <th class="p-2">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php while ($row = $packages->fetch_assoc()) { ?>
          <tr class="border-b hover:bg-gray-50">
            <td class="p-2 font-bold"><?php echo $row['tracking_number']; ?></td>
            <td class="p-2"><?php echo $row['sender_name']; ?></td>
            <td class="p-2"><?php echo $row['receiver_name']; ?></td>
            <td class="p-2"><span class="px-2 py-1 text-xs rounded bg-gray-200"><?php echo $row['status']; ?></span></td>
            <td class="p-2"><?php echo $row['location']; ?></td>
            <td class="p-2"><?php echo $row['ship_date']; ?></td>
            <td class="p-2"><?php echo $row['pickup_date']; ?></td>
            <td class="p-2"><?php echo $row['expect_delivery_date']; ?></td>
            <td class="p-2"><?php echo $row['duty_fees']; ?></td>
            <td class="p-2 flex gap-2">
              <button onclick='openEditModal(<?php echo json_encode($row); ?>)' class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
              <form method="post" onsubmit="return confirmDelete(this);" class="inline">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="delete_package" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
              </form>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center overflow-y-auto"> <div class="bg-white p-6 rounded-xl w-full max-w-3xl shadow-lg my-6"> <br><br><br> <br><br><br> <br><br><br> <br><br><br> <br><br><br> <h2 class="text-xl font-bold mb-4">✏️ Edit Package</h2> <form method="post" enctype="multipart/form-data" id="editForm" class="grid grid-cols-1 md:grid-cols-2 gap-4"> <br><br><br>
  
      <input type="hidden" name="id" id="editId">
        <div><label>Sender Name</label><input type="text" name="sender_name" id="editSenderName" class="w-full border p-2 rounded"></div>
      <div><label>Sender Address</label><input type="text" name="sender_address" id="editSenderAddress" class="w-full border p-2 rounded"></div>
      
      <div><label>Sender Phone</label><input type="text" name="sender_phone" id="editSenderPhone" class="w-full border p-2 rounded"></div>
      <div><label>Receiver Name</label><input type="text" name="receiver_name" id="editReceiverName" class="w-full border p-2 rounded"></div>
      <div><label>Receiver Address</label><input type="text" name="receiver_address" id="editReceiverAddress" class="w-full border p-2 rounded"></div>
      <div><label>Receiver Phone</label><input type="text" name="receiver_phone" id="editReceiverPhone" class="w-full border p-2 rounded"></div>
      <div><label>Receiver Email</label><input type="email" name="receiver_email" id="editReceiverEmail" class="w-full border p-2 rounded"></div>
      <div><label>Weight (kg)</label><input type="text" name="weight" id="editWeight" class="w-full border p-2 rounded"></div>
      <div><label>Type</label><select name="type" id="editType" class="w-full border p-2 rounded"><option>Air Freight</option><option>Sea Freight</option><option>Land Freight</option></select></div>
      <div><label>Ship Date</label><input type="date" name="ship_date" id="editShipDate" class="w-full border p-2 rounded"></div>
      <div><label>Status</label><select name="status" id="editStatus" class="w-full border p-2 rounded"><option>Order Confirmed</option><option>Picked by Courier</option><option>On The Way</option><option>Custom Hold</option><option>Delivered</option></select></div>
      <div><label>Location</label><input type="text" name="location" id="editLocation" class="w-full border p-2 rounded"></div>
      <div><label>Pickup Date</label><input type="date" name="pickup_date" id="editPickupDate" class="w-full border p-2 rounded"></div>
      <div><label>Expected Delivery</label><input type="date" name="expect_delivery_date" id="editExpectDeliveryDate" class="w-full border p-2 rounded"></div>
      <div><label>Duty Fees</label><input type="text" name="duty_fees" id="editDutyFees" class="w-full border p-2 rounded"></div>
      <div class="md:col-span-2"><label>Details</label><textarea name="details" id="editDetails" class="w-full border p-2 rounded"></textarea></div>
      <div class="md:col-span-2"><label>Update Image (optional)</label><input type="file" name="image" class="w-full border p-2 rounded"></div>

      <div class="md:col-span-2 flex justify-end gap-2 mt-4">
        <button type="button" onclick="closeEditModal()" class="bg-gray-400 text-white px-4 py-2 rounded">Cancel</button>
        <button type="submit" name="edit_package" class="bg-green-500 text-white px-4 py-2 rounded">Save Changes</button>
      </div>
    </form>
  </div>
</div>

<!-- SweetAlert -->
<?php if (isset($success)) { ?>
<script>Swal.fire({ icon: 'success', title: 'Success', text: '<?php echo $success; ?>' })</script>
<?php } ?>
<?php if (isset($error)) { ?>
<script>Swal.fire({ icon: 'error', title: 'Error', text: '<?php echo $error; ?>' })</script>
<?php } ?>

<script>
function openEditModal(data) {
    document.getElementById("editId").value = data.id;
    document.getElementById("editSenderName").value = data.sender_name;
    document.getElementById("editSenderAddress").value = data.sender_address;
    document.getElementById("editSenderPhone").value = data.sender_phone;
    document.getElementById("editReceiverName").value = data.receiver_name;
    document.getElementById("editReceiverAddress").value = data.receiver_address;
    document.getElementById("editReceiverPhone").value = data.receiver_phone;
    document.getElementById("editReceiverEmail").value = data.receiver_email;
    document.getElementById("editWeight").value = data.weight;
    document.getElementById("editType").value = data.type;
    document.getElementById("editShipDate").value = data.ship_date;
    document.getElementById("editStatus").value = data.status;
    document.getElementById("editLocation").value = data.location;
    document.getElementById("editDetails").value = data.details;
    document.getElementById("editPickupDate").value = data.pickup_date;
    document.getElementById("editExpectDeliveryDate").value = data.expect_delivery_date;
    document.getElementById("editDutyFees").value = data.duty_fees;

    document.getElementById("editModal").classList.remove("hidden");
    document.getElementById("editModal").classList.add("flex");
}
function closeEditModal() { document.getElementById("editModal").classList.add("hidden"); }
function confirmDelete(form) {
    event.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "This package will be deleted permanently!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => { if (result.isConfirmed) { form.submit(); }});
    return false;
}
</script>

<!-- Sidebar Toggle -->
<script>
const menuBtn = document.getElementById('menuBtn');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');
menuBtn.addEventListener('click', () => { sidebar.classList.toggle('-translate-x-full'); overlay.classList.toggle('hidden'); });
overlay.addEventListener('click', () => { sidebar.classList.add('-translate-x-full'); overlay.classList.add('hidden'); });
</script>
</body>
</html>
