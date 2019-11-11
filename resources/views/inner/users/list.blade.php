@extends('inner.template')
@section('content')
    @component('inner.components.bread-crumb-component', ['title' => 'Usuários', 'nameIcon' => 'pe-7s-user'])
        @slot('action')
            <a href="{{ route('users.create') }}" class="btn btn-info">
                <span class="btn-icon-wrapper pr-2">
                    <i class="fa fa-plus fa-w-20"></i>
                </span>
                Adicionar Usuário
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
                            <th>Email</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse  ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a class="mb-2 mr-2 btn btn-info"
                                       href="{{ route('users.edit', $user->id) }}">
                                        <i class="fa fa-edit pr-2"></i> Editar
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
