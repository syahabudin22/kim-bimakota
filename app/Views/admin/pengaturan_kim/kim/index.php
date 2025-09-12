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
                                     <th scope="col">Nama KIM</th>
                                     <th scope="col">Kelurahan</th>
                                     <th scope="col">kelurahan</th>
                                     <th scope="col">Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php foreach ($kim as $key => $value) : ?>
                                     <tr>
                                         <th scope="row"><?= $key + 1 ?></th>
                                         <td><?= $value->kim ?></td>
                                         <td><?= $value->kelurahan ?></td>
                                         <td><?= $value->kecamatan ?></td>
                                         <div class="btn-group">
                                             <td>
                                                 <button type="button" class="btn btn-icon icon-left btn-primary" data-id="<?= $value->kimid; ?>" data-kim="<?= $value->kim; ?>" data-kecamatanid="<?= $value->kecamatanid; ?>" data-kelurahanid="<?= $value->kelurahanid; ?>" id="btn-edit"><i class="far fa-edit"></i></button>
                                                 <a href="<?= site_url('admin/pengaturan_kim/kim/hapus/' . $value->kimid) ?>" class="btn btn-icon icon-left btn-danger" onclick="confirmation(event)" id="hapus"><i class="fas fa-times"></i></a>
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
                 <h1 class="modal-title fs-5" id="myModalLabel">Tambah KIM</h1>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             </div>
             <form action="<?= site_url('admin/pengaturan_kim/kim/create') ?>" method="post">
                 <?= csrf_field() ?>
                 <div class="modal-body">
                     <div class="mb-3">
                         <label for="kim" class="col-form-label">Nama KIM :</label>
                         <input type="text" name="kim" class="form-control" id="kim" required>
                     </div>
                     <div class="mb-3">
                         <select name="kecamatanid" id="kecamatanid" class="form-control selectric" required>
                             <option value="<?= old('kecamatanid'); ?>" hidden>Pilih Kecamatan</option>
                             <?php foreach ($kecamatan as $key) : ?>
                                 <option value="<?= $key['kecamatanid'] ?>" <?= old('kecamatanid') == $key['kecamatanid'] ? 'selected' : null ?>>
                                     <?= $key['kecamatan'] ?>
                                 </option>
                             <?php endforeach; ?>
                         </select>
                     </div>
                     <div class="mb-3">
                         <select name="kelurahanid" id="kelurahanid" class="form-control selectric" required>
                             <option value="" hidden>Pilih Kecamatan terlebih dahulu</option>
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
                 <h1 class="modal-title fs-5" id="myModalLabel">Edit KIM</h1>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             </div>
             <form action="" method="post">
                 <?= csrf_field() ?>
                 <div class="modal-body">
                     <div class="mb-3">
                         <label for="kim" class="col-form-label">Nama KIM :</label>
                         <input type="text" name="kim" class="form-control" id="kim" value="<?= old('kim'); ?>" required>
                     </div>
                     <div class="mb-3">
                         <select name="kecamatanid" id="kecamatanid" class="form-control selectric" required>
                             <option value="<?= old('kecamatanid'); ?>" hidden>Pilih Kecamatan</option>
                             <?php foreach ($kecamatan as $key) : ?>
                                 <option value="<?= $key['kecamatanid'] ?>" <?= old('kecamatanid') == $key['kecamatanid'] ? 'selected' : null ?>>
                                     <?= $key['kecamatan'] ?>
                                 </option>
                             <?php endforeach; ?>
                         </select>
                     </div>
                     <div class="mb-3">
                         <select name="kelurahanid" id="kelurahanid" class="form-control selectric" required>
                             <option value="<?= old('kelurahanid'); ?>" hidden>Pilih Kelurahan</option>
                             <?php foreach ($kelurahan as $key) : ?>
                                 <option value="<?= $key['kelurahanid'] ?>" <?= old('kelurahanid') == $key['kelurahanid'] ? 'selected' : null ?>>
                                     <?= $key['kelurahan'] ?>
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
 <script type="text/javascript">
     $(document).ready(function() {
         $('.selectric').selectric();

         $('#kecamatanid').change(function() {
             let kecamatanid = $(this).val();
             let token_csrf = $('input[name="csrf_test_name"').attr('value');
             console.log(kecamatanid);
             console.log(token_csrf);
             $.ajax({
                 url: "<?= site_url('admin/pengaturan_kim/kim/kecamatan_where'); ?>",
                 method: "POST",
                 data: {
                     kecamatanid: kecamatanid,
                     csrf_test_name: token_csrf
                 },
                 async: false,
                 dataType: 'json',
                 success: function(data) {
                     var html = '';
                     var i;
                     console.log(data)
                     console.log(data['data'])
                     $('input[name="csrf_test_name"').val(data['token'])
                     html += '<option value="">Pilih</option>';
                     data = data['data']
                     for (i = 0; i < data.length; i++) {
                         html += '<option value=' + data[i].kelurahanid + '>' + data[i].kelurahan + '</option>';
                     }
                     $('#kelurahanid').html('');
                     $('#kelurahanid').html(html);
                     $('#kelurahanid').selectric('refresh');
                 }
             });
             return false;
         });
     });

     $(document).ready(function() {
         $('body').on('click', '#btn-edit', function() {
             let id = $(this).data('id');
             let kim = $(this).data('kim');
             let kec = $(this).data('kecamatanid');
             let kel = $(this).data('kelurahanid');
             $('#ModalEdit form').attr('action', '<?= site_url() ?>/admin/pengaturan_kim/kim/update/' + id)
             $('#ModalEdit input[name="kelurahan"]').val(kim);
             $('#ModalEdit select[name="kecamatanid"]').val(kec);
             $('#ModalEdit select[name="kelurahanid"]').val(kel);
             $('#ModalEdit').modal('show');
         });
     });
 </script>
 <?= $this->endSection(); ?>