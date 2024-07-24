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

                if (Array.isArray(data)) {
                    data.forEach((order, index) => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${index + 1}</td>
                            <td>${order.no_pesanan}</td>
                            <td>${order.menu_name}</td>
                            <td>${order.qty}</td>
                            <td>${order.harga * order.qty}</td>
                            <td>${order.status}</td>
                        `;
                        orderTable.appendChild(row);

                        const buttonRow = document.createElement('tr');
                        buttonRow.innerHTML = `
                            <td><button class="view-details" data-id="${order.id_pesanan}">View Details</button></td>
                        `;
                        buttonTable.appendChild(buttonRow);
                    });

                    document.querySelectorAll('.view-details').forEach(button => {
                        button.addEventListener('click', event => {
                            const orderId = event.target.dataset.id;
                            fetchOrderDetails(orderId);
                        });
                    });
                } else {
                    orderTable.innerHTML = `<tr><td colspan="6">${data}</td></tr>`;
                }
            })
            .catch(error => console.error('Error fetching recent orders:', error));
    }

    function fetchOrderDetails(orderId) {
        fetch(`fetch_order_details.php?id=${orderId}`)
            .then(response => response.json())
            .then(data => {
                const orderDetailsDiv = document.getElementById('order-details');
                if (typeof data === 'string') {
                    orderDetailsDiv.innerHTML = `<p>${data}</p>`;
                } else {
                    orderDetailsDiv.innerHTML = `
                        <p>Order ID: ${data.id_pesanan}</p>
                        <p>Customer Name: ${data.customer_name}</p>
                        <p>Total: ${data.harga * data.qty}</p>
                        <p>Status: ${data.status}</p>
                    `;
                }
            })
            .catch(error => console.error('Error fetching order details:', error));
    }
});
