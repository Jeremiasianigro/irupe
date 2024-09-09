console.log('Script cargado correctamente');

document.addEventListener('DOMContentLoaded', function() {
    const filmsButton = document.getElementById('filmsButton');
    const seriesButton = document.getElementById('seriesButton');
    const filmsSection = document.querySelector('.CardsPeliculas');
    const seriesSection = document.querySelector('.cardsSeries');

    // Mostrar sección de películas por defecto y ocultar la de series
    filmsSection.style.display = 'block';
    seriesSection.style.display = 'none';

    // Manejar el clic en el botón de Películas
    filmsButton.addEventListener('click', function() {
        filmsSection.style.display = 'block';
        seriesSection.style.display = 'none';
    });

    // Manejar el clic en el botón de Series
    seriesButton.addEventListener('click', function() {
        filmsSection.style.display = 'none';
        seriesSection.style.display = 'block';
    });
});
;
