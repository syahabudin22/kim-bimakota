 <?= $this->extend('admin/layout/template'); ?>
 <?= $this->section('content'); ?>
 <title><?= $title; ?></title>
 <?= $this->endSection(); ?>
 <?= $this->section('content'); ?>
 <section class="section">
     <div class="section-header">
         <div class="section-header-back">
             <a href="<?= site_url('admin/galeri/video') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
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
                             <a href="<?= site_url('admin/galeri/video') ?>" class="btn btn-primary">Kembali</a>
                         </div>
                     </div>
                     <div class="card-body">
                         <?php $errors = validation_errors(); ?>
                         <form action="<?= site_url('admin/galeri/video/create') ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                             <?= csrf_field() ?>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Video *</label>
                                 <div class="col-sm-12 col-md-7">
                                     <input type="text" name="video_title" class="form-control <?= isset($errors['video_title']) ? 'is-invalid' : null ?>" value="<?= old('video_title'); ?>">
                                     <div class="invalid-feedback">
                                         <?= isset($errors['video_title']) ? $errors['video_title'] : null ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Url Video Youtube *</label>
                                 <div class="col-sm-12 col-md-7">
                                     <input type="text" name="video_url" class="form-control <?= isset($errors['video_url']) ? 'is-invalid' : null ?>" value="<?= old('video_url'); ?>" aria-describedby="videoUrl">
                                     <div class="form-text">Untuk mengupload video dari youtube copy saja alamat yang di blok warna hitam atau alamat yang letaknya setelah Simbol Sama Dengan ( = ).</div>
                                     <small id="videoUrl" class="form-text text-muted">contoh : https://www.youtube.com/watch?v=iBUGysKfYvs</small>
                                     <div class="invalid-feedback">
                                         <?= isset($errors['video_url']) ? $errors['video_url'] : null ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status *</label>
                                 <div class="col-sm-12 col-md-7">
                                     <select name="video_status" class="form-control <?= isset($errors['video_status']) ? 'is-invalid' : null ?> selectric">
                                         <option value="T">Aktif</option>
                                         <option value="F">Tidak Aktif</option>
                                     </select>
                                     <div class="invalid-feedback">
                                         <?= isset($errors['video_status']) ? $errors['video_status'] : null ?>
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