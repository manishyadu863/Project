<x-adminheader title="Account Details" />
{{-- @dd(550) --}}
<div class="main-panel">
    <div class="content-wrapper">
        <h3 class="font-weight-bold">Welcome Manish</h3>
        <div class="row">
            <div class="col-md-8 mx-auto grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-3">My Profile</p>
                        @if (Session::has('alert-success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>success!</strong> {{ session::get('alert-success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('updateUser') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="fullname" value="{{ $user->fullname }}"
                                        placeholder="Name" required class="form-control mb-3">
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" name="email" value="{{ $user->email }}" readonly
                                        class="form-control mb-3">
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" value="{{ $user->password }}" name="password"
                                        placeholder="password" required class="form-control mb-3">
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-info" name="save">Save Changes</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
    </div>
</div>
<x-adminfooter />
