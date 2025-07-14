 <?= $this->extend('admin/layout/template'); ?>
 <?= $this->section('content'); ?>
 <title>Berita</title>
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
             <div class="col-12">
                 <div class="card">
                     <div class="card-header">
                         <h4>Tambah Berita</h4>
                     </div>
                     <div class="card-body">
                         <form action="" method="get" autocomplete="off">
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                                 <div class="col-sm-12 col-md-7">
                                     <input type="text" class="form-control">
                                 </div>
                             </div>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Berita</label>
                                 <div class="col-sm-12 col-md-7">
                                     <textarea class="summernote"></textarea>
                                 </div>
                             </div>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                                 <div class="col-sm-12 col-md-7">
                                     <select class="form-control selectric">
                                         <option>Layanan Informasi Anak</option>
                                         <option>Politik</option>
                                         <option>Kuliner</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                 <div class="col-sm-12 col-md-7">
                                     <label for="formFile" class="form-label">Upload Gambar</label>
                                     <input class="form-control" type="file" id="formFile">
                                     <div class="form-text">Gambar ini akan di tampilkan di berita halaman depan web (Ukuran File Maks 5MB)</div>
                                 </div>
                             </div>
                             <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                 <div class="col-sm-12 col-md-7">
                                     <button class="btn btn-primary">Publish</button>
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