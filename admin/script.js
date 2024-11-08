// Function untuk navigasi ke halaman destinasi
function navigateToDestinasi() {
    // Tampilkan loading
    document.querySelector('.loading').classList.add('active');
    
    // Simulasi delay loading (bisa dihapus pada implementasi sebenarnya)
    setTimeout(() => {
        // Navigasi ke halaman destinasi
        window.location.href = 'destinasi.html';
    }, 500);
}

// Event listener untuk link destinasi di sidebar
document.getElementById('destinasiLink').addEventListener('click', function(e) {
    e.preventDefault();
    navigateToDestinasi();
});

// Menghilangkan loading saat halaman selesai dimuat
window.addEventListener('load', function() {
    document.querySelector('.loading').classList.remove('active');
});

