@if($errors->any())
    <div class="alert alert-danger alert-dismissible my-2">
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible my-2">
        {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible my-2">
        {{ session()->get('error') }}
    </div>
@endif
