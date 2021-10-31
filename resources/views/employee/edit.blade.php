<x-employee-master>
    @section('username')
        {{session('username')}}
    @endsection
    @section('content')
        <h1>Edit Employee</h1>
        <form method="POST" action="{{route('employee.update',base64_encode($employee->id))}}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="firstname">Employee First Name: </label>
                <input type="text" name="employeeFirstName" id="employeeFirstName" class="form-control" value="{{$employee->first_name}}">
                @if($errors->has('employeeFirstName'))
                    <span style="color: red">{{$errors->first('employeeFirstName')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="lastname">Employee Last Name: </label>
                <input type="text" name="employeeLastName" id="employeeLastName" class="form-control" value="{{$employee->last_name}}">
                @if($errors->has('employeeLastName'))
                    <span style="color: red">{{$errors->first('employeeLastName')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="website">Company: </label>
                <select class="form-control" id="CompanyId" name="CompanyId">
                    <option value=""> -- Select Company -- </option>
                    @foreach($companies AS $company)
                        <option value="{{$company->id}}" @if($employee->company_id == $company->id) selected @endif>{{$company->CompanyTitle}}</option>
                    @endforeach
                </select>
                @if($errors->has('CompanyId'))
                    <span style="color: red">{{$errors->first('CompanyId')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Employee Email: </label>
                <input type="email" name="employeeEmail" id="employeeEmail" class="form-control" value="{{$employee->email}}">
            </div>
            <div class="form-group">
                <label for="number">Employee Number: </label>
                <input type="number" name="employeeNumber" id="employeeNumber" class="form-control" value="{{$employee->phone}}">
            </div>
            <button class="btn btn-primary">Edit</button>
        </form>
    @endsection
</x-employee-master>
