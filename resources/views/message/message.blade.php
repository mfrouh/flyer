@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close l" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>{{session('success')}}</strong>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close l" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>{{session('error')}}</strong>
</div>
@endif

@if(session('errors'))
@foreach (session('errors')->all() as $error)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close l" data-dismiss="alert" aria-label="Close" >
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>{{$error}}</strong>
</div>
@endforeach
@endif
