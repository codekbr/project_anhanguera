@extends('layouts.app')

@section('content')
    <div class="ui container">
        <div class="ui segment form">
            <div class="ui header"> <i class="icon globe"></i> Página dos Administradores</div>
            <div class="ui divider"></div>
            <div class="ui top attached tabular menu">
                <a class="active item" data-tab="one">Usuários</a>
                <a class="item" data-tab="two">Grupos</a>
                <a class="item" data-tab="three">Visiblidades</a>

               
            </div>
            <div class="ui bottom attached active tab segment" data-tab="one">
                <div id="refreshFieldUser">
                    <div class="fields">
                        <div class="sixteen wide field">
                            <table class="ui table very black compact celled selectable structured small" id="tableUsers">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Nome</th>
                                        <th>E-Mail</th>
                                        <th>Ativo?</th>
                                        <th>Grupo</th>
                                        <th>Editar</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            
                                            <td class="collapsing">
                                                
                                               
                                                  
                                                <div style="text-align:center;">
                                                    {!! $user->ativo > "" ? '<i class="icon check green"></i>' : '<i class="icon close red"></i>' !!} 
                                                </div>
                                              
                                                          
                                                
                                            </td>
                                            <td>{{$user->group_id}} - {{$user->group->name ?? ''}}</td>
                                            <td class="collapsing">
                                                <button type="button" onclick="openModalUser({{$user->id}},'{{$user->group->id ?? 0}}');" class="ui button icon labeled teal tiny">
                                                    Editar<i class="icon pencil"></i>
                                                </button>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui bottom attached tab segment" data-tab="two">
                <div class="fields">
                    <div class="sixteen wide field">
                        <p>
                            <button type="button" onclick="openModal('new')" class="ui button mini icon labeled primary"> <i class="icon plus"></i> Novo </button>
                        </p>
                    </div>
                   
                </div>
                <div id="refreshField">
                    <div class="fields">
                        <div class="sixteen wide field">
                            <table class="ui table very black compact celled selectable structured small" id="tableGroup">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                        <th>Grupo</th>
                                        <th>Admin</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($groups as $group)
                                        
                                        <tr>
                                            <td class="collapsing">{{$group->id}}</td>
                                            <td>{{$group->name}}</td>
                                            <td class="collasping">{{$group->admin}}</td>
                                            <td class="center aligned collapsing">
                                                <button @if($group->name == 'Usuário') {{ 'disabled' }} @endif  type="button" onclick="openModal('edit',{{$group->id}},'{{$group->name ?? ''}}')" class="ui button icon labeled teal tiny">
                                                    Editar <i class="icon pencil"></i>
                                                </button>
                                            
                                            </td>
                                            <td class="center aligned collapsing">
                                                <button @if($group->name == 'Usuário') {{ 'disabled' }} @endif type="button" onclick="excluirGroup({{$group->id}},`<span style='color:red;'>{{$group->name}}</span>`);" class="ui button icon labeled red tiny">
                                                    Excluir  <i class="icon close"></i>
                                                </button>
                                            
                                            </td>
                                        
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui bottom attached tab segment" data-tab="three">
                <div class="fields">
                    <div class="sixteen wide field">
                        <p>
                            <button type="button" onclick="openModalVisibilities('create')" class="ui button mini icon labeled primary"> <i class="icon plus"></i> Novo </button>
                        </p>
                    </div>
                </div>
                <div id="refreshFieldVisibility">
                    <div class="fields">
                        <div class="sixteen wide field">
                            <table class="ui table very compact celled selectable structured small orange">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Descrição</th>
                                        <th>Tipo</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($visibilities as $visibility)
                                        <tr>
                                            <td>{{$visibility->id}}</td>
                                            <td>{{$visibility->description}}</td>
                                            <td>{{$visibility->type}}</td>
                                            <td class="collapsing">
                                                <button type="button" onclick="openModalVisibilities('edit',{{$visibility->id}})" class="ui button icon labeled teal tiny">
                                                    Editar <i class="icon pencil"></i>
                                                </button>
                                            </td>
                                            <td class="center aligned collapsing">
                                                <button type="button" onclick="deleteVisibility({{$visibility->id}},`<span style='color:red;'>{{$visibility->type}}</span>`);" class="ui button icon labeled red tiny">
                                                    Excluir  <i class="icon close"></i>
                                                </button>
                                            
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
        <div class="ui modal small" id="modalGroup">
            <i class="close icon"></i>
            <div class="header"><span class="textHeader"></span></div>
            <div class="ui content">
                @include('site._partials.message',
                    [
                        'success' => 'success_message',
                        'error' => 'error_message'
                    ]
                )
                 <div class="ui divider"></div>
                <form class="ui form content" id="formGroup" name="formGroup">
                @csrf
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label for="">Nome</label>
                            <input type="text" class="input-action" name="name_group" id="name_group">
                        </div>
                    </div>
            
                    <div class="fields">
                        <div class="sixteen wide field">
                            <button type="submit" id="buttonModalSave" class="ui button green icon labeled tiny right floated"><i class="icon check"></i>Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="ui modal small" id="modalUser">
            <i class="close icon"></i>
            <div class="header">Editar</div>
            <div class="ui content">
                @include('site._partials.message',
                    [
                        'success' => 'success_message',
                        'error' => 'error_message'
                    ]
                )
                 <div class="ui divider"></div>
                
                <form class="ui form content" id="formUser" name="formUser">
                    @csrf
                    
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label for="">Nome</label>
                            <input type="text" class="input-action" name="name_user" id="name_user">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label for="">Email</label>
                            <input type="text" class="input-action" name="email_user" id="email_user">
                        </div>
                    </div>
                    <div id="refreshSelect">
                        <div class="fields">
                            <div class="sixteen wide field">
                                <label for="">Grupo</label>
                                <select name="grupo_user" id="grupo_user">
                                    <option value="">Selecione</option>
                                    @foreach ($groups as $group)
                                        <option class="group_{{$group->id}}" value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label for="">&nbsp;</label>
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="ativo_user" id="ativo_user">
                                <label for="ativo_user">Ativo?</label>
                              </div>
                           
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <button type="submit" id="buttonModalUser" class="ui button green icon labeled tiny right floated"><i class="icon check"></i>Salvar</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        <div class="ui modal small" id="modalVisibilities">
            <i class="close icon"></i>
            <div class="header">Novo</div>
            <div class="ui content">
                @include('site._partials.message',
                    [
                        'success' => 'success_message',
                        'error' => 'error_message'
                    ]
                )
                 <div class="ui divider"></div>
                
                <form class="ui form content" id="formVisibilities" name="formVisibilities">
                    @csrf
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label for="">Descrição</label>
                            <textarea name="description" id="description" cols="30" rows="10" placeholder="Max caracteres: 255"></textarea>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label for="">Tipo</label>
                            <input type="text" name="type" id="type" placeholder="Tipo">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <button type="submit" id="buttonModalVisibilities" class="ui button green icon labeled tiny right floated"><i class="icon check"></i>Salvar</button>
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
            $('.message .close')
                .on('click', function() {
                    $(this)
                    .closest('.message')
                    .transition('fade')
                    ;
            });
        });

        function openModalVisibilities(acao,id)
        {
            $(".ui.success.message").addClass("hidden");
            $(".ui.error.message").addClass("hidden");
            $("#modalVisibilities").modal({
                onShow: () =>{
                    if (acao == 'create'){
                        $("#formVisibilities").attr('onsubmit',`saveVisibilitie(event,'create')`);
                    }else{
                        $("#formVisibilities").attr('onsubmit',`saveVisibilitie(event,'edit',${id})`);
                        getVisibility(id);
                    }
                   
                },
                onHidden: () =>{
                    $("#formVisibilities")[0].reset();
                  
                },
                closable:false
            }).modal('show');
        }

        function getVisibility(id)
        {
            let _token = `{{ csrf_token() }}`;
            let url = '{{route("visibility.find", ":id")}}';
                url = url.replace(":id", id);
            $.ajax({
                type: "GET",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': _token
                },
                data: {
                    id: id
                },
                dataType: "json",
                success: (data) => {
                    console.log(data);
                    if (data){
                        $("#description").val(data.description);
                        $("#type").val(data.type);
                    
                        // $("#refreshSelect").load(location.href + " #refreshSelect");
                        // setTimeout(()=>{
                        //     $(`.group_${group}`).attr('selected','selected');
                        // }, 100)
                    }
                   
                },
                error: (data) => {
                
                    
                }
            });
        }

        function deleteVisibility(id,type)
        {
            alertify.confirm("Excluir",`Deseja Realmente Excluir essa Visilibilidade?: ${type}?`,
            function(){
                let _token = `{{ csrf_token() }}`;
                let formSerialize = $("#formVisibilities").serializeArray();
                let url = '{{route("visibility.delete", ":id")}}';
                    url = url.replace(":id", id);
                $.ajax({
                    type: "DELETE",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': _token
                    },
                    data: serialize(formSerialize),
                    dataType: "json",
                    success: (data) => {
                        if (data){
                            let message = data.message;
                            if (message=='true'){
                                alertify.error('Impossível Deletar esse Grupo existem usuários vinculados a ele.');
                            }else{
                                $(".ui.success.message").removeClass("hidden");
                                $(".ui.error.message").addClass("hidden");
                                $("ul#success_message").append(`<li>${message}</li>`);
                                $("#buttonModalVisibilities").removeClass('loading').removeAttr('disabled','disabled');
                                $("#refreshFieldVisibility").load(location.href + " #refreshFieldVisibility");
                                alertify.success(message);
                            }
                        }
                       
                        console.log(data);
                    },
                    error: (data) => {
                    
                        
                    }
                });
            },
            function(){
                alertify.error('Cancelado');
            });
           
        }


        function saveVisibilitie(event,acao,id)
        {
            event.preventDefault();
            let _token = `{{ csrf_token() }}`;
            let formSerialize = $("#formVisibilities").serializeArray();
           
            $("ul#success_message").html("");
            $("ul#error_message").html("");
            $("#buttonModalVisibilities").addClass('loading').attr('disabled','disabled');
            if (acao == 'create'){
                let url = '{{route("visibility.create")}}';
                $.ajax({
                    type: "POST",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': _token
                    },
                    data: serialize(formSerialize),
                    dataType: "json",
                    success: (data) => {
                        if (data){
                            let message = data.message;
                            $(".ui.success.message").removeClass("hidden");
                            $(".ui.error.message").addClass("hidden");
                            $("ul#success_message").append(`<li>${message}</li>`);
                            $("#refreshFieldVisibility").load(location.href + " #refreshFieldVisibility");
                            $("#buttonModalVisibilities").removeClass('loading').removeAttr('disabled','disabled');
                        }
                       
                        console.log(data);
                    },
                    error: (data) => {
                    
                        
                    }
                });
            }else{
                let url = '{{route("visibility.edit", ":id")}}';
                url = url.replace(":id", id);
                $.ajax({
                    type: "PUT",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': _token
                    },
                    data: serialize(formSerialize),
                    dataType: "json",
                    success: (data) => {
                        if (data){
                            let message = data.message;
                            $(".ui.success.message").removeClass("hidden");
                            $(".ui.error.message").addClass("hidden");
                            $("ul#success_message").append(`<li>${message}</li>`);
                            $("#buttonModalVisibilities").removeClass('loading').removeAttr('disabled','disabled');
                            $("#refreshFieldVisibility").load(location.href + " #refreshFieldVisibility");
                        }
                       
                        console.log(data);
                    },
                    error: (data) => {
                    
                        
                    }
                });
            }
        }

        function openModalUser(id,group)
        {
            $("#modalUser").modal({
                onShow: () =>{
                    getUser(id,group);
                    $("#formUser").attr('onsubmit',`editUser(event,${id})`);
                   
                },
                onHidden: () =>{
                    $("#formUser")[0].reset();
                  
                },
                closable:false
            }).modal('show');
        }

        
        function getUser(id,group)
        {   
            let _token = `{{ csrf_token() }}`;
            let url = '{{route("users.find", ":id")}}';
                url = url.replace(":id", id);
            $.ajax({
                type: "GET",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': _token
                },
                data: {
                    id: id
                },
                dataType: "json",
                success: (data) => {
                    console.log(data);
                    if (data){
                        $("#name_user").val(data.name);
                        $("#email_user").val(data.email);
                        data.ativo == 'S' ? $("#ativo_user").attr('checked','checked').attr('value','S') : $("#ativo_user").removeAttr('checked','checked').removeAttr('value','S');
                        $("#refreshSelect").load(location.href + " #refreshSelect");
                        setTimeout(()=>{
                            $(`.group_${group}`).attr('selected','selected');
                        }, 100)
                    }
                   
                },
                error: (data) => {
                
                    
                }
            });
        }

        function editUser(event,id)
        {
            event.preventDefault();
            let _token = `{{ csrf_token() }}`;
            let formSerialize = $("#formUser").serializeArray();
            let url = '{{route("users.edit", ":id")}}';
                url = url.replace(":id", id);
            $("ul#error_message").html("");
            $("ul#success_message").html("");
            $("#buttonModalUser").addClass('loading').attr('disabled','disabled');
            $.ajax({
                type: "PUT",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': _token
                },
                data: serialize(formSerialize),
                dataType: "json",
                success: (data) => {
                    console.log(data);
                    if (data){
                        let message = data.message;
                        $(".ui.success.message").removeClass("hidden");
                        $(".ui.error.message").addClass("hidden");
                        $("ul#success_message").append(`<li>${message}</li>`);
                        $("#buttonModalUser").removeClass('loading').removeAttr('disabled','disabled');
                        $("#refreshFieldUser").load(location.href + " #refreshFieldUser");
                    }
                   
                },
                error: (data) => {
                
                    
                }
            });
        }

        function openModal(type,id,name){
            $("#modalGroup").modal({
                onShow: () =>{
                    if (type == 'edit'){
                        $(".textHeader").html('Editando o grupo: <span style="color:red;">' + name + '</span>');
                        $("#formGroup").attr('onsubmit',`action_ajax(event,'edit',${id})`);
                        $("#name_group").val(name);
                       
                    }else{
                        $(".textHeader").text('Novo');
                        $("#formGroup").attr(`onsubmit`,`action_ajax(event,'new',0)`);
                    }
                },
                onHidden: () => {
                    $("#formGroup")[0].reset();
                    $(".ui.success.message").addClass("hidden");
                    $(".ui.error.message").addClass("hidden");
                },
                closable:false
            }).modal('show');
        }

        function action_ajax(event,acao,id)
        {   
            event.preventDefault();
            
            let _token = `{{ csrf_token() }}`;
            let formSerialize = $("#formGroup").serializeArray();
            $("#error_message").html("");
            $("#success_message").html("");
            $("#buttonModalSave").addClass('loading').attr('disabled','disabled');
            if (acao == 'edit'){
                let url = '{{route("groups.edit", ":id")}}';
                url = url.replace(":id", id);
            
                $.ajax({
                    type: "PUT",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': _token
                    },
                    data: serialize(formSerialize),
                    dataType: "json",
                    success: (data) => {
                        if (data){
                            let message = data.message;
                            $(".ui.success.message").removeClass("hidden");
                            $(".ui.error.message").addClass("hidden");
                            $("ul#success_message").append(`<li>${message}</li>`);
                            $("#buttonModalSave").removeClass('loading').removeAttr('disabled','disabled');
                            $("#refreshField").load(location.href + " #refreshField");
                        }else{

                        }
                    },
                    error: (data) => {
                        if (data.responseJSON.errors){
                            let obj =   Object.keys(data.responseJSON.errors);
                            obj.forEach((index)=> {
                                let errors =  data.responseJSON.errors[index].join();
                                $(".ui.success.message").addClass("hidden");
                                $(".ui.error.message").removeClass("hidden");
                                $("ul#error_message").append(`<li>${errors}</li>`);
                                $("#buttonModalSave").removeClass('loading').removeAttr('disabled','disabled');
                            });
                        }else{
                            $(".ui.success.message").addClass("hidden");
                            $(".ui.error.message").removeClass("hidden");
                            $("ul#error_message").append(`<li>${data.responseJSON.message}</li>`);
                            $("#buttonModalSave").removeClass('loading').removeAttr('disabled','disabled');
                        }
                    }
                });
            }else{
               
                url = `{{route('groups.create')}}`;
                
                console.log(_token);
                $.ajax({
                    type: "POST",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': _token
                    },
                    data: serialize(formSerialize),
                    dataType: "json",
                    success: (data) => {
                        if (data)
                        {
                            let message = data.message;
                            $(".ui.success.message").removeClass("hidden");
                            $(".ui.error.message").addClass("hidden");
                            $("ul#success_message").append(`<li>${message}</li>`);
                            $("#buttonModalSave").removeClass('loading').removeAttr('disabled','disabled');
                            $("#refreshField").load(location.href + " #refreshField");
                            
                        }
                    },
                    error: (data) => {
                    
                        if (data.responseJSON.errors){
                            let obj =   Object.keys(data.responseJSON.errors);
                            obj.forEach((index)=> {
                                let errors =  data.responseJSON.errors[index].join();
                                $(".ui.success.message").addClass("hidden");
                                $(".ui.error.message").removeClass("hidden");
                                $("ul#error_message").append(`<li>${errors}</li>`);
                                $("#buttonModalSave").removeClass('loading').removeAttr('disabled','disabled');
                            });
                        }else{
                            $(".ui.success.message").addClass("hidden");
                            $(".ui.error.message").removeClass("hidden");
                            $("ul#error_message").append(`<li>${data.responseJSON.message}</li>`);
                            $("#buttonModalSave").removeClass('loading').removeAttr('disabled','disabled');
                        }
                        
                    }
                });
            }
        }
        
        function excluirGroup(id,name)
        {
            alertify.confirm("Excluir",`Deseja Realmente Excluir o Grupo: ${name}?`,
            function(){
                let _token = `{{ csrf_token() }}`;
                let url = '{{route("groups.delete", ":id")}}';
                url = url.replace(":id", id);
                $.ajax({
                    type: "DELETE",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': _token
                    },
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: (data) => {
                        if (data)
                        {
                            let message = data.message;
                            if (message=='true'){
                                alertify.error('Impossível Deletar esse Grupo existem usuários vinculados a ele.');
                            }else if(message == 'padrão'){
                                console.log('entrei');
                                alertify.error('Impossível Deletar o Grupo Padrão');
                            }else{
                                alertify.success(message);
                            }
                          
                            
                            $("#refreshField").load(location.href + " #refreshField");
                            
                        }
                    },
                    error: (data) => {
                    
                        if (data.responseJSON.errors){
                            let obj =   Object.keys(data.responseJSON.errors);
                            obj.forEach((index)=> {
                                let errors =  data.responseJSON.errors[index].join();
                                $(".ui.success.message").addClass("hidden");
                                $(".ui.error.message").removeClass("hidden");
                                $("ul#error_message").append(`<li>${errors}</li>`);
                                $("#buttonModalSave").removeClass('loading').removeAttr('disabled','disabled');
                            });
                        }else{
                            $(".ui.success.message").addClass("hidden");
                            $(".ui.error.message").removeClass("hidden");
                            $("ul#error_message").append(`<li>${data.responseJSON.message}</li>`);
                            $("#buttonModalSave").removeClass('loading').removeAttr('disabled','disabled');
                        }
                        
                    }
                });
             
            },
            function(){
                alertify.error('Cancelado');
            });
        }

        
    </script>
@endpush