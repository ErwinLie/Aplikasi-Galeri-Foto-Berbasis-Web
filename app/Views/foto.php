<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= base_url('home/dashboard') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Data Foto</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('home/dashboard') ?>">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="<?= base_url('home/foto') ?>">Data Foto</a></div>
            </div>
        </div>

        <div class="col-lg-7 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Data Foto</h4>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahFotoModal">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
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
                                    <th scope="col">Judul Foto</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Tanggal Unggah</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody"> 
                                <?php 
                                    $no = 1;
                                    foreach ($erwin as $foto) {
                                ?>                          
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $foto->judul_foto ?></td>
                                        <td><?= $foto->deskripsi_foto ?></td>
                                        <td><?= $foto->tanggal_unggah ?></td>
                                        <td>
                                            <img src="<?= base_url('img/avatar/' . $foto->lokasi_file) ?>" alt="Foto" width="50" height="50">
                                        </td>
                                        <td>
                                            <button type="button" 
                                                    class="btn btn-primary btn-action btn-action-edit mr-1" 
                                                    data-toggle="tooltip" 
                                                    title="Edit"
                                                    data-id_foto="<?= $foto->id_foto ?>"
                                                    data-judul_foto="<?= $foto->judul_foto ?>"
                                                    data-deskripsi_foto="<?= $foto->deskripsi_foto ?>"
                                                    >
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            
                                            <a href="<?= base_url('home/hapus_foto/'.$foto->id_foto) ?>" 
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

<!-- Modal Tambah Foto -->
<div class="modal fade" id="tambahFotoModal" tabindex="-1" role="dialog" aria-labelledby="tambahFotoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahFotoModalLabel">Tambah Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="tambahFotoForm" action="<?= base_url('home/aksi_t_foto') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tambahJudulFoto">Judul Foto</label>
                        <input type="text" class="form-control" id="tambahJudulFoto" name="judul_foto" required>
                    </div>
                    <div class="form-group">
                        <label for="tambahDeskripsiFoto">Deskripsi</label>
                        <textarea class="form-control" id="tambahDeskripsiFoto" name="deskripsi_foto" required></textarea>
                    </div>
                    <!-- <div class="form-group">
                        <label for="tambahTanggalUnggah">Tanggal Unggah</label>
                        <input type="date" class="form-control" id="tambahTanggalUnggah" name="tanggal_unggah" required>
                    </div> -->
                    <div class="form-group">
                        <label for="tambahLokasiFile">File</label>
                        <input type="file" class="form-control" id="tambahLokasiFile" name="lokasi_file" required>
                    </div>
                    <div class="form-group">
                        <label for="tambahAlbum">Album</label>
                        <select class="pilih form-control" tabindex="1" name="nama_album">
                            <?php foreach ($album as $key) { ?>
                                <option value="<?= $key->id_album ?>"><?= $key->nama_album ?></option>
                            <?php } ?>
                        </select>
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

<!-- Modal Edit Foto -->
<div class="modal fade" id="editFotoModal" tabindex="-1" role="dialog" aria-labelledby="editFotoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFotoModalLabel">Edit Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editFotoForm" action="<?= base_url('home/aksi_e_foto') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_foto" id="editIdFoto">
                    <div class="form-group">
                        <label for="editJudulFoto">Judul Foto</label>
                        <input type="text" class="form-control" id="editJudulFoto" name="judul_foto" required>
                    </div>
                    <div class="form-group">
                        <label for="editDeskripsiFoto">Deskripsi</label>
                        <textarea class="form-control" id="editDeskripsiFoto" name="deskripsi_foto" required></textarea>
                    </div>
                    <!-- <div class="form-group">
                        <label for="editTanggalUnggah">Tanggal Unggah</label>
                        <input type="date" class="form-control" id="editTanggalUnggah" name="tanggal_unggah" required>
                    </div> -->
                    <div class="form-group">
                        <label for="editLokasiFile">File</label>
                        <input type="file" class="form-control" id="editLokasiFile" name="lokasi_file" required>
                    </div>
                    <div class="form-group">
                        <label for="editAlbum">Album</label>
                        <select class="form-control pilih" id="editAlbum" name="nama_album" required>
                            <option value="" id="editAlbum"></option>
                            <?php foreach ($album as $key) { ?>
                                <option value="<?= $key->id_album ?>"><?= $key->nama_album ?></option>
                            <?php } ?>
                        </select>
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
        var id_foto = $(this).data('id_foto');
        var judul_foto = $(this).data('judul_foto');
        var deskripsi_foto = $(this).data('deskripsi_foto');
        var tanggal_unggah = $(this).data('tanggal_unggah');
        var lokasi_file = $(this).data('lokasi_file');
        var id_album = $(this).data('id_album');
        
        $('#editIdFoto').val(id_foto);
        $('#editJudulFoto').val(judul_foto);
        $('#editDeskripsiFoto').val(deskripsi_foto);
        $('#editTanggalUnggah').val(tanggal_unggah);
        $('#editLokasiFile').val(lokasi_file);
        $('#editAlbum').val(id_album);

        $('#editFotoModal').modal('show');
    });
   });
</script>
