<x-company-master>
    @section('username')
        {{session('username')}}
    @endsection
        @section('content')
            <h1>Edit Company</h1>
            <form method="POST" action="{{route('company.update',$company->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="title">Company Title: </label>
                    <input type="text" name="companyTitle" id="companyTitle" class="form-control" value="{{$company->CompanyTitle}}">
                    @if($errors->has('companyTitle'))
                        <span style="color: red">{{$errors->first('companyTitle')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Company Email: </label>
                    <input type="email" name="companyEmail" id="companyEmail" class="form-control" value="{{$company->Email}}">
                    @if($errors->has('companyEmail'))
                        <span style="color: red">{{$errors->first('companyEmail')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <div><img height="100px" src="@if(\Illuminate\Support\Str::contains($company->CompanyLogo,"images")) {{asset('storage/'.$company->CompanyLogo)}} @else {{$company->CompanyLogo}} @endif"></div>
                    <label for="file">Company Logo: </label>
                    <input type="file" name="company_logo" id="company_logo" class="form-control-file">
                    @if($errors->has('company_logo'))
                        <span style="color: red">{{$errors->first('company_logo')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="website">Company Website: </label>
                    <input type="text" name="companyWebsite" id="companyWebsite" class="form-control" value="{{$company->CompanyWebsite}}">
                    @if($errors->has('companyWebsite'))
                        <span style="color: red">{{$errors->first('companyWebsite')}}</span>
                    @endif
                </div>
                <button class="btn btn-primary">Edit</button>
            </form>
        @endsection
</x-company-master>
