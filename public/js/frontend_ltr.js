$(function () {
	'use strict';

	// Table Blog
	$('#example-table').DataTable();
	

	var paddingtop = $('header.topbar').innerHeight();
	var side_nav_widht = $('.side_nav').innerWidth();

	// $('.contents').css('padding-top', paddingtop); // Set Content padding
	$('.side_nav').css('top', paddingtop); // Set side nav top css style
	$('.side_nav').innerHeight(window.innerHeight - paddingtop); // Set The Side Bar height
	$('.side_nav').css('left', 0 + 'px'); // For Show the Side Bar
	$('.contents').css('margin-left', $('.side_nav').innerWidth()); // For Compatible The Content With Side Bar			


	// Show And Display the Side Bar 
	$('header.topbar .fa-bars').click(function () {
		if ($(this).hasClass('fa-rotate-90')) {
 			$(this).removeClass('fa-rotate-90');
			$('.side_nav').css('left', '-' + side_nav_widht + 'px');
			$('.contents').css('margin-left', 0);
		} else {
			$(this).addClass('fa-rotate-90');
			$('.side_nav').css('left', 0);
			$('.contents').css('margin-left', $('.side_nav').innerWidth());			
		}
	});

	$('.side_content a.sub_head_child').click(function () {
		$(this).parent().toggleClass('selected');
		$(this).next('div').slideToggle();
	});
	
	// Hide The Session Message After Show It
	$('.hidden').delay(5000).fadeOut(1000);


});


// TODO : MAKE ALL AJAX FUNCTION IN ONE FUNCTION 
// Self Execute Function For Ajax
(function () {
	var inputField = document.querySelector('input[name="username"]');
	// Check If The Input Is Empty
	if (inputField !== null) {
		// Add New Event To The InputField
		inputField.addEventListener('blur', function () {
			var v = this.value;
			var req = new XMLHttpRequest(); // Start Ajax Header Request
			req.onreadystatechange = function () {
				// check If The Connection Has A problem Or Not
				if (req.readyState == req.DONE && req.status == 200) {
					var IElm = document.createElement('i'); 
					if (req.response == 1) { // If The Response Number 1 : Mean The User Is Exists
						IElm.className = 'fa fa-times text-danger ajax-times hidden';
					} else if (req.response == 2) { // If The Response Number 2 : Mean The User Isn't Exists
						IElm.className = 'fa fa-check text-success ajax-check hidden';
					}
					// Fetch All input sibling
					var IElms = inputField.parentNode.childNodes;					
					for (var i = 0, ii = IElms.length; i < ii; i++) {
						// Search For Element has tag name i
						if (IElms[i].nodeName.toLowerCase() == 'i') {
							inputField.parentNode.removeChild(IElms[i]);
						}
					}
					inputField.parentNode.appendChild(IElm); // append The created Element To the document
				}
			}

			req.open('POST', 'http://mvcapp.dev/users/checkUserExistsAjax', true);
			req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			req.send('username=' + v);
		}, false);
	}
})();

// Self Execute Function For Ajax For Users Email
(function () {
	var inputField = document.querySelector('input[name="vemail"]');
	// Check If The Input Is Empty
	if (inputField !== null) {
		// Add New Event To The InputField
		inputField.addEventListener('blur', function () {
			var v = this.value;
			var req = new XMLHttpRequest(); // Start Ajax Header Request
			req.onreadystatechange = function () {
				// check If The Connection Has A problem Or Not
				if (req.readyState == req.DONE && req.status == 200) {
					var IElm = document.createElement('i'); 
					if (req.response == 1) { // If The Response Number 1 : Mean The User Is Exists
						IElm.className = 'fa fa-times text-danger ajax-times hidden';
					} else if (req.response == 2) { // If The Response Number 2 : Mean The User Isn't Exists
						IElm.className = 'fa fa-check text-success ajax-check hidden';
					}
					// Fetch All input sibling
					var IElms = inputField.parentNode.childNodes;					
					for (var i = 0, ii = IElms.length; i < ii; i++) {
						// Search For Element has tag name i
						if (IElms[i].nodeName.toLowerCase() == 'i') {
							inputField.parentNode.removeChild(IElms[i]);
						}
					}
					inputField.parentNode.appendChild(IElm); // append The created Element To the document
				}
			}

			req.open('POST', 'http://mvcapp.dev/users/checkEmailExistsAjax', true);
			req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			req.send('vemail=' + v);
		}, false);
	}
})();

