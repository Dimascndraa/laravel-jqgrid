<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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

    <table id="studentsGrid"></table>
    <div id="studentsPager"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript" src=" https://cdn.jsdelivr.net/jquery.multiselect/1.13/jquery.multiselect.min.js">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/js/jquery.jqGrid.min.js' type="text/javascript">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/js/i18n/grid.locale-en.js' type="text/javascript">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/plugins/jquery.contextmenu.js' type="text/javascript">
    </script>
    <script>
        $(document).ready(function() {
            $("#studentsGrid").jqGrid({
                url: "/get-students-data",
                datatype: "json",
                colModel: [{
                        label: "ID",
                        name: "id",
                        width: 50,
                        key: true
                    },
                    {
                        label: "Nama",
                        name: "name",
                        width: 150,
                        editable: true
                    },
                    {
                        label: "NIS",
                        name: "nis",
                        width: 100,
                        editable: true
                    },
                    {
                        label: "Tanggal Lahir",
                        name: "birthdate",
                        width: 100,
                        editable: true
                    },
                    {
                        label: "Jenis Kelamin",
                        name: "gender",
                        width: 100,
                        editable: true
                    },
                    {
                        label: "Alamat",
                        name: "address",
                        width: 150,
                        editable: true
                    },
                    {
                        label: "No. Telepon",
                        name: "phone_number",
                        width: 100,
                        editable: true
                    },
                    {
                        label: "Email",
                        name: "email",
                        width: 150,
                        editable: true
                    },
                    {
                        label: "Kelas",
                        name: "class",
                        width: 100,
                        editable: true
                    },
                    {
                        label: "Tahun Ajaran",
                        name: "school_year",
                        width: 100,
                        editable: true
                    },
                    {
                        label: "Tanggal Pendaftaran",
                        name: "registration_date",
                        width: 120,
                        editable: true
                    },
                    {
                        label: "Foto Profil",
                        name: "profile_photo",
                        width: 100,
                        editable: true
                    },
                    {
                        label: "Catatan",
                        name: "notes",
                        width: 150,
                        editable: true
                    },
                    {
                        label: "Aksi",
                        name: "actions",
                        width: 100,
                        formatter: "actions"
                    }
                ],
                viewrecords: true,
                width: 1200,
                height: 300,
                rowNum: 10,
                pager: "#studentsPager",
                editurl: "/edit-student",
                caption: "Data Siswa",
                jsonReader: {
                    root: "data",
                    repeatitems: false
                }
            });

            $("#studentsGrid").jqGrid('navGrid', '#studentsPager', {
                    edit: true,
                    add: true,
                    del: true,
                    afterSubmit: function(response, postdata) {
                        // Perform necessary actions after successful submission
                        return [true, ""];
                    }
                },
                // Edit options
                {
                    url: "/edit-student",
                    closeAfterEdit: true,
                },
                // Add options
                {
                    url: "/add-student",
                    closeAfterAdd: true,
                },
                // Delete options
                {
                    closeAfterDelete: true,
                    url: "/delete-student",
                }
            );

        });
    </script>
</body>

</html>
