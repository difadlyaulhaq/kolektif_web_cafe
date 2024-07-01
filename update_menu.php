<?php
require 'config.php';

// Validasi parameter id
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid menu ID";
    exit;
}

$id = $_GET['id'];

if (isset($_POST["go"])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $jenis = $_POST['jenis'];

    // Validasi dan handle upload gambar jika ada
    if (!empty($_FILES["menu_image"]["name"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["menu_image"]["name"]);
        move_uploaded_file($_FILES["menu_image"]["tmp_name"], $target_file);
        $path_gambar = $target_file;
    } else {
        // Jika tidak ada upload gambar baru, gunakan path gambar yang sudah ada
        $path_gambar = $_POST['path_gambar'];
    }

    // Prepare statement untuk melakukan update
    $sql = "UPDATE menu SET nama=?, deskripsi=?, harga=?, jenis=?, path_gambar=? WHERE id_menu=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssisi", $nama, $deskripsi, $harga, $jenis, $path_gambar, $id);

    if ($stmt->execute()) {
        header("location: menu.php");
    } else {
        echo "Error updating menu: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Ambil data menu berdasarkan id yang diterima dari parameter GET
    $sql = "SELECT * FROM menu WHERE id_menu=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $menu = $result->fetch_assoc();
    } else {
        echo "Menu not found";
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold text-center mb-8">Edit Menu</h1>
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
            <form action="#" method="POST" enctype="multipart/form-data" class="w-full p-6">
                <input type="hidden" name="path_gambar" value="<?php echo $menu['path_gambar']; ?>">
                
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-bold text-gray-700 mb-2">Nama</label>
                    <input type="text" id="nama" name="nama" value="<?php echo $menu['nama']; ?>" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                
                <div class="mb-4">
                    <label for="deskripsi" class="block text-sm font-bold text-gray-700 mb-2">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?php echo $menu['deskripsi']; ?></textarea>
                </div>
                
                <div class="mb-4">
                    <label for="harga" class="block text-sm font-bold text-gray-700 mb-2">Harga</label>
                    <input type="number" id="harga" name="harga" value="<?php echo $menu['harga']; ?>" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                
                <div class="mb-4">
                    <label for="jenis" class="block text-sm font-bold text-gray-700 mb-2">Jenis</label>
                    <select id="jenis" name="jenis" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="Main Dish" <?php if ($menu['jenis'] == 'Main Dish') echo 'selected'; ?>>Main Dish</option>
                        <option value="Side Dish" <?php if ($menu['jenis'] == 'Side Dish') echo 'selected'; ?>>Side Dish</option>
                        <option value="Beverage" <?php if ($menu['jenis'] == 'Beverage') echo 'selected'; ?>>Beverage</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label for="menu_image" class="block text-sm font-bold text-gray-700 mb-2">Gambar</label>
                    <input type="file" id="menu_image" name="menu_image"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                
                <input type="hidden" name="go">
                
                <div class="text-center">
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update Menu
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
