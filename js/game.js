document.addEventListener('DOMContentLoaded', (event) => {
    console.log("Script game.js sudah termuat");
    const urlParams = new URLSearchParams(window.location.search);
    const genreItems = document.querySelectorAll('.genre-item');
    let selectedGenre = urlParams.get('genre') || 'action';

    genreItems.forEach(item => {
        if (item.getAttribute('data-genre') === selectedGenre) {
            item.classList.add('active');
        } else {
            item.classList.remove('active');
        }
    });

    genreItems.forEach(item => {
        item.addEventListener('click', () => {
            const genre = item.getAttribute('data-genre');

            genreItems.forEach(i => i.classList.remove('active'));

            item.classList.add('active');

            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('genre', genre);
            window.location.search = urlParams.toString();
        });
    });
});