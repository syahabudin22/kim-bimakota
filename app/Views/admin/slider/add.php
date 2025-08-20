 <?= $this->extend('admin/layout/template'); ?>
 <?= $this->section('content'); ?>
 <title><?= $title; ?></title>
 <?= $this->endSection(); ?>
 <?= $this->section('content'); ?>
 <section class="section">
     <div class="section-header">
         <div class="section-header-back">
             <a href="<?= site_url('admin/slider') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
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
                             <a href="<?= site_url('admin/slider') ?>" class="btn btn-primary">Kembali</a>
                         </div>
                     </div>
                     <div class="card-body">
                         <?php $errors = validation_errors(); ?>
                         <form action="<?= site_url('admin/slider/create') ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                             <?= csrf_field() ?>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                                 <div class="col-sm-12 col-md-7">
                                     <input type="text" name="slider_title" class="form-control <?= isset($errors['slider_title']) ? 'is-invalid' : null ?>" value="<?= old('slider_title'); ?>">
                                     <div class="invalid-feedback">
                                         <?= isset($errors['slider_title']) ? $errors['slider_title'] : null ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                 <div class="col-sm-12 col-md-7">
                                     <label for="formFile" class="form-label">Upload Gambar</label>
                                     <input class="form-control <?= isset($errors['slider_image']) ? 'is-invalid' : null ?>" type="file" id="formFile" name="slider_image">
                                     <div class="form-text">Upload Foto Slider</div>
                                     <div class="invalid-feedback">
                                         <?= isset($errors['slider_image']) ? $errors['slider_image'] : null ?>
                                     </div>
                                 </div>
                             </div>
                             <!-- <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                 <div class="col-sm-12 col-md-7">
                                     <div id="image-preview" class="image-preview">
                                         <label for="image-upload" id="image-label">Upload Gambar</label>
                                         <input class="form-control <?= isset($errors['slider_image']) ? 'is-invalid' : null ?>" type="file" name="slider_image" id="image-upload" />
                                     </div>
                                     <div class="form-text">Gambar ini akan di tampilkan di berita halaman depan web (Ukuran File Maks 4MB)</div>
                                     <div class="invalid-feedback">
                                         <?= isset($errors['slider_image']) ? $errors['slider_image'] : null ?>
                                     </div>
                                 </div>
                             </div> -->
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                 <div class="col-sm-12 col-md-7">
                                     <select name="slider_status" class="form-control <?= isset($errors['slider_status']) ? 'is-invalid' : null ?> selectric">
                                         <option value="T">Aktif</option>
                                         <option value="F">Tidak Aktif</option>
                                     </select>
                                     <div class="invalid-feedback">
                                         <?= isset($errors['slider_status']) ? $errors['slider_status'] : null ?>
                                     </div>
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