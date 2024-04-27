const signInBtnLink = document.querySelector('.signInBtn-link');
const signUpBtnLink = document.querySelector('.signUpBtn-link');
const wrapper = document.querySelector('.wrapper');
const form = document.getElementById('form');
const username = document.getElementById('Username');
const usernameSu = document.getElementById('Usernamesu');
const email = document.getElementById('email');
const password = document.getElementById('password');
const passwordSu = document.getElementById('passwordsu');
const password2 = document.getElementById('password2');
const btnsu = document.querySelector('.btnsu');


signUpBtnLink.addEventListener('click', () => {
    wrapper.classList.toggle('active');
});
signInBtnLink.addEventListener('click', () => {
    wrapper.classList.toggle('active');
});

btnsu.addEventListener('click', e => {
    e.preventDefault();

    validateInputs();
});
form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const validateInputs = () => {
    const usernameValue = username.value.trim();
    const usernameSuValue = usernameSu.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const passwordSuValue = passwordSu.value.trim();
    const password2Value = password2.value.trim();

    if (usernameValue === '') {
        setError(username, 'Tolong masukkan username');
    } else {
        setSuccess(username);
    }

    if (usernameSuValue === '') {
        setError(usernameSu, 'Tolong masukan username disini');
    } else {
        setSuccess(usernameSu);
    }

    if(emailValue === '') {
        setError(email, 'Tolong masukkan email');
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Email tidak tersedia');
    } else {
        setSuccess(email);
    }

    if(passwordValue === '') {
        setError(password, 'Tolong masukan password disini');
    } else if (passwordValue.length < 8 ) {
        setError(password, 'Password minimal memiliki 8 karakter.');
    } else if (passwordValue.length > 20) {
        setError(password, 'Password tidak boleh lebih dari 20 karakter.');
    } else {
        setSuccess(password);
    }

    if(passwordSuValue === '') {
        setError(passwordSu, 'Tolong masukan password disini');
    } else if (passwordSuValue.length < 8 ) {
        setError(passwordSu, 'Password minimal memiliki 8 karakter.');
    } else if (passwordSuValue.length > 20) {
        setError(passwordSu, 'Password tidak boleh lebih dari 20 karakter.');
    } else {
        setSuccess(passwordSu);
    }

    if(password2Value === '') {
        setError(password2, 'Konfirmasikan password anda');
    } else if (password2Value !== passwordSuValue ) {
        setError(password2, "Passwords tidak sama");
    } else {
        setSuccess(password2);
    }
};