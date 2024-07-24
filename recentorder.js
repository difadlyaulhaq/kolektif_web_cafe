document.addEventListener('DOMContentLoaded', function() {
    fetchRecentOrders();

    document.querySelectorAll('.detail-btn').forEach(button => {
        button.addEventListener('click', function() {
            const orderNo = this.getAttribute('data-order');
            fetchOrderDetails(orderNo);
        });
    });
});

function fetchRecentOrders() {
    fetch('fetch_recent_orders.php')
        .then(response => response.json())
        .then(data => {
            const orderTable = document.querySelector('.tabel-ro table');
            orderTable.innerHTML = '';
            data.forEach(order => {
                const row = `<tr>
                                <td>${order.no_pesanan}</td>
                                <td>${order.cust_name}</td>
                                <td>${order.cashier}</td>
                                <td>${order.type}</td>
                                <td>${order.status}</td>
                             </tr>`;
                orderTable.innerHTML += row;
            });
        });
}

function fetchOrderDetails(orderNo) {
    fetch(`fetch_order_details.php?order_no=${orderNo}`)
        .then(response => response.json())
        .then(data => {
            const detailsDiv = document.getElementById('order-details');
            detailsDiv.innerHTML = '';
            data.forEach(detail => {
                const detailHtml = `<p>Order No: ${detail.no_pesanan}</p>
                                    <p>Customer: ${detail.cust_name}</p>
                                    <p>Cashier: ${detail.cashier}</p>
                                    <p>Type: ${detail.type}</p>
                                    <p>Status: ${detail.status}</p>`;
                detailsDiv.innerHTML += detailHtml;
            });
        });
}