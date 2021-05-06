@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="ui segment form">
        <div style="text-align:center">
            <div class="ui header"> <i class="icon users" style="font-size:20px;margin-bottom:7px;"></i> Publicações </div>
        </div>
        <div class="fields">
            <div class="sixteen wide field">
                <p>
                    <button type="button" onclick="openModalPublication('new')" class="ui button mini icon labeled primary"> <i class="icon plus"></i> Nova Publicação </button>
                </p>
            </div>
           
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
    <div class="ui modal small" id="modalPublications">
        <i class="close icon"></i>
        <div class="header">Olá, <div style='color:rgb(50, 144, 221);'>{{Auth::user()->name }}</div> seja livre para publicar algo interessante com seus amigos. <i class="icon happy"></i></div>
        <div class="ui content">
            @include('site._partials.message',
                [
                    'success' => 'success_message',
                    'error' => 'error_message'
                ]
            )
             <div class="ui divider"></div>
            <form class="ui form content" id="formPublications" name="formPublications">
            @csrf
                <div class="fields">
                    <div class="sixteen wide field">
                        <label for="">Título</label>
                        <input type="text" class="input-action" name="name_group" id="name_group">
                    </div>
                </div>
                <div class="fields">
                    <div class="sixteen wide field">
                        <label for="">Descrição</label>
                        <input type="text" class="input-action" name="name_group" id="name_group">
                    </div>
                </div>
                <div class="fields">
                    <div class="sixteen wide field">
                        <label for="">Comentário</label>
                       <textarea name="comments" id="comments" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="fields">
                    <div class="sixteen wide field">
                       <label for="">Adicionar Foto</label>
                        <input type="file" name="photo[]" id="">
                    </div>
                </div>
                <div class="fields">
                    <div class="sixteen wide field">
                       <label for="">Modo</label>
                       <select name="visibilities_pub" id="visibilities_pub">
                           <option value="">Selecione</option>
                           <option value="">Público</option>
                           <option value="">Privado</option>
                           <option value="">Somente seus Amigos</option>
                       </select>
                    </div>
                </div>
                <div class="fields">
                    <div class="sixteen wide field">
                        <button type="submit" id="buttonSavePublications" class="ui button green icon labeled tiny right floated"><i class="icon check"></i>Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div> 
</div>
@endsection
@push('scripts')
    <script>
        function openModalPublication(acao)
        {
            $("#modalPublications").modal({
                onShow: () =>{
                    if (acao == 'new'){
                        
                    }else{
                       
                    }
                   
                },
                onHidden: () =>{
                    $("#formPublications")[0].reset();
                  
                },
                closable:false
            }).modal('show');
        }
    </script>
@endpush
