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

    // Artists page dynamic search
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


    // function fetchAllArtists() {
    //     const perPage = 200;
    //     fetch(`http://localhost:8888/saga/wp-json/wp/v2/artist?per_page=${perPage}`)
    //       .then((response) => response.json())
    //       .then((data) => {
    //         const allArtists = document.querySelectorAll('.artist');
    //         const artistNames = data.map((artist) => artist.title.rendered.toLowerCase());
      
    //         // Add a custom attribute to each artist element to store its name
    //         allArtists.forEach((artist, index) => {
    //           artist.dataset.name = artistNames[index];
    //         });
    //         console.log(artistNames);

    //       })
    //       .catch((error) => {
    //         console.error('Error fetching artist data:', error);
    //       });

    //   }

    // When DOM loads, fetch artist data
//     document.addEventListener('DOMContentLoaded', () => {
//         fetchAllArtists();
//       });


//     const filterInput = document.querySelector('#search');

//     filterInput.addEventListener('input', function (e) {
//     const userInput = e.target.value.toLowerCase().trim(); // Trim leading and trailing spaces
//     const allArtists = document.querySelectorAll('.artist');

//     allArtists.forEach((artist) => {
//         const artistNameText = artist.dataset.name;

//         if (artistNameText.includes(userInput)) {
//         artist.classList.remove('hide');
//         } else {
//         artist.classList.add('hide');
//         }
//     })

// });

    // Artists page dynamic search using WordPress REST API
    // const filterInput = document.querySelector('#search');

    // filterInput.addEventListener('input', function (e) {
    // const userInput = e.target.value.toLowerCase().trim(); // Trim leading and trailing spaces

    // // Perform the search using the REST API
    // fetch(`https://localhost:8888/saga/wp-json/wp/v2/artist?search=${userInput}`)
    //     .then((response) => response.json())
    //     .then((data) => {
    //     const allArtists = document.querySelectorAll('.artist');

    //     if (data.length > 0) {
    //         const artistNames = data.map((artist) => artist.title.rendered.toLowerCase());

    //         for (let i = 0; i < allArtists.length; i++) {
    //         const artistNameText = artistNames[i];

    //         if (artistNameText.includes(userInput)) {
    //             allArtists[i].classList.remove('hide');
    //         } else {
    //             allArtists[i].classList.add('hide');
    //         }
    //         }
    //     } else {
    //         // If no results found, hide all artists
    //         allArtists.forEach((artist) => artist.classList.add('hide'));
    //     }
    //     })
    //     .catch((error) => {
    //     console.error('Error fetching data:', error);
    //     });
    // });



}() );