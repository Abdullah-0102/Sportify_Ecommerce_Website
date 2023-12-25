document.addEventListener('DOMContentLoaded', function () {
    // const loginForm = document.getElementById('loginForm');
    const signInButton = document.getElementById('sign-in');

    signInButton.addEventListener('click', function () {
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        if (username === 'admin' && password === 'admin') {
            window.location.href = '/dashboard'; 
        } else {
            alert('Invalid username or password');
        }
    });
});
