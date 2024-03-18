/*
    Авторизация
 */

$('.login-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val();

    $.ajax({
        url: 'vendor/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success (data) {

            if (data.status) {
                document.location.href = 'profile.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }
                $('.msg').removeClass('none').text(data.message);
            }
        }
    });
});

/*
    Получение аватарки с поля
 */


/*
    Регистрация
 */

$('.register-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val(),
        FirstName = $('input[name="FirstName"]').val(),
        LastName = $('input[name="LastName"]').val(),
        adres = $('input[name="adres"]').val(),
        birth = $('input[name="birth"]').val(),
        password_confirm = $('input[name="password_confirm"]').val();

    let formData = new FormData();
    formData.append('login', login);
    formData.append('password', password);
    formData.append('password_confirm', password_confirm);
    formData.append('FirstName', FirstName);
    formData.append('LastName', LastName);
    formData.append('adres', adres);
    formData.append('birth', birth);


    $.ajax({
        url: 'vendor/signup.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                document.location.href = 'avt.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);

            }

        }
        

    });

});

$('.add-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let vrach = $('input[name="vrach"]').val(),
    pacient = $('input[name="pacient"]').val(),
    postyp = $('input[name="postyp"]').val(),
    vip = $('input[name="vip"]').val(),
    diag = $('input[name="diag"]').val(),
    naznach = $('input[name="naznach"]').val();

    let formData = new FormData();
    formData.append('vrach', vrach);
    formData.append('pacient', pacient);
    formData.append('postyp', postyp);
    formData.append('vip', vip);
    formData.append('naznach', naznach);
    formData.append('diag', diag);


    $.ajax({
        url: 'insertIstoriya.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                document.location.href = 'vrach.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);

            }

        }
    });
});
