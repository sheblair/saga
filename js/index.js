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
    copyright.innerText = `©${currentYear} Society of American Graphic Artists`;

    // View selectors for Artists page and Single Artist page
    const thumbnailSelector = document.querySelector('#thumbnail');
    const listSelector = document.querySelector('#list');
    const printsSelector = document.querySelector('#prints');
    const bioSelector = document.querySelector('#bio');
    const artistBlocks = document.querySelector('#artists-page-blocks');
    const artistList = document.querySelector('#artists-page-list');
    const artistPrints = document.querySelector('#artist-prints');
    const artistBio = document.querySelector('#artist-bio');

    // Check if thumbnails selector exists
    if (thumbnailSelector) {
        // Add event listener to display thumbnails view and bold thumbnails selector when it is clicked
        thumbnailSelector.addEventListener('click', () => {
            artistList.style.display = 'none';
            artistBlocks.style.display = 'flex';

            listSelector.classList.remove('bold');
            thumbnailSelector.classList.add('bold');
        })
    }

    // Check if list selector exists
    if (listSelector) {
        // Add event listener to display list view and bold list selector when it is clicked
        listSelector.addEventListener('click', () => {
            artistList.style.display = 'flex';
            artistBlocks.style.display = 'none';

            listSelector.classList.add('bold');
            thumbnailSelector.classList.remove('bold');
        })
    }

    // If only prints and no bio, make the prints selector appear unclickable by setting cursor to auto instead of pointer
    if (!bioSelector && printsSelector) {
        printsSelector.style.cursor = 'auto';
    /* If bio but no prints, bold bio selector, make it appear unclickable by setting cursor to auto,
        and make the biography section display by default */
    } else if (!printsSelector && bioSelector) {
        bioSelector.classList.add('bold');
        bioSelector.style.cursor = 'auto';
        artistBio.style.display = 'block';
    }
    /* Otherwise, deliver full functionality to both bio selector and prints selector
        to show/hide and add/remove bold class upon user click */
     else if (bioSelector && printsSelector) {
        printsSelector.addEventListener('click', () => {
            artistBio.style.display = 'none';
            artistPrints.style.display = 'flex';

            bioSelector.classList.remove('bold');
            printsSelector.classList.add('bold');
        });

        bioSelector.addEventListener('click', () => {
            artistBio.style.display = 'block';
            artistPrints.style.display = 'none';

            bioSelector.classList.add('bold');
            printsSelector.classList.remove('bold');
        });
    }

    // View selector for News page
    const igSelector = document.querySelector('#instagram');
    const memberNewsSelector = document.querySelector('#member-news');
    const inMemoriamSelector = document.querySelector('#in-memoriam');
    const igFeed = document.querySelector('#sb_instagram');
    const memberNewsLoop = document.querySelector('.member-news-loop');
    const inMemoriamLoop = document.querySelector('.in-memoriam-loop');

    // Check if we are on the News page by checking for all of the selectors
    if (igSelector && memberNewsSelector && inMemoriamSelector) {
        // Add event listener for selector to view Member News tab
        memberNewsSelector.addEventListener('click', () => {
            memberNewsLoop.style.display = 'block';
            igFeed.style.display = 'none';
            inMemoriamLoop.style.display = 'none';

            memberNewsSelector.classList.add('bold');
            igSelector.classList.remove('bold');
            inMemoriamSelector.classList.remove('bold');
        });
        // Add event listener for selector to view Latest Posts tab
        igSelector.addEventListener('click', () => {
            igFeed.style.display = 'block';
            inMemoriamLoop.style.display = 'none';
            memberNewsLoop.style.display = 'none';

            igSelector.classList.add('bold');
            inMemoriamSelector.classList.remove('bold');
            memberNewsSelector.classList.remove('bold');
        });
        // Add event listener for selector to view In Memoriam tab
        inMemoriamSelector.addEventListener('click', () => {
            inMemoriamLoop.style.display = 'block';
            igFeed.style.display = 'none';
            memberNewsLoop.style.display = 'none';

            inMemoriamSelector.classList.add('bold');
            igSelector.classList.remove('bold');
            memberNewsSelector.classList.remove('bold');
        });

    }

    // Artists page dynamic search
    const artistsSearch = document.querySelector('#artists-search');
    const allArtists = document.querySelectorAll('.artist');
    const artistNames = Array.from(document.querySelectorAll('.artist-name')).map(name => name.textContent.toLowerCase());

    // Check if we are on Artists page and if the search input exists
    if (artistsSearch) {
        // Add event listener for user input
        artistsSearch.addEventListener('input', (e) => {
            // Convert user input to lowercase and trim leading and trailing spaces
            const userInput = e.target.value.toLowerCase().trim();
            // Loop through all artists and show/hide based on user input
            for (let i = 0; i < allArtists.length; i++) {
                const artistNameText = artistNames[i];

                if (!artistNameText.includes(userInput)) {
                    allArtists[i].classList.add('hide');
                } else {
                    allArtists[i].classList.remove('hide');
                }
            }
        });
    }

     // Collector prints dynamic search
     const collectorPrintsGallery = document.querySelector('#collector-prints-gallery');

     // Check if we are on collector prints page
     if (collectorPrintsGallery) {
        const figcaptions = [...collectorPrintsGallery.querySelectorAll('figcaption')];
        const collectorPrintsSearch = document.querySelector('.collector-prints-search');
        const allPrints = [...collectorPrintsGallery.querySelectorAll('figure')];
        const printCaptions = figcaptions.map(caption => caption.textContent.toLowerCase());

        // Check if the search input exists
        if (collectorPrintsSearch) {
            // Prevent form submission to prevent triggering a global search
            collectorPrintsSearch.addEventListener('submit', (e) => {
                e.preventDefault();
            });

            // Add event listener for user input
            collectorPrintsSearch.addEventListener('input', (e) => {
                // Convert user input to lowercase and trim leading and trailing spaces
                const userInput = e.target.value.toLowerCase().trim();

                // Loop through all prints and show/hide based on user input
                for (let i = 0; i < allPrints.length; i++) {
                    const printCaptionText = printCaptions[i];

                    if (!printCaptionText.includes(userInput)) {
                        allPrints[i].classList.add('hide');
                    } else {
                        allPrints[i].classList.remove('hide');
                    }
                }
            });
        }
     }


     // Permanent Collection prints dynamic search
     const permanentCollectionGallery = document.querySelector('#permanent-collection-gallery');

     // Check if we are on Permanent Collection page
     if (permanentCollectionGallery) {
        const permanentFigcaptions = [...permanentCollectionGallery.querySelectorAll('figcaption')];
        const permanentCollectionSearch = document.querySelector('.permanent-collection-search');
        const allPermanentPrints = [...permanentCollectionGallery.querySelectorAll('figure')];
        const permanentPrintCaptions = permanentFigcaptions.map(caption => caption.textContent.toLowerCase());

        // Check if search input exists
        if (permanentCollectionSearch) {
            // Prevent form submission to prevent triggering a global search
            permanentCollectionSearch.addEventListener('submit', (e) => {
                e.preventDefault();
            });

            // Add event listener for user input
            permanentCollectionSearch.addEventListener('input', (e) => {
                // Convert user input to lowercase and trim leading and trailing spaces
                const userInput = e.target.value.toLowerCase().trim();

                // Loop through all prints and show/hide based on user input
                for (let i = 0; i < allPermanentPrints.length; i++) {
                    const printCaptionText = permanentPrintCaptions[i];

                    if (!printCaptionText.includes(userInput)) {
                        allPermanentPrints[i].classList.add('hide');
                    } else {
                        allPermanentPrints[i].classList.remove('hide');
                    }
                }
            });
        }
     }

     // Catalogs dynamic search
     const exhibitionCatalogsList = document.querySelector('#exhibition-catalogs-list');

     // Check if we are on Annual Members Exhibitions page
     if (exhibitionCatalogsList) {
        const catalogTitles = [...exhibitionCatalogsList.querySelectorAll('a')];
        const catalogsSearch = document.querySelector('.catalogs-search');
        const allCatalogs = [...exhibitionCatalogsList.querySelectorAll('.wp-block-file')];
        const catalogTitleTexts = catalogTitles.map(title => title.textContent.toLowerCase());

        // Check if search input exists
        if (catalogsSearch) {
            // Prevent form submission to prevent triggering a global search
            catalogsSearch.addEventListener('submit', (e) => {
                e.preventDefault();
            });

            catalogsSearch.addEventListener('input', (e) => {
                // Convert user input to lowercase and trim leading and trailing spaces
                const userInput = e.target.value.toLowerCase().trim();

                // Loop over all catalogs and show/hide based on user input
                for (let i = 0; i < allCatalogs.length; i++) {
                    const catalogTitleText = catalogTitleTexts[i];

                    if(!catalogTitleText.includes(userInput)) {
                        allCatalogs[i].classList.add('hide');
                    } else {
                        allCatalogs[i].classList.remove('hide');
                    }
                }
            });
        }
    }

    // Past members dynamic search
    const pastMembersList = document.querySelector('#past-members-list');

    // Check if we are on Past Members page
    if (pastMembersList) {
        const pastMembersElements = [...pastMembersList.querySelectorAll('p')];
        const pastMembersSearch = document.querySelector('.past-members-search');
        const pastMembersNames = pastMembersElements.map(title => title.textContent.toLowerCase());

        // Check if search input exists
        if (pastMembersSearch) {
            // Prevent form submission to prevent triggering a global search
            pastMembersSearch.addEventListener('submit', (e) => {
                e.preventDefault();
            });

            // Add event listener to track user input in search input
            pastMembersSearch.addEventListener('input', (e) => {
                // Convert user input to lowercase and trim leading and trailing spaces
                const userInput = e.target.value.toLowerCase().trim();

                // Loop over past members and show/hide based on user input
                for (let i = 0; i < pastMembersElements.length; i++) {
                    const pastMemberName = pastMembersNames[i];

                    if(!pastMemberName.includes(userInput)) {
                        pastMembersElements[i].classList.add('hide');
                    } else {
                        pastMembersElements[i].classList.remove('hide');
                    }
                }
            });
        }
    }

}() );