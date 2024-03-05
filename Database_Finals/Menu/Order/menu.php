<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menudisplay.css">
</head>
<body>

<script src="../Order/funktions/menulisting.js"></script>

    <input class="search" type="text" id="searchInput" placeholder="Search..." oninput="searchItems()">
    <div class="catcon">
    <img class="category-btn" src="../../images/.png" alt="" id="schlogo">
        <div class="category-btn" id="all" onclick="selectCategory('All')" ><img src="../../images/grid.png" alt=""></div>
        <div class="category-btn" id="solo" onclick="selectCategory('Solo')"><img src="../../images/barbecue.png" alt=""></div>
        <div class="category-btn" id="meal" onclick="selectCategory('Meal')"><img src="../../images/steak.png" alt=""></div>
        <div class="category-btn" id="combo" onclick="selectCategory('Combo')"><img src="../../images/bbqq.png" alt=""></div>
        <div class="category-btn" id="drink" onclick="selectCategory('Drink')"><img src="../../images/sodaa.png" alt=""></div>
        <div class="alltxt"></div> <!-- supposedly for ttxt but when i remove it the placing messed up  -->
    </div>

    <label class="one">ALL</label>
    <label class="two">SOLO</label>
    <label class="thr">MEAL</label>
    <label class="fou">COMBO'S</label>
    <label class="fiv">DRINK'S</label>

    
    <script src="../Order/funktions/displayorders.js"></script>
    <div id="menudisplay">
        <ul id="menu-list">

            <?php

            $db_host = 'localhost';
            $db_user = 'root';
            $db_password = '';
            $db_name = 'db_finals';
            $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM menu_items";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li class='menu-item' data-category='{$row['category']}'>
                            <strong>{$row['name']}</strong> - {$row['price']} 
                            <button onclick='addToOrder({$row['id']}, \"{$row['name']}\", {$row['price']})'>Add to Order</button>
                          </li>";
                }
            } else {
                echo "No menu items available.";
            }

            mysqli_close($conn);
            ?>
        </ul>
    </div>

    <script src="../Order/funktions/customer.js"></script>
<div class="myorderbg">
        <h2 class="ttl">My orders</h2>
        <p>Total: <span id="total">0.00</span></p>
        
        
        <div class="customer" onclick="openModall()"><img src="../../images/customer.png" alt=""></div>
    <div id="myModal" class="modal">
        <span class="close" onclick="closeModall()"><img src="../../images/fork.png" alt=""></span>
    <div id="result"></div>
        <input type="text" id="nickname" name="nickname" placeholder="Nickname:" required><br>
        <input type="text" id="address" name="address" placeholder="Address:" required><br>
        <input type="tel" id="pnumber" name="pnumber" placeholder="11 digit NUM::" pattern="[0-9]{11}" required>
            
        <input onclick="closeModall()" class="submit" value="Done" >
       
    </div>
    <button class="ckb" onclick="checkout()">Checkout</button>
</div>
<script src="../Order/funktions/receipt.js"></script>

    <div id="myorder">
        <ul id="order-list">___________________________________</ul>
        
    </div>

</body>
</html>
