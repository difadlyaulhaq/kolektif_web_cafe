<?php
include 'config.php';
$search = isset($_GET['search']) ? $_GET['search'] : '';
// var_dump($search);

if (isset($_POST["done"])) {
  $done = $_POST["done"];
  $sql = "UPDATE pesanan SET status='done' WHERE no_pesanan=" . $done;
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo "<script>alert('Pesanan berhasil diselesaikan')</script>";
  } else {
    echo "<script>alert('Pesanan gagal diselesaikan')</script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
  <div class="sidebar h-full w-64 fixed top-0 left-0 bg-gray-100 pt-5 overflow-y-auto text-gray-800">
    <div class="sidebar-header text-center mb-5">
      <img src="/BE/assets/nav-left.png" alt="Sidebar Image" class="w-56 mx-auto">
    </div>
    <ul class="list-none p-0">
      <li><a href="dashboard.php" class="block px-6 py-5 text-lg text-gray-600 hover:bg-green-800 hover:text-white">Dashboard</a>
      </li>
      <li><a href="reservasi.html"
          class="block px-6 py-5 text-lg text-gray-600 hover:bg-green-800 hover:text-white">Reservation</a></li>
      <li><a href="menu.php" class="block px-6 py-5 text-lg text-gray-600 hover:bg-green-800 hover:text-white">add
          Menu</a></li>
      <li><a href="order.php"
          class="block px-6 py-5 text-lg text-gray-600 hover:bg-green-800 hover:text-white">Orders</a></li>
      <li><a href="#" class="block px-6 py-5 text-lg text-gray-600 hover:bg-green-800 hover:text-white">Account</a></li>
    </ul>
  </div>

  <div class="ml-64 p-5">
    <!-- search bar -->
    <div class="search-container text-center mb-10">
      <form action="#" method="get">
        <input name="search" type="text" placeholder="Search" class="w-1/2 p-3 border border-gray-300 rounded-lg">
        <button type="submit" class="bg-green-800 text-white p-3 rounded-lg">Search</button>
      </form>
    </div>


    <main class="Orders">
      <h1 class="orders-title text-4xl font-bold mb-10">Orders</h1>

      <!-- add order -->
      <button id="add-order" class="bg-green-800 text-white p-3 rounded-lg my-2">Add Order</button>
      <div class="flex justify-center">
        <div id="order-form-container"
          class="mt-10 w-full md:w-1/2 hidden bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

          <!-- order form start -->
          <form id="order-form" action="create_order.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="status" value="ongoing">
            <!-- <div class="mb-4">
              <label for="id_menu" class="block text-gray-700 text-sm font-bold mb-2">ID Menu</label>
              <input type="dropdown" id="id_menu" name="id_menu"
                class="form-input mt-1 block w-full border border-gray-300 rounded-md focus:border-blue-500" required>
            </div> -->

            <?php
            $menu = "SELECT * FROM menu";
            $menu_display = mysqli_query($conn, $menu);
            ?>

            <div class="dropdown">
              Subjects: <select name="subject" id="subject">
                <?php while ($menus = mysqli_fetch_assoc($menu_display)) { ?>
                  <option name="id_menu" id="id_menu" value="<?php echo $menus["id_menu"]; ?>" selected="selected">
                    <?php echo $menus['nama']; ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="my-4">
              <label for="no_pesanan" class="block text-gray-700 text-sm font-bold mb-2">No. Pesanan</label>
              <input type="text" id="no_pesanan" name="no_pesanan"
                class="form-input mt-1 block w-full border border-gray-300 rounded-md focus:border-blue-500" required>
            </div>


            <div class="mb-4">
              <label for="qty" class="block text-gray-700 text-sm font-bold mb-2">Jumlah</label>
              <input type="text" id="qty" name="qty"
                class="form-input mt-1 block w-full border border-gray-300 rounded-md focus:border-blue-500" required>
            </div>

            <div class="mb-4">
              <label for="note" class="block text-gray-700 text-sm font-bold mb-2">Note</label>
              <textarea id="note" name="note" rows="4"
                class="form-textarea mt-1 block w-full border border-gray-300 rounded-md focus:border-blue-500"
                required></textarea>
            </div>

            <div class="mb-4 text-center">
              <button type="submit" class="bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">Simpan
                Order</button>
              <button type="button" class="bg-gray-500 text-white font-bold py-2 px-4 rounded"
                id="cancel-order">Cancel</button>
            </div>
          </form>
        </div>
      </div>

      <section class="main-dish-menu">
        <h2 class="orders-title text-3xl font-semibold mb-6">Ongoing</h2>

        <?php
        $n = "SELECT DISTINCT no_pesanan FROM pesanan JOIN menu USING(id_menu) WHERE status='ongoing' ORDER BY no_pesanan DESC";
        if ($search) {
          $n = "SELECT DISTINCT no_pesanan FROM pesanan JOIN menu USING(id_menu) WHERE status='ongoing' AND nama LIKE '%$search%' ORDER BY no_pesanan DESC";
        }
        $n_order = mysqli_query($conn, $n);
        ?>

        <!-- main menu grid -->
        <div class="orders-grid flex gap-x-8">
          <?php while ($row = mysqli_fetch_assoc($n_order)) { ?>
            <section class="orders-block-card bg-white p-4 shadow rounded-lg my-4">
              <?php
              $sql = "SELECT * FROM pesanan JOIN menu USING(id_menu) WHERE status='ongoing' AND no_pesanan = " . $row['no_pesanan'] . " ORDER BY no_pesanan DESC";
              // Select pesanan based on $search
              if ($search) {
                $sql = "SELECT * FROM pesanan JOIN menu USING(id_menu) WHERE status='ongoing' AND no_pesanan = " . $row['no_pesanan'] . " AND nama LIKE '%$search%' ORDER BY no_pesanan DESC";
              }
              $result = mysqli_query($conn, $sql);
              ?>
              <h4>No. pesanan: <?php echo $row['no_pesanan']; ?></h4>
              <div class="flex gap-x-5">
                <?php while ($pesanan = mysqli_fetch_assoc($result)) { ?>
                  <article class="orders-card bg-white p-4 shadow rounded-lg w-52 h-80">
                    <img
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/d3131557584fccc7a0d61a014c4615eb46ba8636db3435b0b463613c1c5a9aef?apiKey=9b3bf8eb5f984b6fabc37471d36c0e97&"
                      alt="Shrimp Dynamite Mayo" class="orders-card-image w-full h-40 object-cover rounded">
                    <h3 class="orders-card-name text-xl font-semibold mt-4"><?php echo $pesanan['nama']; ?></h3>
                    <p class="orders-desc">Qty: <?php echo $pesanan['qty']; ?></p>
                    <p class="orders-desc">Catatan: <?php echo $pesanan['note']; ?></p>
                  </article>
                  <!-- Duplicate the article block for other dishes -->
                <?php } ?>
              </div>
              <form action="#" method="POST" class="mt-4">
                <input type="hidden" name="done" value="<?php echo $row["no_pesanan"]; ?>">
                <button type="submit" class="bg-green-800 text-white p-3 rounded-lg">
                  Done
                </button>
              </form>
            </section>
          <?php } ?>
        </div>
      </section>

      <section class="done-menu">
        <h2 class="done-title text-3xl font-semibold mb-6">Done</h2>

        <?php
        $n = "SELECT DISTINCT no_pesanan FROM pesanan JOIN menu USING(id_menu) WHERE status='done' ORDER BY no_pesanan DESC";
        if ($search) {
          $n = "SELECT DISTINCT no_pesanan FROM pesanan JOIN menu USING(id_menu) WHERE status='done' AND nama LIKE '%$search%' ORDER BY no_pesanan DESC";
        }
        $n_order = mysqli_query($conn, $n);
        ?>

        <div class="done-grid flex gap-x-8">
          <?php while ($row = mysqli_fetch_assoc($n_order)) { ?>
            <section class="orders-block-card bg-white p-4 shadow rounded-lg my-4">
              <h4>No. pesanan: <?php echo $row['no_pesanan']; ?></h4>
              <?php
              $sql = "SELECT * FROM pesanan JOIN menu USING(id_menu) WHERE status='done' AND no_pesanan = " . $row['no_pesanan'] . " ORDER BY no_pesanan DESC";
              // Select pesanan based on $search
              if ($search) {
                $sql = "SELECT * FROM pesanan JOIN menu USING(id_menu) WHERE status='done' AND no_pesanan = " . $row['no_pesanan'] . " AND nama LIKE '%$search%' ORDER BY no_pesanan DESC";
              }
              $result = mysqli_query($conn, $sql);
              ?>
              <div class="flex gap-x-5">
                <?php while ($pesanan = mysqli_fetch_assoc($result)) { ?>
                  <article class="orders-card bg-white p-4 shadow rounded-lg">
                    <img
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/d3131557584fccc7a0d61a014c4615eb46ba8636db3435b0b463613c1c5a9aef?apiKey=9b3bf8eb5f984b6fabc37471d36c0e97&"
                      alt="Shrimp Dynamite Mayo" class="orders-card-image w-full h-40 object-cover rounded">
                    <h3 class="orders-card-name text-xl font-semibold mt-4"><?php echo $pesanan['nama']; ?></h3>
                    <p class="orders-desc">No. pesanan: <?php echo $pesanan['no_pesanan']; ?></p>
                    <p class="orders-desc">Qty: <?php echo $pesanan['qty']; ?></p>
                    <p class="orders-desc">Catatan: <?php echo $pesanan['note']; ?></p>
                  </article>
                  <!-- Duplicate the article block for other dishes -->
                <?php } ?>
              </div>
            </section>
          <?php } ?>
        </div>
      </section>
      </section>


    </main>
  </div>


  <!-- add order -->
  <script>
    document.getElementById('add-order').addEventListener('click', function () {
      var formContainer = document.getElementById('order-form-container');
      formContainer.classList.remove('hidden'); // Toggle visibility of form
    });
    document.getElementById('cancel-order').addEventListener('click', function () {
      document.getElementById('order-form-container').classList.add('hidden');
    });
  </script>
</body>

</html>