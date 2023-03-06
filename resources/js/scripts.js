
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
    console.log(age)
    var userform = {
        'name': $('#name').val(),
        'birthdate': $('#birthdate').val(),
        'gender': $('input[name="gender"]:checked').val(),
        'number': $('#number').val(),
        'age': age,
        'bloodtype': $('#bloodtype').val(),
        'region': $('#region').val(),
        'province': $('#province').val(),
        'city': $('#city').val(),
        'barangay': $('#barangay').val(),
        'purok': $('#purok').val(),
        'username': $('#username').val(),
        'password': $('#password').val(),
    }
    console.log(userform);
    $.ajax({
        type: 'post',
        url: 'create',
        data: userform,
        dataType: 'json',
        success: function (response) {
            alert(response.message)
        }
    })
})
