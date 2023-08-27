@extends('layouts.app')
@extends('layouts.sessions')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Lista Carros</div>
                    <div class="card-body">
                        @forelse($carros as $c)
                            @php
                                $n = explode(",", $c['nome_veiculo']);
                            @endphp

                            <!-- POP-UP MAIS OPÇÕES -->
                            <div class="modal fade" id="exampleModal{{$c->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Mais opções para <b>{{$n[0]}}&nbsp;{{$n[1]}}</b></h5>
                                </div>
                                <div class="modal-body">
                                    <label>VER TODAS INFORMAÇÕES DE <b>{{$n[0]}}&nbsp;{{$n[1]}}</b></label>
                                    <a href="{{$c->ver_mais_link}}" title="VER"  style="color: blue;" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/></svg>
                                    </a>
                                    <br>
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{ route('apagar_carros') }}">
                                        @csrf
                                        <input type="hidden" name="id_carro" value="{{$c->id}}">
                                        <button type="submit" class="btn btn-outline-danger" title="APAGAR">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/><path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/></svg>
                                        </button>
                                    </form>
                                    <a href="" class="btn btn-outline-dark" data-dismiss="modal" title="FECHAR">X</a>
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- POP-UP MAIS OPÇÕES FIM -->

                            <div class="carro">
                                <div class="carro-img">
                                    <img src="{{$c['link']}}" alt="Imagem do Carro" style="max-width: 100%;">
                                </div>
                                <div class="carro-info">
                                    <span><b>{{$n[0]}}&nbsp;{{$n[1]}}</b></span>
                                    <span><b>{{$n[2]}}</b></span>
                                    <span>Ano: {{$c['ano']}}</span>
                                    <span>Quilometragem: {{$c['quilometragem']}}</span>
                                    <h4 style="color: #00CED1;">R$: {{$c['preco']}}</h4>
                                </div>
                                <div class="fun">
                                    <!-- BOTÃO CHAMA O POP-UP MAIS OPÇÕES -->
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal{{$c->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/></svg>                                    
                                    </button>
                                    <!-- BOTÃO CHAMA O  FIM -->
                                </div>
                            </div><br>
                        @empty
                            <div class="alert alert-warning">
                                <span>{{Auth::user()->name}}, VOCÊ NÃO TEM VEÍCULOS SALVOS.</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



