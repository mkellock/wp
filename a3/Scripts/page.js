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
	menus.forEach(function (menu) {
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
	menus.forEach(function (menu) {
		menu.classList.remove('menu_hide');
		menu.classList.add('menu_show');
	});

	// Set the menu state to toggled
	menuToggled = true;
}

function showArticle() {
	let hash = window.location.hash.replace('#', '');

	// Default the hash to an empty string
	if (hash == undefined) {
		hash = '';
	}

	// If we're going to a page
	if (hash.length > 0) {
		// Show the page if the hash matches the id, else hide
		document.querySelectorAll('article').forEach(function (article) {
			article.style.display = article.id != hash ? 'none' : 'block';
		});
	} else {
		// Else default to the home page
		document.querySelectorAll('article').forEach(function (article) {
			if (article.id == 'home') {
				article.style.display = 'block';
			} else {
				article.style.display = 'none';
			}
		});
	}

	if (hash == "comments") {
		// Show the form
		document.getElementById('contactForm').style.display = 'block';

		// Hide the form successfully submitted message
		document.getElementById('contactFormSuccess').style.display = 'none';

		// Retrieve the form field values/reset the form
		// Code referenced from https://developer.mozilla.org/en-US/docs/Web/API/Window/localStorage
		document.getElementById('name').value = localStorage.getItem('Name');
		document.getElementById('email').value = localStorage.getItem('EMail');
		document.getElementById('mobile').value = localStorage.getItem('Mobile');
		document.getElementById('subject').value = "";
		document.getElementById('message').value = "";

		if (document.getElementById('name').value.length > 0)
			document.getElementById('remember').checked = true;
		else
			document.getElementById('remember').checked = false;
	}

	// Scroll to the top of the page
	// Used https://www.w3schools.com/howto/howto_js_scroll_to_top.asp
	document.body.scrollTop = 0; // For Safari
	document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

function submitForm() {
	// Hide the form
	document.getElementById('contactForm').style.display = 'none';

	// Show the form successfully submitted message
	document.getElementById('contactFormSuccess').style.display = 'block';

	// Set/clear the form field values
	// Code referenced from https://developer.mozilla.org/en-US/docs/Web/API/Window/localStorage
	if (document.getElementById('remember').checked) {
		localStorage.setItem('Name', document.getElementById('name').value);
		localStorage.setItem('EMail', document.getElementById('email').value);
		localStorage.setItem('Mobile', document.getElementById('mobile').value);
	} else {
		localStorage.removeItem('Name');
		localStorage.removeItem('EMail');
		localStorage.removeItem('Mobile');
	}

}

// Initialise the page's elements on window load
window.onload = function () {
	// Grab the menu elements
	hamburger = document.querySelector('.hamburger');
	menus = document.querySelectorAll('.menu');

	// Attach the scrolling behaviour
	document.addEventListener('scroll', function () {
		scroll =
			(document.documentElement['scrollTop'] || document.body['scrollTop']) /
			((document.documentElement['scrollHeight'] || document.body['scrollHeight']) -
				document.documentElement.clientHeight) *
			100;
		document.querySelector('.progress').style.setProperty('--scroll', scroll + '%');
	});

	// Set the hamburger menu onclick behaviour
	document.querySelector('.hamburger').onclick = toggleMenu;

	// Set the menu items on click behaviour
	document.querySelectorAll('.menu, article').forEach(function (menu) {
		menu.onclick = function () {
			// Hide the menu
			hideMenu();
		};
	});

	// Set the toggle wireframe behaviour
	document.querySelector('#toggleWireframeCSS').onclick = toggleWireframe;

	// Show the homepage/page specified in the URL
	showArticle();

	// Catch the change of page
	window.addEventListener('hashchange', showArticle);

	// Catch form submit
	// Some of this JavaScript came from https://stackoverflow.com/questions/3350247/how-to-prevent-form-from-being-submitted
	document.getElementById('contact').onsubmit = function (e) {
		e.preventDefault();
		submitForm();
		return false;
	};
};