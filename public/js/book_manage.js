<!-- Click Create Button -->
$(document).on('click','.book-create-modal', function() {
    $('#book_add_modal').modal('show');
    // $('.form-horizontal').show();
});

<!-- Click Edit Button -->
$(document).on('click', '.book-edit-modal', function() {
    // $('.form-horizontal').show();
    $('#book_edit_id').val($(this).data('id'));
    $('#book_edit_title').val($(this).data('title'));
    $('#book_edit_author').val($(this).data('author'));
    $('#book_edit_publisher').val($(this).data('publisher'));
    $('#book_edit_publicationYear').val($(this).data('publicationyear'));
    $('#book_edit_language').val($(this).data('language'));
    $('#book_edit_ISBN').val($(this).data('isbn'));
    $('#book_edit_description').val($(this).data('description'));
    $('#book_edit_pageNumber').val($(this).data('pagenumber'));
    $('#book_edit_type').val($(this).data('type'));
    $('#book_edit_status').val($(this).data('status'));
    // if($(this).data('image'))
    //     $('#book_edit_image_label').html($(this).data('image'));
    // else
    //     $('#book_edit_image_label').html("Choose Image");
    $('#book_edit_modal').modal('show');
});

<!-- Click Delete Button -->
$(document).on('click', '.book-delete-modal', function() {
    $('.id').text($(this).data('id'));
    $('.title').html($(this).data('title'));
    $('#book_delete_modal').modal('show');
});


$(document).ready(function(){
    <!-- Submit Add Book Form -->
    $("#add_book_btn").on('click', function() {
        var form = $('#add_book_form')[0];
        var formData = new FormData(form);
        $.ajax({
            type: 'POST',
            url: '/b/add',
            enctype: 'multipart/form-data',
            data: formData,
            processData: false,
            contentType: false,
            // data: {
            //     '_token': $('input[name=_token]').val(),
            //     'title': $('input[name=title]').val(),
            //     'author': $('input[name=author]').val(),
            //     'publisher': $('input[name=publisher]').val(),
            //     'publicationYear': $('input[name=publicationYear]').val(),
            //     'language': $('input[name=language]').val(),
            //     'ISBN': $('input[name=ISBN]').val(),
            //     'pageNumber': $('input[name=pageNumber]').val(),
            //     'type': $('select[name=type]').val(),
            //     'status': $('select[name=status]').val(),
            //     'description': $('textarea[name=description]').val(),
            //     // 'image': image_name,
            //     'image': $('file[name=image]').val(),
            // },
            success: function() {
                location.reload();
            },
        });
    });

    <!-- Submit Edit Book Form -->
    $("#edit_book_btn").on('click', function() {
        var form = $('#edit_book_form')[0];
        var formData = new FormData(form);
        $.ajax({
            type: 'POST',
            url: '/b/edit/' + $('#book_edit_id').val(),
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            // data: {
            //     '_token': $('input[name=_token]').val(),
            //     'id': $('#book_edit_id').val(),
            //     'title': $('#book_edit_title').val(),
            //     'author': $('#book_edit_author').val(),
            //     'publisher': $('#book_edit_publisher').val(),
            //     'publicationYear': $('#book_edit_publicationYear').val(),
            //     'language': $('#book_edit_language').val(),
            //     'ISBN': $('#book_edit_ISBN').val(),
            //     'pageNumber': $('#book_edit_pageNumber').val(),
            //     'type': $('#book_edit_type').val(),
            //     'status': $('#book_edit_status').val(),
            //     'description': $('#book_edit_description').val(),
            //     'image': $('#book_edit_image').val(),
            // },
            success: function() {
                location.reload();
            },
        });
    });

    <!-- Submit Delete Form -->
    $("#delete_book_btn").on('click', function() {
        $.ajax({
            type: 'get',
            url: '/b/delete/' + $('.id').text(),
            data: {
                'id': $('.id').text(),
            },
            success: function() {
                location.reload();
            },
        });
    });
});
