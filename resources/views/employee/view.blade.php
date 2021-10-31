<x-employee-master>
    @section('username')
        {{session('username')}}
    @endsection
    @section('content')
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title">Employee First Name: <span class="card-text"><b>{{$employee->first_name}}</b></span></div>
                <div class="card-title">Employee Last Name: <span class="card-text"><b>{{$employee->last_name}}</b></span></div>
                <div class="card-title">Company: <span class="card-text"><b>{{$employee->CompanyTitle}}</b></span></div>
                <div class="card-title">Email: <span class="card-text"><b>{{$employee->email}}</b></span></div>
                <div class="card-title">Phone: <span class="card-text"><b>{{$employee->phone}}</b></span></div>
            </div>
        </div>
    @endsection
</x-employee-master>
