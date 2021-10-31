<x-company-master>
    @section('username')
        {{session('username')}}
    @endsection
        @section('content')
            <h1>Companies</h1>
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
                                <th>Company Title</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies AS $company)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><a href="{{route('company.edit',base64_encode($company->id))}}" title="click to edit">{{$company->CompanyTitle}}</a></td>
                                    <td>{{$company->Email}}</td>
                                    <td><img height="40px" src="@if(\Illuminate\Support\Str::contains($company->CompanyLogo,"images")) {{asset('storage/'.$company->CompanyLogo)}} @else {{$company->CompanyLogo}} @endif"></td>
                                    <td>{{$company->CompanyWebsite}}</td>
                                    <td>{{$company->created_at->diffForHumans()}}</td>
                                    <td>{{$company->updated_at->diffForHumans()}}</td>
                                    <td><a href="{{route('company.show',base64_encode($company->id))}}" class="btn btn-primary">View</a></td>
                                    <td><form method="POST" action="{{route('company.destroy',base64_encode($company->id))}}">@csrf @method('DELETE') <button type="submit" class="btn btn-danger">Delete</button></form></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{$companies->links()}}
        @endsection
</x-company-master>
