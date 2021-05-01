@extends('layouts.app')

@section('content')
    <div class="ui container">
       <table class="ui table very compact celled selectable structured small green">
           <thead>
               <tr>
                   <th>#ID</th>
                   <th>Nome</th>
                   <th>Admin?</th>
               </tr>
           </thead>
           <tbody>
               @foreach ($groups as $group)
                   <tr>
                       <td>{{$group->id}}</td>
                       <td>{{$group->name}}</td>
                       <td>{{$group->admin}}</td>
                   </tr>
               @endforeach
           </tbody>
       </table>
        
      
    </div>
@endsection
@push('scripts')
    <script>
     
    </script>
@endpush