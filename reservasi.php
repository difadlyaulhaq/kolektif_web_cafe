<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <link rel="stylesheet" href="account.css"> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Bahnschrift';
        }
    </style>
</head>
<body class="m-0 bg-[#F5F5F5]">
<div class="sidebar fixed top-0 left-0 h-full w-64 bg-gray-100 py-5 overflow-y-auto">
        <div class="sidebar-header text-center mb-5">
            <img src="nav-left.png" alt="Sidebar Image" class="sidebar-image w-56 mx-auto">
        </div>
        <ul class="list-none p-0">
            <li><a href="dashboard.php" class="block py-5 px-6 text-lg text-gray-600 hover:text-white hover:bg-green-800">Dashboard</a></li>
            <li><a href="reservasi.php" class="block py-5 px-6 text-lg text-gray-600 hover:text-white hover:bg-green-800">Reservation</a></li>
            <li><a href="menu.php" class="block py-5 px-6 text-lg text-gray-600 hover:text-white hover:bg-green-800">Add Menu</a></li>
            <li><a href="order.php" class="block py-5 px-6 text-lg text-gray-600 hover:text-white hover:bg-green-800">Orders</a></li>
            <li><a href="#" class="block py-5 px-6 text-lg text-gray-600 hover:text-white hover:bg-green-800">Account</a></li>
        </ul>
    </div> 
    <div class="flex flex-col flex-1">
            <div class="flex justify-between items-center w-full h-[133px] bg-[#F5F5F5] px-5">
                <div class="flex flex-col">
                    <h2 class="text-gray-400 text-[25px]">Hello Nada!</h2>
                    <h1 class="text-[30px]">One's act, one's profit</h1>
                </div>
                <div class="flex items-center">
                    <img src="kucing gemoy.jpg" class="rounded-full w-[50px] h-[50px]">
                    <div class="ml-3">
                        <h3 class="text-lg">Nada Satya M</h3>
                        <p class="text-gray-400">Manager</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-1 mt-[20px] ml-[20px]">
                <div class="flex flex-col w-[692px]">
                    <div class="bg-white shadow-md rounded-lg p-5 mb-5">
                        <h2 class="text-[20px] mb-3">Rooms</h2>
                        <table class="w-full border border-collapse">
                            <thead>
                                <tr>
                                    <th class="p-2 text-[14px]">Room Type</th>
                                    <th class="p-2 text-[14px]">Rooms</th>
                                    <th class="p-2 text-[14px]">Capacity</th>
                                    <th class="p-2 text-[14px]">Facilities</th>
                                    <th class="p-2 text-[14px]">Prices</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-2 text-[14px]">Small</td>
                                    <td class="p-2 text-[14px]">2</td>
                                    <td class="p-2 text-[14px]">max 10</td>
                                    <td class="p-2 text-[14px]">Free WiFi, Smart TV, AC, Table & Chair</td>
                                    <td class="p-2 text-[14px]">
                                        <ul class="list-none">
                                            <li>100k / 3h</li>
                                            <li>180k / 8h</li>
                                            <li>350k / allday</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-2 text-[14px]">Medium</td>
                                    <td class="p-2 text-[14px]">1</td>
                                    <td class="p-2 text-[14px]">max 20</td>
                                    <td class="p-2 text-[14px]">Free WiFi, AC, Table & chairs, Screen Projector, Sound System [request]</td>
                                    <td class="p-2 text-[14px]">
                                        <ul class="list-none">
                                            <li>200k / 3h</li>
                                            <li>380k / 8h</li>
                                            <li>600k / allday</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-2 text-[14px]">Large</td>
                                    <td class="p-2 text-[14px]">2</td>
                                    <td class="p-2 text-[14px]">max 100</td>
                                    <td class="p-2 text-[14px]">Free WiFi, AC, Table & chairs, Screen Projector, Sound System [request]</td>
                                    <td class="p-2 text-[14px]">
                                        <ul>
                                            <li>300k / 3h</li>
                                            <li>580k / 8h</li>
                                            <li>900k / allday</li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-white shadow-md rounded-lg p-5 mt-5">
                        <h2 class="text-[20px] mb-3">Recent Reservation</h2>
                        <table class="w-full border border-collapse">
                            <thead>
                                <tr>
                                    <th class="px-7 py-1 text-sm">Nota Num.</th>
                                    <th class="px-7 py-1 text-sm">Cust. Name</th>
                                    <th class="px-7 py-1 text-sm">Admin</th>
                                    <th class="px-7 py-1 text-sm">Room Type</th>
                                    <th class="px-7 py-1 text-sm">Time</th>
                                    <th class="px-7 py-1 text-sm">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-7 py-1 text-sm">16/05/2024</td>
                                    <td class="px-7 py-1 text-sm">Difa</td>
                                    <td class="px-7 py-1 text-sm">Dawam</td>
                                    <td class="px-7 py-1 text-sm">Small</td>
                                    <td class="px-7 py-1 text-sm">17/05/2024 12:45</td>
                                    <td class="px-7 py-1 text-sm">Booked</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg ml-5 p-5 w-[413px]">
                    <h2 class="text-[20px] mb-3">Details Reservation</h2>
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium">No. Resi:</span>
                        <span class="ml-2 text-sm font-bold">010424/5/070424</span>
                    </div>
                    <div class="mt-4">
                        <h2 class="text-gray-400 text-xl font-medium">Difa</h2>
                        <table class="w-full mt-2">
                            <thead>
                                <tr>
                                    <th class="text-left p-2">Nama Menu</th>
                                    <th class="text-right p-2">Qty</th>
                                    <th class="text-right p-2">Harga</th>
                                    <th class="text-right p-2">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-left p-2">Ice Coffee Soursally L/N/LS</td>
                                    <td class="text-right p-2">1</td>
                                    <td class="text-right p-2">Rp25.000</td>
                                    <td class="text-right p-2">Rp25.000</td>
                                </tr>
                                <tr>
                                    <td class="text-left p-2">Shrimp Dynamite Mayo</td>
                                    <td class="text-right p-2">1</td>
                                    <td class="text-right p-2">Rp35.000</td>
                                    <td class="text-right p-2">Rp35.000</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="text-right p-2" colspan="3">Subtotal</td>
                                    <td class="text-right p-2">Rp60.000</td>
                                </tr>
                                <tr>
                                    <td class="text-right p-2" colspan="3">Pajak 11%</td>
                                    <td class="text-right p-2">Rp6.600</td>
                                </tr>
                                <tr>
                                    <td class="text-right p-2" colspan="3">Total</td>
                                    <td class="text-right p-2">Rp66.600</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="mt-4">
                        <h2 class="text-gray-400 text-xl font-medium">Detail Room</h2>
                        <table class="w-full mt-2">
                            <thead>
                                <tr>
                                    <th class="text-left p-2">Room Type</th>
                                    <th class="text-right p-2">Waktu</th>
                                    <th class="text-right p-2">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-left p-2">Medium</td>
                                    <td class="text-right p-2">8h</td>
                                    <td class="text-right p-2">Rp380.000</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="text-right p-2" colspan="2">Total</td>
                                    <td class="text-right p-2">Rp380.000</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
