/**
 * File index.js.
 *
 * Handles miscellaneous JS necessities.
 * 
 */
( function() {

    // Switch view from thumbnails to list when selectors are clicked
    const thumbnailSelector = document.querySelector('#thumbnail');
    const listSelector = document.querySelector('#list');
    const artistBlocks = document.querySelector('#artists-page-blocks');
    const artistList = document.querySelector('#artists-page-list');

    thumbnailSelector.addEventListener('click', () => {
        artistList.style.display = 'none';
        artistBlocks.style.display = 'block';

    })

    listSelector.addEventListener('click', () => {
        artistList.style.display = 'block';
        artistBlocks.style.display = 'none';
    })


    // Artists blocks/list dynamic search
    const filterInput = document.querySelector('#search');
    const allArtists = document.querySelectorAll('.artist');
    const artistNames = Array.from(document.querySelectorAll('.artist-name')).map(name => name.innerText.toLowerCase());
    
    filterInput.addEventListener('input', function (e) {
        const userInput = e.target.value.toLowerCase().trim(); // Trim leading and trailing spaces
    
        for (let i = 0; i < allArtists.length; i++) {
            const artistNameText = artistNames[i];
    
            if (artistNameText.includes(userInput)) {
                allArtists[i].classList.remove('hide');
            } else {
                allArtists[i].classList.add('hide');
            }
        }
    });



}() );
