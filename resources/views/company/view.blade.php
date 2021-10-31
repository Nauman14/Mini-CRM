<x-company-master>
    @section('username')
        {{session('username')}}
    @endsection
    @section('content')
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title">Company Title: <span class="card-text"><b>{{$company->CompanyTitle}}</b></span></div>
                    <div class="card-title">Company Email: <span class="card-text"><b>{{$company->Email}}</b></span></div>
                    <div class="card-title">Company Image: <img class="card-img-top" height="100px" style="width: 100px !important;" src="@if(\Illuminate\Support\Str::contains($company->CompanyLogo,"images")) {{asset('storage/'.$company->CompanyLogo)}} @else {{$company->CompanyLogo}} @endif"></div>
                    <div class="card-title">Company Website: <span class="card-text"><b>{{$company->CompanyWebsite}}</b></span></div>
                </div>
            </div>
    @endsection
</x-company-master>
