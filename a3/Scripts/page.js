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

// Handles showing the correct article
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

// Handles form submissions
function submitForm() {
	// Retrieve the form values
	let name = document.getElementById('name').value;
	let email = document.getElementById('email').value;
	let mobile = document.getElementById('mobile').value;
	let subject = document.getElementById('subject').value;
	let message = document.getElementById('message').value;
	let submit = document.getElementById('submitForm').value;

	// Set/clear the form field values
	// Code referenced from https://developer.mozilla.org/en-US/docs/Web/API/Window/localStorage
	if (document.getElementById('remember').checked) {
		localStorage.setItem('Name', name);
		localStorage.setItem('EMail', email);
		localStorage.setItem('Mobile', mobile);
	} else {
		localStorage.removeItem('Name');
		localStorage.removeItem('EMail');
		localStorage.removeItem('Mobile');
	}

	// Code from https://www.w3schools.com/xml/ajax_xmlhttprequest_send.asp
	// https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURI
	// and https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/response
	var xhr = new XMLHttpRequest();

	// Set the callback
	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4) {
			var response = JSON.parse(xhr.response);

			if (response.status == 0) {
				// Hide the form
				document.getElementById('contactForm').style.display = 'none';

				// Show the form successfully submitted message
				document.getElementById('contactFormSuccess').style.display = 'block';
				document.getElementById('contactFormSuccess').innerText = response.message;
			} else {
				// Select the correct field and invalid it with the server-side message
				switch (response.status) {
					case 1:
						document.getElementById('name').setCustomValidity(response.message);
						break;
					case 2:
						document.getElementById('email').setCustomValidity(response.message);
						break;
					case 3:
						document.getElementById('subject').setCustomValidity(response.message);
						break;
					case 4:
						document.getElementById('message').setCustomValidity(response.message);
						break;
					case 5:
						document.getElementById('mobile').setCustomValidity(response.message);
						break;
				}

				// Trigger the form validation
				document.getElementById('contact').reportValidity();
			}
		}
	}

	// Open the page and send the form contents
	xhr.open("POST", "tools.php", true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("name=" + encodeURI(name) +
		"&email=" + encodeURI(email) +
		"&mobile=" + encodeURI(mobile) +
		"&subject=" + encodeURI(subject) +
		"&message=" + encodeURI(message) +
		"&submitForm=" + encodeURI(submit));

}

// Removes custom validation messages
function clearCustomValidation() {
	this.setCustomValidity("");
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

	// Set custom validation clearing behaviour
	document.getElementById('name').oninput = clearCustomValidation;
	document.getElementById('email').oninput = clearCustomValidation;
	document.getElementById('mobile').oninput = clearCustomValidation;
	document.getElementById('subject').oninput = clearCustomValidation;
	document.getElementById('message').oninput = clearCustomValidation;

	// Catch form submit
	// Some of this JavaScript came from https://stackoverflow.com/questions/3350247/how-to-prevent-form-from-being-submitted
	document.getElementById('contact').onsubmit = function (e) {
		e.preventDefault();
		submitForm();
		return false;
	};
};