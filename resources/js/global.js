
// format tanggal javascript
function formatTanggal(input) {
    const date = new Date(input);
    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const year = date.getFullYear();
    const hours = String(date.getHours()).padStart(2, '0');
    const minutes = String(date.getMinutes()).padStart(2, '0');
    return `${day}-${month}-${year} ${hours}:${minutes}`;
}
window.formatTanggal = formatTanggal;
// format tanggal javascript
function formatTanggalNoTime(input) {
    const date = new Date(input);
    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const year = date.getFullYear();
    const hours = String(date.getHours()).padStart(2, '0');
    const minutes = String(date.getMinutes()).padStart(2, '0');
    return `${day}-${month}-${year}`;
}
window.formatTanggalNoTime = formatTanggalNoTime;

function formatRupiah(input) {
    const number = parseFloat(input);
    if (isNaN(number)) return input; // Return input if it's not a valid number
    return number.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
}
window.formatRupiah = formatRupiah;
