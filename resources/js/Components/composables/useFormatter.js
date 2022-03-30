export default function useFormatter() {
  function formatDate(dateString) {
    let date = new Date(dateString);
    let options = { year: 'numeric', month: 'short', day: 'numeric' };
    return date.toLocaleDateString('en-US', options);
  }

  function formatCurrency(value) {
    let formatter = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD'
    });

    return formatter.format(value);
  }

  return { formatDate, formatCurrency };
}
