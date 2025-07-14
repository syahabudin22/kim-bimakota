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
             <div class="col-12 col-md-12 col-lg-12">
                 <div class="card">
                     <div class="card-header">
                         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                             <!-- <h4>Simple</h4> -->
                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah</button>
                         </div>
                     </div>
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
                                                 <a href="#" class="btn btn-icon icon-left btn-info"><i class="fas fa-eye"></i></a>
                                                 <a href="#" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i></a>
                                                 <a href="#" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i></a>
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
 <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="myModalLabel">Tambah Kategori</h1>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="mb-3">
                         <label for="recipient-name" class="col-form-label">Kategori:</label>
                         <input type="text" class="form-control" id="kategori">
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-primary">Simpan</button>
             </div>
         </div>
     </div>
 </div>
 <?= $this->endSection(); ?>
 <!-- <script>
     const myModal = document.getElementById('myModal')
     const myInput = document.getElementById('myInput')

     myModal.addEventListener('shown.bs.modal', () => {
         myInput.focus()
     })
 </script> -->