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
                <li><a href="reservation.php" class="block py-5 px-6 text-lg text-gray-600 hover:text-white hover:bg-green-800">Reservation</a></li>
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
                        <img class="photo-profile rounded-full h-[45px]" src="asset/74f4f548392fbdafbe8a5d9764c83eaf.jpg">
                        <div class="header-akun ml-[10px]">
                            <h3 class="name-pp mb-[-5px]">Nada Satya M</h3>
                            <p class="header-acc-position text-[#B9B9B9]">Manager</p>
                        </div>
                    </div>
                </div>
            </header>

            <div class="information flex ml-[20px] w-[80%] bg-[#F5F5F5] fixed top-[13.6%]">
                <div class="selling mr-[20px] mt-[20px] h-[15%] w-[22%] bg-[#FFFFFF] shadow-[3px_3px_2px_rgba(185_185_185_1)] p-[20px_0_10px_10px] rounded-[5px]">
                    <h2 id="selling-count" class="text-[24px]">0</h2>
                    <h3 class="text-[#9F8151]">Selling</h3>
                </div>
                <div class="reservation mr-[20px] mt-[20px] h-[15%] w-[22%] bg-[#FFFFFF] p-[20px_0_10px_10px] rounded-[5px]">
                    <h2 class="text-[24px]">5</h2>
                    <h3 class="text-[#9F8151]">Reservations</h3>
                </div>
                <div class="orders mr-[20px] mt-[20px] h-[15%] w-[22%] bg-[#FFFFFF] p-[20px_0_10px_10px] rounded-[5px]">
                    <h2 class="text-[24px]">29/34</h2>
                    <h3 class="text-[#9F8151]">Orders</h3>
                </div>
                <div class="income mt-[20px] h-[15%] w-[22%] bg-[#0A4833] text-white p-[20px_0_10px_10px] rounded-[5px]">
                    <h2 id="total-income" class="text-[24px]">Rp. 0,00</h2>
                    <h3 class="text-[18px]">Income</h3>
                </div>
            </div>

            <div class="orderan flex mt-[15px] ml-[20px] w-[80%] bg-[#F5F5F5] fixed top-[30%]">
                <div class="recentorder flex flex-col w-[60%]">
                    <div class="ro bg-white rounded-[10px] w-[100%]">
                        <div class="ro-head h-[50px] flex justify-between items-center rounded-[10px_10px_0_0] shadow-lg">
                            <h2 class="ml-[20px] text-[20px]">Recent Orders</h2>
                            <button id="fetch-recent-orders" class="bg-green-800 text-white py-2 px-4 rounded">Refresh Orders</button>
                        </div>
                        <div class="tabel-ro flex">
                            <table class="w-full mt-[15px] ml-[20px] mb-[20px] rounded-md border-[2px] border-collapse bg-white shadow-md">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b">No</th>
                                        <th class="py-2 px-4 border-b">Order No</th>
                                        <th class="py-2 px-4 border-b">Menu</th>
                                        <th class="py-2 px-4 border-b">Qty</th>
                                        <th class="py-2 px-4 border-b">Total Price</th>
                                        <th class="py-2 px-4 border-b">Status</th>
                                        <th class="py-2 px-4 border-b">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="order-table"></tbody>
                            </table>
                            <table class="w-[100px] mt-[50px] ml-[20px] mb-[20px] border-collapse">
                                <tbody class="button-table"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="detail-orders ml-[20px] bg-white rounded-[10px] w-[35%]">
                    <div class="do-head h-[50px] flex justify-between items-center rounded-[10px_10px_0_0] shadow-lg">
                        <h2 class="ml-[20px] text-[20px]">Order Details</h2>
                    </div>
                    <div class="notabon p-[10px_20px]" id="order-details">
                        <!-- Order details will be populated by JavaScript -->
                    </div>
                </div>
            </div>
        </section>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.getElementById("fetch-recent-orders").addEventListener("click", fetchRecentOrders);

            function fetchRecentOrders() {
                fetch('fetch_recent_orders.php')
                    .then(response => response.json())
                    .then(data => {
                        const orderTable = document.querySelector('.order-table');
                        const buttonTable = document.querySelector('.button-table');
                        orderTable.innerHTML = '';
                        buttonTable.innerHTML = '';

                        let totalIncome = 0;
                        let totalSelling = 0;

                        if (Array.isArray(data)) {
                            data.forEach((order, index) => {
                                const row = document.createElement('tr');
                                row.innerHTML = `
                                    <td class="py-2 px-4 border-b">${index + 1}</td>
                                    <td class="py-2 px-4 border-b">${order.no_pesanan}</td>
                                    <td class="py-2 px-4 border-b">${order.menu_name}</td>
                                    <td class="py-2 px-4 border-b">${order.qty}</td>
                                    <td class="py-2 px-4 border-b">${order.harga * order.qty}</td>
                                    <td class="py-2 px-4 border-b">${order.status}</td>
                                    <td class="py-2 px-4 border-b">
                                        <button class="bg-green-800 text-white py-1 px-2 rounded view-details" data-id="${order.no_pesanan}">View Details</button>
                                    </td>
                                `;
                                orderTable.appendChild(row);

                                const buttonRow = document.createElement('tr');
                                buttonRow.innerHTML = `
                                    <td class="py-2 px-4 border-b">
                                        <button class="bg-green-800 text-white py-1 px-2 rounded">Update Status</button>
                                    </td>
                                `;
                                buttonTable.appendChild(buttonRow);

                                totalIncome += order.harga * order.qty;
                                totalSelling++;
                            });

                            document.getElementById('total-income').innerText = `Rp. ${totalIncome.toLocaleString('id-ID')}`;
                            document.getElementById('selling-count').innerText = totalSelling;
                        } else {
                            orderTable.innerHTML = '<tr><td colspan="7" class="text-center">No orders found</td></tr>';
                        }

                        // Attach event listeners to the view details buttons
                        document.querySelectorAll('.view-details').forEach(button => {
                            button.addEventListener('click', function() {
                                const orderId = this.getAttribute('data-id');
                                viewOrderDetails(orderId);
                            });
                        });
                    })
                    .catch(error => console.error('Error fetching orders:', error));
            }

            function viewOrderDetails(orderId) {
                fetch(`fetch_order_details.php?id=${orderId}`)
                    .then(response => response.json())
                    .then(data => {
                        const detailsContainer = document.getElementById('order-details');
                        detailsContainer.innerHTML = `
                            <p><strong>Order No:</strong> ${data.no_pesanan}</p>
                            <p><strong>Menu:</strong> ${data.menu_name}</p>
                            <p><strong>Quantity:</strong> ${data.qty}</p>
                            <p><strong>Total Price:</strong> ${data.harga * data.qty}</p>
                            <p><strong>Status:</strong> ${data.status}</p>
                            <p><strong>Customer Name:</strong> ${data.customer_name}</p>
                            <p><strong>Order Date:</strong> ${data.order_date}</p>
                            <!-- Add more details as needed -->
                        `;
                    })
                    .catch(error => console.error('Error fetching order details:', error));
            }
        });
    </script>
</body>

</html>
