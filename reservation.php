<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Bahnschrift';
        }
        .sidebar {
            background: #F5F5F5;
        }
        .sidebar a {
            color: #000000;
        }
        .sidebar a:hover {
            background: #0A4833;
            color: #E2E8F0;
        }
        .main-content {
            margin-left: 20%;
        }
        .container {
            max-width: 1170px;
            margin: 0 auto;
            padding: 20px;
        }
        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .reservation-table th, .reservation-table td {
            border: 1px solid #ddd;
            padding: 12px;
        }
        .reservation-table th {
            background: #f4f4f4;
        }
        header {
            position: fixed;
            top: 0;
            left: 20%;
            width: 80%;
            background: #F5F5F5;
            z-index: 10;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .greeting, .quote {
            margin: 0;
        }
        .photo-profile {
            border-radius: 50%;
            height: 45px;
        }
    </style>
</head>
<body class="m-0 bg-[#F5F5F5]">
    <section class="on-page flex">
        <!-- Sidebar -->
        <div class="sidebar w-1/5 bg-gray-100 fixed top-0 h-full">
            <div class="kolektif-name flex mt-8 ml-8">
                <img class="logo h-6" src="nav-left.png">
                <img class="logo-name h-6 ml-2.5" src="kolektif green.png">
            </div>
            <ul class="list-none p-0 mt-12">
                <li><a href="dashboard.php" class="block py-5 px-6 text-lg">Dashboard</a></li>
                <li><a href="reservation.php" class="block py-5 px-6 text-lg bg-[#0A4833] text-white rounded-r-[10px]">Reservation</a></li>
                <li><a href="menu.php" class="block py-5 px-6 text-lg">Add Menu</a></li>
                <li><a href="order.php" class="block py-5 px-6 text-lg">Orders</a></li>
                <li><a href="#" class="block py-5 px-6 text-lg">Account</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content flex-grow p-6">
            <!-- Header -->
            <header class="bg-[#F5F5F5] shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="greeting text-[#B9B9B9] text-lg">Hello Nada!</h3>
                        <h2 class="quote text-[#0A4833] text-xl">One's act, one's profit</h2>
                    </div>
                    <div class="flex items-center">
                        <img class="photo-profile" src="kucing gemoy.jpg" alt="Profile Picture">
                        <div class="ml-4">
                            <h3 class="name-pp mb-[-5px]">Nada Satya M</h3>
                            <p class="header-acc-position text-[#B9B9B9]">Manager</p>
                        </div>
                    </div>
                </div>
            </header>

            <div class="container mx-auto mt-20">
                <!-- Create Reservation Form -->
                <div class="card">
                    <h2 class="text-2xl font-bold mb-4">Create Reservation</h2>
                    <form id="createReservationForm" class="space-y-4" method="POST" action="create_reservation.php">
                        <div>
                            <label for="room_id" class="block text-gray-700">Room ID:</label>
                            <input type="number" id="room_id" name="room_id" class="w-full border border-gray-300 p-2 rounded" required>
                        </div>
                        <div>
                            <label for="reserver" class="block text-gray-700">Reserver:</label>
                            <input type="text" id="reserver" name="reserver" class="w-full border border-gray-300 p-2 rounded" required>
                        </div>
                        <div>
                            <label for="no_telp" class="block text-gray-700">Phone Number:</label>
                            <input type="text" id="no_telp" name="no_telp" class="w-full border border-gray-300 p-2 rounded" required>
                        </div>
                        <div>
                            <label for="durasi" class="block text-gray-700">Duration:</label>
                            <input type="text" id="durasi" name="durasi" class="w-full border border-gray-300 p-2 rounded" required>
                        </div>
                        <div>
                            <label for="harga" class="block text-gray-700">Price:</label>
                            <input type="number" id="harga" name="harga" class="w-full border border-gray-300 p-2 rounded" required>
                        </div>
                        <div>
                            <label for="status" class="block text-gray-700">Status:</label>
                            <select id="status" name="status" class="w-full border border-gray-300 p-2 rounded" required>
                                <option value="Unpaid">Unpaid</option>
                                <option value="Paid">Paid</option>
                            </select>
                        </div>
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Create Reservation</button>
                    </form>
                </div>

                <!-- Reservation List -->
                <div class="card">
                    <h2 class="text-2xl font-bold mb-4">Reservation List</h2>
                    <table class="reservation-table w-full">
                        <thead>
                            <tr>
                                <th>Room ID</th>
                                <th>Reserver</th>
                                <th>Phone Number</th>
                                <th>Duration</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include 'fetch_reservation.php';
                                $reservations = fetchReservations(); // Assuming this function returns an array of reservations

                                foreach ($reservations as $reservation) {
                                    echo "<tr onclick='fetchReservationDetails({$reservation['room_id']})'>";
                                    echo "<td>{$reservation['room_id']}</td>";
                                    echo "<td>{$reservation['reserver']}</td>";
                                    echo "<td>{$reservation['no_telp']}</td>";
                                    echo "<td>{$reservation['durasi']}</td>";
                                    echo "<td>{$reservation['harga']}</td>";
                                    echo "<td>{$reservation['status']}</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Reservation Details -->
                <div class="card" id="reservation-details">
                    <h2 class="text-2xl font-bold mb-4">Reservation Details</h2>
                    <div id="order-details" class="space-y-2"></div>
                </div>
            </div>
        </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fetch reservation details
        window.fetchReservationDetails = function(roomId) {
            fetch(`fetch_reservation_details.php?room_id=${roomId}`)
                .then(response => response.json())
                .then(data => {
                    const orderDetails = document.getElementById('order-details');
                    if (data.error) {
                        orderDetails.innerHTML = `<p>${data.error}</p>`;
                    } else {
                        orderDetails.innerHTML = `
                            <p><strong>Room ID:</strong> ${data.room_id}</p>
                            <p><strong>Reserver:</strong> ${data.reserver}</p>
                            <p><strong>Phone Number:</strong> ${data.no_telp}</p>
                            <p><strong>Duration:</strong> ${data.durasi}</p>
                            <p><strong>Price:</strong> ${data.harga}</p>
                            <p><strong>Status:</strong> ${data.status}</p>
                        `;
                    }
                })
                .catch(error => console.error('Error fetching reservation details:', error));
        }
    });
    </script>
</body>
</html>
