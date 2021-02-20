@extends('admin.layouts.app')

@section('title', 'Cadastrar')

@section('content')
    <h1>Cadastrar Novo Produto</h1>

    <form action="{{ route('products.store') }}"  method="post" enctype="multipart/form-data" class="form">
        @include('admin.pages.products._partials.form')
    </form>
@endsection

@push('scripts')
    <script>
        document.body.style.background = "#836FFF"
    </script>
@endpush
