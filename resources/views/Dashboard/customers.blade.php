<x-adminheader title="Customers" />
{{-- @dd(550) --}}
<div class="main-panel">
    <div class="content-wrapper">
        <h3 class="font-weight-bold">Welcome Manish</h3>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <p class="card-title mb-3 btn btn-info text-light">Our Customers</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>#.</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Registration Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($customers as $customer)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $customer->fullname }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->type }}</td>
                                            <td>{{ $customer->created_at }}</td>
                                            <td class="font-weight-bold">{{ $customer->status }}</td>

                                            <td>
                                                @if ($customer->status == 'Active')
                                                    <a href="{{ URL::to('changeUserStatus/Blocked/' . $customer->id) }}"
                                                        class="btn btn-danger">Block</a>
                                                @else
                                                    <a href="{{ URL::to('changeUserStatus/Active/' . $customer->id) }}"
                                                        class="btn btn-success">un-Block</a>
                                                @endif

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<x-adminfooter />
