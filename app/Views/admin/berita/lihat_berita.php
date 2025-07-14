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
                                        <a href="<?= site_url('admin/berita/tambah_berita') ?>" class="btn btn-primary">Tambah</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="mytable" class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Penulis</th>
                                                <th scope="col">Judul</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($berita as $key => $value) : ?>
                                                <tr>
                                                    <th scope="row"><?= $key + 1 ?></th>
                                                    <td><?= $value->full_name ?></td>
                                                    <td><?= $value->news_title ?></td>
                                                    <td><?= $value->news_category ?></td>
                                                    <td><?= $value->news_date ?></td>
                                                    <td><?= $value->news_status ?></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a href="#" class="btn btn-icon icon-left btn-info"><i class="fas fa-eye"></i></a>
                                                            <a href="#" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i></a>
                                                            <a href="#" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i></a>
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