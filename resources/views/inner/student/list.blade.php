@extends('inner.template')
@section('content')
    @component('inner.components.bread-crumb-component', ['title' => 'Alunos', 'nameIcon' => 'pe-7s-users'])
        @slot('action')
            <a href="{{ route('students.create') }}" class="btn btn-info">
                <span class="btn-icon-wrapper pr-2">
                    <i class="fa fa-plus fa-w-20"></i>
                </span>
                Adicionar Aluno
            </a>
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Alunos</h5>
                    <table class="mb-0 table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Curso</th>
                            <th>Instituição</th>
                            <th>Cidade</th>
                            <th>UF</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse  ($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->cpf }}</td>
                                <td>{{ $student->course->name }}</td>
                                <td>{{ $student->course->institution->name }}</td>
                                <td>{{ $student->city }}</td>
                                <td>{{ $student->uf }}</td>
                                <td>
                                    @if($student->status == 1)
                                        <i class="fa fa-check text-success"></i>
                                    @else
                                        <i class="fa fa-times text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    <a class="mb-2 mr-2 btn btn-info"
                                       href="{{ route('students.edit', $student->id) }}">
                                        <i class="fa fa-edit pr-2"></i> Editar
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>
                                    Nenhuma aluno cadastrado
                                </td><td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
