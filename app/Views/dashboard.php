<div class="main-content">
    <section class="section">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <!-- Kotak Album -->
            <div class="row">
                <?php foreach ($erwin as $album) { ?>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-header text-center">
                                <h5 class="card-title"><?= esc($album->nama_album) ?></h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?= esc($album->deskripsi) ?></p>
                                <small class="text-muted">Tanggal Dibuat: <?= esc($album->tanggal_dibuat) ?></small>
                            </div>
                            <div class="card-footer text-center">
                                <!-- Tombol Buka untuk membuka foto-foto di album -->
                                 <a href="<?=base_url('home/foto_album/'. $album->id_album)?>">
                                <button type="button" 
                                        class="btn btn-info buka-album">
                                    <i class="fas fa-image"></i> Buka Album
                                </button>
                                </a>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- Area untuk menampilkan foto-foto dari album yang dipilih -->
            <div id="fotoAlbumContent" class="row mt-4">
                <!-- Foto-foto dari album akan dimuat di sini secara dinamis -->
            </div>
        </div>
    </section>
</div>

<!-- JavaScript for AJAX request to load photos -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Ketika tombol Buka Album diklik
    $('.buka-album').on('click', function() {
        var id_album = $(this).data('id_album'); // Ambil id_album dari data-id_album

        // Bersihkan konten foto album
        $('#fotoAlbumContent').html('<p class="text-center">Memuat foto...</p>');

        // Ambil foto-foto dari album berdasarkan id_album
        $.ajax({
            url: '<?= base_url("home/get_foto_by_album") ?>',
            type: 'POST',
            data: { id_album: id_album },
            dataType: 'json', // Pastikan respon dalam format JSON
            success: function(response) {
                var photos = response;
                var htmlContent = '';

                // Loop untuk setiap foto dan tambahkan ke konten HTML
                photos.forEach(function(photo) {
                    htmlContent += `
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title">${photo.judul_foto}</h5>
                                </div>
                                <img src="<?= base_url() ?>/img/avatar/${photo.lokasi_file}" class="card-img-top" alt="${photo.judul_foto}">
                                <div class="card-body">
                                    <p class="card-text">${photo.deskripsi_foto}</p>
                                </div>
                            </div>
                        </div>
                    `;
                });

                // Tampilkan foto-foto di area fotoAlbumContent
                $('#fotoAlbumContent').html(htmlContent);
            },
            error: function() {
                $('#fotoAlbumContent').html('<p class="text-center text-danger">Gagal memuat foto. Coba lagi.</p>');
            }
        });
    });
});
</script>
