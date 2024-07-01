<?php
include 'config.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

// Select pesanan based on $search
if ($search) {
    $sql_ongoing = "SELECT * FROM pesanan INNER JOIN menu ON pesanan.id_menu = menu.id_menu WHERE status='ongoing' AND menu.nama LIKE '%$search%' ORDER BY no_pesanan DESC";
    $sql_done = "SELECT * FROM pesanan INNER JOIN menu ON pesanan.id_menu = menu.id_menu WHERE status='done' AND menu.nama LIKE '%$search%' ORDER BY no_pesanan DESC";
} else {
    $sql_ongoing = "SELECT * FROM pesanan INNER JOIN menu ON pesanan.id_menu = menu.id_menu WHERE status='ongoing' ORDER BY no_pesanan DESC";
    $sql_done = "SELECT * FROM pesanan INNER JOIN menu ON pesanan.id_menu = menu.id_menu WHERE status='done' ORDER BY no_pesanan DESC";
}

$result_ongoing = mysqli_query($conn, $sql_ongoing);
$result_done = mysqli_query($conn, $sql_done);

if (!$result_ongoing || !$result_done) {
    die("Query failed: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom Scrollbar Styles */
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
    
    <div class="ml-64 p-5">
        <div class="search-container text-center mb-10">
            <form action="#" method="get">
                <input name="search" type="text" placeholder="Search" class="w-1/2 p-3 border border-gray-300 rounded-lg">
                <button type="submit" class="bg-green-800 text-white p-3 rounded-lg">Search</button>
            </form>
        </div>

        <main class="Orders">
            <h1 class="orders-title text-4xl font-bold mb-10">Orders</h1>

            <section class="main-dish-menu">
                <h2 class="orders-title text-3xl font-semibold mb-6">Ongoing</h2>

                <!-- main menu grid -->
                <div class="orders-grid grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <?php while ($row = mysqli_fetch_assoc($result_ongoing)) { ?>
                        <article class="orders-card bg-white p-4 shadow rounded-lg">
                            <img src="<?php echo $row['path_gambar']; ?>" alt="<?php echo $row['nama']; ?>" class="orders-card-image w-full h-40 object-cover rounded">
                            <h3 class="orders-card-name text-xl font-semibold mt-4"><?php echo $row['nama']; ?></h3>
                            <p class="orders-desc">No. pesanan: <?php echo $row['no_pesanan']; ?></p>
                            <p class="orders-desc">Qty: <?php echo $row['qty']; ?></p>
                            <p class="orders-desc">Catatan: <?php echo $row['note']; ?></p>
                        </article>
                    <?php } ?>
                </div>
            </section>

            <section class="done-menu">
                <h2 class="done-title text-3xl font-semibold mb-6">Done</h2>

                <div class="done-grid grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <?php while ($row = mysqli_fetch_assoc($result_done)) { ?>
                        <article class="orders-card bg-white p-4 shadow rounded-lg">
                            <img src="<?php echo $row['path_gambar']; ?>" alt="<?php echo $row['nama']; ?>" class="orders-card-image w-full h-40 object-cover rounded">
                            <h3 class="orders-card-name text-xl font-semibold mt-4"><?php echo $row['nama']; ?></h3>
                            <p class="orders-desc">No. pesanan: <?php echo $row['no_pesanan']; ?></p>
                            <p class="orders-desc">Qty: <?php echo $row['qty']; ?></p>
                            <p class="orders-desc">Catatan: <?php echo $row['note']; ?></p>
                        </article>
                    <?php } ?>
                </div>
            </section>

        </main>
    </div>

</body>

</html>
