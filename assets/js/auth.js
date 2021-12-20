$(document).ready(function() {
    $('#btnlogin').click(function(){
        $('#alertlogin').html('');
        var alertLogin = '';
        $('#btnlogin').html('<div class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>');
        if ($('#username').val() != '' && $('#password').val() != '') {
            var username = $('#username').val();
            var password = $('#password').val();
                $.ajax({
                    url: "http://localhost/joki-nana/auth/authUser.php?login",
                    method: "POST",
                    data: {username:username, password:password}, 
                    success:function(data){
                        console.log(data);
                    if (data == 'usersukses') {
                        setTimeout(function(){
                            $('#btnlogin').html('');
                            $('#btnlogin').html('Login');
                            window.location.reload();
                         }, 5000);
                    }
                    if (data =='usergagal') {
                        // bug
                        $('#btnlogin').html('');
                        $('#btnlogin').html('Login');
                        alertLogin += '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">';
                        alertLogin += 'Pastikan username dan password yang anda masukan benar.';
                        alertLogin += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        alertLogin += '</div>';
                        $('#alertlogin').html(alertLogin);
                    }
                }
            })
        }else{
            //bug
            $('#btnlogin').html('');
            $('#btnlogin').html('Login');
            alertLogin += '<div class="alert mx-auto alert-danger alert-dismissible fade show text-center" role="alert">';
            alertLogin += 'Username dan password anda masih kosong.';
            alertLogin += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            alertLogin += '</div>';
            $('#alertlogin').html(alertLogin);
        }
    })



    $('#btnregist').click(function(){
        $('#alertregist').html('');
            var alertLogin = '';
        $('#btnregist').html('<div class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>');
        if ($('#firstName').val() != '' && $('#lastName').val() != '' && $('#inputUsername').val() != '' && $('#inputPhone').val() != '' && $('#inputEmail').val() != '' && $('#inputPassword').val() != '') {
            var username = $('#inputUsername').val();
            var email = $('#inputEmail').val();
            var password = $('#inputPassword').val();
            var firstName = $('#firstName').val();
            var lastName = $('#lastName').val();
                $.ajax({
                    url: "http://localhost/joki-nana/auth/authUser.php?regist",
                    method: "POST",
                    data: {username:username, password:password, firstname:firstName, lastname:lastName, email:email}, 
                    success:function(data){
                        if (data == 0 ) {
                        $('#btnregist').html('');
                        $('#btnregist').html('Sign up');
                            alertLogin += '<div class="alert mx-auto alert-success alert-dismissible fade show text-center" role="alert">';
                            alertLogin += 'Akun sudah berhasil di daftarkan, Silahkan anda login';
                            alertLogin += '</div>';
                        $('#alertregist').html(alertLogin);
                            $('#registgoals').click(function(){
                                setTimeout(function(){
                                    window.location.reload();
                                 }, 5000);
                         }); 
                        }else{
                            $('#btnregist').html('');
                            $('#btnregist').html('Sign up');
                            alertLogin += '<div class="alert mx-auto alert-danger alert-dismissible fade show text-center" role="alert">';
                            alertLogin += 'Akun sudah terdaftar silahkan masukan akun yang lain.';
                            alertLogin += '</div>';
                            $('#alertregist').html(alertLogin); 
                        }
                }
            })
        }else{
            $('#btnregist').html('');
            $('#btnregist').html('Sign up');
            alertLogin += '<div class="alert mx-auto alert-danger alert-dismissible fade show text-center" role="alert">';
            alertLogin += 'Mohon dilihat kembali masih ada field yang kosong.';
            alertLogin += '</div>';
            $('#alertregist').html(alertLogin);
        }
    })
})