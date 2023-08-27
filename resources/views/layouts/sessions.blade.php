@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
@endif
{{Session::forget('error')}}

@if(session('sucesso'))     
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('sucesso') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
@endif
{{Session::forget('sucesso')}}

@if(session('apagou'))     
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>{{ session('apagou') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
@endif
{{Session::forget('apagou')}}

@if(session('nao_apagou'))     
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ session('apagou') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
@endif
{{Session::forget('nao_apagou')}}