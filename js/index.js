/**
 * File index.js.
 *
 * Handles miscellaneous JS necessities.
 * 
 */
( function() {

    // Automatically update copyright year to current year
	const copyright = document.querySelector('.copyright');
    const currentYear = new Date().getFullYear();
    copyright.innerText = `© ${currentYear} Society of American Graphic Artists`;

    // View selectors for Artists page and Single Artist page
    const thumbnailSelector = document.querySelector('#thumbnail');
    const listSelector = document.querySelector('#list');
    const printsSelector = document.querySelector('#prints');
    const bioSelector = document.querySelector('#bio');
    const artistBlocks = document.querySelector('#artists-page-blocks');
    const artistList = document.querySelector('#artists-page-list');
    const artistPrints = document.querySelector('#artist-prints');
    const artistBio = document.querySelector('#artist-bio');

    if (thumbnailSelector) {
        thumbnailSelector.addEventListener('click', () => {
            artistList.style.display = 'none';
            artistBlocks.style.display = 'flex';
            
            listSelector.classList.remove('bold');
            thumbnailSelector.classList.add('bold');
        })    
    }
  

    if (listSelector) {
        listSelector.addEventListener('click', () => {
            artistList.style.display = 'flex';
            artistBlocks.style.display = 'none';
    
            listSelector.classList.add('bold');
            thumbnailSelector.classList.remove('bold');
        })   
    }

    if (printsSelector) {
        printsSelector.addEventListener('click', () => {
            artistBio.style.display = 'none';
            artistPrints.style.display = 'flex';
            
            bioSelector.classList.remove('bold');
            printsSelector.classList.add('bold');
        })
    }

    if (bioSelector) {
        bioSelector.addEventListener('click', () => {
            artistPrints.style.display = 'none';
            artistBio.style.display = 'flex';
            
            printsSelector.classList.remove('bold');
            bioSelector.classList.add('bold');
        })
    }    

    // View selector for News page
    const igSelector = document.querySelector('#instagram');
    const newsSelector = document.querySelector('#news-selector');
    const igFeed = document.querySelector('#sb_instagram');
    const newsLoop = document.querySelector('.news-items-loop');

    if (newsSelector) {
        newsSelector.addEventListener('click', () => {
            igFeed.classList.add('hide');
            newsLoop.classList.remove('hide');

            igSelector.classList.remove('bold');
            newsSelector.classList.add('bold');
        })
    }

    if (igSelector) {
        igSelector.addEventListener('click', () => {
            igFeed.classList.remove('hide');
            newsLoop.classList.add('hide');

            newsSelector.classList.remove('bold');
            igSelector.classList.add('bold');
        })
    }

    // Artists page dynamic search
    const filterInput = document.querySelector('#search');
    const allArtists = document.querySelectorAll('.artist');
    const artistNames = Array.from(document.querySelectorAll('.artist-name')).map(name => name.innerText.toLowerCase());
    
    if (filterInput) {
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
    }

     // Collector Prints dynamic search
     const collectorPrintsSearch = document.querySelector('#wp-block-search__input-2');
     const allPrints = document.querySelectorAll('.collector-print');
     const printCaptions = Array.from(document.querySelectorAll('.collector-print-caption')).map(caption => caption.innerText.toLowerCase());

     console.log(collectorPrintsSearch, allPrints, printCaptions)
     
     if (collectorPrintsSearch) {
         collectorPrintsSearch.addEventListener('input', function (e) {
             const userInput = e.target.value.toLowerCase().trim(); // Trim leading and trailing spaces
         
             for (let i = 0; i < allPrints.length; i++) {
                 const printCaptionText = printCaptions[i];
         
                 if (printCaptionText.includes(userInput)) {
                     allPrints[i].classList.remove('hide');
                 } else {
                     allPrints[i].classList.add('hide');
                 }
             }
         });
     }
  


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