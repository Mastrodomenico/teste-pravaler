@extends('inner.template')
@section('content')
    @component('inner.components.bread-crumb-component', ['title' => 'Cursos', 'nameIcon' => 'pe-7s-bookmarks'])
        @slot('action')
            <a href="{{ route('courses.create') }}" class="btn btn-info">
                <span class="btn-icon-wrapper pr-2">
                    <i class="fa fa-plus fa-w-20"></i>
                </span>
                Adicionar Curso
            </a>
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Cursos</h5>
                    <table class="mb-0 table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Duração (semanas)</th>
                            <th>Instituição</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse  ($courses as $course)
                            <tr>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->duration_week }}</td>
                                <td>{{ $course->institution->name }}</td>
                                <td>
                                    @if($course->status == 1)
                                        <i class="fa fa-check text-success"></i>
                                    @else
                                        <i class="fa fa-times text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    <a class="mb-2 mr-2 btn btn-info"
                                       href="{{ route('courses.edit', $course->id) }}">
                                        <i class="fa fa-edit pr-2"></i>Editar
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>
                                    Nenhuma curso cadastrado
                                </td><td></td> <td></td> <td></td> <td></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
