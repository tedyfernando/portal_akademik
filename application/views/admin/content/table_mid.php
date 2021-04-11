<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0"><?= $page ?></h3>
            </div>
            <!-- modal button -->
            <div class="container mb-md-3">
                <div class="row">
                    <div class="col col-md-3">
                        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm modalbtn"><i
                                class="fas fa-upload fa-sm text-white-50"></i> Import CSV</button>
                        <button id="mid_add_btn" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-upload fa-sm text-white-50"></i> Add</button>

                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="tabel1" class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>No.</th>
                            <th>Nis</th>
                            <th>Id Semester</th>
                            <th>Id Matapelajaran Tahun Ajaran</th>
                            <th>Nilai Pengetahuan</th>
                            <th>Nilai Keterampilan</th>
                            <th>Nilai Mid</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <?php $n = 1; ?>
                        <?php foreach ($mid as $row) : ?>
                        <tr>
                            <td><?= $n++; ?></td>
                            <td><?= $row['nis'] ?></td>
                            <td><?= $row['id_semester'] ?></td>
                            <td><?= $row['id_th_matpel'] ?></td>
                            <td><?= $row['nilai_p'] ?></td>
                            <td><?= $row['nilai_k'] ?></td>
                            <td><?= $row['nilai_mid'] ?></td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" id="raport_mid_edit_btn" data-toggle="modal"
                                            data-target="#edit_modal" data-id="<?= $row['id'] ?>"
                                            data-nis="<?= $row['nis'] ?>" data-semester="<?= $row['id_semester'] ?>"
                                            data-matpel="<?= $row['id_th_matpel'] ?>"
                                            data-nilai_p="<?= $row['nilai_p'] ?>" data-nilai_k="<?= $row['nilai_k'] ?>"
                                            data-nilai_mid="<?= $row['nilai_mid'] ?>">Ubah</a>
                                        <a class="dropdown-item delete-btn-conf"
                                            href="<?= base_url('admin/raport_mid_del/') . $row['id'] ?>">Hapus</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
                <nav aria-label="...">
                    <ul class="pagination justify-content-end mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">
                                <i class="fas fa-angle-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fas fa-angle-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <p class="modal-title font-weight-bold" id="modaltitle">Edit <?= $page ?></p>
            </div>
            <div class="modal-body ">
                <form id="form" action="<?= base_url('admin/raport_mid_edit') ?>" method="post">

                    <input type="number" class="form-control" id="id_edit" name="id" placeholder="ID">
                    <div class="form-group">
                        <label for="nis">nis:</label>
                        <select class="form-control" id="nis_edit" name="nis" required>
                            <option value="" selected disabled>NIS (Nomor Induk Sekolah)</option>
                            <?php foreach ($nis as $row) : ?>
                            <option value="<?= $row['nis'] ?>"><?= $row['nis'] ?> - <?= $row['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester:</label>
                        <select class="form-control" id="semester_edit" name="semester" required>
                            <option value="" selected disabled>Semester</option>
                            <?php foreach ($semester as $row) : ?>
                            <option value="<?= $row['id_semester'] ?>"><?= $row['semester'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="matpel">matpel:</label>
                        <select class="form-control" id="matpel_edit" name="matpel" required>
                            <?php foreach ($matpel as $row) : ?>
                            <option value="<?= $row['id_th_matpel'] ?>"><?= $row['th_ajaran'] ?> - <?= $row['kelas'] ?>
                                - <?= $row['matpel'] ?>
                            </option>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <input type="number" class="form-control" id="nilai_p_edit" name="nilai_p"
                                placeholder="Nilai Pengetahuan">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="nilai_k_edit" name="nilai_k"
                                placeholder="Nilai Keterampilan">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="nilai_mid_edit" name="nilai_mid"
                                placeholder="Nilai Mid">
                        </div>
                    </div>
                    <button id="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm submit-btn"><i
                            class="fas fa-upload fa-sm "></i>Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>