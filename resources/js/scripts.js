$('#submit-btn').on('click', function (e) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var currentYear = new Date();
    var selectedDate = new Date($('#birthdate').val());
    var current_Year = currentYear.getFullYear();
    var selected_Date = selectedDate.getFullYear();
    var age = current_Year - selected_Date;

    var userform = {
        
        'id': $('#hidden_id').val(),
        'name': $('#name').val(),
        'birthdate': $('#birthdate').val(),
        'gender': $('input[name="gender"]:checked').val(),
        'number': $('#number').val(),
        'age': age,
        'bloodtype': $('#bloodtype').val(),
        'region': $('#region').val(),
        'province': $('#province').val(),
        'municipality': $('#municipality').val(),
        'barangay': $('#barangay').val(),
        'purok': $('#purok').val(),
        'username': $('#username').val(),
        'password': $('#password').val(),
        'password_confirmation': $('#password_confirmation').val(),
        'image': $('.image-tag').val(),
        'location': $('#location').val()
    }

    if ($(this).val() == 'Update') {
        $.ajax({
            type: 'post',
            url: 'users/update',
            data: userform,
            dataType: 'json',
            success: function (response) {
                $('#user_datatable').DataTable().ajax.reload();
                alert(response.message)
            }
        })
    } else {
        $.ajax({
            type: 'post',
            url: 'create',
            data: userform,
            dataType: 'json',
            success: function (response) {
                $('#user_datatable').DataTable().ajax.reload();
                alert(response.message)
                
            }
        })
    }

})

$('#image').on('change', function (e) {
    var filesSelected = document.getElementById('image').files[0];
    var reader = new FileReader();
    reader.readAsDataURL(filesSelected);
    reader.onload = function () {
        console.log(reader.result)
        $(".image-tag").val(reader.result);
        // $("#previewImage").attr("src", reader1.result);
    }
});


