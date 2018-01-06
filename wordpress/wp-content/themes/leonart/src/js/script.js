let $burgerMenu = document.getElementById('burger-menu');
let $mainNav = document.getElementById('main-nav');

const fToggleMenu = () => {
    $mainNav.classList.toggle('hide-nav');
}

$burgerMenu.addEventListener('click', fToggleMenu);