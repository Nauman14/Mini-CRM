<x-employee-master>
    @section('username')
        {{session('username')}}
    @endsection
    @section('content')
        <h1>Add New Employee</h1>
        <form method="POST" action="{{route('employee.store')}}">
            @csrf
            <div class="form-group">
                <label for="firstname">Employee First Name: </label>
                <input type="text" name="employeeFirstName" id="employeeFirstName" class="form-control" placeholder="Enter First Name">
                @if($errors->has('employeeFirstName'))
                    <span style="color: red">{{$errors->first('employeeFirstName')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="lastname">Employee Last Name: </label>
                <input type="text" name="employeeLastName" id="employeeLastName" class="form-control" placeholder="Enter Last Name">
                @if($errors->has('employeeLastName'))
                    <span style="color: red">{{$errors->first('employeeLastName')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="website">Company: </label>
                <select class="form-control" id="CompanyId" name="CompanyId">
                    <option value=""> -- Select Company -- </option>
                    @foreach($companies AS $company)
                        <option value="{{$company->id}}">{{$company->CompanyTitle}}</option>
                    @endforeach
                </select>
                @if($errors->has('CompanyId'))
                    <span style="color: red">{{$errors->first('CompanyId')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Employee Email: </label>
                <input type="email" name="employeeEmail" id="employeeEmail" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label for="number">Employee Number: </label>
                <input type="number" name="employeeNumber" id="employeeNumber" class="form-control" placeholder="Enter Contact Number">
            </div>
            <button class="btn btn-primary">Add</button>
        </form>
    @endsection
</x-employee-master>
