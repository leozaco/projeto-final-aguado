// Seleciona os elementos
const loginBtn = document.getElementById('loginBtn');
const loginPopup = document.getElementById('loginPopup');
const closePopup = document.getElementById('closePopup');

// Abre o pop-up ao clicar no botão
loginBtn.addEventListener('click', function() {
    loginPopup.style.display = 'flex';  // Exibe o pop-up como flexbox
});

// Fecha o pop-up ao clicar no "X"
closePopup.addEventListener('click', function() {
    loginPopup.style.display = 'none';  // Oculta o pop-up
});

// Fecha o pop-up ao clicar fora do conteúdo
window.addEventListener('click', function(event) {
    if (event.target == loginPopup) {
        loginPopup.style.display = 'none';  // Oculta o pop-up
    }
});

function toggleContent(cifraId, videoId) {
    const cifra = document.getElementById(cifraId);
    const video = document.getElementById(videoId);
    
    
    if (cifra.style.display === "none" || cifra.style.display === "") {
        cifra.style.display = "block"; 
    } else {
        cifra.style.display = "none"; 
    }


    if (video.style.display === "none" || video.style.display === "") {
        video.style.display = "block"; 
    } else {
        video.style.display = "none"; 
    }
}