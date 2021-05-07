@extends('layouts.app')

@section('content')
    <div class="ui container">
        <div class="ui segment form">
            <div class="ui header"> <i class="icon user"></i> Página Amigos</div>
            <div class="ui icon input">
                <input type="text" placeholder="Search...">
                <i class="inverted circular search link icon"></i>
            </div>
            <div class="ui divider"></div>
            <div class="ui top attached tabular menu">
                <a class="active item" data-tab="first">Usuários</a>
                <a class="item" data-tab="second">Amigos</a>
            </div>
            <div class="ui bottom attached active tab segment" data-tab="first">
                <br>
                <div class="ui segment">
                    <div class="ui two column very relaxed grid">
                      <div class="column">
                        <div class="ui segment secondary form">
                            <div class="ui fields">
                                <div class="sixteen wide field">
                                    <div>
                                        <img class="ui middle aligned circular tiny image" src="{{asset('img/juci6.jpg')}}" >
                                        <div class="ui compact menu">
                                            <a class="item">
                                              <i class="icon user"></i> Amigos
                                              <div class="floating ui red label">22</div>
                                            </a>
                                            <a class="item">
                                              <i class="icon users"></i> Grupos
                                              <div class="floating ui teal label">2</div>
                                            </a>
                                            <a class="item">
                                                <i class="user plus icon"></i> Adicionar
                                            </a>
                                          </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                      </div>
                      <div class="column">
                        <div class="ui segment secondary form">
                            <div class="ui fields">
                                <div class="sixteen wide field">
                                    <img class="ui middle aligned circular tiny image" src="{{asset('img/juci1.jpg')}}" >
                                    <div class="ui compact menu">
                                        <a class="item">
                                          <i class="icon user"></i> Amigos
                                          <div class="floating ui red label">22</div>
                                        </a>
                                        <a class="item">
                                          <i class="icon users"></i> Grupos
                                          <div class="floating ui teal label">2</div>
                                        </a>
                                        <a class="item">
                                          <i class="user plus icon"></i> Adicionar
                                        </a>
                                      </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                      </div>
                    </div>
                  </div>
            <div class="ui bottom attached tab segment" data-tab="second">
                Amigos 
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
       $(document).ready(function(){
        $('.menu .item').tab();
       });
    </script>
@endpush