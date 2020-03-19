<!-- Click Create Button -->
$(document).on('click','.user-create-modal', function() {
    $('#user_add_modal').modal('show');
});

<!-- Click Edit Button -->
$(document).on('click', '.user-edit-modal', function() {
    // $('.form-horizontal').show();
    $('#user_edit_id').val($(this).data('id'));
    $('#user_edit_name').val($(this).data('name'));
    $('#user_edit_email').val($(this).data('email'));
    $('#user_edit_role').val($(this).data('role'));
    $('#user_edit_modal').modal('show');
});

<!-- Click Delete Button -->
$(document).on('click', '.user-delete-modal', function() {
    $('.id').text($(this).data('id'));
    $('.name').html($(this).data('name'));
    $('#user_delete_modal').modal('show');
});



$(document).ready(function(){
    <!-- Submit Add User Form -->
    $("#add_user_btn").on('click', function() {
        $.ajax({
            type: 'POST',
            url: '/user/add',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=name]').val(),
                'email': $('input[name=email]').val(),
                'password': $('input[name=password]').val(),
                // 'password-confirm': $('input[name=password-confirm]').val(),
                'role': $('select[name=role]').val(),
            },
            success: function() {
                location.reload();
            },
        });
    });

    <!-- Submit Edit User Form -->
    $("#edit_user_btn").on('click', function() {
        $.ajax({
            type: 'POST',
            url: '/user/edit/' + $('#user_edit_id').val(),
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('#user_edit_id').val(),
                'name': $('#user_edit_name').val(),
                'email': $('#user_edit_email').val(),
                'role': $('#user_edit_role').val(),
            },
            success: function() {
                location.reload();
            },
        });
    });

    <!-- Submit Delete User Form -->
    $("#delete_user_btn").on('click', function() {
        $.ajax({
            type: 'get',
            url: '/user/delete/' + $('.id').text(),
            data: {
                'id': $('.id').text(),
            },
            success: function() {
                location.reload();
            },
        });
    });
});
