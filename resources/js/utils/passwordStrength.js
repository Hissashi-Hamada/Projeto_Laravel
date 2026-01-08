const passwordInput = document.querySelector('#passwordInput');
const strengthIndicator = document.querySelector('#password-strength-indicator');
const strengthText = document.querySelector('.password-strength-text');
const submitBtn = document.querySelector('#submitBtn');

passwordInput.addEventListener('input', () => {
    const password = passwordInput.value;
    let strength = 0;

    if (password.length >= 8) strength++;
    if (/[a-z]/.test(password)) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;

    const maxStrength = 5;
    const width = (strength / maxStrength) * 100;
    strengthIndicator.style.width = `${width}%`;

    const colors = ['red', 'orange', 'yellowgreen', 'green', 'darkgreen'];
    const texts = ['Muito fraca', 'Fraca', 'Média', 'Boa', 'Forte'];


    if (password.length === 0) {
        strengthIndicator.style.width = '0';
        strengthText.textContent = '';
        submitBtn.disabled = true;
        return;
    }

    strengthIndicator.style.backgroundColor = colors[strength - 1];
    strengthText.textContent = `Força: ${texts[strength - 1]}`;

    // REGRA REAL (bloqueio)
    if (strength < 4) {
        submitBtn.disabled = true;
    } else {
        submitBtn.disabled = false;
    }
});
