@extends('admin.layouts.app')
@section('title', "Detalhes do Produto {$product->name}")
    
@section('content')
    

    <h1>Produto {{ $product->name }}</h1>
    
    

    <ul>
        <li><strong>Nome: </strong>{{ $product->name }}</li>
        <li><strong>Preço: </strong>{{ $product->price }}</li>
        <li><strong>Descição: </strong>{{ $product->description }}</li>

    </ul>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
    
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir</button>
        @method('UPDATE')
        <button type="submit" class="btn btn-primary">Editar</button>


    </form>

<br><br>
    <h3><a href="{{ route('products.index') }}"> << Voltar</a></h3>
@endsection