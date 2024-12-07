@extends('layouts.app')
@section('title', 'Editar Producto')
@section('content')

    <!-- <h1>Actualizar de producto</h1>

    <a href="{{ route('producto.index') }}">Gestionar Producto</a>


    <form action="{{ route('producto.update', ['id' => $producto->id]) }}" method="POST">

        @csrf
        @method('PUT')

        <label for="nombre">Nombre del producto</label>
        <input type="text" id="nombre" name="nombre" value="{{ $producto->nombre }}">

        <label for="marca">Marca del producto</label>
        <input type="text" id="marca" name="marca" value="{{ $producto->marca }}">

        <label for="precio">Precio del producto</label>
        <input type="text" id="precio" name="precio" value="{{ $producto->precio }}">

        <label for="descripcion">Descripcion del producto</label>
        <input type="text" id="descripcion" name="descripcion" value="{{ $producto->descripcion }}">

        <button type="submit">Editar producto</button>

    </form> -->
    <div class="container mt-5">

        <div class="text-center">

            <h1 class="title mb-5">Actualizar Producto</h1>

        </div>

        <div class="mb-3">

            <a href="{{ route('producto.index') }}" class="btn btn-dark"><i class="bi bi-arrow-left-circle"></i> Gestionar Productos</a>

        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('producto.update', ['id' => $producto->id]) }}" method="POST" class="needs-validation p-4 border rounded shadow-sm formm" novalidate>

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del producto</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
                <div class="invalid-feedback">
                    Por favor ingresa el nombre del producto.
                </div>
            </div>

            <div class="mb-3">
                <label for="marca" class="form-label">Marca del producto</label>
                <input type="text" id="marca" name="marca" class="form-control" value="{{ $producto->marca }}" required>
                <div class="invalid-feedback">
                    Por favor ingresa la marca del producto.
                </div>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio del producto</label>
                <input type="text" id="precio" name="precio" class="form-control" value="{{ $producto->precio }}" required>
                <div class="invalid-feedback">
                    Por favor ingresa el precio del producto.
                </div>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción del producto</label>
                <textarea id="descripcion" name="descripcion" class="form-control" required>{{ $producto->descripcion }}</textarea>
                <div class="invalid-feedback">
                    Por favor ingresa la descripción del producto.
                </div>
            </div>

            <button type="submit" class="btn btn-dark">Editar Producto</button>

        </form>

    </div>
