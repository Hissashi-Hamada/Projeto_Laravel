export const formatCpf = (digitsOnly) => {
  const d = digitsOnly.replace(/\D/g, '').slice(0, 11);
  if (d.length <= 3) return d;
  if (d.length <= 6) return d.replace(/(\d{3})(\d{1,3})/, '$1.$2');
  if (d.length <= 9) return d.replace(/(\d{3})(\d{3})(\d{1,3})/, '$1.$2.$3');
  return d.replace(/(\d{3})(\d{3})(\d{3})(\d{1,2})/, '$1.$2.$3-$4');
};