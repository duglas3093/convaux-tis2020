@extends('layouts.app')

@section('title', 'Postular a convocatoria')
@section('content')
<div class="container">
    <h3 class="text-center mt-5">Subir archivos de los requisitos</h3>
    @if(session('postulation_successful'))
    <div class="alert alert-success alert-dismissible col-6 offset-md-3 text-center" role="alert">
        {{ session('postulation_successful') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(session('required_missing'))
    <div class="alert alert-danger alert-dismissible col-8 m-auto text-center" role="alert">
        {{ session('required_missing') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col-10 m-auto">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col-4">Documento</th>
                        <th scope="col">Subir Documento</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('uploadFiles', $data['announcement']->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @foreach ($data['requirements'] as $index => $requirement)
                        <tr>
                            <th class="font-weight-normal">{{ $index+1 }}</th>
                            <td>{{ $requirement->title }}</td>
                            <td>
                                <input type="file" name="files[]">
                                @if ($errors->has('files'))
                                <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('files') }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        <button type="submit" class="btn btn-outline-primary float-right text-center">Enviar</button>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
