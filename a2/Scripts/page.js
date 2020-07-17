// Global variables
var menuToggled = false;
var hamburger;
var menus;

// Shows or hides the menu depending on its current state
function toggleMenu() {
	if (menuToggled) {
		hideMenu();
	} else {
		showMenu();
	}
}

// Hides the menu
function hideMenu() {
	// Change the hamburger menu's attached classes
	hamburger.classList.remove('hamburger_show');
	hamburger.classList.add('hamburger_hide');

	// Change the menu items attached classes
	menus.forEach(function(menu) {
		menu.classList.remove('menu_show');
		menu.classList.add('menu_hide');
	});

	// Set the menu state to untoggled
	menuToggled = false;
}

// Shows the menu
function showMenu() {
	// Change the hamburger menu's attached classes
	hamburger.classList.remove('hamburger_hide');
	hamburger.classList.add('hamburger_show');

	// Change the menu items attached classes
	menus.forEach(function(menu) {
		menu.classList.remove('menu_hide');
		menu.classList.add('menu_show');
	});

	// Set the menu state to toggled
	menuToggled = true;
}

// Initialise the page's elements on window load
window.onload = function() {
	// Grab the menu elements
	hamburger = document.querySelector('.hamburger');
	menus = document.querySelectorAll('.menu');

	// Attach the scrolling behaviour
	document.addEventListener('scroll', function() {
		scroll =
			(document.documentElement['scrollTop'] || document.body['scrollTop']) /
			((document.documentElement['scrollHeight'] || document.body['scrollHeight']) -
				document.documentElement.clientHeight) *
			100;
		document.querySelector('.progress').style.setProperty('--scroll', scroll + '%');
	});

	// Set the copyright content
	document.querySelector('#copyright').innerHTML =
		'&copy; ' +
		new Date().getFullYear() +
		' Matthew Kellock - s3812552 - Last modified ' +
		new Date(document.lastModified).toLocaleDateString() +
		' ' +
		new Date(document.lastModified).toLocaleTimeString() +
		'.';

	// Set the hamburger menu onclick behaviour
	document.querySelector('.hamburger').onclick = toggleMenu;

	// Set the menu items on click behaviour
	document.querySelectorAll('.menu, article').forEach(function(menu) {
		menu.onclick = function() {
			hideMenu();
			return false;
		};
	});

	// Set the toggle wireframe behaviour
	document.querySelector('#toggleWireframeCSS').onclick = toggleWireframe;
};
