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
                     </div>
                     <div class="card-body">
                         <?php $errors = validation_errors(); ?>
                         <form action="<?= site_url('admin/berita/update_berita/' . $berita['newsid']) ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                             <?= csrf_field() ?>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                                 <div class="col-sm-12 col-md-7">
                                     <input type="text" name="news_title" class="form-control <?= isset($errors['news_title']) ? 'is-invalid' : null ?>" value="<?= old('news_title', $berita['news_title']); ?>">
                                     <div class="invalid-feedback">
                                         <?= $errors['news_title'] ?? null ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Berita</label>
                                 <div class="col-sm-12 col-md-7">
                                     <textarea name="news_text" class="summernote <?= isset($errors['news_text']) ? 'is-invalid' : null ?>"><?= old('news_text', $berita['news_text']); ?></textarea>
                                 </div>
                                 <div class="invalid-feedback">
                                     <?= $errors['news_text'] ?? null ?>
                                 </div>
                             </div>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                                 <div class="col-sm-12 col-md-7">
                                     <select name="news_categoryid" class="form-control <?= isset($errors['news_categoryid']) ? 'is-invalid' : null ?> selectric">
                                         <option value="<?= old('news_categoryid', $berita['news_categoryid']); ?>" hidden>Pilih Kategori</option>
                                         <?php foreach ($kategori as $key) : ?>
                                             <option value="<?= $key['news_categoryid'] ?>" <?= old('news_categoryid', $berita['news_categoryid']) == $key['news_categoryid'] ? 'selected' : null ?>>
                                                 <?= $key['news_category'] ?>
                                             </option>
                                         <?php endforeach; ?>
                                     </select>
                                     <div class="invalid-feedback">
                                         <?= $errors['news_categoryid'] ?? null ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                 <div class="col-sm-2">
                                     <?php if ($berita['news_image'] != '') : ?>
                                         <img src="<?= base_url('upload/image/' . $berita['news_image']) ?>" class="img-thumbnail" alt="...">
                                     <?php endif; ?>
                                 </div>
                                 <div class="col-sm-12 col-md-5">
                                     <label for="formFile" class="form-label">Upload Gambar</label>
                                     <input class="form-control <?= isset($errors['news_image']) ? 'is-invalid' : null ?>" type="file" id="formFile" name="news_image">
                                     <div class="form-text">Gambar ini akan di tampilkan di berita halaman depan web (Ukuran File Maks 4MB)</div>
                                     <div class="form-text">Jika tidak ingin mengganti gambar maka cukup dikosongkan saja</div>
                                     <div class="invalid-feedback">
                                         <?= $errors['news_image'] ?? null ?>
                                     </div>
                                 </div>
                             </div>
                             <!-- <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                 <div class="col-sm-12 col-md-7">
                                     <?php if ($berita['news_image'] != '') : ?>
                                         <img src="<?= base_url('upload/image/' . $berita['news_image']) ?>" class="img-thumbnail" alt="...">
                                     <?php endif; ?>
                                     <div id="image-preview" class="image-preview">
                                         <label for="image-upload" id="image-label">Upload Gambar</label>
                                         <input class="form-control <?= isset($errors['news_image']) ? 'is-invalid' : null ?>" type="file" name="news_image" value="<?= old('news_image', $berita['news_image']); ?>" id="image-upload" />
                                     </div>
                                     <div class="form-text">Gambar ini akan di tampilkan di berita halaman depan web (Ukuran File Maks 4MB)</div>
                                     <div class="invalid-feedback">
                                         <?= $errors['news_image'] ?? null ?>
                                     </div>
                                 </div>
                             </div> -->
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                 <div class="col-sm-12 col-md-7">
                                     <select name="news_status" class="form-control <?= isset($errors['news_status']) ? 'is-invalid' : null ?> selectric">
                                         <option value="T">Aktif</option>
                                         <option value="F" <?= old('id_group', $berita['news_status']) == 'F' ? 'selected' : null ?>>Tidak Aktif</option>
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