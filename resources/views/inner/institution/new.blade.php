@extends('inner.template')
@section('content')
    @component('inner.components.bread-crumb-component', ['title' => 'Cadastrar instituição', 'nameIcon' => 'pe-7s-culture'])
        @slot('action')
            <a href="{{route('institutions.index')}}" class="btn btn-info">
                <span class="btn-icon-wrapper pr-2">
                    <i class="fa fa-arrow-left fa-w-20"></i>
                </span>
                Voltar
            </a>
        @endslot
    @endcomponent
    <div class="row" id="app">
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
                    <form class="row" action="{{ route('institutions.store') }}" method="POST">
                        @csrf
                        <div class="position-relative form-group col-5">
                            <label for="name" class="">Nome</label>
                            <input name="name" id="name" placeholder="Nome da Instituição" type="text"
                                   class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="position-relative form-group col-5">
                            <label for="cnpj" class="">CNPJ</label>
                            <input name="cnpj" id="cnpj" placeholder="CNPJ da Instituição" type="text"
                                   class="form-control" value="{{ old('cnpj') }}" v-mask="'##.###.###/####-##'">
                        </div>
                        <div class="position-relative form-group col-2">
                            <label for="status" class="">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                        <div class="position-relative form-group col-12 text-right">
                            <button type="submit" class="mt-1 btn btn-success"><i class="fa fa-check pr-2"></i>Criar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript" src="/js/institution.new.js"></script>
@endsection
