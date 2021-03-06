@extends('admin.layouts.app')


@section('title', "Editar Produto { $product->name }")

@section('content')
    <h1>Editar Produto {{ $product->name }}</h1>

    <form action="{{ route('products.update', $product->id) }}"  method="post" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.pages.products._partials.form')
    </form>
@endsection

@push('scripts')
    <script>
        document.body.style.background = "#836FFF"
    </script>
    <h3><a href="{{ route('products.index') }}"> << Voltar</a></h3>
@endpush
