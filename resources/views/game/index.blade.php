@extends('master')

@section('content')
    <div class="container my-3">
        <h1 class="text-center display-4">Listagem de Jogos</h1>
        <a href="{{url('/jogo/cadastro')}}" class="btn btn-primary">Cadastrar Novo Jogo</span> </a>
            <table class="table table-striped table-hover my-2">
                <thead class='bg-primary text-white'>
                    <td>Título</td>
                    <td>Abreviatura</td>
                    <td>Descrição</td>
                    <td>Ações</td>
                </thead>
                @foreach ($games as $game)
            <tr>
                <td width="17%">{{$game->title}}</td>
                <td width="5%">{{$game->abbreviation}}</td>
                <td width="47%">{{$game->description}}</td>
            <td>
                <a href='{{url('/jogo/' . $game->slug)}}' class="btn btn-primary" >Ver mais</a> 
                <a href='{{url('/jogo/' . $game->slug . '/editar/')}}' class="btn btn-warning">Editar</a> 
                <button onclick="removeGame('{{$game->slug}}')" class="btn btn-danger">Remover</a></td>
            </tr>    
        @endforeach
            </table>
        
            

    </div>

    <script>
        function removeGame(slug){
            console.log(slug);
            $.ajax({
                type:'DELETE',
                url: '{{url('/jogo/')}}/' + slug,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    window.location.reload();
                }
             });
        
        }
        
    </script>

@endsection




