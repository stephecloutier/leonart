let $artistsForm = document.getElementById('filter-artists');

if($artistsForm) {
    $artistsForm.classList.remove('hide');

    let $select = document.getElementById('post-filter-artists');

    let sFilter = '';

    let aArtists = Array.from(document.getElementsByClassName('artists__item'));

    const fFilterArtists = (filter) => {
        aArtists.forEach((artist) => {
            if(filter == 'none' || artist.classList.contains(filter)) {
                artist.classList.remove('hide');
            } else {
                artist.classList.add('hide');
            }
        })
    }

    const fChangeFilter = function(event) {
        sFilter = event.target.value;
        fFilterArtists(sFilter);
    }



    $select.addEventListener('change', fChangeFilter);
}
