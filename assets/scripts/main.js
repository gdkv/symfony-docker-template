let passwordChecks = document.querySelectorAll('.password-check');
if (passwordChecks.length) {

    passwordChecks.forEach(passwordCheck => {

        passwordCheck.addEventListener('click', function(e) {
            let passwordInput = e.target.parentNode.querySelector("#inputPassword");
            
            if(this.classList.contains('hide')){
                passwordInput.setAttribute("type", "text");
            } else {
                passwordInput.setAttribute("type", "password");
            }
            this.classList.toggle('hide');
        });
    });
}

window.onload = () => {
    console.log('all done!');
};