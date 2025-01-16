@extends('layout.master')
@section('content')
    <div class="container">
        <div class="table-container" style="padding: 60px; border: 2px solid #000; background-color: #f8f9fa;">
            <form action="" >
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>email</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pessoas as $pessoa)
                            <tr>
                                <td class="truncate">{{ $pessoa->name }}</td>
                                <td>{{ $pessoa->email }}</td>
                                <td>
                                    <a href="{{ route('cadastro.editar', ['id' => $pessoa->id]) }}">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('cadastro.delete', ['id' => $pessoa->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar?')">
                                        @csrf
                                        @method('DELETE') <!-- Isso simula uma requisição DELETE -->
                                        <button type="submit" style="border: none; background: none; color: red;">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>   
                </table>
            </form>
        </div>
    </div>
@endsection
