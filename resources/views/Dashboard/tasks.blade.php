<x-adminheader title="Customers" />
{{-- @dd(550) --}}
<div class="main-panel">
    <div class="content-wrapper">
        <h3 class="font-weight-bold">Welcome Manish</h3>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-3 btn btn-info text-light">Our Task</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>#.</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Priority</th>
                                        <th>Registration Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($tasks as $task)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $task->title }}</td>
                                            <td>{{ $task->description }}</td>
                                            <td>{{ $task->priority }}</td>
                                            <td>{{ $task->created_at }}</td>
                                            <td class="font-weight-medium">
                                                <div class="badge badge-info">

                                                    {{ $task->status }}
                                            </td>
                        </div>

                        <td>
                            @if ($task->status == 'Pending')
                                <a href="{{ URL::to('changeTaskStatus/Completed/' . $task->id) }}"
                                    class="badge badge-success">Complete</a>
                            @else
                                <a href="{{ URL::to('changeTaskStatus/Delivered/' . $task->id) }}"
                                    class="badge badge-success">Complete</a>
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
