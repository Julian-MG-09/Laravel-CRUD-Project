@extends('layouts.app')

@section('titulo', 'Gestionar Poductos')

@section('content')

{{-- LISTADO DE PRODUCTOS
{{ $producto }}
@foreach ($producto as $producto)

<p>{{ $producto->nombre }}</p>
<p>{{ $producto->marca }}</p>
<p>{{ $producto->precio }}</p>
<p>{{ $producto->descripcion }}</p>

@endforeach --}}

<!-- <h1>Gestionar Producto</h1>

    <a href="{{ route('producto.create') }}">Registrar Producto</a>

    <table>
        <thead>

            <th>N°</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Acciones</th>

        </thead>
        <tbody>

            @foreach ($productos as $p)
                <tr>

                    <td>{{ /*$p->id*/ $loop->iteration }}</td>
                    <td>{{ $p->nombre }}</td>
                    <td>{{ $p->marca }}</td>
                    <td>{{ $p->precio }}</td>
                    <td>{{ $p->descripcion }}</td>

                    <td>

                        <a href="{{ route('producto.edit', ['id' => $p->id]) }}">Editar</a>
                        |
                        <form action="{{ route('producto.destroy', ['id' => $p->id]) }}" method="POST"
                            onsubmit="return confirm('seguro');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>

                        </form>

                    </td>

                </tr>
            @endforeach

        </tbody>

    </table> -->

    <div class="container mt-5">

        <div class="text-center">

            <h1 class="title mb-5">Gestion De Productos</h1>

        </div>

        @if(session('success'))
            <div class="alert alert-dark">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-dark">
                {{ session('error') }}
            </div>
        @elseif(session('info'))
            <div class="alert alert-dark">
                {{ session('info') }}
            </div>
        @endif

    
        <form action="{{ route('producto.index') }}" method="GET" class="d-flex mb-3">

            <input type="text" name="search" class="form-control" placeholder="Buscar producto..." value="{{ request()->search }}">
            <button type="submit" class="btn btn-dark ms-2"><i class="bi bi-search"></i> Buscar</button>

        </form>

        <div class="table-responsive text-center">

            <table class="table table-hover">

                <thead class="table-dark sticky-top">

                    <tr>
        
                        <th>N°</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th>Acciones</th>

                    </tr>

                </thead>
                <tbody>

                    @forelse ($productos as $p)

                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nombre }}</td>
                        <td>{{ $p->marca }}</td>
                        <td>{{ $p->precio }}</td>
                        <td>{{ $p->descripcion }}</td>
                        <td>
                            <div class="d-flex justify-content-center">

                                <a href="{{ route('producto.edit', ['id' => $p->id])}}" class="btn btn-dark me-2"><i class="bi bi-pencil-square"></i> Editar</a>

                                <form action="{{ route('producto.destroy', ['id' => $p->id]) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i> Eliminar</button>
                                    

                                </form>

                            </div>
                        </td>

                    </tr>
                   
                    @empty

                    <tr>
                        <td colspan="6" class="text-center text-muted">No hay productos registrados.</td>
                    </tr>

                @endforelse

                </tbody>

            </table>
        </div>

        <div class="pagination-container d-flex flex-column align-items-center mt-4">

            <p>
                <!-- <strong>{{ $productos->count() }}</strong> productos de <strong> -->
                {{ $productos->total() }}</strong> Productos registrados actualmente.
            </p>

            <div class="d-flex justify-content-center align-items-center">

                <!-- Atras -->
                <a href="{{ $productos->previousPageUrl() }}" class="pagination-botn" {{ $productos->onFirstPage() ? 'disabled' : '' }}>Anterior</a>
                <!-- Paginas -->
                <div class="pagination-pages mx-3">
                    @foreach ( $productos->getUrlRange(1, $productos->lastPage()) as  $page => $url)

                        <a href="{{ $url }}" class="page-num {{ $productos->currentPage() == $page ? 'active' : '' }}">{{ $page }}</a>
                    
                    @endforeach
                </div>
                <!-- Siguiwnte -->
                <a href="{{ $productos->nextPageUrl() }}" class="pagination-botn" {{ !$productos->hasMorePages() ? 'disabled' : '' }}>Siguiente</a>

            </div>

        </div>


        <div class="mt-2 mb-3">

            <a href="{{ route('producto.create') }}" class="btn btn-dark"><i class="bi bi-plus-circle"></i> Regitrar Nuevo Producto</a>

        </div>

    </div>
    


@endsection