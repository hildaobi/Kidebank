//alert("hello"); 
    window.onload = pageLoaded; 

    function pageLoaded() {
   
   //Getting html elements by their name through the form handle
   
        var formHandle = document.forms.app_form;

    var fname = formHandle.first;
    var lname = formHandle.last;
    var addy = formHandle.address;
    var pcode = formHandle.postcode;
    var phone = formHandle.phone;
    var bday = formHandle.dob;
    var mail = formHandle.email;
    var pwd = formHandle.password;
    var aname = formHandle.acc_name;
    var ano = formHandle.acc_no;
    var bname = formHandle.bank_name;


   
    function validateForm() {
        if (fname.value === "") {
            fname.style.background = "red";
            fname.focus();
            return false;
         } 
         if (lname.value === "") {
            lname.style.background = "red";
            lname.focus();
            return false;
         } 
         if (addy.value === "") {
          addy.style.background = "red";
            addy.focus();
            return false;
         } 
         if (pcode.value === "") {
            pcode.style.background = "red";
            pcode.focus();
            return false;
        }

        if (phone.value === "") {
                phone.style.background = "red";
                phone.focus();
                return false;
        } 
        if (bday.value === "") {
           bday.style.background = "red";
           bday.focus();
            return false;
         }   
         if (mail.value === "") {
            mail.style.background = "red";
            mail.focus();
            return false;
         }  

         if (pwd.value === "") {
            pwd.style.background = "red";
            pwd.focus();
            return false;
         } 
         if (aname.value === "") {
            aname.style.background = "red";
            aname.focus();
            return false;
         } 
         if (ano.value === "") {
           ano.style.background = "red";
            ano.focus();
            return false;
         } 
         if (bname.value === "") {
            bname.style.background = "red";
            bname.focus();
            return false;
         } 
          
    }

    formHandle.onsubmit = validateForm;
}