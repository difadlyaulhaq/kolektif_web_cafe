<?php
    $status = isset($_GET["status"]) ? $_GET["status"] : "0";
    if($status)
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .sidebar::-webkit-scrollbar {
            width: 12px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: #f5f5f5;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background-color: #818181;
            border-radius: 10px;
            border: 3px solid #f5f5f5;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background-color: #0A4833;
        }

        .blurred {
            filter: blur(5px);
            pointer-events: none;
            user-select: none;
        }
    </style>
</head>

<body class="font-sans">
    <div class="sidebar fixed top-0 left-0 h-full w-64 bg-gray-100 py-5 overflow-y-auto">
        <div class="sidebar-header text-center mb-5">
            <img src="nav-left.png" alt="Sidebar Image" class="sidebar-image w-56 mx-auto">
        </div>
        <ul class="list-none p-0">
            <li><a href="dashboard.php" class="block py-5 px-6 text-lg text-gray-600 hover:text-white hover:bg-green-800">Dashboard</a></li>
            <li><a href="reservasi.html" class="block py-5 px-6 text-lg text-gray-600 hover:text-white hover:bg-green-800">Reservation</a></li>
            <li><a href="#" class="block py-5 px-6 text-lg text-gray-600 hover:text-white hover:bg-green-800">Add Menu</a></li>
            <li><a href="order.php" class="block py-5 px-6 text-lg text-gray-600 hover:text-white hover:bg-green-800">Orders</a></li>
            <li><a href="#" class="block py-5 px-6 text-lg text-gray-600 hover:text-white hover:bg-green-800">Account</a></li>
        </ul>
    </div>
    <?php if($status) { ?>
    <div class="bg-green-500 text-white w-full px-3 py-2 text-center">
        <?php echo "$status"; ?>
    </div>    
    <?php } ?>
    <div class="ml-64 p-5">
        <div class="search-container text-center mb-10"></div>
        <main class="kolektif-food">
            <h1 class="kolektif-food-title text-4xl font-bold mb-10">Kolektif Food</h1>
            <section class="container mx-auto px-4 py-6">
            <section class="container mx-auto px-4 py-6">
            <section class="container mx-auto px-4 py-6">
    <button class="bg-green-700 text-white font-bold py-2 px-4 rounded" id="add-menu">Add Menu</button>
  </section>

  <div class="flex justify-center">
    <div id="menu-form-container" class="mt-10 w-full md:w-1/2 hidden bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <form id="menu-form" action="create_menu.php" method="POST" enctype="multipart/form-data">
        <div class="mb-4">
          <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama Menu</label>
          <input type="text" id="nama" name="nama" class="form-input mt-1 block w-full border border-gray-300 rounded-md focus:border-blue-500" required>
        </div>

        <div class="mb-4">
          <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
          <textarea id="deskripsi" name="deskripsi" rows="4" class="form-textarea mt-1 block w-full border border-gray-300 rounded-md focus:border-blue-500" required></textarea>
        </div>

        <div class="mb-4">
          <label for="harga" class="block text-gray-700 text-sm font-bold mb-2">Harga</label>
          <input type="number" id="harga" name="harga" class="form-input mt-1 block w-full border border-gray-300 rounded-md focus:border-blue-500" required>
        </div>

        <div class="mb-4">
          <label for="jenis" class="block text-gray-700 text-sm font-bold mb-2">Jenis</label>
          <select id="jenis" name="jenis" class="form-select mt-1 block w-full border border-gray-300 rounded-md focus:border-blue-500" required>
            <option value="Main Dish">Main Dish</option>
            <option value="Side Dish">Side Dish</option>
            <option value="Beverage">Beverage</option>
          </select>
        </div>

        <div class="mb-4">
          <label for="menu_image" class="block text-gray-700 text-sm font-bold mb-2">Gambar Menu</label>
          <input type="file" id="menu_image" name="menu_image" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:border-blue-500" accept="image/*" required>
        </div>

        <div class="mb-4 text-center">
          <button type="submit" class="bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">Simpan Menu</button>
          <button type="button" class="bg-gray-500 text-white font-bold py-2 px-4 rounded" id="cancel-menu">Cancel</button>
        </div>
      </form>
    </div>
  </div>
            <section id="menu-list" class="mt-10">
                <?php include 'read_menu.php'; ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($menus as $menu): ?>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <img src="<?php echo $menu['path_gambar']; ?>" alt="<?php echo $menu['nama']; ?>" class="w-full h-48 object-cover mb-4">
                        <h2 class="text-xl font-bold mb-2"><?php echo $menu['nama']; ?></h2>
                        <p class="text-gray-700 mb-2"><?php echo $menu['deskripsi']; ?></p>
                        <p class="text-gray-700 mb-2">Harga: Rp<?php echo number_format($menu['harga']); ?></p>
                        <p class="text-gray-700 mb-2">Jenis: <?php echo $menu['jenis']; ?></p>
                        <a href="update_menu.php?id=<?php echo $menu['id_menu']; ?>" class="bg-blue-500 text-white py-2 px-4 rounded">Edit</a>
                        <a href="delete_menu.php?id=<?php echo $menu['id_menu']; ?>" class="bg-red-500 text-white py-2 px-4 rounded">Delete</a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>
    </div>

    <script>
        document.getElementById('add-menu').addEventListener('click', function () {
            var formContainer = document.getElementById('menu-form-container');
            formContainer.classList.remove('hidden'); // Toggle visibility of form
        });
        document.getElementById('cancel-menu').addEventListener('click', function() {
      document.getElementById('menu-form-container').classList.add('hidden');
    });
    </script>
</body>

</html>
