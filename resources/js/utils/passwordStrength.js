const passwordInput = document.querySelector('#passwordInput');
const strengthIndicator = document.querySelector('#password-strength-indicator');
const strengthText = document.querySelector('.password-strength-text');

passwordInput.addEventListener('input', () => {
    const password = passwordInput.value;
    let strength = 0;

    if (password.length >= 8) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;

    const width = (strength / 4) * 100;
    strengthIndicator.style.width = `${width}%`;

    const colors = ['red', 'orange', 'yellowgreen', 'green'];
    const texts = ['Fraca', 'Média', 'Boa', 'Forte'];

    if (password.length > 0) {
        strengthIndicator.style.backgroundColor = colors[strength - 1] || 'red';
        strengthText.textContent = `Força: ${texts[strength - 1] || 'Muito fraca'}`;
    } else {
        strengthIndicator.style.width = '0';
        strengthText.textContent = '';
    }
});
