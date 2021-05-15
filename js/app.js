
//Code de W3SCHOOLS
function dropdownmenu() {
	document.getElementById("menu__dropdown").classList.toggle("menu__dropdown-show");
}

const menu = document.querySelector('.nav-mid-bar__menu');

menu.addEventListener('click', () => {
	menu.classList.toggle('active');
})
