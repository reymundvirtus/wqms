$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

get_user_data(); //? call the function to get users

//? retreived data
function get_user_data() {

    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'users',
        success: function(data) {

            let html
            let x = 1

            for (let i = 0; i < data.length; i++) {
                html += '<tr>'
                html += '<td class="text-center">' + x++ + '</td>'
                html += '<td class="text-center">' + data[i].name + '</td>'
                html += '<td class="text-center">' + data[i].email + '</td>'
                html += '<td class="text-center">' + data[i].created_at + '</td>'
                html += '<td class="text-center"><a href="javascript:void(0)" type="button" class="btn btn-m rounded-lg text-white EditPost" data-user_id="' + data[i].id + '"data-name="' + data[i].name + '"data-email="' + data[i].email + '"data-password="' + data[i].password + '">Edit</a></td>'
                html += '<td class="text-center"><a href="javascript:void(0)" type="button" class="btn btn-m rounded-lg text-white ReadPost" data-user_id="' + data[i].id + '"data-name="' + data[i].name + '"data-email="' + data[i].email + '"data-created_at="' + data[i].created_at + '"data-password="' + data[i].password + '">Read</a></td>'
                html += '<td class="text-center"><a href="javascript:void(0)" type="button" class="btn btn-m rounded-lg text-white DeletePost" data-user_id="' + data[i].id + '"data-name="' + data[i].name + '"data-email="' + data[i].email + '"data-created_at="' + data[i].created_at + '"data-password="' + data[i].password + '">Delete</a></td>'
                html += '</tr>'
            }

            $('#get_user_data').html(html.substr(9))
        }
    });

    return false;
}

//? read data
$('#get_user_data').on('click', '.ReadPost', function() {

    let name = $(this).data('name');
    let email = $(this).data('email');
    let created_at = $(this).data('created_at');
    let password = $(this).data('password');

    $('#namer').val(name);
    $('#emailr').val(email);
    $('#dater').val(created_at);
    $('#passwordr').val(password);

    $('#readUser').modal('show');
});

//? update data
$('#get_user_data').on('dblclick', '.EditPost', function() {

    let user_id = $(this).data('user_id');
    let name = $(this).data('name');
    let email = $(this).data('email');
    let password = $(this).data('password');

    $('#user_idu').val(user_id);
    $('#nameu').val(name);
    $('#emailu').val(email);
    $('#passwordu').val(password);

    Swal.fire({
        title: 'Do you want to update this user?',
        color: '#fff',
        icon: 'warning',
        iconColor: '#CC0000',
        background: '#0860A1',
        showCancelButton: true,
        confirmButtonColor: '#31A24C',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, update it!'
    }).then((result) => {
        if (result.isConfirmed) {

            $('#updateAccount').modal('show');
        }
    })

    return false;
});

$('#update_data').submit('click', function() {

    let user_id = $('#user_idu').val()
    let name = $('#nameu').val()
    let email = $('#emailu').val()
    let password = $('#passwordu').val()

    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: { user_id: user_id, name: name, email: email, password: password },
        url: 'update_data',
        success: function(data) {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Updated Successfully!',
                showConfirmButton: false,
                background: '#0860A1',
                color: '#fff',
                iconColor: '#31A24C',
                timer: 2000
            })
            $("#updateAccount").modal('hide');
            get_user_data();
            clear_inputs();
        },
        error: function(data) {
            $("#updateAccount").modal('hide');
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Error Updating User',
                text: 'Try Again or Reload the page!',
                showConfirmButton: false,
                background: '#0860A1',
                color: '#fff',
                iconColor: '#CC0000',
                timer: 3000
            })
        }
    });

    return false;
});

// delete data
$('#get_user_data').on('dblclick', '.DeletePost', function() {

    let user_id = $(this).data('user_id');

    Swal.fire({
        title: 'Do you want to delete this user?',
        text: "You won't be able to revert this!",
        color: '#fff',
        icon: 'warning',
        iconColor: '#CC0000',
        background: '#0860A1',
        showCancelButton: true,
        confirmButtonColor: '#31A24C',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: { user_id: user_id },
                url: 'delete_data',
                success: function(data) {

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Deleted Successfully!',
                        showConfirmButton: false,
                        background: '#0860A1',
                        color: '#fff',
                        iconColor: '#31A24C',
                        timer: 2000
                    })
                    get_user_data();
                },
                error: function(data) {

                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error Deleting User',
                        text: 'Try Again or Reload the page!',
                        showConfirmButton: false,
                        background: '#0860A1',
                        color: '#fff',
                        iconColor: '#CC0000',
                        timer: 3000
                    })
                }
            });
        }
    })
});


//? clearing inputs
function clear_inputs() {

    $('#nameu').val('');
    $('#emailu').val('');
    $('#passwordu').val('');
}