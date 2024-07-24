<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Bahnschrift';
        }
    </style>
</head>
<body class="m-0 bg-[#F5F5F5]">
    <section class="on-page flex">
        <div class="sidebar fixed top-0 left-0 h-full w-64 bg-gray-100 py-5 overflow-y-auto">
            <div class="sidebar-header text-center mb-5">
                <img src="nav-left.png" alt="Sidebar Image" class="sidebar-image w-56 mx-auto">
            </div>
            <ul class="list-none p-0">
                <li><a href="dashboard.php" class="block py-5 px-6 text-lg text-gray-600 hover:text-white hover:bg-green-800">Dashboard</a></li>
                <li><a href="reservasi.html" class="block py-5 px-6 text-lg text-gray-600 hover:text-white hover:bg-green-800">Reservation</a></li>
                <li><a href="menu.php" class="block py-5 px-6 text-lg text-gray-600 hover:text-white hover:bg-green-800">Add Menu</a></li>
                <li><a href="order.php" class="block py-5 px-6 text-lg text-gray-600 hover:text-white hover:bg-green-800">Orders</a></li>
                <li><a href="#" class="block py-5 px-6 text-lg text-gray-600 hover:text-white hover:bg-green-800">Account</a></li>
            </ul>
        </div>
        <section class="main-content flex absolute left-[20%] m-0">
            <header class="h-[13.6%] w-[80%] bg-[#F5F5F5] fixed top-0 z-10">
                <div class="container max-w-[1170px] w-full px-[15px] mx-auto">
                    <div class="header-left float-left ml-[20px]">
                        <h3 class="greeting text-[#B9B9B9] text-[18px] my-[30px] mb-[-10px]">Hello Nada!</h3>
                        <h2 class="quote text-[#0A4833] text-[24px]">One's act, one's profit</h2>
                    </div>
                    <span class="fa fa-bars akun-icon ml-0.378"></span>
                    <div class="header-right float-right mt-[15px] mr-[60px] flex items-center">
                        <img class="photo-profile rounded-full h-[45px]"
                            src="asset\74f4f548392fbdafbe8a5d9764c83eaf.jpg">
                        <div class="header-akun ml-[10px]">
                            <h3 class="name-pp mb-[-5px]">Nada Satya M</h3>
                            <p class="header-acc-position text-[#B9B9B9]">Manager</p>
                        </div>
                    </div>
                </div>
            </header>
            <section class="content mt-[16%] ml-[-40px]">
                <div class="button-container flex justify-end mr-[30px]">
                    <button id="fetch-recent-orders" class="btn bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Fetch Recent Orders</button>
                </div>
                <div class="recent-orders mx-[30px] mt-[30px] bg-white p-[20px] shadow-md rounded-lg">
                    <h2 class="text-[24px] mb-[20px]">Recent Orders</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="order-table">
                            <!-- Orders will be populated here -->
                        </tbody>
                        <tbody class="button-table">
                            <!-- View details buttons will be populated here -->
                        </tbody>
                    </table>
                    <div id="order-details" class="order-details mt-[20px]">
                        <!-- Order details will be displayed here -->
                    </div>
                </div>
            </section>
        </section>
    </section>
    <script src="recentorder.js"></script>
</body>
</html>
