@extends('layouts.app')
@section('content')
<div class="container">
    @if(Auth::check())
    @if (session('message'))
    <div class="alert alert-success">
        <h4>{{ session('message') }}</h4>

    </div>
    @endif
    <div class="row">

        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6col-xs-12">
            <h4>Folio: {{$proyecto->id}}. Año: {{$proyecto->anio}}. A.1 {{$proyecto->titulo_proyecto}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    Datos del Responsable
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <b>A.1 Nombre del responsable:</b> {{$proyecto->nombre_responsable}}
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <b>A.2 Correo electrónico: </b> {{$proyecto->correo_responsable}}
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <br> <b>A.3 Nombramiento: </b>{{$proyecto->nombramiento}}
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <br> <b>A.4 Cuerpo Académico: </b>{{$proyecto->cuerpo_academico}}
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <b>A.5 Reconocimiento S.N.I: </b> {{$proyecto->reconocimiento_sni}}
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <b>A.6 Reconocimiento PROMEP: </b> {{$proyecto->reconocimiento_promep}}
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <b>A.7 Reconocimiento PROESDE: </b> {{$proyecto->reconocimiento_proesde}}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <b>A.4 Cuerpo Académico al que pertenece: </b> {{$proyecto->cuerpo_academico}}
                        </div>
                        <br>
                        <div class="col-md-6 col-xs-12">
                            <br><b>A.8 Departamento: </b>{{$proyecto->departamento}}
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <br><b>A.9 División: </b> {{$proyecto->division}}
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    A.10 Registro de proyecto en otras Instituciones
                </div>
                <div class="card-body">
                    <b>{{$proyecto->registro_otras_instituciones}}</b>
                    <br><b>A.10.1 Financiamiento. Institución y monto:</b> {{$proyecto->financiamiento}}
                </div>
            </div>
            <br>
            @if($proyecto->tipo_registro != 'Registro')

            <div class="card">
                <div class="card-header">
                    Registro
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <p> <b>A.11 Opción de registro: </b>{{$proyecto->tipo_registro}}</p>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            A.11.1 Monto para pasaje aereo nacional: <b>{{$proyecto->monto_pasaje_aereo_nacional}}</b>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            A.11.2 Monto para pasaje terrestre nacional: <b>{{$proyecto->monto_pasaje_terrestre_nacional}}</b>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            A.11.3 Monto para combustible para vehículo: <b>{{$proyecto->monto_combustible_vehiculo}}</b>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            A.11.4 Monto para viáticos (Hotel y Alimentos): <b>{{$proyecto->monto_viaticos}}</b>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            A.11.5 Monto para materiales: <b>{{$proyecto->monto_materiales}}</b>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            A.11.6 Monto para equipos menores de oficina (Toner, Papelería, Fotocopias): <b>{{$proyecto->monto_equipos_menores_oficina}}</b>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            A.11.7 Monto total: <b>$ {{$proyecto->monto_total}}</b>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br><b>A.11.8 Justificación de montos económicos: </b> {{$proyecto->justificacion}}
                        </div>
                    </div>
                </div>
            </div>
            <br>
            @else
            <div class="card">
                <div class="card-header">
                    Registro
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-12 col-xs-12">
                            <b>Sin apoyo económico</b>
                        </div>
                        
                    </div>
                </div>
            </div>
            <br>
            @endif
            <div class="card">
                <div class="card-header">
                    Personal y colaboradores
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <br><b>A.12 Personal académico adscrito al proyecto.: </b> {{$proyecto->personal_adscrito}}
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br><b>A.13 Estudiantes colaboradores o asistentes al proyecto: </b>{{$proyecto->estudiantes_adscritos}}
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br> <b>A.14 Colaboradores o asistentes al proyecto, externos: </b>{{$proyecto->colaboradores_externos}}
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    B. RESUMEN DEL PROYECTO
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <b>B.1 Título del Proyecto: </b> {{$proyecto->titulo_proyecto}}
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br><b>B.2 Abstract: </b> {{$proyecto->abstract}}
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <br><b>B.3 Fecha inicio (mes/año): </b>{{$proyecto->fecha_inicio}}
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <br><b>B.4 Fecha fin (mes/año): </b>{{$proyecto->fecha_fin}}
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <br><b>B.5 Tipo de Proyecto: </b>{{$proyecto->tipo_proyecto}}
                        </div>
                        
                        <div class="col-md-6 col-xs-12">
                            <br><b>B.5.1 Tiempo: </b>{{isset($proyecto->tiempo_proyecto) ?  $proyecto->tiempo_proyecto : 'No aplica para la convocatoria'}}
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br><b>B.6 Objetivos: </b> {{$proyecto->objetivos}}
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br><b>B.7 Justificación del proyecto: </b> {{$proyecto->justificacion_proyecto}}
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br><b>B.8 Preguntas: </b>{{$proyecto->preguntas}}
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br><b>B.9 Hipótesis: </b> {{$proyecto->hipotesis}}
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br> <b>B.10 Metodología: </b>{{ $proyecto->metodologia }}
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br><b>B.10.1 Cómo considera el proyecto Generación de Conocimiento o de Incidencia: </b>{{isset($proyecto->generacion_conocimiento) ?  $proyecto->generacion_conocimiento : 'No aplica para la convocatoria'}}
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br><b>B.11 Actividades de divulgación previstas: </b> {{$proyecto->actividades_divulgacion}}
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br><b>B.12 Actividades de vinculación previstas: </b>{{$proyecto->actividades_vinculacion}}
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br><b>B.13 Vinculación con otros investigadores: </b>{{$proyecto->vinculacion_otros_investigadores}}
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br><b>B.14 Vinculación con otros grupos de investigación: </b>{{$proyecto->vinculacion_grupos_investigacion}}
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br><b>B.15 Vinculación con sectores de la sociedad civil o instituciones gubernamentales: </b>{{$proyecto->vinculacion_sectores}}
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br><b>B.16 Criterios Éticos: </b>{{$proyecto->criterios_eticos}}
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br><b>B.17 Referencias: </b>{{$proyecto->referencias}}
                        </div>
                        
                        <div class="col-md-12 col-xs-12">
                            <br><b>B.18 Anexos: </b>
                            @if(!is_null($proyecto->anexos) && isset($proyecto->anexos) && strcmp($proyecto->anexos,'no aplica'))
                                <a href="{{route('documento',['filename' =>$proyecto->anexos])}}" target="_blank" download>Ver Documento</a>
                                @else
                                <h5>No se subió documento</h5>
                                @endif
                        </div>
                        <br>
                        <div class="col-md-12 col-xs-12">
                            <br> <b>B. 19 Cronograma: </b>
                            @if(!is_null($proyecto->cronograma) && isset($proyecto->cronograma) && strcmp($proyecto->cronograma,'no aplica'))
                                <a href="{{route('documento',['filename' =>$proyecto->cronograma])}}" target="_blank" download>Ver Documento</a>
                                @else
                                <h5>No se subió documento</h5>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    C. PROYECTO DE INVESTIGACIÓN
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <label>
                                <h5>C.1 Proyecto en extenso: </h5>
                            </label>
                            <label for="proyecto_extenso">
                                @if(!is_null($proyecto->proyecto_extenso) && isset($proyecto->proyecto_extenso))
                                <h5><a href="{{route('documento',['filename' =>$proyecto->proyecto_extenso])}}" target="_blank" download>Ver Documento</a></h5>
                                @else
                                <h5>No se subió documento</h5>
                                @endif
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <p><a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Regresar</a>
                @if($proyecto->definitivo == 'No' && Auth::user()->role != 'admin' && Auth::user()->role != 'evaluador')
                <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-primary">Editar Proyecto</a>
            </p>
            @endif

        </div>

    </div>
    <hr>
    @endif
</div>

@endsection