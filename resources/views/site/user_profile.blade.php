@extends('layouts.app')

@section('content')
    <div class="ui container">
        <div style="text-align: center;">
            <h3>Olá, <span style="color:rgb(44, 145, 204);">{{Auth::user()->name}}</span> , aqui você pode alterar seus dados de cadastro.</h3>
        </div>
        <form name="formProfile" id="formProfile" onsubmit="editProfile(event,{{Auth::user()->id}})" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="ui segment secondary form">
                <div class="ui header">Foto</div>
                <div class="fields">
                    
                    <div class="sixteen wide field">
                        <div class="ui action input">
                          
                            <input type="file" name="profile_photo" id="profile_photo" value="">
                            <button type="button" class="ui teal right labeled icon button">
                              <i class="photo icon"></i>
                               Foto
                            </button>
                          </div>
                        
                        
                    </div>
                </div>
                <div class="ui divider"></div>
                <div class="ui header">Seus Dados</div>
                <div class="fields">
                    <div class="sixteen wide field">
                        <label for="">Nome</label>
                        <input type="text" name="name_user" id="name_user" value="{{$name}}">
                    </div>
                </div>
                <div class="fields">
                    <div class="sixteen wide field">
                        <label for="">Email</label>
                        <input type="text" name="email_user" id="email_user" value="{{$email}}">
                    </div>
                </div>
                <div class="fields">
                    <div class="sixteen wide field">
                        <label for="">Alterar Senha</label>
                        <input type="password" name="password_user" id="password_user">
                    </div>
                </div>
                <div class="fields">
                    <div class="sixteen wide field">
                        <button type="submit" id="buttonSaveProfile" class="ui button green icon labeled tiny right floated"><i class="icon check"></i>Salvar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
    <script>
        function editProfile(event,id)
        {
            event.preventDefault();
            let _token = `{{ csrf_token() }}`;
                let formSerialize = $("#formProfile").serializeArray();
                let url = '{{route("user.profile.edit", ":id")}}';
                    url = url.replace(":id", id);
                $("#buttonSaveProfile").addClass('loading').attr('disabled','disabled');
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
                            setTimeout(()=> {
                                $("#buttonSaveProfile").removeClass('loading').removeAttr('disabled','disabled');
                                alertify.success(message);
                            },1000)
                            $("#password_user").val('');
                        }
                       
                        console.log(data);
                    },
                    error: (data) => {
                    
                        
                    }
                });
        }
    </script>
@endpush