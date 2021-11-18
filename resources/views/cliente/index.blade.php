<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h4>Gestión de Clientes</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('cliente.index')}}" method="get">
                    <div class="form-row">
                        <div class="col-sm-4 my-1">
                            <input type="text" class="form-control" name="texto" value="{{$texto}}">
                        </div>
                        <div class="col-auto my-1">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                        </div>
                        <div class="col-auto my-1">
                            <a href="{{route('cliente.create')}}" class="btn btn-success">Nuevo Cliente</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Opciones</th>
                                <th>ID</th>
                                <th>Apellidos</th>
                                <th>Nombres</th>
                                <th>Cedula</th>
                                <th>Dirección</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($clientes)<=0) <tr>
                                <td colspan="6">No hay resultados</td>
                                </tr>
                                @else
                                @foreach($clientes as $cliente)
                                <tr>
                                    <td>
                                        <a href="{{route('cliente.edit',$cliente->id)}}" class="btn btn-warning btn-sm">Editar</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$cliente->id}}">
                                            Eliminar
                                        </button>
                                    </td>
                                    <td>{{$cliente->id}}</td>
                                    <td>{{$cliente->apellidos}}</td>
                                    <td>{{$cliente->nombres}}</td>
                                    <td>{{$cliente->cedula}}</td>
                                    <td>{{$cliente->direccion}}</td>
                                </tr>
                                @include('cliente.delete')
                                @endforeach
                                @endif
                        </tbody>
                    </table>
                    {{$clientes->links()}}
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>