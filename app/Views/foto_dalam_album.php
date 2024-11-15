<div class="main-content">
    <section class="section">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="row">
                <!-- Display each photo in a stylish card layout -->
                <?php foreach ($photos as $photo) { ?>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="card shadow-sm border-0">
                            <img src="<?= base_url('img/avatar/' . esc($photo->lokasi_file)) ?>" 
                                 class="card-img-top img-fluid rounded" 
                                 alt="<?= esc($photo->judul_foto) ?>" 
                                 style="height: 250px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title font-weight-bold"><?= esc($photo->judul_foto) ?></h5>
                                <p class="card-text text-muted"><?= esc($photo->deskripsi_foto) ?></p>
                                <!-- Placeholder for the "liked" message -->
                                <p class="like-message text-success" style="display: none;">Anda menyukai foto ini</p>
                            </div>
                            <!-- Love and Comment icons in the card footer -->
                            <div class="card-footer text-center">
                                <button class="btn btn-outline-danger btn-like" data-id-foto="<?= $photo->id_foto ?>" title="Love">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <button class="btn btn-outline-secondary btn-comment" data-id-foto="<?= $photo->id_foto ?>" data-toggle="modal" data-target="#commentModal" title="Comment">
                                    <i class="fas fa-comment"></i> <span class="ml-1">Komentar</span>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</div>

<!-- Comment Modal -->
<!-- Comment Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commentModalLabel">Komentar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Comment list display area -->
                <div id="commentList" class="mb-3">
                    <!-- Comments will be loaded here via AJAX -->
                </div>

                <form id="commentForm">
                    <input type="hidden" name="id_foto" id="id_foto">
                    <div class="form-group">
                        <label for="isi_komentar">Komentar</label>
                        <textarea class="form-control" id="isi_komentar" name="isi_komentar" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    $('.btn-like').on('click', function() {
        const btn = $(this);
        const idFoto = btn.data('id-foto');
        const likeMessage = btn.closest('.card').find('.like-message');

        $.ajax({
            url: '<?= base_url('home/toggle_like') ?>',
            type: 'POST',
            data: { id_foto: idFoto },
            dataType: 'json',
            success: function(response) {
                if (response.liked) {
                    btn.addClass('btn-danger').removeClass('btn-outline-danger');
                    likeMessage.show();
                } else {
                    btn.addClass('btn-outline-danger').removeClass('btn-danger');
                    likeMessage.hide();
                }
            },
            error: function() {
                alert('Terjadi kesalahan saat menyukai foto.');
            }
        });
    });

    // Open comment modal and load comments
    $('.btn-comment').on('click', function() {
        const idFoto = $(this).data('id-foto');
        $('#id_foto').val(idFoto);
        
        // Fetch comments
        $.ajax({
            url: '<?= base_url('home/data_komentar') ?>/' + idFoto,
            type: 'GET',
            dataType: 'json',
            success: function(comments) {
                let commentListHtml = '';
                comments.forEach(comment => {
                    commentListHtml += `
                        <div class="comment-item mb-3">
                            <strong>${comment.username}</strong><br>
                            <p>${comment.isi_komentar}</p>
                        </div>
                    `;
                });
                $('#commentList').html(commentListHtml);
            },
            error: function() {
                $('#commentList').html('<p class="text-danger">Gagal memuat komentar.</p>');
            }
        });
    });

    // Handle comment form submission
    $('#commentForm').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: '<?= base_url('home/add_comment') ?>',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                
                $('#commentModal').modal('hide');
                $('#isi_komentar').val('');
            },
            error: function() {
                alert('Terjadi kesalahan saat menambahkan komentar.');
            }
        });
    });
});

</script>
