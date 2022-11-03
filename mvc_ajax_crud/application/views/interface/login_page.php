<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <title>Seat allotment</title>
 <style>
    .customHeading {
    color: #30c6b0;
}

.custom-form-group label {
    color: #30c6b0;
    font-size: 13px;
    font-weight: bold;
    letter-spacing: 2px;
}

.custom-form-group span {
    width: 32px;
    border-bottom: 1px solid #30c6b0;
    vertical-align: middle;
    color: #30c6b0;
    display: inline;
}

.custom-form-group input {
    width: calc(100% - 32px);
    border: none;
    border-bottom: 1px solid #30c6b0;
    box-sizing: content-box;
    outline: none;
}

.custom-btn {
    /* border-radius: 32px; */
    background: #30c6b0;
    border: 2px solid transparent;
    color: #fff;
    height: 48px;
}

.custom-btn:hover {
    background: #fff;
    border: none;
    border: 2px solid #30c6b0;
    color: #30c6b0;
}

#formPanel {
    min-width: 280px;
    max-width: 320px;
    width: 100%;
    margin: 0 auto;
}

.objectFit {
    object-fit: cover;
    width: 100%;
    max-width: 320px;
    min-height: 60vh;
    margin: 0 auto
}

#showCursor {
    cursor: pointer
}
 </style>
</head>

<body>
    <div class="min-vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 mx-auto">
                    <div class="shadow-lg">
                        <div class="d-flex align-items-center">

                            <div class="p-4" id="formPanel">
                                <div class="text-center mb-5">
                                    <h1 class="customHeading h2 text-uppercase">Login</h1>
                                </div>
                                <form  action="http://localhost/mvc_ajax_crud/welcome/" method="post">
                                    <div class="custom-form-group">
                                        <label class="text-uppercase" for="username">Username</label>
                                        <input type="text" id="username" name="username" class="pb-1" /><span class="pb-1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <div class="custom-form-group mt-3">
                                        <label class="text-uppercase" for="password">Password</label>
                                        <input type="password" id="password" name="password" class="pb-1" /><span class="pb-1"><i id="showCursor" class="fas fa-eye-slash" onclick="showPassword(event)"></i></span>
                                    </div>
                                    <div class="mt-5">
                                        <input type="submit" name="login" value="login" class="w-100 p-2 d-block custom-btn" >
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
        function showPassword(e) {
            var input = document.getElementById('password')
            if (input.type === 'password') {
                input.type = "text"
                e.target.className = "fas fa-eye"
            } else {
                input.type = "password"
                e.target.className = "fas fa-eye-slash"
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

