@extends('inner.template')
@section('content')
    @component('inner.components.bread-crumb-component', ['title' => $user->name, 'nameIcon' => 'pe-7s-user'])
        @slot('action')
            <a href="{{route('users.index')}}" class="btn btn-info">
                <span class="btn-icon-wrapper pr-2">
                    <i class="fa fa-arrow-left fa-w-20"></i>
                </span>
                Voltar
            </a>
            @if($user->id != \Illuminate\Support\Facades\Auth::id())
            <form action="{{ route('users.destroy', $user->id)}}" method="post" style="display: contents;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Deletar</button>
            </form>
            @endif
        @endslot
    @endcomponent
    <div class="row" id="appForm">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Preencha os dados abaixo</h5>
                    @if ($errors->any())
                        <ul class="list-group mb-2">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item-danger list-group-item">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form class="row"
                          action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="position-relative form-group col-4">
                            <label for="name" class="">Nome</label>
                            <input name="name" id="name" placeholder="Nome do Usuário" type="text"
                                   class="form-control" value="{{$user->name}}">
                        </div>
                        <div class="position-relative form-group col-4">
                            <label for="email" class="">Email</label>
                            <input name="email" id="email" placeholder="Email do Usuário" type="text"
                                   class="form-control" value="{{$user->email}}">
                        </div>
                        <div class="position-relative form-group col-4">
                            <label for="password" class="">Senha</label>
                            <input name="password" id="password" type="password"
                                   class="form-control">
                        </div>
                        <div class="col-12 divider"></div>
                        <div class="position-relative form-group col-12 text-right">
                            <button class="mt-1 btn btn-success"><i class="fa fa-check pr-2"></i> Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
@endsection
