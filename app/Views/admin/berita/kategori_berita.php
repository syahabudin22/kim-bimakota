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
                                     <th scope="col">Kategori</th>
                                     <th scope="col">Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php foreach ($kategori as $key => $value) : ?>
                                     <tr>
                                         <th scope="row"><?= $key + 1 ?></th>
                                         <td><?= $value['news_category'] ?></td>
                                         <div class="btn-group">
                                             <td>
                                                 <!-- <a href="<?= site_url('admin/berita/detail_berita/' . $value['news_categoryid']) ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i></a>
                                                 <a href="<?= site_url('admin/berita/detail_berita/' . $value['news_categoryid']) ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i></a> -->
                                                 <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#ModalEdit"><i class="far fa-edit"></i></button>
                                                 <button type="button" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i></button>
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
                 <h1 class="modal-title fs-5" id="myModalLabel">Tambah Kategori</h1>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             </div>
             <form action="<?= site_url('admin/berita/simpan_kategori') ?>" method="post">
                 <div class="modal-body">
                     <div class="mb-3">
                         <?= csrf_field() ?>
                         <label for="news_category" class="col-form-label">Kategori:</label>
                         <input type="text" name="news_category" class="form-control" id="news_category" required>
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
                 <h1 class="modal-title fs-5" id="myModalLabel">Tambah Kategori</h1>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             </div>
             <form action="<?= site_url('admin/berita/update_kategori') ?>" method="post">
                 <div class="modal-body">
                     <div class="mb-3">
                         <?= csrf_field() ?>
                         <label for="news_category" class="col-form-label">Kategori:</label>
                         <input type="text" name="news_category" class="form-control" id="news_category" value="<?= old('news_category', $value['news_category']); ?>" required>
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
 <?= $this->endSection(); ?>