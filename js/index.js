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


}() );
