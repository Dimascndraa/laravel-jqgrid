<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/components/modal/">

    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/ui-lightness/jquery-ui.css"
        rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/jquery.multiselect/1.13/jquery.multiselect.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/css/ui.jqgrid.css" rel="stylesheet"
        type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg=="
        crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    {{-- ============================== ADD ================================== --}}
    <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addStudentForm">
                        @csrf
                        <!-- Tambahkan token CSRF Laravel -->
                        <input type="hidden" name="id" id="addStudentId">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="addName">Name:</label>
                                    <input type="text" name="name" id="addName" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="addNis">NIS:</label>
                                    <input type="text" name="nis" id="addNis" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="addBirthdate">Birthdate:</label>
                                    <input type="date" name="birthdate" id="addBirthdate" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="addGender">Gender:</label>
                                    <select name="gender" id="addGender" class="form-control" required>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="addSchoolYear">School Year:</label>
                                    <input type="text" name="school_year" id="addSchoolYear" class="form-control"
                                        required>
                                </div>
                                <!-- Lanjutkan elemen form lainnya sesuai dengan kolom pertama -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="addAddress">Address:</label>
                                    <input type="text" name="address" id="addAddress" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="addPhoneNumber">Phone Number:</label>
                                    <input type="tel" name="phone_number" id="addPhoneNumber" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="addEmail">Email:</label>
                                    <input type="email" name="email" id="addEmail" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="addClass">Class:</label>
                                    <input type="text" name="class" id="addClass" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="addRegistrationDate">Registration Date:</label>
                                    <input type="date" name="registration_date" id="addRegistrationDate"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="addProfilePhoto">Profile Photo URL:</label>
                                <input type="file" name="profile_photo" id="addProfilePhoto" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="addNotes">Notes:</label>
                                <textarea name="notes" id="addNotes" class="form-control" required></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addSaveButton">Save Changes</button>
                </div>
            </div>
        </div>
    </div>







    {{-- ============================== EDIT ================================== --}}
    <div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog"
        aria-labelledby="editStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStudentModalLabel">Edit Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editStudentForm">
                        @csrf
                        <!-- Tambahkan token CSRF Laravel -->
                        <input type="hidden" name="id" id="editStudentId">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="editName">Name:</label>
                                    <input type="text" name="name" id="editName" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="editNis">NIS:</label>
                                    <input type="text" name="nis" id="editNis" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="editBirthdate">Birthdate:</label>
                                    <input type="date" name="birthdate" id="editBirthdate" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="editGender">Gender:</label>
                                    <select name="gender" id="editGender" class="form-control" required>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="editSchoolYear">School Year:</label>
                                    <input type="text" name="school_year" id="editSchoolYear"
                                        class="form-control" required>
                                </div>
                                <!-- Lanjutkan elemen form lainnya sesuai dengan kolom pertama -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="editAddress">Address:</label>
                                    <input type="text" name="address" id="editAddress" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="editPhoneNumber">Phone Number:</label>
                                    <input type="tel" name="phone_number" id="editPhoneNumber"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="editEmail">Email:</label>
                                    <input type="email" name="email" id="editEmail" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="editClass">Class:</label>
                                    <input type="text" name="class" id="editClass" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="editRegistrationDate">Registration Date:</label>
                                    <input type="date" name="registration_date" id="editRegistrationDate"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="editProfilePhoto">Profile Photo URL:</label>
                                <input type="file" name="profile_photo" id="editProfilePhoto"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="editNotes">Notes:</label>
                                <textarea name="notes" id="editNotes" class="form-control" required></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="editSaveButton">Save Changes</button>
                </div>
            </div>
        </div>
    </div>







    <table id="studentsGrid"></table>
    <div id="studentsPager"></div>

    <!-- Load jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Load Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.multiselect/1.13/jquery.multiselect.min.js">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/js/jquery.jqGrid.min.js' type="text/javascript">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/js/i18n/grid.locale-en.js' type="text/javascript">
    </script>
    <script>
        $(document).ready(function() {
            $("#studentsGrid").jqGrid({
                url: "/get-students-data",
                datatype: "json",
                colModel: [{
                    label: 'Nama',
                    name: 'name',
                    index: 'name',
                    width: 150
                }, {
                    label: 'Nis',
                    name: 'nis',
                    index: 'nis',
                    width: 30,
                    align: 'center'
                }, {
                    label: 'Tanggal Lahir',
                    name: 'birthdate',
                    index: 'birthdate',
                    width: 70
                }, {
                    label: 'Jenis Kelamin',
                    name: 'gender',
                    index: 'gender',
                    width: 70
                }, {
                    label: 'Alamat',
                    name: 'address',
                    index: 'address',
                    width: 120
                }, {
                    label: 'No. Telepon',
                    name: 'phone_number',
                    index: 'phone_number',
                    width: 150
                }, {
                    label: 'Email',
                    name: 'email',
                    index: 'email',
                    width: 150,
                    align: 'center'
                }, {
                    label: 'Kelas',
                    name: 'class',
                    index: 'class',
                    width: 60,
                    align: 'center'
                }, {
                    label: 'Tahun Ajaran',
                    name: 'school_year',
                    index: 'school_year',
                    width: 60,
                    align: 'center'
                }, {
                    label: 'Tanggal Pendaftaran',
                    name: 'registration_date',
                    index: 'registration_date',
                    width: 60,
                    align: 'center'
                }, {
                    label: 'Foto Profil',
                    name: 'profile_photo',
                    index: 'profile_photo',
                    width: 60,
                    align: 'center'
                }, {
                    label: 'Catatan',
                    name: 'notes',
                    index: 'notes',
                    width: 60,
                    align: 'center'
                }],
                caption: "Data Siswa",
                autowidth: true,
                rownumbers: true,
                pager: '#studentsPager',
                rowNum: 50,
                rowList: [50, 100, 150, 200, 250],
                sortname: 'id',
                sortorder: 'desc',
                viewrecords: true,
                height: '400',
            });

            $("#studentsGrid").jqGrid('navGrid', '#studentsPager', {
                edit: false,
                add: false,
                del: false,
                search: false,
            });

            $("#studentsGrid").jqGrid('navButtonAdd', '#studentsPager', {
                caption: "Add",
                buttonicon: "ui-icon-plus",
                onClickButton: function() {
                    // Tampilkan form dialog penambahan siswa
                    $("#addStudentModal").modal("show");
                }
            });

            // Triger saat tombol #addSaveButton di klik
            $("#addSaveButton").click(function() {
                // Mengambil data dari input elemen di dalam modal
                var newData = {
                    name: $("#addName").val(),
                    nis: $("#addNis").val(),
                    birthdate: $("#addBirthdate").val(),
                    gender: $("#addGender").val(),
                    address: $("#addAddress").val(),
                    phone_number: $("#addPhoneNumber").val(),
                    email: $("#addEmail").val(),
                    class: $("#addClass").val(),
                    school_year: $("#addSchoolYear").val(),
                    registration_date: $("#addRegistrationDate").val(),
                    profile_photo: $("#addProfilePhoto").val(),
                    notes: $("#addNotes").val()
                    // Lanjutkan mengambil nilai-nilai elemen form lainnya sesuai kebutuhan
                };

                // Mengirim data ke server menggunakan Ajax untuk menyimpan data siswa baru
                $.ajax({
                    url: "/add-student", // Ganti dengan URL yang sesuai
                    type: "POST",
                    data: newData,
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            // Penambahan sukses, muat ulang data grid
                            $("#studentsGrid").trigger("reloadGrid");
                            // Kosongkan inputan form setelah data berhasil ditambahkan
                            $("#addStudentModal input[type='text'], #addStudentModal textarea,  #addStudentModal input[type='date'], #addStudentModal input[type='tel'], #addStudentModal input[type='email']")
                                .val('');
                            // Tutup modal
                            $("#addStudentModal").modal("hide");
                        } else {
                            alert("Error adding student: " + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("Error: " + error);
                    }
                });
            });


            // ================================== EDIT
            $("#studentsGrid").jqGrid('navButtonAdd', '#studentsPager', {
                caption: "Edit",
                buttonicon: "ui-icon-pencil",
                onClickButton: function() {
                    var selectedRowId = $("#studentsGrid").jqGrid('getGridParam', 'selrow');
                    if (!selectedRowId) {
                        alert("Please select a row before editing.");
                        return;
                    }
                    // Panggil fungsi untuk mengambil dan menampilkan data siswa untuk diedit
                    openEditModal(selectedRowId);
                },
                position: "first",
                id: "editButton"
            });

            function openEditModal(studentId) {
                // Panggil fungsi untuk mengambil data siswa dari server dan mengisi modal edit
                fetchStudentDataForEdit(studentId);
                // Buka modal edit
                $("#editStudentModal").modal("show");
            }

            // Triger saat tombol #editSaveButton di klik
            $("#editSaveButton").click(function() {
                // Mengambil data dari input elemen di dalam modal
                var editedData = {
                    id: $("#editStudentId").val(),
                    name: $("#editName").val(),
                    nis: $("#editNis").val(),
                    birthdate: $("#editBirthdate").val(),
                    gender: $("#editGender").val(),
                    address: $("#editAddress").val(),
                    phone_number: $("#editPhoneNumber").val(),
                    email: $("#editEmail").val(),
                    class: $("#editClass").val(),
                    school_year: $("#editSchoolYear").val(),
                    registration_date: $("#editRegistrationDate").val(),
                    profile_photo: $("#editProfilePhoto").val(),
                    notes: $("#editNotes").val()
                };
                // Mengirim data ke server menggunakan Ajax untuk menyimpan perubahan
                $.ajax({
                    url: "/save-edited-student",
                    type: "POST",
                    data: editedData,
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            // Penyimpanan sukses, muat ulang data grid
                            $("#studentsGrid").trigger("reloadGrid");
                            // Tutup modal
                            $("#editStudentModal").modal("hide");
                        } else {
                            alert("Error saving edited student: " + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("Error: " + error);
                    }
                });
            });

            function fetchStudentDataForEdit(studentId) {
                $.ajax({
                    url: "/get-student", // Ganti dengan URL yang sesuai
                    type: "GET",
                    data: {
                        id: studentId
                    },
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content") // Ambil token CSRF dari meta tag
                    },
                    success: function(response) {
                        if (response.success) {
                            var student = response.data;
                            $("#editStudentId").val(student.id);
                            $("#editName").val(student.name);
                            $("#editNis").val(student.nis);
                            $("#editBirthdate").val(student.birthdate);
                            $("#editGender").val(student.gender);
                            $("#editAddress").val(student.address);
                            $("#editPhoneNumber").val(student.phone_number);
                            $("#editEmail").val(student.email);
                            $("#editClass").val(student.class);
                            $("#editSchoolYear").val(student.school_year);
                            $("#editRegistrationDate").val(student.registration_date);
                            $("#editProfilePhoto").val(student.profile_photo);
                            $("#editNotes").val(student.notes);
                        } else {
                            alert("Error getting student data: " + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("Error: " + error);
                    }
                });
            }




        });
    </script>
</body>

</html>
