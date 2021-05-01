@extends('layouts.app')

@section('content')
    <div class="ui container">
        <div class="ui segment form">
            <div class="ui header"> <i class="icon globe"></i> Página dos Administradores</div>
            <div class="ui divider"></div>
            <div class="ui top attached tabular menu">
                <a class="active item" data-tab="first">Usuários</a>
                <a class="item" data-tab="second">Grupos</a>
               
            </div>
            <div class="ui bottom attached active tab segment" data-tab="first">
                <div class="fields">
                    <div class="sixteen wide field">
                        <table class="ui table very black compact celled selectable structured small" id="tableUsers">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Nome</th>
                                    <th>E-Mail</th>
                                    <th>Grupo</th>
                                    <th>Ativo?</th>
                                    <th>Ativar</th>
                                    <th>Administrador?</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <form action="{{route('users.updateGroup', $user->id)}}" method="POST" id="formSelect">
                                                @csrf
                                                @method('POST')
                                                <select name="groups" id="groups" onchange="$('#formSelect').submit();">
                                                    <option value="">Selecione</option>
                                                    @foreach ($groups as $key => $group)
                                                        <option {{$group->id > '' ? 'selected' : ''  }}   value="{{$group->id}}">{{$group->name}}</option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </td>
                                        <td>{{$user->ativo > "" ? 'Sim' : 'Não'}}</td>
                                        <td style="width: 7%">
                                            <form action="{{route('users.active', $user->id)}}" method="POST" name="formAtivar">
                                                @csrf
                                                @method('PUT')
                                                <div class="ui toggle checkbox">
                                                    <input type="checkbox" onchange="this.form.submit()" name="ativar" id="ativar" @if ($user->ativo) {!! 'checked' !!} @else {!! '' !!} @endif>
                                                    <label>&nbsp;</label>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="">{{$user->adminGroup == 'S' ? 'Sim' : 'Não'}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="ui bottom attached tab segment" data-tab="second">
                <div class="fields">
                    <div class="sixteen wide field">
                        <table class="ui table very black compact celled selectable structured small" id="tableGroup">
                            <thead>
                                <tr>
                                   <th>#</th>
                                    <th>Grupo</th>
                                    <th>Admin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->idGroup}}</td>
                                        <td>{{$user->nameGroup}}</td>
                                        <td>{{$user->adminGroup}}</td>
                                       
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui styled accordion fluid">
            <div class="active title">
              <i class="dropdown icon"></i>
              Cadastro de Usuários
            </div>
            <div class="active content">
                <form class="ui form" action="" method="POST">
                    @csrf
                    @method('POST')
                    <div class="fields">
                        <div class="eight wide field">
                            <label for="">Nome</label>
                            <input type="text" name="user_name" id="user_name">
                        </div>
                        <div class="eight wide field">
                            <label for="">Email</label>
                            <input type="email" name="email" id="name">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="eight wide field">
                            <label for="">Senha</label>
                            <input type="password" name="password" id="password">
                        </div>
                        <div class="eight wide field">
                            <label>&nbsp;</label>
                            <div class="ui toggle checkbox">
                                <input type="checkbox"  name="ativo" id="ativo">
                                <label>Ativo?</label>
                            </div>
                        </div>
                    </div>
                    <div class="ui divider"></div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <button type="submit" class="ui button green small icon labeled right floated"><i class="icon check"></i> Salvar </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="title">
              <i class="dropdown icon"></i>
                Cadastro de Grupos
            </div>
            <div class="content">
                <form class="ui form" action="{{route('groups.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="fields">
                        <div class="eight wide field">
                            <label for="">Nome</label>
                            <input type="text" name="name" id="name">
                        </div>
                    </div>
                    <div class="ui divider"></div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <button type="submit" class="ui button green small icon labeled right floated"><i class="icon check"></i> Salvar </button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
    </div>
@endsection

@push('scripts')
   
    <script>
        // var table = $("#tableUsers").DataTable();
        $(document).ready(function(){
            $('.menu .item').tab();
            $('.ui.accordion').accordion();
        });
    </script>
@endpush