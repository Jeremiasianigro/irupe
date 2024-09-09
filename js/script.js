// Token de acceso (reemplaza 'YOUR_ACCESS_TOKEN' con tu token real)
const ACCESS_TOKEN = '9c8d1f60d29602a76187a0f2b3fa05dc';

// Selecciona los iframes de los videos
const video1 = document.getElementById('video1');
const video2 = document.getElementById('video2');

// Crea instancias del reproductor de Vimeo para cada video
const player1 = new Vimeo.Player(video1);
const player2 = new Vimeo.Player(video2);

// Función para reproducir un video durante 15 segundos y luego pasar al siguiente
function playVideoWithTimeout(currentPlayer, nextPlayer) {
    console.log('Reproduciendo video actual');
    currentPlayer.setCurrentTime(0).then(() => {  // Reinicia el video al inicio
        currentPlayer.play().then(() => {
            console.log('Video actual en reproducción');
            setTimeout(() => {
                currentPlayer.pause().then(() => {
                    console.log('Video actual pausado');
                    nextPlayer.setCurrentTime(0).then(() => {  // Reinicia el siguiente video al inicio
                        nextPlayer.play().then(() => {
                            console.log('Siguiente video en reproducción');
                            setTimeout(() => {
                                nextPlayer.pause().then(() => {
                                    console.log('Siguiente video pausado');
                                    playVideoWithTimeout(player1, player2);  // Reinicia el ciclo
                                });
                            }, 15000);  // 15000 ms = 15 segundos
                        });
                    });
                });
            }, 15000);  // 15000 ms = 15 segundos
        }).catch(error => console.error('Error al reproducir el video actual:', error));
    }).catch(error => console.error('Error al establecer el tiempo del video actual:', error));
}

// Comienza reproduciendo el primer video
playVideoWithTimeout(player1, player2);



