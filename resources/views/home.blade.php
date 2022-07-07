@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if(str_contains(Auth::user()->role, 'investigador,evaluador'))
                        {{ __('Investigador y Evaluador') }}</div>
                    
                    @elseif(str_contains(Auth::user()->role, 'evaluador'))
                        {{ __('Evaluador') }}</div>
                    @elseif(str_contains(Auth::user()->role, 'investigador'))
                        {{ __('Investigador') }}</div>
                    @elseif(Auth::user()->role=='admin')
                        {{ __('Administrador') }}</div>
                    @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="4" scope="col">Menú</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row" width="20%"><br>Proyectos</th>
                                @if(Auth::user()->role != 'investigador,evaluador')
                                    <td width="50%"><br>{{(str_contains(Auth::user()->role,'evaluador'))? 'Muestra los proyectos desigandos a evaluar': 'Permite ver o registra proyectos como investigador' }}</td>
                                    <td ><br><a href="{{ route('proyectos.index') }}" class="btn btn-primary w-100">Ver proyectos</a></td>
                                    
                                        @if(Auth::user()->role == 'admin')
                                        <td width="15%"><br>
                                            <p><a href="{{route('index-general')}}" class="btn btn-success">Tabla general</a></p>
                                        </td>
                                        @endif

                                @else
                                    <td width="50%"><br>Muestra los proyecto de investigación registrado o los proyectos para evaluarlos</td>
                                    <td width="15%"><br><a href="{{ route('proyectos.index') }}" class="btn btn-primary">Proyectos como investigador</a></td>
                                    <td width="15%"><br><p><a href="{{route('proyectos-evaluador')}}" class="btn btn-success">Proyectos a evaluar</a></p></td>
                                @endif

                            </tr>



                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
