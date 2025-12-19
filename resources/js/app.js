import './bootstrap';
import { formatCpf } from './utils/cpf';
import { formatTelefone } from './utils/telefone';
import { formatDataNascimento } from './utils/dataNascimento';

// Apply masks to inputs
document.addEventListener('DOMContentLoaded', () => {
    const cpfInput = document.querySelector('input[name="cpf"]');
    const telefoneInput = document.querySelector('input[name="telefone"]');
    const dataNascimentoInput = document.querySelector('input[name="data_nascimento"]');

    if (cpfInput) {
        cpfInput.addEventListener('input', (e) => {
            const value = e.target.value;
            const formatted = formatCpf(value);
            if (value !== formatted) {
                e.target.value = formatted;
            }
        });
    }

    if (telefoneInput) {
        telefoneInput.addEventListener('input', (e) => {
            const value = e.target.value;
            const formatted = formatTelefone(value);
            if (value !== formatted) {
                e.target.value = formatted;
            }
        });
    }

    if (dataNascimentoInput) {
        dataNascimentoInput.addEventListener('input', (e) => {
            const value = e.target.value;
            const formatted = formatDataNascimento(value);
            if (value !== formatted) {
                e.target.value = formatted;
            }
        });
    }
});
