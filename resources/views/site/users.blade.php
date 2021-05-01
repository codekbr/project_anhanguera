@extends('layouts.app')

@section('content')
    <div class="ui container">
        <div class="ui segment form">
            <div class="ui header"> <i class="icon globe"></i> Página dos Administradores</div>
            <div class="ui divider"></div>
            <div class="ui top attached tabular menu">
                <a class="active item" data-tab="first">Grupos de Usuários</a>
               
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
                                    <th>Ativo?</th>
                                    <th>Ativar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
@endsection

@push('scripts')
   
    <script>
        // var table = $("#tableUsers").DataTable();
        $(document).ready(function(){
            $('.menu .item').tab();
        });
    </script>
@endpush