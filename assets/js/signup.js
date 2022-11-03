function validate () {
    const form = document.getElementById('signupform');
    var fnm = document.querySelector('#fname').value;
    var regxnm = /^[a-zA-Z ]+$/;
    if (regxnm.test(fnm) == false) {
        document.querySelector('#fnmmsg').classList.add('msgpopup');
        document.getElementById('fname').focus();
        return false;
    }
    var lnm = document.querySelector('#lname').value;
    if (regxnm.test(lnm) == false) {
        document.querySelector('#lnmsg').classList.add('msgpopup');
        document.getElementById('lname').focus();
        return false;
    }
    var email = document.querySelector('#email').value;
    var regxemail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (regxemail.test(email) == false) {
        document.querySelector('#emailmsg').classList.add('msgpopup');
        document.getElementById('email').focus();
        return false;
    }
    var phn = document.querySelector('#phone').value;
    var regxphn = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    if (regxphn.test(phn) == false) {
        document.querySelector('#phnmsg').classList.add('msgpopup');
        document.getElementById('phone').focus();
        return false;
    }

    if (form['gender'].checked == false) {
        document.querySelector('#sexmsg').classList.add('msgpopup');
        return false;
    }

    var pass = document.querySelector('#password').value;
    var regxpass = /^(?=.*[a-zA-z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{6,})/;
    if (regxpass.test(pass) == false) {
        document.querySelector('#passmsg').classList.add('msgpopup');
        document.getElementById('password').focus();
        return false;
    }
    var cpass = document.querySelector('#cpassword').value;
    if (pass != cpass) {
        document.querySelector('#cpassmsg').classList.add('msgpopup');
        document.getElementById('cpassword').focus();
        return false;
    }
    var file = document.getElementById('file').value;
    var f = file.files;
    if (f.length == 0) {
        document.querySelector('#filemsg').classList.add('msgpopup');
        document.getElementById('file').focus();
        return false;
    }
    window.location.href('signuphandle.php');
    return true;
};