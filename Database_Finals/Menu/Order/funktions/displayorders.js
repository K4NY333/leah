function addToOrder(id, name, price) {
    const li = document.createElement("li");
    li.innerHTML = `${name} - $${price.toFixed(2)}`;
    document.getElementById("order-list").appendChild(li);

    const currentTotal = parseFloat(document.getElementById("total").innerText);
    document.getElementById("total").innerText = (currentTotal + price).toFixed(2);
}
function updateTotal() {
    var orderList = document.getElementById('order-list');
    var totalElement = document.getElementById('total');
    var items = orderList.getElementsByTagName('li');
    var total = 0;

    for (var i = 0; i < items.length; i++) {
        var quantity = parseInt(items[i].querySelector('span').innerText, 10);
        var price = parseFloat(items[i].innerText.split('₱')[1]); 
        total += quantity * price;
    }

    totalElement.innerText = "₱" + total.toFixed(2);
}
function addToOrder(id, name, price) {
    var orderList = document.getElementById('order-list');
    var existingItem = document.getElementById('order-item-' + id);

    if (existingItem) {
        var quantityElement = document.getElementById('quantity' + id);
        var quantity = parseInt(quantityElement.innerText, 10) + 1;
        quantityElement.innerText = quantity;
    } else {
        var newItem = document.createElement('li');
        newItem.id = 'order-item-' + id;
        newItem.innerHTML = "<strong>" + name + "</strong> - ₱" + price + " " +
                            "<button class='quantity-button' onclick='reduceQuantity(" + id + ")'>-</button>" +
                            "<span class='quantity' id='quantity" + id + "'>1</span>" +
                            "<button class='quantity-button' onclick='addQuantity(" + id + ")'>+</button>";
        orderList.appendChild(newItem);
    }
    updateTotal();
}
function addQuantity(id) {
    var quantityElement = document.getElementById('quantity' + id);
    var quantity = parseInt(quantityElement.innerText, 10) + 1;
    quantityElement.innerText = quantity;

    updateTotal();
}
function reduceQuantity(id) {
    var quantityElement = document.getElementById('quantity' + id);
    var quantity = parseInt(quantityElement.innerText, 10);

    if (quantity > 0) {
        quantityElement.innerText = quantity - 1;
    if (quantity === 1) {
        var orderItem = document.getElementById('order-item-' + id);
        orderItem.parentNode.removeChild(orderItem);
    }
        updateTotal();
    }
}