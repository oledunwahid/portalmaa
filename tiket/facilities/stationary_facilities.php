<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="assets/libs/@tarekraafat/autocomplete.js/css/autoComplete.css">
<link rel="stylesheet" type="text/css" href="assets/libs/multi.js/multi.min.css" />


<div class="container-fluid">
    <div class="row">
        <?php
        $sql7 = mysqli_query($koneksi, "SELECT * FROM access_menu WHERE idnik = $niklogin");
        $row7 = mysqli_fetch_assoc($sql7);

        ?>
        <div class="col-xxl-3 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <?php if (isset($row7['access_type']) && ($row7['access_type'] == 'Admin' || $row7['access_type'] == 'GA Stationary')) {

                                $sql = mysqli_query($koneksi, "SELECT id_ga_stationary FROM ga_stationary");
                                $totalRequest = mysqli_num_rows($sql);
                            } else {

                                $sql = mysqli_query($koneksi, "SELECT id_ga_stationary FROM ga_stationary where nik_request='$niklogin' ");
                                $totalRequest = mysqli_num_rows($sql);
                            }
                            ?>

                            <p class="fw-medium text-muted mb-0">Total Request</p>
                            <h2 class="mt-4 ff-secondary fw-semibold">
                                <span class="counter-value" data-target="<?= htmlspecialchars($totalRequest) ?>"></span>
                            </h2>
                        </div>

                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-info text-info rounded-circle fs-4">
                                    <i class="ri-ticket-2-line"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->

        <!-- (Pending, Closed, Process) -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <?php
                            if (isset($row7['access_type']) && ($row7['access_type'] == 'Admin' || $row7['access_type'] == 'GA Stationary')) {
                                $sql1 = mysqli_query($koneksi, "SELECT id_ga_stationary FROM ga_stationary WHERE status = 'Pending'");
                                $PendingDelivery = mysqli_num_rows($sql1);
                            } else {
                                $sql1 = mysqli_query($koneksi, "SELECT id_ga_stationary FROM ga_stationary WHERE status = 'Pending' AND nik_request = '$niklogin' ");
                                $PendingDelivery = mysqli_num_rows($sql1);
                            }
                            ?>

                            <p class="fw-medium text-muted mb-0">Pending Delivery</p>
                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="<?= $PendingDelivery ?>">0</span></h2>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-info text-info rounded-circle fs-4">
                                    <i class="mdi mdi-timer-sand"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div>
        <!--end col-->
        <div class="col-xxl-3 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <?php
                            if (isset($row7['access_type']) && ($row7['access_type'] == 'Admin' || $row7['access_type'] == 'GA Stationary')) {
                                $sql2 = mysqli_query($koneksi, "SELECT id_ga_stationary FROM ga_stationary WHERE status = 'Closed'");
                                $Delivered = mysqli_num_rows($sql2);
                            } else {
                                $sql2 = mysqli_query($koneksi, "SELECT id_ga_stationary FROM ga_stationary WHERE status = 'Closed' AND nik_request = '$niklogin'");
                                $Delivered = mysqli_num_rows($sql2);
                            }
                            ?>

                            <p class="fw-medium text-muted mb-0">Items Delivered</p>
                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="<?= $Delivered ?>">0</span></h2>

                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-info text-info rounded-circle fs-4">
                                    <i class="ri-mail-close-line"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div>
        <!--end col-->
        <div class="col-xxl-3 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Request on Process</p>
                            <?php
                            if (isset($row7['access_type']) && ($row7['access_type'] == 'Admin' || $row7['access_type'] == 'GA Stationary')) {
                                $sql3 = mysqli_query($koneksi, "SELECT id_ga_stationary FROM ga_stationary WHERE status = 'Proses'");
                                $ProcessItems = mysqli_num_rows($sql3);
                            } else {
                                $sql3 = mysqli_query($koneksi, "SELECT id_ga_stationary FROM ga_stationary WHERE status = 'Proses' AND nik_request = '$niklogin'");
                                $ProcessItems = mysqli_num_rows($sql3);
                            }
                            ?>
                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="<?= $ProcessItems ?>">0</span></h2>
                        </div>

                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-info text-info rounded-circle fs-4">
                                    <i class="ri-delete-bin-line"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="card-title mb-0 flex-grow-1 flex">
                            <h5>ATK/Stationary</h5>
                            <h6>Offers support for stationary-related requests.</h6>
                        </div>
                        <div class="flex-shrink-0">
                            <button class="btn btn-danger add-btn" data-bs-toggle="modal" data-bs-target="#showModal">
                                <i class="ri-add-line align-bottom me-1"></i> Add ATK
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body border border-dashed border-end-0 border-start-0">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">

                                <div class="card-body">

                                    <table id="buttons-datatables" class="display table table-bordered dt-responsive" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID Ticket</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th>Type of service</th>
                                                <th>PIC</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($row7['access_type']) && ($row7['access_type'] == 'Admin' || $row7['access_type'] == 'GA Stationary')) {
                                                $sql6 = mysqli_query($koneksi, "SELECT
                ga_stationary.*,
                user1.nama AS nik_request,
                user2.nama AS nik_pic
                FROM ga_stationary
                LEFT JOIN USER AS user1 ON ga_stationary.nik_request = user1.idnik
                LEFT JOIN USER AS user2 ON ga_stationary.nik_pic = user2.idnik
                INNER JOIN USER ON ga_stationary.nik_request = user.idnik");
                                                $rowNumber = 1;
                                                while ($row6 = mysqli_fetch_assoc($sql6)) {
                                            ?>
                                                    <tr>
                                                        <td><?= $rowNumber ?></td>
                                                        <td><a href="index.php?page=EditATK/Stationary&id=<?= $row6['id_ga_stationary']; ?>"><?= $row6['id_ga_stationary'] ?></a></td>
                                                        <td><?= $row6['start_date'] ?></td>
                                                        <td><?= $row6['end_date'] ?></td>
                                                        <td><?= $row6['status'] ?></td>
                                                        <td><?= $row6['category'] ?></td>
                                                        <td><?= $row6['nik_pic'] ?></td>
                                                        <td>
                                                            <div class="dropdown d-inline-block">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill align-middle"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li>
                                                                        <a href="index.php?page=EditATK/Stationary&id=<?= $row6['id_ga_stationary']; ?>" class="dropdown-item"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $rowNumber++;
                                                }
                                            } else {
                                                $sql6 = mysqli_query($koneksi, "SELECT
                                            ga_stationary.*,
                                            user1.nama AS nik_request,
                                            user2.nama AS nik_pic
                                            FROM ga_stationary
                                            LEFT JOIN USER AS user1 ON ga_stationary.nik_request = user1.idnik
                                            LEFT JOIN USER AS user2 ON ga_stationary.nik_pic = user2.idnik
                                            INNER JOIN USER ON ga_stationary.nik_request = user.idnik");
                                                $rowNumber = 1;
                                                while ($row6 = mysqli_fetch_assoc($sql6)) {
                                                ?>
                                                    <tr>
                                                        <td><?= $rowNumber ?></td>
                                                        <td><a href="index.php?page=ViewATK/Stationary&id=<?= $row6['id_ga_stationary']; ?>"><?= $row6['id_ga_stationary'] ?></a></td>
                                                        <td><?= $row6['start_date'] ?></td>
                                                        <td><?= $row6['end_date'] ?></td>
                                                        <td><?= $row6['status'] ?></td>
                                                        <td><?= $row6['category'] ?></td>
                                                        <td><?= $row6['nik_pic'] ?></td>
                                                        <td>
                                                            <div class="dropdown d-inline-block">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill align-middle"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li>
                                                                        <a href="index.php?page=ViewATK/StationaryKurir&id=<?= $row6['id_ga_stationary']; ?>" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $rowNumber++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>


                <div class="modal fade zoomIn" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 1070px;">
                        <div class="modal-content border-0">
                            <div class="modal-header p-3 bg-soft-info">
                                <h5 class="modal-title" id="exampleModalLabel">Create Request GA Facilities - ATK / Stationary</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                            </div>
                            <form action="function/insert_ga_stationary.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row g-3">
                                        <div class="col-lg-9">
                                            <input type="hidden" class="form-control" value="<?= $start_date ?>" name="startDate" />
                                            <input type="hidden" class="form-control" value="<?= $niklogin ?>" name="nik_request" />

                                            <?php if ($row7['access_type'] == 'Admin' || $row7['access_type'] == 'GA Stationary') : ?>
                                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                    <div class="row">
                                                        <div class="col-md-9 mb-3">
                                                            <label for="atkSelect<?= $i ?>" class="form-label"><span> Select Item <?= $i ?></span></label>
                                                            <select class="form-control" data-choices name="id_atk<?= $i ?>">
                                                                <option value="">Select ATK/Stationary</option>
                                                                <?php
                                                                $sql5 = mysqli_query($koneksi, 'SELECT * FROM atk ');
                                                                while ($row5 = mysqli_fetch_assoc($sql5)) {
                                                                ?>
                                                                    <option value="<?= $row5['id_atk'] ?>"><?= $row5['description'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="col-sm-5">
                                                                <div>
                                                                    <h5 class="fs-13 fw-medium text-muted">Qty</h5>
                                                                    <div class="input-step light">
                                                                        <button type="button" class="minus">–</button>
                                                                        <input type="number" class="product-quantity" value="0" min="0" max="10" readonly>
                                                                        <button type="button" class="plus">+</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endfor; ?>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-lg-3">
                                            <div>
                                                <label for="wa" class="form-label">No.Whatsapp</label>
                                                <input type="number" class="form-control" placeholder="Insert your active number +(62)" name="wa" />
                                            </div>

                                            <?php if ($row7['access_type'] == 'Admin' || $row7['access_type'] == 'GA Stationary') : ?>
                                                <div class="mb-3 mt-3">
                                                    <label for="id_nik_request" class="form-label"><span> Request User</span></label>
                                                    <select class="form-control" data-choices name="id_nik_request">
                                                        <option value="">All Users</option>
                                                        <?php
                                                        $sql5 = mysqli_query($koneksi, 'SELECT idnik, nama, divisi, lokasi FROM user WHERE lokasi = "HO" ');
                                                        while ($row5 = mysqli_fetch_assoc($sql5)) {
                                                        ?>
                                                            <option value="<?= $row5['idnik'] ?>"><?= $row5['nama'] ?> | <?= $row5['divisi']  ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light" name="add-stationary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="../assets/js/pages/datatables.init.js"></script>

<script src="../assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
<script src="../assets/js/pages/form-editor.init.js"></script>

<script src="../assets/js/pages/select2.init.js"></script>

<!-- multi.js -->
<script src="assets/libs/multi.js/multi.min.js"></script>
<!-- autocomplete js -->
<script src="assets/libs/@tarekraafat/autocomplete.js/autoComplete.min.js"></script>

<!-- init js -->
<script src="assets/js/pages/form-advanced.init.js"></script>
<!-- input spin init -->
<script src="assets/js/pages/form-input-spin.init.js"></script>
<!-- input flag init -->
<script src="assets/js/pages/flag-input.init.js"></script>