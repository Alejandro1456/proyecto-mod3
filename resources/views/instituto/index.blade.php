@extends('layouts.app')

@section('template_title')
Instituto
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Instituto') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('institutos.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Create New') }}
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <!--agregar esta parte para exportar-->
                        <form action="{{ route('instituto.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-trash"></i> Importar</button>
<br>
                            <input type="file" name="file" class="form-control">
                            <br>
                        </form>

                       
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <!--boton exportar-->
                                <tr>
                                    <a href="{{ route('instituto.export') }}" class="btn btn-success float-end">Export</a>
                                </tr>
                                <tr>
                                    <th>No</th>

                                    <th>Materia</th>
                                    <th>Carrera</th>
                                    <th>Tiempo</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($institutos as $instituto)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $instituto->materia }}</td>
                                    <td>{{ $instituto->carrera }}</td>
                                    <td>{{ $instituto->tiempo }}</td>

                                    <td>
                                        <form action="{{ route('institutos.destroy',$instituto->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('institutos.show',$instituto->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('institutos.edit',$instituto->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                            <a href="{{ route('generate',$instituto->id) }}" class="btn btn-primary">Generate</a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $institutos->links() !!}
        </div>
    </div>
</div>
@endsection