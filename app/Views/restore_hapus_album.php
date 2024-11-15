<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= base_url('home/dashboard') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Data Restore Hapus Album</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('home/dashboard') ?>">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="<?= base_url('home/restore_hapus_album') ?>">Data Restore Hapus Album</a></div>
            </div>
        </div>

        <div class="col-lg-7 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Data Restore Hapus Album</h4>
                    <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahAlbumModal">
                        <i class="fas fa-plus"></i> Tambah
                    </button> -->
                    <div class="ml-auto">
                        <form class="form-inline">
                            <input id="searchInput" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        </form>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Album</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Tanggal Dibuat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody"> 
                                <?php 
                                    $no = 1;
                                    foreach ($erwin as $album) {
                                ?>                          
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $album->nama_album ?></td>
                                        <td><?= $album->deskripsi ?></td>
                                        <td><?= $album->tanggal_dibuat ?></td>
                                        <td>
                                            
                                            
                                        <a href="<?= base_url('home/hapus_restore_album/'.$album->id_album) ?>" 
                                        class="btn btn-warning btn-action" 
                                        data-toggle="tooltip" 
                                        title="Restore">
                                        <i class="fas fa-sync-alt"></i>
                                            </a>
                                            
                                            <a href="<?= base_url('home/hapus_album_permanen/'.$album->id_album) ?>" 
                                                class="btn btn-danger btn-action" 
                                                data-toggle="tooltip" 
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Tambah Album -->
<div class="modal fade" id="tambahAlbumModal" tabindex="-1" role="dialog" aria-labelledby="tambahAlbumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahAlbumModalLabel">Tambah Album</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="tambahAlbumForm" action="<?= base_url('home/aksi_t_album') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tambahNamaAlbum">Nama Album</label>
                        <input type="text" class="form-control" id="tambahNamaAlbum" name="nama_album" required>
                    </div>
                    <div class="form-group">
                        <label for="tambahDeskripsi">Deskripsi</label>
                        <textarea class="form-control" id="tambahDeskripsi" name="deskripsi" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tambahTanggalDibuat">Tanggal Dibuat</label>
                        <input type="date" class="form-control" id="tambahTanggalDibuat" name="tanggal_dibuat" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Album -->
<div class="modal fade" id="editAlbumModal" tabindex="-1" role="dialog" aria-labelledby="editAlbumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAlbumModalLabel">Edit Album</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editAlbumForm" action="<?= base_url('home/aksi_e_album') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_album" id="editIdAlbum">
                    <div class="form-group">
                        <label for="editNamaAlbum">Nama Album</label>
                        <input type="text" class="form-control" id="editNamaAlbum" name="nama_album" required>
                    </div>
                    <div class="form-group">
                        <label for="editDeskripsi">Deskripsi</label>
                        <textarea class="form-control" id="editDeskripsi" name="deskripsi" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editTanggalDibuat">Tanggal Dibuat</label>
                        <input type="date" class="form-control" id="editTanggalDibuat" name="tanggal_dibuat" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
    $('.btn-action-edit').on('click', function() {
        var id_album = $(this).data('id_album');
        var nama_album = $(this).data('nama_album');
        var deskripsi = $(this).data('deskripsi');
        var tanggal_dibuat = $(this).data('tanggal_dibuat');
        
        $('#editIdAlbum').val(id_album);
        $('#editNamaAlbum').val(nama_album);
        $('#editDeskripsi').val(deskripsi);
        $('#editTanggalDibuat').val(tanggal_dibuat);

        $('#editAlbumModal').modal('show');
    });
   });
</script>
