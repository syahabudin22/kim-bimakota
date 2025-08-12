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
             <div class="breadcrumb-item">Berita</div>
         </div>
     </div>
     <div class="section-body">
         <div class="row">
             <div class="col-12 col-md-12 col-lg-12">
                 <div class="card">
                     <div class="card-header">
                         <h4><?= $title; ?></h4>
                         <div class="card-header-action">
                             <a href="<?= site_url('admin/berita') ?>" class="btn btn-primary">Kembali</a>
                         </div>
                     </div>
                     <div class="card-body">
                         <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                             <article class="article article-style-b">
                                 <div class="article-title">
                                     <div class="article-image">
                                         <?php if ($berita['news_image'] != '') : ?>
                                             <img src="<?= base_url('upload/image/' . $berita['news_image']) ?>" class="img-fluid" alt="...">
                                         <?php endif; ?>
                                     </div>
                                 </div>
                                 <div class="article-details">
                                     <div class="article-title">
                                     </div>
                                     <h2><a href="#"><?= $berita['news_title']; ?></a></h2>
                                     <h5><a href="#"><?= $berita['news_date']; ?></a></h5>
                                     <p><?= $berita['news_text'] ?> </p>
                                     <div class="article-cta">
                                         <!-- <a href="#">Read More <i class="fas fa-chevron-right"></i></a> -->
                                     </div>
                                 </div>
                             </article>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <?= $this->endSection(); ?>