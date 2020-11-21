<?php
include('header.php');
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-8 my-5">
            <!-- <form onsubmit="event.preventDefault();" id="userForm"> -->
            <form id="userForm">
                <div class="card">
                    <div class="card-header">
                        <h3>Add New User</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control">
                        </div>
                    </div>
                    <input type="hidden" name="add_user" value="add">
                    <div class="card-footer">
                        <input type="submit" value="ADD" class="btn btn-primary" name="add_user">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 my-5">
            <div class="card">
                <div class="card-header">
                    <h4>User List</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-danger text-light">
                                <th>Email</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="records">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>
<script>
    // function addNewUser() {
    //     console.log($('#userForm').serialize());
    //     $.ajax({
    //         url: 'http://localhost/ecommerce/admin/ajax.php',
    //         method: 'POST',
    //         data: $('#userForm').serialize(),
    //         // data: {
    //         //     email: $('[name="email"]').val(),
    //         //     password: $('[name="password"]').val(),
    //         //     add_user: 'add'
    //         // },
    //         success: function(successData) {
    //             console.log(successData);
    //         },
    //         error: function(xhr) {

    //         }
    //     });
    // }

    $(document).ready(function() {
        addAllRows();
        $('#userForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'http://localhost/ecommerce/admin/ajax.php',
                method: 'POST',
                data: $('#userForm').serialize(),
                success: function(successData) {
                    console.log(successData);
                    addAllRows();
                    $('#userForm')[0].reset();
                },
                error: function(xhr) {

                }
            });
        });
    });

    function addAllRows() {
        $.ajax({
            url: 'http://localhost/ecommerce/admin/ajax.php?all-users=all',
            method: 'GET',
            dataType: 'JSON',
            success: function(successData) {
                // console.log(successData.length);
                len = successData.length;
                rows = '';
                for (i = 0; i < len; i++) {
                    console.log(successData[i].email, successData[i].password);
                    rows += `<tr>
                                <td>${successData[i].email}</td>
                                <td>${successData[i].password}</td>
                                <td><a href="javascript:void" onclick="deleteUser(${successData[i].id})">DELETE</a></td>
                            </tr>`;
                }
                $('#records').html(rows);
            },
            error: function(xhr) {

            }
        });
    }

    function deleteUser(id) {
        if (confirm('Are you sure you want to delete?')) {
            $.ajax({
                url: 'http://localhost/ecommerce/admin/ajax.php?remove_id=' + id,
                method: 'GET',
                success: function(successData) {
                    addAllRows();
                },
                error: function(xhr) {

                }
            });
        }

    }
</script>