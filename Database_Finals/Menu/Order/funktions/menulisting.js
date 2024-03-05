function searchItems() {
    var searchInput = document.getElementById('searchInput').value.toLowerCase();
    var menuItems = document.querySelectorAll('.menu-item');

    menuItems.forEach(function(item) {
        var itemName = item.querySelector('strong').innerText.toLowerCase();
        if (itemName.includes(searchInput)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}
function filterMenuItems(category) {
    var menuItems = document.querySelectorAll('.menu-item');
    
    menuItems.forEach(function(item) {
        item.style.display = 'none';
        if (category === 'All' || item.getAttribute('data-category') === category) {
            item.style.display = 'block';
        }
    });
}
function selectCategory(category) {
    var categoryButtons = document.getElementsByClassName("category-btn");
    for (var i = 0; i < categoryButtons.length; i++) {
        categoryButtons[i].classList.remove("selected");
    }
    document.getElementById(category.toLowerCase()).classList.add("selected");

    filterMenuItems(category);
}
