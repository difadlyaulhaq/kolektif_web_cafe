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
<section class=" main-content flex absolute left-[20%] m-0">
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
                    <div class="information flex ml-[20px] w-[80%] bg-[#F5F5F5] fixed top-[13.6%]">
                        <div class="selling mr-[20px] mt-[20px] h-[15%] w-[22%] bg-[#FFFFFF] shadow-[3px_3px_2px_rgba(185_185_185_1)] p-[20px_0_10px_10px] rounded-[5px]">
                            <h2 class="text-[24px]">43</h2>
                            <h3 class="text-[#9F8151]">selling</h3>
                        </div>
                        <div class="reservation mr-[20px] mt-[20px] h-[15%] w-[22%] bg-[#FFFFFF] p-[20px_0_10px_10px] rounded-[5px]">
                            <h2 class="text-[24px]">5</h2>
                            <h3 class="text-[#9F8151]">Reservation</h3>
                        </div>
                        <div class="orders mr-[20px] mt-[20px] h-[15%] w-[22%] bg-[#FFFFFF] p-[20px_0_10px_10px] rounded-[5px]">
                            <h2 class="text-[24px]">29/34</h2>
                            <h3 class="text-[#9F8151]">Orders</h3>
                        </div>
                        <div class="income mt-[20px] h-[15%] w-[22%] bg-[#0A4833] text-white p-[20px_0_10px_10px] rounded-[5px]">
                            <h2 class="text-[24px]">Rp 1.020K</h2>
                            <h3>Income</h3>
                        </div>
                    </div>
                    <div class="orderan flex mt-[15px] ml-[20px] w-[80%] bg-[#F5F5F5] fixed top-[30%]">
                        <div class="recentorder flex flex-col w-[60%]">
                            <div class="ro bg-white rounded-[10px] w-[100%]">
                                <div class="ro-head h-[50px] flex justify-between items-center rounded-[10px_10px_0_0] shadow-lg">
                                    <h2 class="ml-[20px] text-[20px]">Recent Orders</h2>
                                    <!-- <input type="text" id="lname" name="lastname" placeholder="Search" class="h-[30px] w-[40%] p-3 rounded-full resize-y bg-[#D9D9D9] mr-[10px] items-end"> -->
                                </div>
                                <div class="tabel-ro flex">
                                    <table class="flex flex-row w-[80%] mt-[15px] ml-[20px] mb-[20px] rounded-md border-[2px] border-collapse justify-between p-[10px]">
                                        <tr>
                                            <th class="p-[5px] w-[20%] text-[14px]">Nota Num</th>
                                            <th class="p-[5px] w-[30%] text-[14px]">Cust Name</th>
                                            <th class="p-[5px] w-[10%] text-[14px]">Cashier</th>
                                            <th class="p-[5px] w-[45%] text-[14px]">Type</th>
                                            <th class="p-[5px] w-[20%] text-[14px]">Status</th>
                                        </tr>
                                        <tr>
                                            <td class="p-[5px] text-[14px]">S/010424/3/9</td>
                                            <td class="p-[5px] text-[14px]">Difa</td>
                                            <td class="p-[5px] text-[14px]">Nada</td>
                                            <td class="p-[5px] text-[14px]">Dine In</td>
                                            <td class="p-[5px] text-[14px]">InProcess</td>
                                        </tr>
                                        <tr>
                                            <td class="p-[5px] text-[14px]">S/010424/2/-</td>
                                            <td class="p-[5px] text-[14px]">Aji</td>
                                            <td class="p-[5px] text-[14px]">Nada</td>
                                            <td class="p-[5px] text-[14px]">Take Away</td>
                                            <td class="p-[5px] text-[14px]">Done</td>
                                        </tr>
                                        <tr>
                                            <td class="p-[5px] text-[14px]">S/010424/1/17</td>
                                            <td class="p-[5px] text-[14px]">Faisal</td>
                                            <td class="p-[5px] text-[14px]">Nada</td>
                                            <td class="p-[5px] text-[14px]">Dine In</td>
                                            <td class="p-[5px] text-[14px]">Done</td>
                                        </tr>
                                        <tr>
                                            <td class="p-[5px] text-[14px]">P/010424/34/21</td>
                                            <td class="p-[5px] text-[14px]">Ian</td>
                                            <td class="p-[5px] text-[14px]">Dawam</td>
                                            <td class="p-[5px] text-[14px]">Dine In</td>
                                            <td class="p-[5px] text-[14px]">Done</td>
                                        </tr>
                                        <tr>
                                            <td class="p-[5px] text-[14px]">P/010424/33/2</td>
                                            <td class="p-[5px] text-[14px]">Stephen</td>
                                            <td class="p-[5px] text-[14px]">Dawam</td>
                                            <td class="p-[5px] text-[14px]">Dine In</td>
                                            <td class="p-[5px] text-[14px]">Done</td>
                                        </tr>
                                    </table>
                                    <table class="w-[100px] mt-[50px] ml-[20px] mb-[20px] border-collapse">
                                        <tr>
                                            <td>
                                                <button
                                                    class="detail-btn bg-[#D9D9D9] rounded-[5px] shadow-md text-[10px] w-[80px] h-[25px] pt-[2px]"
                                                    data-order="S/010424/3/9">DETAIL</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button
                                                    class="detail-btn bg-[#D9D9D9] rounded-[5px] shadow-md text-[10px] w-[80px] h-[25px] pt-[2px]"
                                                    data-order="S/010424/2/-">DETAIL</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button
                                                    class="detail-btn bg-[#D9D9D9] rounded-[5px] shadow-md text-[10px] w-[80px] h-[25px] pt-[2px]"
                                                    data-order="S/010424/1/17">DETAIL</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button
                                                    class="detail-btn bg-[#D9D9D9] rounded-[5px] shadow-md text-[10px] w-[80px] h-[25px] pt-[2px]"
                                                    data-order="P/010424/34/21">DETAIL</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button
                                                    class="detail-btn bg-[#D9D9D9] rounded-[5px] shadow-md text-[10px] w-[80px] h-[25px] pt-[2px]"
                                                    data-order="P/010424/33/2">DETAIL</button>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- <div class="orderan1">
                                <p>S/010424/3/9</p>
                                <button class="detail-btn bg-[#D9D9D9]" data-order="S/010424/3/9">DETAIL</button>
                            </div>
                            <div class="orderan2">
                                <p>S/010424/2/9</p>
                                <button class="detail-btn bg-[#D9D9D9]" data-order="S/010424/2/9">DETAIL</button>
                            </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="detail-orders  ml-[20px] bg-white rounded-[10px] w-[35%]">
                            <div
                                class="do-head h-[50px] flex justify-between items-center rounded-[10px_10px_0_0] shadow-lg">
                                <h2 class="ml-[20px] text-[20px]">Details Order</h2>
                            </div>
                            <div class="notabon p-[10px_20px]" id="order-details">
                                <script src="recentorder.js"></script>
                                <button>Detail In Here</button>
                            </div>
                        </div>
                    </div>
        </section>
    </section>
</body>

</html>