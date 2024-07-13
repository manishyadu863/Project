<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <section class="contact spad">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6 mx-auto">
                    <div class="section-title">
                        <h2 class="text-center mb-4 mt-5">Forgot Your Password?</h2>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="contact__form">
                        <form action="{{ route('password.email') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="email" name="email" placeholder="Email" class="form-control mb-3">
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="site-btn btn btn-dark form-control mb-3">Send Password Reset Link</button>
                                    <a href="{{route('tasks.index')}}" class="btn btn-dark">Home</a>
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
