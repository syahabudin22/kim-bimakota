 <?= $this->extend('admin/layout/template'); ?>
 <?= $this->section('content'); ?>
 <title><?= $title; ?></title>
 <?= $this->endSection(); ?>
 <?= $this->section('content'); ?>
 <section class="section">
     <div class="section-header">
         <div class="section-header-back">
             <a href="<?= site_url('admin/file') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
         </div>
         <h1><?= $title; ?></h1>
         <div class="section-header-breadcrumb">
             <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
             <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
             <div class="breadcrumb-item">Table</div>
         </div>
     </div>
     <div class="section-body">
         <div class="row">
             <div class="col-12">
                 <div class="card">
                     <div class="card-header">
                         <h4><?= $title; ?></h4>
                         <div class="card-header-action">
                             <a href="<?= site_url('admin/file') ?>" class="btn btn-primary">Kembali</a>
                         </div>
                     </div>
                     <div class="card-body">
                         <?php $errors = validation_errors(); ?>
                         <form action="<?= site_url('admin/file/update/' . $file['fileid']) ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                             <?= csrf_field() ?>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                                 <div class="col-sm-12 col-md-7">
                                     <input type="text" name="nama_file" class="form-control <?= isset($errors['nama_file']) ? 'is-invalid' : null ?>" value="<?= old('nama_file', $file['nama_file']); ?>">
                                     <div class="invalid-feedback">
                                         <?= $errors['nama_file'] ?? null ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                 <div class="col-sm-12 col-md-7">
                                     <label for="formFile" class="form-label">Upload Gambar</label>
                                     <input class="form-control <?= isset($errors['file']) ? 'is-invalid' : null ?>" type="file" id="formFile" name="file">
                                     <div class="form-text">Upload File (Ukuran File Maks 2MB)</div>
                                     <div class="form-text">Jika tidak ingin mengganti file maka cukup dikosongkan saja</div>
                                     <div class="invalid-feedback">
                                         <?= $errors['file'] ?? null ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                 <div class="col-sm-12 col-md-7">
                                     <select name="file_status" class="form-control <?= isset($errors['file_status']) ? 'is-invalid' : null ?> selectric">
                                         <option value="T">Aktif</option>
                                         <option value="F" <?= old('fileid', $file['file_status']) == 'F' ? 'selected' : null ?>>Tidak Aktif</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                 <div class="col-sm-12 col-md-7">
                                     <button type="submit" class="btn btn-primary">Simpan</button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <?= $this->endSection(); ?>