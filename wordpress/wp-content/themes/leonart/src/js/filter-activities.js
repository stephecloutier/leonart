let $activitiesForm = document.getElementById('filter-activities');

if($activitiesForm) {
    $activitiesForm.classList.remove('hide');

    let $selectType = document.getElementById('post-filter-activities');
    let $selectDate = document.getElementById('post-filter-activities-date')

    let sDateFilter = '';
    let sTypeFilter = '';

    let aActivities = Array.from(document.getElementsByClassName('activity'));
    let aDates = Array.from(document.getElementsByClassName('agenda__day'));
    console.log(aDates);

    let iCountActivities = 0;

    const fFilterActivities = (filter) => {
        aActivities.forEach((activity) => {
            if(filter == 'none' || activity.classList.contains(filter)) {
                activity.classList.remove('hide');
            } else {
                activity.classList.add('hide');
            }
        })

    }

    const fFilterDates = (filter) => {
        aDates.forEach((date) => {
            if(filter == 'none' || date.classList.contains(filter)) {
                date.classList.remove('hide');
            } else {
                date.classList.add('hide');
            }
        })
    }

    const fChangeTypeFilter = function(event) {
        sTypeFilter = event.target.value;
        fFilterActivities(sTypeFilter);
    }
    const fChangeDateFilter = function(event) {
        sDateFilter = event.target.value;
        fFilterDates(sDateFilter);
    }



    $selectType.addEventListener('change', fChangeTypeFilter);
    $selectDate.addEventListener('change', fChangeDateFilter);
}
