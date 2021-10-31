<x-company-master>
@section('username')
    {{session('username')}}
@endsection
@section('content')
        <h1>Add New Company</h1>
        <form method="POST" action="{{route('company.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Company Title: </label>
                <input type="text" name="companyTitle" id="companyTitle" class="form-control" placeholder="Enter Title">
                @if($errors->has('companyTitle'))
                    <span style="color: red">{{$errors->first('companyTitle')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Company Email: </label>
                <input type="email" name="companyEmail" id="companyEmail" class="form-control" placeholder="Enter Email">
                @if($errors->has('companyEmail'))
                    <span style="color: red">{{$errors->first('companyEmail')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="file">Company Logo: </label>
                <input type="file" name="company_logo" id="company_logo" class="form-control-file">
                @if($errors->has('company_logo'))
                    <span style="color: red">{{$errors->first('company_logo')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="website">Company Website: </label>
                <input type="text" name="companyWebsite" id="companyWebsite" class="form-control" placeholder="Enter Website">
                @if($errors->has('companyWebsite'))
                    <span style="color: red">{{$errors->first('companyWebsite')}}</span>
                @endif
            </div>
            <button class="btn btn-primary">Add</button>
        </form>
@endsection
</x-company-master>
