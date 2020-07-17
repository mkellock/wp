var menuToggled = false;
var hamburger;
var menus;

function toggleMenu() {
	if (menuToggled) {
		hideMenu();
	} else {
		showMenu();
	}
}

function hideMenu() {
	hamburger.classList.remove('hamburger_show');
	hamburger.classList.add('hamburger_hide');

	menus.forEach(function(menu) {
		menu.classList.remove('menu_show');
		menu.classList.add('menu_hide');
	});

	menuToggled = false;
}

function showMenu() {
	hamburger.classList.remove('hamburger_hide');
	hamburger.classList.add('hamburger_show');

	menus.forEach(function(menu) {
		menu.classList.remove('menu_hide');
		menu.classList.add('menu_show');
	});

	menuToggled = true;
}

window.onload = function() {
	hamburger = document.querySelector('.hamburger');
	menus = document.querySelectorAll('.menu');

	document.addEventListener('scroll', function() {
		scroll =
			(document.documentElement['scrollTop'] || document.body['scrollTop']) /
			((document.documentElement['scrollHeight'] || document.body['scrollHeight']) -
				document.documentElement.clientHeight) *
			100;
		document.querySelector('.progress').style.setProperty('--scroll', scroll + '%');
	});

	document.querySelector('#copyright').innerHTML =
		'&copy; ' +
		new Date().getFullYear() +
		' Matthew Kellock - s3812552 - Last modified ' +
		new Date(document.lastModified).toLocaleDateString() +
		' ' +
		new Date(document.lastModified).toLocaleTimeString() +
		'.';

	document.querySelector('.hamburger').onclick = toggleMenu;

	document.querySelectorAll('.menu, article').forEach(function(menu) {
		menu.onclick = function() {
			hideMenu();
			return false;
		};
	});

	document.querySelector('#toggleWireframeCSS').onclick = toggleWireframe;
};
