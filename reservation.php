<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .sidebar {
            background: #F5F5F5; /* Dark background for sidebar */
        }
        .sidebar a {
            color: #000000; /* Lighter text for sidebar links */
        }
        .sidebar a:hover {
            background: #0A4833; /* Darker hover effect for sidebar links */
            color: #E2E8F0; /* Lighter text on hover */
        }
        .main-content {
            margin-left: 16rem; /* Space for sidebar */
        }
        .container {
            max-width: 1200px;
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
    </style>
</head>
<body class="m-0 bg-gray-100 font-sans">
    <div class="flex">
        <!-- Sidebar -->
        <div class="sidebar fixed top-0 left-0 h-full w-64 bg-green-800 py-5 overflow-y-auto">
            <div class="sidebar-header text-center mb-5">
                <img src="nav-left.png" alt="Sidebar Image" class="sidebar-image w-56 mx-auto">
            </div>
            <ul class="list-none p-0">
                <li><a href="dashboard.php" class="block py-5 px-6 text-lg">Dashboard</a></li>
                <li><a href="reservation.php" class="block py-5 px-6 text-lg">Reservation</a></li>
                <li><a href="menu.php" class="block py-5 px-6 text-lg">Add Menu</a></li>
                <li><a href="order.php" class="block py-5 px-6 text-lg">Orders</a></li>
                <li><a href="#" class="block py-5 px-6 text-lg">Account</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content flex-grow p-6">
            <div class="container mx-auto">
                <!-- Create Reservation Form -->
                <div class="card">
                    <h2 class="text-2xl font-bold mb-4">Create Reservation</h2>
                    <form id="createReservationForm" class="space-y-4">
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
                        <button type="button" id="createReservationButton" class="bg-green-600 text-white px-4 py-2 rounded">Create Reservation</button>
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
                        <tbody></tbody>
                    </table>
                </div>

                <!-- Reservation Details -->
                <div class="card" id="reservation-details">
                    <h2 class="text-2xl font-bold mb-4">Reservation Details</h2>
                    <div id="order-details" class="space-y-2"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fetch reservations
        function fetchReservations() {
            fetch('fetch_reservation.php')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.querySelector('.reservation-table tbody');
                    tableBody.innerHTML = ''; // Clear previous data

                    data.forEach(reservation => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${reservation.room_id}</td>
                            <td>${reservation.reserver}</td>
                            <td>${reservation.no_telp}</td>
                            <td>${reservation.durasi}</td>
                            <td>${reservation.harga}</td>
                            <td>${reservation.status}</td>
                        `;
                        row.addEventListener('click', function() {
                            fetchReservationDetails(reservation.room_id);
                        });
                        tableBody.appendChild(row);
                    });
                })
                .catch(error => console.error('Error fetching reservations:', error));
        }

        fetchReservations(); // Initial fetch

        // Create reservation
        document.getElementById('createReservationButton').addEventListener('click', function() {
            const formData = new FormData(document.getElementById('createReservationForm'));
            fetch('create_reservation.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data); // Show response from server
                fetchReservations(); // Refresh reservation list
            })
            .catch(error => console.error('Error creating reservation:', error));
        });

        // Fetch reservation details
        function fetchReservationDetails(roomId) {
            fetch(`fetch_reservation_details.php?room_id=${roomId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        document.getElementById('order-details').innerHTML = data.error;
                    } else {
                        document.getElementById('order-details').innerHTML = `
                            <h3>Room ID: ${data.room_id}</h3>
                            <h3>Reserver: ${data.reserver}</h3>
                            <h4>Phone Number: ${data.no_telp}</h4>
                            <h4>Duration: ${data.durasi}</h4>
                            <h4>Price: ${data.harga}</h4>
                            <h4>Status: ${data.status}</h4>
                        `;
                    }
                })
                .catch(error => console.error('Error fetching reservation details:', error));
        }
    });
    </script>

    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "caffe"; // Replace this with your actual database name

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $room_id = $_POST['room_id'];
        $reserver = $_POST['reserver'];
        $no_telp = $_POST['no_telp'];
        $durasi = $_POST['durasi'];
        $harga = $_POST['harga'];
        $status = $_POST['status'];

        $sql = "INSERT INTO reservation (room_id, reserver, no_telp, durasi, harga, status) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssis", $room_id, $reserver, $no_telp, $durasi, $harga, $status);

        if ($stmt->execute()) {
            echo "Reservation created successfully!";
        } else {
            echo "Error creating reservation: " . $conn->error;
        }

        $stmt->close();
    }

    // Handle fetching reservations
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && !isset($_GET['room_id'])) {
        $sql = "SELECT * FROM reservation";
        $result = $conn->query($sql);

        $reservations = array();
        while ($row = $result->fetch_assoc()) {
            $reservations[] = $row;
        }

        // echo json_encode($reservations);

        $result->close();
    }

    // Handle fetching reservation details
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['room_id'])) {
        $room_id = $_GET['room_id'];

        $sql = "SELECT * FROM reservation WHERE room_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $room_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $reservation = $result->fetch_assoc();

        if ($reservation) {
            echo json_encode($reservation);
        } else {
            echo json_encode(array('error' => 'No reservation found'));
        }

        $stmt->close();
    }

    $conn->close();
    ?>
</body>
</html>
