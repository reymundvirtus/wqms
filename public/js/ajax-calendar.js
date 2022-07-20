$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

get_reminders(); //? call the function to get reminders

//? retreived data
function get_reminders() {

    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'reminders',
        success: function(data) {

            let html

            for (let i = 0; i < data.length; i++) {
                html += '<tr>'
                html += '<td class="text-center">' + data[i].title + '</td>'
                html += '<td class="text-center">' + data[i].start + '</td>'
                html += '<td class="text-center">' + data[i].end + '</td>'
                html += '<td class="text-center">' + data[i].created_at + '</td>'
                html += '<td class="text-center">' + data[i].encoder + '</td>'
                    // html += '<td class="text-center"><a href="javascript:void(0)" type="button" class="text-white EditPost" data-toggle="tooltip" data-placement="top" title="Edit this Reminder" data-id="' + data[i].id + '"data-title="' + data[i].title + '"data-start="' + data[i].start + '"data-end="' + data[i].end + '"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>'
                    // html += '<td class="text-center"><a href="javascript:void(0)" type="button" class="text-white ReadPost" data-toggle="tooltip" data-placement="top" title="Read this Reminder" data-id="' + data[i].id + '"data-title="' + data[i].title + '"data-start="' + data[i].start + '"data-end="' + data[i].end + '"data-created_at="' + data[i].created_at + '"><i class="fa fa-eye" aria-hidden="true"></i></a></td>'
                    // html += '<td class="text-center"><a href="javascript:void(0)" type="button" class="text-white DeletePost" data-toggle="tooltip" data-placement="top" title="Delete this Reminder" data-id="' + data[i].id + '"data-title="' + data[i].title + '"data-start="' + data[i].start + '"data-end="' + data[i].end + '"data-created_at="' + data[i].created_at + '"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>'
                html += '</tr>'
            }

            $('#get_reminders').html(html.substr(9))
        }
    });

    return false;
}

//? delete data
$('#get_reminders').on('dblclick', '.DeletePost', function() {

    let id = $(this).data('id');

    Swal.fire({
        title: 'Are you sure?',
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
                data: {
                    id: id
                },
                url: 'delete_reminder',
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
                    get_reminders();
                },
                error: function(data) {

                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error Deleting Reminder',
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

    $('#titleu').val('');
    $('#startu').val('');
    $('#endu').val('');
}