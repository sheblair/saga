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
    const filterInput = document.querySelector('#artists-search');
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

     // Collector prints dynamic search
     const collectorPrintsGallery = document.querySelector('#collector-prints-gallery');

     // check if we are on collector prints page or not
     if (collectorPrintsGallery) {
        const figcaptions = [...collectorPrintsGallery.querySelectorAll('figcaption')];
        const collectorPrintsSearch = document.querySelector('#wp-block-search__input-2');
        const allPrints = [...collectorPrintsGallery.querySelectorAll('figure')];
        const printCaptions = figcaptions.map(caption => caption.innerText.toLowerCase());
        
        if (collectorPrintsSearch) {
            collectorPrintsSearch.addEventListener('input', function (e) {
                const userInput = e.target.value.toLowerCase().trim();
            
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
     }
 

     // Permanent collection prints dynamic search
     const permanentCollectionGallery = document.querySelector('#permanent-collection-gallery');

     // check if we are on permanent collection page or not
     if (permanentCollectionGallery) {
        const permanentFigcaptions = [...permanentCollectionGallery.querySelectorAll('figcaption')];
        const permanentCollectionSearch = document.querySelector('#wp-block-search__input-1');
        const allPermanentPrints = [...permanentCollectionGallery.querySelectorAll('figure')];
        const permanentPrintCaptions = permanentFigcaptions.map(caption => caption.innerText.toLowerCase());
        
        if (permanentCollectionSearch) {
            permanentCollectionSearch.addEventListener('input', function (e) {
                const userInput = e.target.value.toLowerCase().trim();
               
                for (let i = 0; i < allPermanentPrints.length; i++) {
                    const printCaptionText = permanentPrintCaptions[i];
            
                    if (printCaptionText.includes(userInput)) {
                        allPermanentPrints[i].classList.remove('hide');
                    } else {
                        allPermanentPrints[i].classList.add('hide');
                    }
                }
            });
        }
     }

     // Catalogs dynamic search
     const exhibitionCatalogsList = document.querySelector('#exhibition-catalogs-list');

     if (exhibitionCatalogsList) {
        const catalogTitles = [...exhibitionCatalogsList.querySelectorAll('a')];
        const catalogsSearch = document.querySelector('#wp-block-search__input-1');
        const allCatalogs = [...exhibitionCatalogsList.querySelectorAll('.wp-block-file')];
        const catalogTitleTexts = catalogTitles.map(title => title.innerText.toLowerCase());

        if (catalogsSearch) {
            catalogsSearch.addEventListener('input', function (e) {
                const userInput = e.target.value.toLowerCase().trim();

                for (let i = 0; i < allCatalogs.length; i++) {
                    const catalogTitleText = catalogTitleTexts[i];

                    if(catalogTitleText.includes(userInput)) {
                        allCatalogs[i].classList.remove('hide');
                    } else {
                        allCatalogs[i].classList.add('hide');
                    }
                }
            });
        }
    }

}() );