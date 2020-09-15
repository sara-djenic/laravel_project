
@if($errors->any())
    @foreach($errors->all() as $err)
        <div class="alert alert-danger text-center">{{$err}}</div>
    @endforeach
@endif
@if(Session::has('success'))
    <div class="alert alert-success text-center" role="alert">
        {{Session::get('success')}}
    </div>

@endif

@if(Session::has('error'))
    <div class="alert alert-danger text-center" role="alert">
        {{Session::get('error')}}
    </div>

@endif
