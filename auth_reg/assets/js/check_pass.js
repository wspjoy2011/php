let check = function() {
    if (document.getElementById('password').value ===
        document.getElementById('re_password').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'matching';
        document.getElementById('submit').disabled = false;
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'not matching';
        document.getElementById('submit').disabled = true;
    }
}


function checkPassword() {
    let code = document.getElementById("password");
    let password = code.value;
    let strength = 0;
    let display = document.getElementById("password_strength");


    if (password.match(/[a-z]+/)) {
        strength += 1;
    }
    if (password.match(/[A-Z]+/)) {
        strength += 1;
    }
    if (password.match(/[0-9]+/)) {
        strength += 1;
    }
    if (password.match(/[$@#&!]+/)) {
        strength += 1;
    }

    if (password.length < 6) {
        display.style.color = 'red';
        display.innerHTML = "minimum number of characters is 6";
        document.getElementById('submit').disabled = true;
    }
    else if (password.length > 12) {
        display.style.color = 'red';
        display.innerHTML = "maximum number of characters is 12";
        document.getElementById('submit').disabled = true;
    }
    else {
        let pass = '';
        if (strength === 1) {
            pass = 'weak';
        }
        else if (strength === 2) {
            pass = 'normal';
        }
        else if (strength === 3) {
            pass = 'good';
        }
        else if (strength === 4) {
            pass = 'excellent';
        }

        display.style.color = 'green';
        display.innerHTML = 'strength of password ' + pass;
        document.getElementById('submit').disabled = false;
    }

}