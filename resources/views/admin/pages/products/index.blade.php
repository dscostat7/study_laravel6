@extends('admin.layouts.app')
@section('title', 'Home')
    
@section('content')
<br>
    <h1>Exibindo os Produtos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary" >Cadastrar Produto</a>
    <hr>
    <form action="{{ route('products.search') }}" method="POST" class="form form-inline">
        @csrf
        <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
        <button type="submit" class="btn btn-info">Pesquisar</button>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th width="300">Imagem</th>
                <th>Nome</th>
                <th>Preço</th>
                <th width="100">Ações</th>
            </tr>
        </thead>
        @foreach ($products as $product)
            <tr>
                <td>@if ($product->image)
                    <img src="{{ url("storage/{$product->image}") }}" alt="{{$product->name}}" style="max-width:100px;">
                @endif
            </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}">Detalhes</a>
                    <a href="{{ route('products.edit', $product->id) }}">Editar</a>
                </td>
            </tr>
        @endforeach
    </table>

    @if (isset($filters))
        {!! $products->appends($filters)->links() !!}
    @else
    {!! $products->links() !!}
    @endif

    



@endsection
@push('scripts')
    <script>
        document.body.style.background = 'grey'
    </script>
@endpush