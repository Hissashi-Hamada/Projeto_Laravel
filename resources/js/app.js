import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'bootstrap/dist/css/bootstrap.min.css';

import { formatCpf } from './utils/cpf';
import { formatTelefone } from './utils/telefone';

document.addEventListener('input', (e) => {
    const target = e.target;

    if (target.matches('input[name="cpf"]')) {
        target.value = formatCpf(target.value);
        return;
    }

    if (target.matches('input[name="telefone"]')) {
        target.value = formatTelefone(target.value);
        return;
    }
});
