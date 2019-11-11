@extends('inner.template')
@section('content')
    @component('inner.components.bread-crumb-component', ['title' => $course->name, 'nameIcon' => 'pe-7s-culture'])
        @slot('action')
            <a href="{{route('courses.index')}}" class="btn btn-info">
                <span class="btn-icon-wrapper pr-2">
                    <i class="fa fa-arrow-left fa-w-20"></i>
                </span>
                Voltar
            </a>
            <form action="{{ route('courses.destroy', $course->id)}}" method="post" style="display: contents;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">
                    <i class="fa fa-trash fa-w-20 pr-2"></i>Deletar</button>
            </form>
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
                    <form class="row" action="{{ route('courses.update', $course->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$course->id}}">
                        <div class="position-relative form-group col-5">
                            <label for="name" class="">Nome</label>
                            <input name="name" id="name" placeholder="Nome do Curso" type="text"
                                   class="form-control" value="{{$course->name}}">
                        </div>
                        <div class="position-relative form-group col-2">
                            <label for="duration_week" class="">Duração</label>
                            <select name="duration_week" id="duration_week" class="form-control" v-model="form.duration_week">
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
                            <select name="institution_id" id="institution_id" class="form-control" v-model="form.institution_id">
                                <option value="" selected disabled>Escolha uma instituição</option>
                                @foreach($institutions as $institution)
                                    <option value="{{$institution->id}}">{{$institution->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="position-relative form-group col-2">
                            <label for="status" class="">Status</label>
                            <select name="status" id="status" class="form-control" v-model="form.status">
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                        <div class="divider col-12"></div>
                        <div class="position-relative form-group col-12 text-right">
                            <button type="submit" class="mt-1 btn btn-success"><i class="fa fa-check pr-2"></i>Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        const duration_week = '{{$course->duration_week}}';
        const institution_id = '{{$course->institution_id}}';
        const status = '{{$course->status}}';
    </script>
    <script type="text/javascript" src="/js/course.edit.js"></script>
@endsection
