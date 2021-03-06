@extends('layouts.app')

@section('content')
    <div class="ui container">
        <div class="ui segment form">
            <div class="ui header"> <i class="icon user"></i> Página Amigos</div>
            <div class="ui divider"></div>
            <div class="ui top attached tabular menu">
                <a class="active item" data-tab="first">Usuários</a>
                <a class="item" data-tab="second">Amigos</a>
            </div>
            <div class="ui bottom attached active tab segment" data-tab="first">
                <br>

                <div class="ui segment secondary form">
                    <div class="ui fields">
                        <div class="sixteen wide field">
                            <div>
                                <img class="ui middle aligned circular tiny image" src="{{asset('img/juci6.jpg')}}" >
                                <span>Marcos Vinicius</span> 
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="ui segment secondary form">
                    <div class="ui fields">
                        <div class="sixteen wide field">
                           <div>
                                <img class="ui middle aligned circular tiny image" src="{{asset('img/anime.jpeg')}}" >
                                <span>Juciele</span>
                            </div>
                        </div> 
                    </div>
                </div>
              
                <div class="ui fields">
                    <div class="sixteen wide field">
                        <div>
                            <img class="ui middle aligned circular tiny image" src="{{asset('img/anime.jpeg')}}" >
                            <span>Juciele</span>
                        </div>
                    </div> 
                </div>
                <div class="ui fields">
                    <div class="sixteen wide field">
                        <div>
                            <img class="ui middle aligned circular tiny image" src="{{asset('img/anime.jpeg')}}" >
                            <span>Juciele</span>
                        </div>
                    </div> 
                </div>
                <div class="ui fields">
                    <div class="sixteen wide field">
                        <div>
                            <img class="ui middle aligned circular tiny image" src="{{asset('img/anime.jpeg')}}" >
                            <span>Juciele</span>
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