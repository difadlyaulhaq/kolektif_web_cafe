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
                            <td>${order.customer_name}</td>
                            <td>${order.total}</td>
                            <td>${order.status}</td>
                        `;
                        orderTable.appendChild(row);

                        const buttonRow = document.createElement('tr');
                        buttonRow.innerHTML = `
                            <td><button class="view-details" data-id="${order.id}">View Details</button></td>
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
                    orderTable.innerHTML = `<tr><td colspan="4">${data}</td></tr>`;
                }
            })
            .catch(error => console.error('Error fetching recent orders:', error));
    }

    function fetchOrderDetails(orderId) {
        fetch(`fetch_order_details.php?id=${orderId}`)
            .then(response => response.json())
            .then(data => {
                const orderDetailsDiv = document.getElementById('order-details');
                orderDetailsDiv.innerHTML = `
                    <p>Order ID: ${data.id}</p>
                    <p>Customer Name: ${data.customer_name}</p>
                    <p>Total: ${data.total}</p>
                    <p>Status: ${data.status}</p>
                    <p>Items:</p>
                    <ul>
                        ${data.items.map(item => `<li>${item.name} - ${item.quantity}</li>`).join('')}
                    </ul>
                    <button id="update-status" data-id="${data.id}">Update Status</button>
                `;

                document.getElementById('update-status').addEventListener('click', () => {
                    updateOrderStatus(data.id);
                });
            })
            .catch(error => console.error('Error fetching order details:', error));
    }

    function updateOrderStatus(orderId) {
        fetch('update_order_status.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `id=${orderId}`,
        })
            .then(response => response.text())
            .then(result => {
                alert(result);
            })
            .catch(error => console.error('Error updating order status:', error));
    }
});
