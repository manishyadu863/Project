<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <section class="contact spad">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6 mx-auto">
                    <div class="section-title">
                        <h2 class="text-center mb-4 mt-5">Create New Account</h2>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('alert-success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session::get('alert-success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::has('alert-danger'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{ session::get('alert-danger') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="contact__form">
                        <form action="{{ route('registerUser') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="fullname" name="fullname" placeholder="Fullname" class="form-control mb-3">
                                </div>
                                <div class="col-lg-12">
                                    <input type="email" name="email" placeholder="Email" class="form-control mb-3">
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" name="password" placeholder="Password" class="form-control mb-3">
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="site-btn btn btn-dark form-control mb-3" name="login">SIGN UP</button>
                                    <a href="{{ route('tasks.index') }}" class="btn btn-dark form-control mb-3">Home</a>
                                    <a href="{{ route('password.request') }}" class="d-block text-center mt-3">Forgot Your Password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
