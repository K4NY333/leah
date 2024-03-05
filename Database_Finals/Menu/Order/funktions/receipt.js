function checkout() {

    var nickname = document.getElementById("nickname").value.trim();
    var address = document.getElementById("address").value.trim();
    var pnumber = document.getElementById("pnumber").value.trim();

    if (nickname === "" || address === "" || pnumber === "") {
        alert("Please fill in all required fields (Nickname, Address, Phone Number) before proceeding.");
        return;
    }

    var orderList = document.getElementById("order-list");
    var items = orderList.getElementsByTagName("li");
    var orderItems = [];
    var totalPrice = 0;

    for (var i = 0; i < items.length; i++) {
        var itemText = items[i].innerText;
        var itemName = itemText.split('-')[0].trim();
        var itemPrice = parseFloat(itemText.split('-')[1].trim());

        orderItems.push({ id: i + 1, name: itemName, price: itemPrice });
        totalPrice += itemPrice;
    }

    var totalElement = document.getElementById("total");
    totalElement.textContent = totalPrice.toFixed(2); // Assuming you want to display the total with two decimal places

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "receipt.php", true);
    xhr.setRequestHeader("Content-Type", "application/json"); // Set content type to JSON
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                console.log("Success:", xhr.responseText);

                clearInputFields();
            } else {
                console.error("Error:", xhr.statusText);
            }
        }
    };

    var jsonData = JSON.stringify({ orderItems: orderItems, totalPrice: totalPrice, nickname: nickname, address: address, pnumber: pnumber });
    xhr.send(jsonData);
    orderList.innerHTML = "<p>Order submitted. Thank you!</p>";
    console.log("orderItems=" + JSON.stringify(orderItems));
    console.log("Total Price=" + totalPrice);
}
function clearInputFields() {
    document.getElementById("nickname").value = "";
    document.getElementById("address").value = "";
    document.getElementById("pnumber").value = "";
    document.getElementById("total").textContent = "0.00";
}
