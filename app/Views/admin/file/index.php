            <?= $this->extend('admin/layout/template'); ?>
            <?= $this->section('content'); ?>
            <title><?= $title; ?></title>
            <?= $this->endSection(); ?>
            <?= $this->section('content'); ?>
            <section class="section">
                <div class="section-header">
                    <h1><?= $title; ?></h1>
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
                                        <a href="<?= site_url('admin/file/add') ?>" class="btn btn-primary">Tambah</a>
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
                                <table id="mytable" class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama File</th>
                                            <th scope="col">File</th>
                                            <th scope="col">Posting</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($file as $key => $value) : ?>
                                            <tr>
                                                <th scope="row"><?= $key + 1 ?></th>
                                                <td><?= $value->nama_file ?></td>
                                                <td>
                                                    <?php if ($value->file != '') : ?>
                                                        <a href="#"><?= $value->file; ?></a>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $value->nama_instansi ?></td>
                                                <?php if ($value->file_status == 'T') :  ?>
                                                    <td class="text-center">
                                                        <div class="badge badge-success">Active</div>
                                                    </td>
                                                <?php else :  ?>
                                                    <td class="text-center">
                                                        <div class="badge badge-danger">Not Active</div>
                                                    </td>
                                                <?php endif; ?>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <!-- <a href="<?= site_url('admin/file/detail/' . $value->fileid) ?>" class="btn btn-icon btn-info"><i class="fas fa-eye"></i></a> -->
                                                        <a href="<?= site_url('admin/file/edit/' . $value->fileid) ?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                                        <a href="<?= site_url('admin/file/hapus/' . $value->fileid) ?>" class="btn btn-icon btn-danger" onclick="confirmation(event)" id="hapus"><i class="fas fa-times"></i></a>
                                                    </div>
                                                </td>
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
            <?= $this->endSection(); ?>