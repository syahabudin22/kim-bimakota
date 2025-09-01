 <?= $this->extend('admin/layout/template'); ?>
 <?= $this->section('content'); ?>
 <title><?= $title; ?></title>
 <?= $this->endSection(); ?>
 <?= $this->section('content'); ?>
 <section class="section">
     <div class="section-header">
         <h1>Table</h1>
         <div class="section-header-breadcrumb">
             <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
             <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
             <div class="breadcrumb-item">Table</div>
         </div>
     </div>
     <div class="section-body">
         <div class="row">
             <div class="col-12 col-md-12 col-lg-12">
                 <div class="card">
                     <div class="card-header">
                         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                             <!-- <h4>Simple</h4> -->
                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd">Tambah</button>
                         </div>
                     </div>
                     <?php if (session()->getFlashdata('success')) : ?>
                         <div class="alert alert-success alert-dismissible show fade">
                             <div class="alert-body">
                                 <button class="close" data-dismiss="alert">
                                     <span>&times;</span>
                                 </button>
                                 Success !
                             </div>
                             <?= session()->getFlashdata('success'); ?>
                         </div>
                     <?php endif; ?>
                     <?php if (session()->getFlashdata('errors')) : ?>
                         <div class="alert alert-danger alert-dismissible show fade">
                             <div class="alert-body">
                                 <button class="close" data-dismiss="alert">
                                     <span>&times;</span>
                                 </button>
                                 Error !
                             </div>
                             <?= session()->getFlashdata('errors'); ?>
                         </div>
                     <?php endif; ?>
                     <div class="card-body">
                         <table id="mytable" class="table">
                             <thead>
                                 <tr>
                                     <th scope="col">No</th>
                                     <th scope="col">Kelurahan</th>
                                     <th scope="col">kelurahan</th>
                                     <th scope="col">Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php foreach ($kelurahan as $key => $value) : ?>
                                     <tr>
                                         <th scope="row"><?= $key + 1 ?></th>
                                         <td><?= $value->kelurahan ?></td>
                                         <td><?= $value->kecamatan ?></td>
                                         <div class="btn-group">
                                             <td>
                                                 <button type="button" class="btn btn-icon icon-left btn-primary" data-id="<?= $value->kelurahanid; ?>" data-kelurahan="<?= $value->kelurahan; ?>" data-kecamatanid="<?= $value->kecamatanid; ?>" id="btn-edit"><i class="far fa-edit"></i></button>
                                                 <a href="<?= site_url('admin/pengaturan_kim/kelurahan/hapus/' . $value->kelurahanid) ?>" class="btn btn-icon icon-left btn-danger" onclick="confirmation(event)" id="hapus"><i class="fas fa-times"></i></a>
                                             </td>
                                         </div>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Modal Add -->
 <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="myModalLabel">Tambah kelurahan</h1>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             </div>
             <form action="<?= site_url('admin/pengaturan_kim/kelurahan/create') ?>" method="post">
                 <?= csrf_field() ?>
                 <div class="modal-body">
                     <div class="mb-3">
                         <label for="kelurahan" class="col-form-label">kelurahan:</label>
                         <input type="text" name="kelurahan" class="form-control" id="kelurahan" required>
                     </div>
                     <div class="mb-3">
                         <select name="kecamatanid" class="form-control selectric" required>
                             <option value="<?= old('kecamatanid'); ?>" hidden>Pilih Kecamatan</option>
                             <?php foreach ($kecamatan as $key) : ?>
                                 <option value="<?= $key['kecamatanid'] ?>" <?= old('kecamatanid') == $key['kecamatanid'] ? 'selected' : null ?>>
                                     <?= $key['kecamatan'] ?>
                                 </option>
                             <?php endforeach; ?>
                         </select>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!-- Modal Edit -->
 <div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="myModalLabel">Edit kelurahan</h1>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             </div>
             <form action="" method="post">
                 <?= csrf_field() ?>
                 <div class="modal-body">
                     <div class="mb-3">
                         <label for="kelurahan" class="col-form-label">kelurahan:</label>
                         <input type="text" name="kelurahan" class="form-control" id="kelurahan" value="<?= old('kelurahan'); ?>" required>
                     </div>
                     <div class="mb-3">
                         <select name="kecamatanid" class="form-control selectric" required>
                             <option value="<?= old('kecamatanid'); ?>" hidden>Pilih Kecamatan</option>
                             <?php foreach ($kecamatan as $key) : ?>
                                 <option value="<?= $key['kecamatanid'] ?>" <?= old('kecamatanid') == $key['kecamatanid'] ? 'selected' : null ?>>
                                     <?= $key['kecamatan'] ?>
                                 </option>
                             <?php endforeach; ?>
                         </select>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <script>
     $(document).ready(function() {
         $('body').on('click', '#btn-edit', function() {
             let id = $(this).data('id');
             let kel = $(this).data('kelurahan');
             let kec = $(this).data('kecamatanid');
             $('#ModalEdit form').attr('action', '<?= site_url() ?>/admin/pengaturan_kim/kelurahan/update/' + id)
             $('#ModalEdit input[name="kelurahan"]').val(kel);
             $('#ModalEdit select[name="kecamatanid"]').val(kec);
             $('#ModalEdit').modal('show');
         });
     });
 </script>
 <?= $this->endSection(); ?>