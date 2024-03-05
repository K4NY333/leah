function openUserPanel() {
    var userPanel = document.getElementById('userPanel');
    var userInfo = document.getElementById('userInfo');

    loadPHPContent('../signin.php', userInfo);

    userPanel.style.display = 'block';
}
function closeUserPanel() {
    var userPanel = document.getElementById('userPanel');
    userPanel.style.display = 'none';
}
function logout() {
    alert('Logging out...');
    window.location.href = '../../Inuling Barbeque House.html';
}
function loadPHPContent(url, targetElement) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            targetElement.innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

