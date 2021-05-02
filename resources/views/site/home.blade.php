@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="ui segment form">
        <div style="text-align:center">
            <div class="ui header"> <i class="icon users" style="font-size:20px;margin-bottom:7px;"></i> Publicações </div>
        </div>
        <div class="ui divider"></div>
        <div class="ui card" style="width: 100%">
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
              <a>
                <i class="user icon"></i>
                22 Friends
              </a>
            </div>
          </div>           
    </div>  
</div>
@endsection