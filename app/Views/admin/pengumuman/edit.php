 <?= $this->extend('admin/layout/template'); ?>
 <?= $this->section('content'); ?>
 <title><?= $title; ?></title>
 <?= $this->endSection(); ?>
 <?= $this->section('content'); ?>
 <section class="section">
     <div class="section-header">
         <div class="section-header-back">
             <a href="<?= site_url('admin/berita') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
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
                             <a href="<?= site_url('admin/pengumuman') ?>" class="btn btn-primary">Kembali</a>
                         </div>
                     </div>
                     <div class="card-body">
                         <?php $errors = validation_errors(); ?>
                         <form action="<?= site_url('admin/pengumuman/update/' . $pengumuman['noticeid']) ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                             <?= csrf_field() ?>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                                 <div class="col-sm-12 col-md-7">
                                     <input type="text" name="notice_title" class="form-control <?= isset($errors['notice_title']) ? 'is-invalid' : null ?>" value="<?= old('notice_title', $pengumuman['notice_title']); ?>">
                                     <div class="invalid-feedback">
                                         <?= $errors['notice_title'] ?? null ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi pengumuman</label>
                                 <div class="col-sm-12 col-md-7">
                                     <textarea name="notice_text" class="summernote <?= isset($errors['notice_text']) ? 'is-invalid' : null ?>"><?= old('notice_text', $pengumuman['notice_text']); ?></textarea>
                                 </div>
                                 <div class="invalid-feedback">
                                     <?= $errors['notice_text'] ?? null ?>
                                 </div>
                             </div>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                 <div class="col-sm-2">
                                     <?php if ($pengumuman['notice_image'] != '') : ?>
                                         <img src="<?= base_url('upload/image/pengumuman/' . $pengumuman['notice_image']) ?>" class="img-thumbnail" alt="...">
                                     <?php endif; ?>
                                 </div>
                                 <div class="col-sm-12 col-md-5">
                                     <label for="formFile" class="form-label">Upload Gambar</label>
                                     <input class="form-control <?= isset($errors['notice_image']) ? 'is-invalid' : null ?>" type="file" id="formFile" name="notice_image">
                                     <div class="form-text">Gambar ini akan di tampilkan di pengumuman halaman depan web (Ukuran File Maks 4MB)</div>
                                     <div class="form-text">Jika tidak ingin mengganti gambar maka cukup dikosongkan saja</div>
                                     <div class="invalid-feedback">
                                         <?= $errors['notice_image'] ?? null ?>
                                     </div>
                                 </div>
                             </div>
                             <!-- <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                 <div class="col-sm-12 col-md-7">
                                     <?php if ($pengumuman['notice_image'] != '') : ?>
                                         <img src="<?= base_url('upload/image/pengumuman/' . $pengumuman['notice_image']) ?>" class="img-thumbnail" alt="...">
                                     <?php endif; ?>
                                     <div id="image-preview" class="image-preview">
                                         <label for="image-upload" id="image-label">Upload Gambar</label>
                                         <input class="form-control <?= isset($errors['notice_image']) ? 'is-invalid' : null ?>" type="file" name="notice_image" value="<?= old('notice_image', $pengumuman['notice_image']); ?>" id="image-upload" />
                                     </div>
                                     <div class="form-text">Gambar ini akan di tampilkan di pengumuman halaman depan web (Ukuran File Maks 4MB)</div>
                                     <div class="invalid-feedback">
                                         <?= $errors['notice_image'] ?? null ?>
                                     </div>
                                 </div>
                             </div> -->
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                 <div class="col-sm-12 col-md-7">
                                     <select name="notice_status" class="form-control <?= isset($errors['notice_status']) ? 'is-invalid' : null ?> selectric">
                                         <option value="T">Aktif</option>
                                         <option value="F" <?= old('noticeid', $pengumuman['notice_status']) == 'F' ? 'selected' : null ?>>Tidak Aktif</option>
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