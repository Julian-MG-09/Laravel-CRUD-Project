@extends('layouts.app')
@section('title', 'Registrar Producto')
@section('content')

    <!-- <h1>Registro de producto</h1>

    <a href="{{ route('producto.index') }}">Gestionar Producto</a>


    <form action="{{ route('producto.store') }}" method="POST">

        @csrf
        @method('POST')

        <label for="nombre">Nombre del producto</label>
        <input type="text" id="nombre" name="nombre">

        <label for="marca">Marca del producto</label>
        <input type="text" id="marca" name="marca">

        <label for="precio">Precio del producto</label>
        <input type="text" id="precio" name="precio">

        <label for="descripcion">Descripcion del producto</label>
        <input type="text" id="descripcion" name="descripcion">

        <button type="submit">Registrar producto</button>

    </form> -->

    <div class="container mt-5">

        <div class="text-center">

            <h1 class="title mb-5">Registrar Producto</h1>

        </div>

        <div class="mb-3">

            <a href="{{ route('producto.index') }}" class="btn btn-dark"><i class="bi bi-arrow-left-circle"></i> Gestionar Productos</a>

        </div>
        {{-- Sección para las alertas --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @elseif(session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif

        <form action="{{ route('producto.store') }}" method="POST" class="p-4 border rounded formm shadow-sm">

            @csrf
            @method('POST')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del producto</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ej. Tablet">
            </div>

            <div class="mb-3">
                <label for="marca" class="form-label">Marca del producto</label>
                <input type="text" id="marca" name="marca" class="form-control" placeholder="Ej. Samsung">
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio del producto</label>
                <input type="number" id="precio" name="precio" class="form-control" placeholder="Ej. 450000">            
            </div>

            <div class="mb-3">
                <label for="descripcion">Descripcion del producto</label>
                <textarea id="descripcion" name="descripcion" rows="3" class="form-control" placeholder="Describa brevemente el producto"></textarea>
            </div>
            
            <div class="d-grid">
                <button type="submit" class="btn btn-dark btn-lg"><i class="bi bi-save"></i> Registrar producto</button>
            </div>


        </form>

    </div>
