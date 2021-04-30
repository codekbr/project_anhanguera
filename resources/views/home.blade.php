@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="ui segment form">
        <div style="text-align:center">
            <div class="ui header"> <i class="icon users" style="font-size:20px;margin-bottom:7px;"></i> Publicações </div>
        </div>
        <div class="ui divider"></div>
        @for($j =0; $j < 3; $j ++)
        <div class="fields">
            @for($i =0 ; $i < 4 ; $i++)
                <div class="four wide field">
                    <div class="ui card">
                        <div class="image">
                            <img src="https://amordepapeis.com.br/wp-content/uploads/2019/08/fotos-tumblr.jpg">
                        </div>
                        <div class="content">
                        <a class="header">Kristy</a>
                        <div class="meta">
                            <span class="date">Joined in 2013</span>
                        </div>
                        <div class="description">
                            Kristy is an art director living in New York.
                        </div>
                        </div>
                        <div class="extra content">
                        <button class="ui button">
                        <a>
                            <i class="heart outline icon"></i>
                            Curtidas
                        </a>
                       </button>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        @endfor
      
                   
    </div>  
</div>
@endsection
