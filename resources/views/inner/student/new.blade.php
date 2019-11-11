@extends('inner.template')
@section('content')
    @component('inner.components.bread-crumb-component', ['title' => 'Cadastrar curso', 'nameIcon' => 'pe-7s-bookmarks'])
        @slot('action')
            <a href="{{route('students.index')}}" class="btn btn-info">
                <span class="btn-icon-wrapper pr-2">
                    <i class="fa fa-arrow-left fa-w-20"></i>
                </span>
                Voltar
            </a>
        @endslot
    @endcomponent
    <div class="row" id="appStudent">
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
                    <form class="row" action="{{ route('students.store') }}" method="POST">
                        @csrf
                        <div class="position-relative form-group col-4">
                            <label for="name" class="">Nome</label>
                            <input name="name" id="name" placeholder="Nome do Aluno" type="text"
                                   class="form-control">
                        </div>
                        <div class="position-relative form-group col-4">
                            <label for="cpf" class="">CPF</label>
                            <input name="cpf" id="cpf" placeholder="CPF do Aluno" type="text"
                                   class="form-control" v-mask="'###.###.###-##'">
                        </div>
                        <div class="position-relative form-group col-4">
                            <label for="date_birth" class="">Data de nascimento</label>
                            <input name="date_birth" id="date_birth" placeholder="Data de nascimento do Aluno" type="text"
                                   class="form-control" v-mask="'##/##/####'">
                        </div>
                        <div class="position-relative form-group col-5">
                            <label for="email" class="">Email</label>
                            <input name="email" id="email" placeholder="Email do Aluno" type="text"
                                   class="form-control">
                        </div>
                        <div class="position-relative form-group col-3">
                            <label for="phone" class="">Telefone</label>
                            <input name="phone" id="phone" placeholder="Telefone do Aluno" type="text"
                                   class="form-control" v-mask="['(##) ####-####', '(##) #####-####']">
                        </div>
                        <div class="col-12 divider"></div>
                        <div class="position-relative form-group col-4">
                            <label for="street" class="">Rua</label>
                            <input name="street" id="street" placeholder="Rua" type="text"
                                   class="form-control">
                        </div>
                        <div class="position-relative form-group col-2">
                            <label for="number" class="">Número</label>
                            <input name="number" id="number" placeholder="Número" type="text"
                                   class="form-control">
                        </div>
                        <div class="position-relative form-group col-3">
                            <label for="district" class="">Bairro</label>
                            <input name="district" id="district" placeholder="Bairro" type="text"
                                   class="form-control">
                        </div>
                        <div class="position-relative form-group col-3">
                            <label for="city" class="">Cidade</label>
                            <input name="city" id="city" placeholder="Cidade" type="text"
                                   class="form-control">
                        </div>
                        <div class="position-relative form-group col-2">
                            <label for="uf" class="">UF</label>
                            <select name="uf" id="uf" class="form-control">
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AM">AM</option>
                                <option value="AP">AP</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MG">MG</option>
                                <option value="MS">MS</option>
                                <option value="MT">MT</option>
                                <option value="PA">PA</option>
                                <option value="PB">PB</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="PR">PR</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RS">RS</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="SC">SC</option>
                                <option value="SE">SE</option>
                                <option value="SP">SP</option>
                                <option value="TO">TO</option>
                            </select>
                        </div>
                        <div class="col-12 divider"></div>
                        <div class="position-relative form-group col-3">
                            <label for="course_id" class="">Cursos</label>
                            <select name="course_id" id="course_id" class="form-control">
                                <option value="" selected disabled>Escolha um curso</option>
                                @foreach($institutions as $institution)
                                    <optgroup label="{{$institution->name}}">
                                        @foreach($institution->courses as $course)
                                            <option value="{{$course->id}}">{{$course->name}}</option>
                                        @endforeach
                                    </optgroup>
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
                        <div class="col-12 divider"></div>
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
    <script type="text/javascript" src="/js/student.new.js"></script>
@endsection