// Self Execute Function For Ajax For Suppliers Name
(function () {
	var inputField = document.querySelector('input[name="name"]');
	// Check If The Input Is Empty
	if (inputField !== null) {
		// Add New Event To The InputField
		inputField.addEventListener('blur', function () {
			var v = this.value;
			var req = new XMLHttpRequest(); // Start Ajax Header Request
			req.onreadystatechange = function () {
				// check If The Connection Has A problem Or Not
				if (req.readyState == req.DONE && req.status == 200) {
					var IElm = document.createElement('i'); 
					if (req.response == 1) { // If The Response Number 1 : Mean The User Is Exists
						IElm.className = 'fa fa-times text-danger ajax-times hidden';
					} else if (req.response == 2) { // If The Response Number 2 : Mean The User Isn't Exists
						IElm.className = 'fa fa-check text-success ajax-check hidden';
					}
					// Fetch All input sibling
					var IElms = inputField.parentNode.childNodes;					
					for (var i = 0, ii = IElms.length; i < ii; i++) {
						// Search For Element has tag name i
						if (IElms[i].nodeName.toLowerCase() == 'i') {
							inputField.parentNode.removeChild(IElms[i]);
						}
					}
					inputField.parentNode.appendChild(IElm); // append The created Element To the document
				}
			}

			req.open('POST', 'http://mvcapp.dev/suppliers/checkUserExistsAjax', true);
			req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			req.send('name=' + v);
		}, false);
	}
})();



// Self Execute Function For Ajax For Suppliers Email
(function () {
	var inputField = document.querySelector('input[name="vemail"]');
	// Check If The Input Is Empty
	if (inputField !== null) {
		// Add New Event To The InputField
		inputField.addEventListener('blur', function () {
			var v = this.value;
			var req = new XMLHttpRequest(); // Start Ajax Header Request
			req.onreadystatechange = function () {
				// check If The Connection Has A problem Or Not
				if (req.readyState == req.DONE && req.status == 200) {
					var IElm = document.createElement('i'); 
					if (req.response == 1) { // If The Response Number 1 : Mean The User Is Exists
						IElm.className = 'fa fa-times text-danger ajax-times hidden';
					} else if (req.response == 2) { // If The Response Number 2 : Mean The User Isn't Exists
						IElm.className = 'fa fa-check text-success ajax-check hidden';
					}
					// Fetch All input sibling
					var IElms = inputField.parentNode.childNodes;					
					for (var i = 0, ii = IElms.length; i < ii; i++) {
						// Search For Element has tag name i
						if (IElms[i].nodeName.toLowerCase() == 'i') {
							inputField.parentNode.removeChild(IElms[i]);
						}
					}
					inputField.parentNode.appendChild(IElm); // append The created Element To the document
				}
			}

			req.open('POST', 'http://mvcapp.dev/suppliers/checkEmailExistsAjax', true);
			req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			req.send('vemail=' + v);
		}, false);
	}
})();

// Self Execute Function For Ajax For Clients Name
(function () {
	var inputField = document.querySelector('input[name="Name"]');
	// Check If The Input Is Empty
	if (inputField !== null) {
		// Add New Event To The InputField
		inputField.addEventListener('blur', function () {
			var v = this.value;
			var req = new XMLHttpRequest(); // Start Ajax Header Request
			req.onreadystatechange = function () {
				// check If The Connection Has A problem Or Not
				if (req.readyState == req.DONE && req.status == 200) {
					var IElm = document.createElement('i'); 
					if (req.response == 1) { // If The Response Number 1 : Mean The User Is Exists
						IElm.className = 'fa fa-times text-danger ajax-times hidden';
					} else if (req.response == 2) { // If The Response Number 2 : Mean The User Isn't Exists
						IElm.className = 'fa fa-check text-success ajax-check hidden';
					}
					// Fetch All input sibling
					var IElms = inputField.parentNode.childNodes;					
					for (var i = 0, ii = IElms.length; i < ii; i++) {
						// Search For Element has tag name i
						if (IElms[i].nodeName.toLowerCase() == 'i') {
							inputField.parentNode.removeChild(IElms[i]);
						}
					}
					inputField.parentNode.appendChild(IElm); // append The created Element To the document
				}
			}

			req.open('POST', 'http://mvcapp.dev/clients/checkUserExistsAjax', true);
			req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			req.send('Name=' + v);
		}, false);
	}
})();



// Self Execute Function For Ajax For Clients Email
(function () {
	var inputField = document.querySelector('input[name="Email"]');
	// Check If The Input Is Empty
	if (inputField !== null) {
		// Add New Event To The InputField
		inputField.addEventListener('blur', function () {
			var v = this.value;
			var req = new XMLHttpRequest(); // Start Ajax Header Request
			req.onreadystatechange = function () {
				// check If The Connection Has A problem Or Not
				if (req.readyState == req.DONE && req.status == 200) {
					var IElm = document.createElement('i'); 
					if (req.response == 1) { // If The Response Number 1 : Mean The User Is Exists
						IElm.className = 'fa fa-times text-danger ajax-times hidden';
					} else if (req.response == 2) { // If The Response Number 2 : Mean The User Isn't Exists
						IElm.className = 'fa fa-check text-success ajax-check hidden';
					}
					// Fetch All input sibling
					var IElms = inputField.parentNode.childNodes;					
					for (var i = 0, ii = IElms.length; i < ii; i++) {
						// Search For Element has tag name i
						if (IElms[i].nodeName.toLowerCase() == 'i') {
							inputField.parentNode.removeChild(IElms[i]);
						}
					}
					inputField.parentNode.appendChild(IElm); // append The created Element To the document
				}
			}

			req.open('POST', 'http://mvcapp.dev/clients/checkEmailExistsAjax', true);
			req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			req.send('Email=' + v);
		}, false);
	}
})();

