@extends('layouts.app')
@section('content')
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
                    <h4>Número de Folio del Proyecto: {{ $proyecto_id }}</h4><br>
                    <h5>La exposición de motivos hasta 400 caracteres. <br /><b>IMPORTANTE</b> USAR CHROME (GOOGLE) O
                        FIREFOX PARA LLENAR ESTE FORMATO.</h5>
                    <h5><b>Favor de indicar si cumple o no cumple las siguientes condiciones:</b></h5>
                </div>
                <hr>
            </div>
            <form action="{{ route('evaluaciones.store') }}" method="post" enctype="multipart/form-data" class="col-12">
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
                                    value="{{ $proyecto_id }}" readonly>
                            </div>
                        </div>
                        <div class="row g-3 align-items-baseline">
                            <div class="col-md-4">
                                <label for="propuesta_calificacion">Seleccione *</label>
                                <select class="form-control" id="propuesta_calificacion" name="propuesta_calificacion">
                                    <option disabled selected>Seleccionar</option>
                                    <option value="Cumple">Cumple</option>
                                    <option value="No Cumple">No Cumple</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label for="motivo_propuesta_calificacion">Argumente *</label>
                                <textarea class="form-control" id="motivo_propuesta_calificacion" name="motivo_propuesta_calificacion" required>{{ old('motivo_propuesta_calificacion') }}</textarea>
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
                                    <option disabled selected>Seleccionar</option>
                                    <option value="Cumple">Cumple</option>
                                    <option value="No Cumple">No Cumple</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label for="conocimiento_motivos_calificacion">Argumente *</label>
                                <textarea class="form-control" id="conocimiento_motivos_calificacion" name="conocimiento_motivos_calificacion" required>{{ old('conocimiento_motivos_calificacion') }}</textarea>
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
                                    min="0" max="10" value="0" onchange="suma()">
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_01">Argumente *</label>
                                <textarea class="form-control" id="m_p_01" name="m_p_01">{{ old('m_p_01') }}</textarea>
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
                                    min="0" max="10" value="0" onchange="suma()">
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_02">Argumente *</label>
                                <textarea class="form-control" id="m_p_02" name="m_p_02">{{ old('m_p_02') }}</textarea>
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
                                    min="0" max="10" value="0" onchange="suma()">
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_03">Argumente *</label>
                                <textarea class="form-control" id="m_p_03" name="m_p_03">{{ old('m_p_03') }}</textarea>
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
                                    min="0" max="10" value="0" onchange="suma()">
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_04">Argumente *</label>
                                <textarea class="form-control" id="m_p_04" name="m_p_04">{{ old('m_p_04') }}</textarea>
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
                                    min="0" max="10" value="0" onchange="suma()">
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_05">Argumente *</label>
                                <textarea class="form-control" id="m_p_05" name="m_p_05">{{ old('m_p_05') }}</textarea>
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
                                    min="0" max="10" value="0" onchange="suma()">
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_06">Argumente *</label>
                                <textarea class="form-control" id="m_p_06" name="m_p_06">{{ old('m_p_06') }}</textarea>
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
                                    min="0" max="10" value="0" onchange="suma()">
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_07">Argumente *</label>
                                <textarea class="form-control" id="m_p_07" name="m_p_07">{{ old('m_p_07') }}</textarea>
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
                                    min="0" max="10" value="0" onchange="suma()">
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_08">Argumente *</label>
                                <textarea class="form-control" id="m_p_08" name="m_p_08">{{ old('m_p_08') }}</textarea>
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
                                    min="0" max="10" value="0" onchange="suma()">
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_09">Argumente *</label>
                                <textarea class="form-control" id="m_p_09" name="m_p_09">{{ old('m_p_09') }}</textarea>
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
                                    min="0" max="10" value="0" onchange="suma()">
                            </div>
                            <div class="col-md-8">
                                <label for="m_p_10">Argumente *</label>
                                <textarea class="form-control" id="m_p_10" name="m_p_10">{{ old('m_p_10') }}</textarea>
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
                                <input class="form-control" type="text" name="presupuesto" id="presupuesto">
                            </div>
                            <div class="col-md-8">
                                <label for="resultados_motivos_calificacion">Argumente *</label>
                                <textarea class="form-control" id="resultados_motivos_calificacion" name="resultados_motivos_calificacion">{{ old('resultados_motivos_calificacion') }}</textarea>
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
                                    <option disabled selected>Elegir</option>
                                    <option value="Aceptado">Aceptado</option>
                                    <option value="No aceptado">No aceptado</option>
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
                                    <textarea class="form-control" id="observaciones" name="observaciones">{{ old('observaciones') }}</textarea>
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
                <p>Secretaría Académica / Coordinación de investigación</p>
                <p>CUCSH</p>
            </div>
    </div>
@else
    El periodo de Registro de Proyectos a terminado
    @endif
    <script>
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
