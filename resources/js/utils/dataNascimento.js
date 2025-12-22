export const formatDataNascimento = (value) => {
  const d = value.replace(/\D/g, '').slice(0, 8);
  if (d.length <= 2) return d;
  if (d.length <= 4) return d.replace(/(\d{2})(\d{1,2})/, '$1/$2');
  return d.replace(/(\d{2})(\d{2})(\d{1,4})/, '$1/$2/$3');
};