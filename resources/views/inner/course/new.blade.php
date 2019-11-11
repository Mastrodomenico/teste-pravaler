@extends('inner.template')
@section('content')
    @component('inner.components.bread-crumb-component', ['title' => 'Cadastrar curso', 'nameIcon' => 'pe-7s-bookmarks'])
        @slot('action')
            <a href="{{route('courses.index')}}" class="btn btn-info">
                <span class="btn-icon-wrapper pr-2">
                    <i class="fa fa-arrow-left fa-w-20"></i>
                </span>
                Voltar
            </a>
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
                    <form class="row" action="{{ route('courses.store') }}" method="POST">
                        @csrf
                        <div class="position-relative form-group col-5">
                            <label for="name" class="">Nome</label>
                            <input name="name" id="name" placeholder="Nome do Curso" type="text"
                                   class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="position-relative form-group col-2">
                            <label for="duration_week" class="">Duração</label>
                            <select name="duration_week" id="duration_week" class="form-control">
                                <option value="1">1 Semana</option>
                                <option value="2">2 Semanas</option>
                                <option value="3">3 Semanas</option>
                                <option value="4">4 Semanas</option>
                                <option value="5">5 Semanas</option>
                                <option value="6">6 Semanas</option>
                                <option value="7">7 Semanas</option>
                            </select>
                        </div>
                        <div class="position-relative form-group col-3">
                            <label for="institution_id" class="">Instituição</label>
                            <select name="institution_id" id="institution_id" class="form-control">
                                <option value="" selected disabled>Escolha uma instituição</option>
                                @foreach($institutions as $institution)
                                    <option value="{{$institution->id}}">{{$institution->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="position-relative form-group col-2">
                            <label for="status" class="">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                        <div class="divider col-12"></div>
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
@endsection
