<x-employee-master>
    @section('username')
        {{session('username')}}
    @endsection
    @section('content')
            <h1>Employees</h1>
            @if(session('delete'))
                <div align="center" class="col-lg-12 alert alert-danger">{{session('delete')}}</div>
            @elseif(session('add'))
                <div align="center" class="col-lg-12 alert alert-success">{{session('add')}}</div>
            @elseif(session('update'))
                <div align="center" class="col-lg-12 alert alert-primary">{{session('update')}}</div>
            @endif
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Employee First Name</th>
                                <th>Employee Last Name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees AS $employee)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><a href="{{route('employee.edit',base64_encode($employee->id))}}" title="click to edit">{{$employee->first_name}}</a></td>
                                    <td>{{$employee->last_name}}</td>
                                    <td>{{$employee->CompanyTitle}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td>{{$employee->created_at->diffForHumans()}}</td>
                                    <td>{{$employee->updated_at->diffForHumans()}}</td>
                                    <td><a href="{{route('employee.show',base64_encode($employee->id))}}" class="btn btn-primary">View</a></td>
                                    <td><form method="POST" action="{{route('employee.destroy',base64_encode($employee->id))}}">@csrf @method('DELETE') <button type="submit" class="btn btn-danger">Delete</button></form></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{$employees->links()}}
    @endsection
</x-employee-master>
