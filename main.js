//alert ("hello");

window.onload = pageLoaded; 

    function pageLoaded() {
   
   //Getting html elements by their name through the form handle
   
        var formHandle = document.forms.login_form;
        //var mail = formHandle.email;
        //var pwd = formHandle.password;
   
               function validateForm() {
				
				var email =
					document.forms.login_form.email.value;
				
				var password =
					document.forms.login_form.password.value;
				
				var regEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g; //Javascript reGex for Email Validation.
				// Javascript reGex for Name validation

				
				if (email == "" || !regEmail.test(email)) {
					window.alert("Please enter a valid e-mail address.");
					email.focus();
					return false;
				}
				
				if (password == "") {
					alert("Please enter your password");
					password.focus();
					return false;
				}

				
               }

               formHandle.onsubmit = validateForm;
			}
	
