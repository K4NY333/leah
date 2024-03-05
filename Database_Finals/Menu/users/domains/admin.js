function openModal3() {
    var modal = document.getElementById('myModal3');
    modal.style.display = 'block';

    loadPHPContent('admin.php', 'modalContent3');
}
function closeModal3() {
    var modal = document.getElementById('myModal3');
    modal.style.display = 'none';
}
function loadPHPContent(url, targetElementId) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById(targetElementId).innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

if (window !== window.top) {
    window.top.location.href = window.location.href;
}

