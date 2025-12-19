export const formatTelefone = (digitsOnly) => {
  const d = digitsOnly.replace(/\D/g, '').slice(0, 11);
  if (d.length <= 2) return d;
  if (d.length <= 6) return d.replace(/(\d{2})(\d{1,4})/, '($1) $2');
  if (d.length <= 10) return d.replace(/(\d{2})(\d{4})(\d{1,4})/, '($1) $2-$3');
  return d.replace(/(\d{2})(\d{5})(\d{1,4})/, '($1) $2-$3');
};