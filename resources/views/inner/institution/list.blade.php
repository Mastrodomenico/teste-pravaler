@extends('inner.template')
@section('content')
    @component('inner.components.bread-crumb-component', ['title' => 'Instituição', 'nameIcon' => 'pe-7s-culture'])
        @slot('action')
            <a href="{{ route('institutions.create') }}" class="btn btn-info">
                <span class="btn-icon-wrapper pr-2">
                    <i class="fa fa-plus fa-w-20"></i>
                </span>
                Adicionar Instituição
            </a>
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Instituições</h5>
                    <table class="mb-0 table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CNPJ</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse  ($institutions as $institution)
                            <tr>
                                <td>{{ $institution->name }}</td>
                                <td>{{ $institution->cnpj }}</td>
                                <td>
                                    @if($institution->status == 1)
                                        <i class="fa fa-check text-success"></i>
                                    @else
                                        <i class="fa fa-times text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    <a class="mb-2 mr-2 btn btn-info"
                                       href="{{ route('institutions.edit', $institution->id) }}">
                                        <i class="fa fa-edit pr-2"></i> Editar
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>
                                    Nenhuma insituição cadastrada
                                </td><td></td> <td></td> <td></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
