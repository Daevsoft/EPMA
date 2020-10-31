<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>_(( app_name() )) - Login</title>
_(( css_source('bootstrap.min') ))
_(( css_source('login') ))
</head>
<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">E-Puskesmas Management</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="_(( site('login/form_forgot') ))" method="post">
                            <h3 class="text-center text-info">Lupa Password</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">NIK :</label><br>
                                <input type="text" name="nik" id="nik" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Kode Puskes :</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                                <label class="badge badge-default">Tanyakan kode puskes pada Admin</label>
                            </div>
                            <div class="form-group">
                                <a href="/login" class="text-info">KEMBALI</a>
                            </div>
                            <div id="register-link" class="text-right">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="MASUK">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
_(( js_source('bootstrap.min') ))
_(( js_source('jquery.min') ))
</body>

</html>