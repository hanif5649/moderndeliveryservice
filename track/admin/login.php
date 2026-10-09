<?php
session_start();
include "../config.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']); // simple hashing, recommend password_hash
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid login!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

  <div class="w-full max-w-sm bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Admin Login</h2>
    
    <?php if(isset($error)): ?>
      <div class="mb-4 p-3 text-sm text-red-800 rounded-lg bg-red-100 border border-red-300">
        <?php echo $error; ?>
      </div>
    <?php endif; ?>

    <form method="post" class="space-y-5">
      <div>
        <label class="block text-gray-700 font-medium mb-1">Username</label>
        <input type="text" name="username" required 
               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label class="block text-gray-700 font-medium mb-1">Password</label>
        <input type="password" name="password" required 
               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <button type="submit" name="login" 
              class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition">
        Login
      </button>
    </form>
  </div>

</body>
</html>
