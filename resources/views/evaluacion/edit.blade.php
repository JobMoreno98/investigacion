@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <div class="container">
        @if (Auth::check())
            @if (session('message'))
                <div class="alert alert-success">
                    <h2>{{ session('message') }}</h2>

                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <h3><br>FORMATO DE EVALUACIÓN.
                        CONVOCATORIA PARA PROYECTOS DE INVESTIGACIÓN 2021
                    </h3>
                    <h4>Número de Folio del Proyecto: {{ $evaluacion->IdProyecto }}</h4><br>
                    <h5>La exposición de motivos hasta 400 caracteres IMPORTANTE!!! USAR CHROME (GOOGLE) O FIREFOX PARA
                        LLENAR ESTE FORMATO.</h5>
                </div>
                <hr>
            </div>

            <form action="{{ route('evaluaciones.update', $evaluacion->id) }}" method="post" enctype="multipart/form-data" class="col-12">
                @method('PUT')
                <div class="row">
                    <div class="col">
                        {!! csrf_field() !!}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    Debe de llenar los campos marcados con un asterisco (*) o el formulario y su información
                                    ya se registró.
                                </ul>
                            </div>
                        @endif
                        <br>
                        {{-- Pregunta 1 --}}
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-12">
                                <label for="propuesta_calificacion">
                                    <h5>a. Queda explicito en el proyecto presentado la importancia de la investigación en
                                        la generación de conocimiento y/o incidencia *</h5>
                                </label>
                                <input type="hidden" class="form-control" id="IdProyecto" name="IdProyecto"
                                    value="{{ $evaluacion->IdProyecto }}" readonly>
                            </div>
                        </div>
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-4">
                                <label for="propuesta_calificacion">Seleccione *</label>
                                <select class="form-control" id="propuesta_calificacion" name="propuesta_calificacion">
                                    <option disabled>Seleccionar</option>
                                    <option {{ $evaluacion->propuesta_calificacion == 'Cumple' ? 'selected' : '' }}
                                        value="Cumple">Cumple</option>
                                    <option {{ $evaluacion->propuesta_calificacion == 'No Cumple' ? 'selected' : '' }}
                                        value="No Cumple">No Cumple</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label for="motivo_propuesta_calificacion">Argumente *</label>
                                <textarea class="form-control" id="motivo_propuesta_calificacion" name="motivo_propuesta_calificacion" required>{{ $evaluacion->propuesta_motivos_calificacion }}</textarea>
                            </div>
                        </div>
                        {{-- Fin de la Pregunta 1 --}}
                        <br>
                        {{-- Pregunta 2 --}}
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-12">
                                <label for="propuesta_calificacion">
                                    <h5>b. La propuesta de investigación es un problema novedoso y relevante *</h5>
                                </label>
                            </div>
                        </div>
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-4">
                                <label for="conocimiento_calificacion">Seleccione *</label>
                                <select class="form-control" id="conocimiento_calificacion"
                                    name="conocimiento_calificacion">
                                    <option disabled>Seleccionar</option>
                                    <option {{ $evaluacion->conocimiento_calificacion == 'Cumple' ? 'selected' : '' }}
                                        value="Cumple">Cumple</option>
                                    <option
                                        {{ $evaluacion->conocimiento_calificacion == 'No Cumple' ? 'selected' : '' }}value="No Cumple">
                                        No Cumple</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label for="conocimiento_motivos_calificacion">Argumente *</label>
                                <textarea class="form-control" id="conocimiento_motivos_calificacion" name="conocimiento_motivos_calificacion" required>{{ $evaluacion->conocimiento_motivos_calificacion }}</textarea>
                            </div>
                        </div>
                        {{-- Fin de la Pregunta 2 --}}
                        <br>
                        {{-- Pregunta 3 --}}
                        <hr />
                        <h3 class="text-center">La calificación numérica será de 0 a 10. La exposición de motivos hasta 600
                            caracteres</h3>
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-12">
                                <label for="p_01">
                                    <h5>1.- El título del proyecto es claro y es coherente con el planteamiento de la
                                        investigación propuesta. *</h5>
                                </label>
                            </div>
                        </div>
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-4">
                                <label for="p_01">Seleccione *</label>
                                <input class="form-control monto" type="number" id="p_01" name="p_01"
                                    min="0" max="10" value="{{ $evaluacion->problema_calificacion }}"
                                    onchange="suma()">
                                {{-- p_01 equivale al campo problema_calificacion --}}
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_01">Argumente *</label>
                                <textarea class="form-control" id="m_p_01" name="m_p_01">{{ $evaluacion->problema_motivos_calificacion }}</textarea>
                            </div>
                        </div>
                        {{-- Fin de la Pregunta 3 --}}
                        <br>

                        {{-- Pregunta 4 --}}
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-12">
                                <label for="planteamiento_calificacion">
                                    <h5>2.- El resumen refleja los elementos esenciales para el logro del cumplimiento de la
                                        investigación *</h5>
                                </label>
                            </div>
                        </div>
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-4">
                                <label for="planteamiento_calificacion">Seleccione *</label>
                                <input class="form-control monto" type="number" id="quantity" name="p_02"
                                    min="0" max="10" value="{{ $evaluacion->planteamiento_calificacion }}"
                                    onchange="suma()">
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_02">Argumente *</label>
                                <textarea class="form-control" id="m_p_02" name="m_p_02">{{ $evaluacion->planteamiento_motivos_calificacion }}</textarea>
                            </div>
                        </div>
                        {{-- Fin de la Pregunta 2 --}}
                        <br>
                        {{-- Pregunta 3 --}}
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-12">
                                <label for="metodologia_calificacion">
                                    <h5>3.- Justifica de manera clara y coherente el por qué y para qué se quiere estudiar e
                                        investigar ese problema. *</h5>
                                </label>
                            </div>
                        </div>
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-4">
                                <label for="metodologia_calificacion">Seleccione *</label>
                                <input class="form-control monto" type="number" id="quantity" name="p_03"
                                    min="0" max="10" value="{{ $evaluacion->metodologia_calificacion }}"
                                    onchange="suma()">
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_03">Argumente *</label>
                                <textarea class="form-control" id="m_p_03" name="m_p_03">{{ $evaluacion->metodologia_motivos_calificacion }}</textarea>
                            </div>
                        </div>
                        {{-- Fin de la Pregunta 3 --}}
                        <br>
                        {{-- Pregunta 4 --}}
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-12">
                                <label for="resultados_calificacion">
                                    <h5>4.- La metodología expone el camino ha seguir para el logro de los objetivos
                                        propuestos. *</h5>
                                </label>
                            </div>
                        </div>
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-4">
                                <label for="resultados_calificacion">Seleccione *</label>
                                <input class="form-control monto" type="number" id="quantity" name="p_04"
                                    min="0" max="10" value="{{ $evaluacion->resultados_calificacion }}"
                                    onchange="suma()">
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_04">Argumente *</label>
                                <textarea class="form-control" id="m_p_04" name="m_p_04">{{ $evaluacion->resultados_motivos_calificacion }}</textarea>
                            </div>
                        </div>
                        {{-- Fin de la Pregunta 4 --}}
                        <br>
                        {{-- Pregunta 5 --}}
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-12">
                                <label for="resultados_calificacion">
                                    <h5>5.- Los objetivos son claros y permiten visualizar el propósito de la investigación.
                                        *</h5>
                                </label>
                            </div>
                        </div>
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-4">
                                <label for="resultados_calificacion">Seleccione *</label>
                                <input class="form-control monto" type="number" id="quantity" name="p_05"
                                    min="0" max="10" value="{{ $evaluacion->colaboracion_calificacion }}"
                                    onchange="suma()">
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_05">Argumente *</label>
                                <textarea class="form-control" id="m_p_05" name="m_p_05">{{ $evaluacion->colaboracion_motivos_calificacion }}</textarea>
                            </div>
                        </div>
                        {{-- Fin de la Pregunta 5 --}}
                        <br>
                        {{-- Pregunta 6 --}}
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-12">
                                <label for="resultados_calificacion">
                                    <h5>6.- Las preguntas y/o hipótesis son adecuadas de acuerdo con la naturaleza del
                                        proyecto. *</h5>
                                </label>
                            </div>
                        </div>
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-4">
                                <label for="resultados_calificacion">Seleccione *</label>
                                <input class="form-control monto" type="number" id="quantity" name="p_06"
                                    min="0" max="10" value="{{ $evaluacion->p_06 }}" onchange="suma()">
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_06">Argumente *</label>
                                <textarea class="form-control" id="m_p_06" name="m_p_06">{{ $evaluacion->m_p_06 }}</textarea>
                            </div>
                        </div>
                        {{-- Fin de la Pregunta 6 --}}
                        <br>
                        {{-- Pregunta 7 --}}
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-12">
                                <label for="resultados_calificacion">
                                    <h5>7.- Se establece el tipo de proyecto y se encuentra vinculada con la metodología
                                        descrita. *</h5>
                                </label>
                            </div>
                        </div>
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-4">
                                <label for="resultados_calificacion">Seleccione *</label>
                                <input class="form-control monto" type="number" id="quantity" name="p_07"
                                    min="0" max="10" value="{{ $evaluacion->p_07 }}" onchange="suma()">
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_07">Argumente *</label>
                                <textarea class="form-control" id="m_p_07" name="m_p_07">{{ $evaluacion->m_p_07 }}</textarea>
                            </div>
                        </div>
                        {{-- Fin de la Pregunta 7 --}}
                        <br>
                        {{-- Pregunta 8 --}}
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-12">
                                <label for="resultados_calificacion">
                                    <h5>8.- Se establecen los criterios éticos para el desarrollo de la investigación. *
                                    </h5>
                                </label>
                            </div>
                        </div>
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-4">
                                <label for="resultados_calificacion">Seleccione *</label>
                                <input class="form-control monto" type="number" id="quantity" name="p_08"
                                    min="0" max="10" value="{{ $evaluacion->p_08 }}" onchange="suma()">
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_08">Argumente *</label>
                                <textarea class="form-control" id="m_p_08" name="m_p_08">{{ $evaluacion->m_p_08 }}</textarea>
                            </div>
                        </div>
                        {{-- Fin de la Pregunta 8 --}}
                        <br>
                        {{-- Pregunta 9 --}}
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-12">
                                <label for="resultados_calificacion">
                                    <h5>9.- Presenta un cronograma de trabajo y sus actividades permiten el cumplimiento de
                                        los objetivos de investigación. *</h5>
                                </label>
                            </div>
                        </div>
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-4">
                                <label for="resultados_calificacion">Seleccione *</label>
                                <input class="form-control monto" type="number" id="quantity" name="p_09"
                                    min="0" max="10" value="{{ $evaluacion->p_09 }}" onchange="suma()">
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_09">Argumente *</label>
                                <textarea class="form-control" id="m_p_09" name="m_p_09">{{ $evaluacion->m_p_09 }}</textarea>
                            </div>
                        </div>
                        {{-- Fin de la Pregunta 9 --}}
                        <br>
                        {{-- Pregunta 10 --}}
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-12">
                                <label for="resultados_calificacion">
                                    <h5>10.- En caso de solicitar presupuesto este se encuentra justificado en función del
                                        proyecto y va de acuerdo con las normas de austeridad de la Universidad de
                                        Guadalajara. *</h5>
                                </label>
                            </div>
                        </div>
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-4">
                                <label for="resultados_calificacion">Seleccione *</label>
                                <input class="form-control monto " type="number" id="p_10" name="p_10"
                                    min="0" max="10" value="{{ $evaluacion->p_10 }}" onchange="suma()">
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_10">Argumente *</label>
                                <textarea class="form-control" id="m_p_10" name="m_p_10">{{ $evaluacion->m_p_10 }}</textarea>
                            </div>
                        </div>
                        {{-- Fin de la Pregunta 10 --}}
                        <br>
                        {{-- Pregunta 10 --}}
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-12">
                                <label for="resultados_calificacion">
                                    <h5>De acuerdo con la pregunta anterior (10) señale el porcentaje del presupuesto
                                        autorizado: *</h5>
                                </label>
                            </div>
                        </div>
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-4">
                                <label for="presupuesto">Especifique *</label>
                                <input class="form-control" type="text" name="presupuesto" id="presupuesto"
                                    value="{{ $evaluacion->colaboracion_alumnos_calificacion }}">
                            </div>
                            <div class="col-md-8">
                                <label for="resultados_motivos_calificacion">Argumente *</label>
                                <textarea class="form-control" id="resultados_motivos_calificacion" name="resultados_motivos_calificacion">{{ $evaluacion->resultados_motivos_calificacion }}</textarea>
                            </div>
                        </div>
                        {{-- Fin de la Pregunta 10 --}}

                        <br>
                        <br>
                        {{-- Pregunta 9 --}}
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-12">
                                <label for="evaluacion">
                                    <h5>Dictamen</h5>
                                </label>
                            </div>
                        </div>
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-6">
                                <select class="form-control" id="evaluacion" name="evaluacion">
                                    <option disabled>Elegir</option>
                                    <option {{ $evaluacion->propuesta_calificacion == 'Aceptado' ? 'selected' : '' }}
                                        value="Aceptado">Aceptado</option>
                                    <option {{ $evaluacion->propuesta_calificacion == 'No aceptado' ? 'selected' : '' }}
                                        value="No aceptado">No aceptado</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-6"><strong>Puntaje total: </strong><span id="total"></span></div>
                                <div class="col-sm-6"></div>
                            </div>
                        </div>
                        {{-- Fin de la Pregunta 9 --}}
                        <br>
                        {{-- Pregunta 10 --}}
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-12">
                                <label for="observaciones">
                                    <h5>Observaciones y Sugerencias (pueden ser en cada uno de los puntos a evaluar o
                                        solamente al final o ambas opciones)</h5>
                                </label>
                            </div>
                        </div>
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-12">
                                <div class="col-md-8">
                                    <textarea class="form-control" id="observaciones" name="observaciones">{{ $evaluacion->observaciones }}</textarea>
                                </div>
                            </div>
                        </div>
                        {{-- Fin de la Pregunta 10 --}}
                        <br>
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <a href="{{ route('proyectos.index') }}" class="btn btn-danger">Cancelar</a>
                                <button type="submit" class="btn btn-success">Guardar Información</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

            </form>

            <div class="row g-3 align-items-center">
                <br>
                <h5>En caso de tener alguna duda, contactar a la Coordinación de Investigación con el correo electrónico:
                    ofelia.woo@academicos.udg.mx</h5>
                <hr>
                <p>Secretaría Académica / Coordinación de investigación y Posgrado</p>
                <p>CUCSH</p>
            </div>
    </div>
@else
    El periodo de Registro de Proyectos a terminado
    @endif
    <script>
        $(document).ready(function() {
            suma();
        });

        function suma() {
            let subtotal = 0;

            let elementos = document.getElementsByClassName("monto");
            [].forEach.call(elementos, function(el) {
                //console.log(el.value);
                subtotal += parseFloat(el.value);
            });
            document.getElementById('total').innerHTML = subtotal;

        };
    </script>
@endsection
