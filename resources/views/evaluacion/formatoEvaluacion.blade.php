<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Proyecto / Impresión de proyecto</title>

    <!-- Styles -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<style>
    .pie{
        font-size: 10px;
        text-align: right;
    }
</style>
</head>
<body onload="suma()">
<script type="text/javascript"> try { this.print(); } catch (e) { window.onload = window.print; } </script>
<div class="container ">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <p class="text-center"><img class="img-responsive" src="images/logo.jpg" width="100%"></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" >
            <table class="table table-bordered" style="font-size: 12px;">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" colspan="3"><h3>Formato de Evaluación</h3></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Folio:</b> {{$proyecto->id}}</td>
                        <td><b>Responsable:</b> {{$proyecto->nombre_responsable}}</td>
                        <td><b>Título del proyecto:</b> {{$proyecto->titulo_proyecto}}</td>
                    </tr>
                </tbody>
            </table>
            @if($proyecto->anio == '2021')
            <table class="table table-bordered w-100" style="font-size: 12px;">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" colspan="1"><h5>Datos de la evaluación</h5></th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><b>1- La propuesta, ¿presenta el estudio un problema novedoso y relevante?</b></td></tr>
                    <tr><td class="monto">Calificación: {{$evaluacion->propuesta_calificacion}}</td></tr>
                    <tr><td>Motivos: {{$evaluacion->propuesta_motivos_calificacion}}</td></tr>

                    <tr><td><b>2- ¿Se denota un conocimiento amplio sobre los  antecedentes de la problemática planteada?</b></td></tr>
                    <tr><td class="monto">Calificación: {{$evaluacion->conocimiento_calificacion}}</td></tr>
                    <tr><td>Motivos: {{$evaluacion->conocimiento_motivos_calificacion}}</td></tr>

                    <tr><td><b>3- ¿Se  expone con claridad el problema de estudio, de tal manera que  los objetivos,
                                pregunta e hipóteiss se abordan de forma clara?</b></td></tr>
                    <tr><td class="monto">Calificación: {{$evaluacion->problema_calificacion}}</td></tr>
                    <tr><td>Motivos: {{$evaluacion->problema_motivos_calificacion}}</td></tr>

                    <tr><td><b>4- ¿Existe un planteamiento teórico consistente?</b></td></tr>
                    <tr><td class="monto">Calificación: {{$evaluacion->planteamiento_calificacion}}</td></tr>
                    <tr><td>Motivos: {{$evaluacion->planteamiento_motivos_calificacion}}</td></tr>

                    <tr><td><b>5- ¿Es clara la exposición de la  metodología?</b></td></tr>
                    <tr><td class="monto">Calificación: {{$evaluacion->metodologia_calificacion}}</td></tr>
                    <tr><td>Motivos: {{$evaluacion->metodologia_motivos_calificacion}}</td></tr>

                    <tr><td><b>6- ¿En el proyecto se presentan aportes en su campo de conocimiento?</b></td></tr>
                    <tr><td class="monto">Calificación: {{$evaluacion->resultados_calificacion}}</td></tr>
                    <tr><td>Motivos: {{$evaluacion->resultados_motivos_calificacion}}</td></tr>

                    <tr><td><b>Evaluación:</b> {{$evaluacion->evaluacion}}</td></tr>
                    <tr><td><b>Observaciones y Sugerencias:</b> {{$evaluacion->observaciones}}</td></tr>
                    <tr><td><b>Fecha Evaluación:</b> {{$evaluacion->fecha_evaluacion}}</td></tr>
                    <tr><td><b>Nombre Evaluador(a):</b> {{$evaluacion->nombre_evaluador}}</td></tr>
                    <tr><td><b>Código:</b> {{$evaluacion->codigo_evaluador}}</td></tr>
                </tbody>
            </table>
            @else
            <table class="table table-bordered" style="font-size: 12px;">
                <thead class="thead-light">
                    <tr>
                        <th><h5>Datos de la evaluación</h5></th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><b>a. Queda explicito en el proyecto presentado la importancia de la investigación en la generación de conocimiento y/o incidencia</b></td></tr>
                    <tr><td class="monto">Calificación: {{$evaluacion->propuesta_calificacion}}</td></tr>
                    <tr><td>Motivos: {{$evaluacion->propuesta_motivos_calificacion}}</td></tr>

                    <tr><td><b>b. La propuesta de investigación es un problema novedoso y relevante</b></td></tr>
                    <tr><td class="monto">Calificación: {{$evaluacion->conocimiento_calificacion}}</td></tr>
                    <tr><td>Motivos: {{$evaluacion->conocimiento_motivos_calificacion}}</td></tr>

                    <tr><td><b>1.- El título del proyecto es claro y es coherente con el planteamiento de la
                                        investigación propuesta</b></td></tr>
                    <tr><td class="monto">Calificación: {{$evaluacion->problema_calificacion}}</td></tr>
                    <tr><td>Motivos: {{$evaluacion->problema_motivos_calificacion}}</td></tr>

                    <tr><td><b>2.- El resumen refleja los elementos esenciales para el logro del cumplimiento de la
                                        investigación</b></td></tr>
                    <tr><td class="monto">Calificación: {{$evaluacion->planteamiento_calificacion}}</td></tr>
                    <tr><td>Motivos: {{$evaluacion->planteamiento_motivos_calificacion}}</td></tr>

                    <tr><td><b>3.- Justifica de manera clara y coherente el por qué y para qué se quiere estudiar e investigar ese problema</b></td></tr>
                    <tr><td class="monto">Calificación: {{$evaluacion->metodologia_calificacion}}</td></tr>
                    <tr><td>Motivos: {{$evaluacion->metodologia_motivos_calificacion}}</td></tr>

                    <tr><td><b>4.- La metodología expone el camino ha seguir para el logro de los objetivos propuestos</b></td></tr>
                    <tr><td class="monto">Calificación: {{$evaluacion->resultados_calificacion}}</td></tr>
                    <tr><td>Motivos: {{$evaluacion->resultados_motivos_calificacion}}</td></tr>


                    <tr><td><b>5.- Los objetivos son claros y permiten visualizar el propósito de la investigación</b></td></tr>
                    <tr><td class="monto">Calificación: {{$evaluacion->resultados_calificacion}}</td></tr>
                    <tr><td>Motivos: {{$evaluacion->resultados_motivos_calificacion}}</td></tr>

                    <tr><td><b>6.- Las preguntas y/o hipótesis son adecuadas de acuerdo con la naturaleza del proyecto</b></td></tr>
                    <tr><td class="monto">Calificación: {{$evaluacion->resultados_calificacion}}</td></tr>
                    <tr><td>Motivos: {{$evaluacion->resultados_motivos_calificacion}}</td></tr>

                    <tr><td><b>7.- Se establece el tipo de proyecto y se encuentra vinculada con la metodología descrita</b></td></tr>
                    <tr><td class="monto">Calificación: {{$evaluacion->resultados_calificacion}}</td></tr>
                    <tr><td>Motivos: {{$evaluacion->resultados_motivos_calificacion}}</td></tr>

                    <tr><td><b>8.- Se establecen los criterios éticos para el desarrollo de la investigación</b></td></tr>
                    <tr><td class="monto">Calificación: {{$evaluacion->resultados_calificacion}}</td></tr>
                    <tr><td>Motivos: {{$evaluacion->resultados_motivos_calificacion}}</td></tr>

                    <tr><td><b>9.- Presenta un cronograma de trabajo y sus actividades permiten el cumplimiento de los objetivos de investigación</b></td></tr>
                    <tr><td class="monto">Calificación: {{$evaluacion->resultados_calificacion}}</td></tr>
                    <tr><td>Motivos: {{$evaluacion->resultados_motivos_calificacion}}</td></tr>

                    <tr><td><b>10.- En caso de solicitar presupuesto este se encuentra justificado en función del proyecto y va de acuerdo con las normas de austeridad de la Universidad de Guadalajara</b></td></tr>
                    <tr><td class="monto">Calificación: {{$evaluacion->resultados_calificacion}}</td></tr>
                    <tr><td>Motivos: {{$evaluacion->resultados_motivos_calificacion}}</td></tr>

                    <tr><td><b>De acuerdo con la pregunta anterior (10) señale el porcentaje del presupuesto autorizado</b></td></tr>
                    <tr><td class="monto">Calificación: {{$evaluacion->resultados_calificacion}}</td></tr>
                    <tr><td>Motivos: {{$evaluacion->resultados_motivos_calificacion}}</td></tr>
                    <tr>
                        <td>TOTAL: <span id="total"></span></td>
                    </tr>

                    <tr><td><b>Evaluación:</b> {{$evaluacion->evaluacion}}</td></tr>
                    <tr><td><b>Observaciones y Sugerencias:</b> {{$evaluacion->observaciones}}</td></tr>
                    <tr><td><b>Fecha Evaluación:</b> {{$evaluacion->fecha_evaluacion}}</td></tr>
                    <tr><td><b>Nombre Evaluador(a):</b> {{$evaluacion->nombre_evaluador}}</td></tr>
                </tbody>
            </table>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <br>
            <br>

            <p class="pie">Hora y día de Impresión:  {{ date('d-m-Y H:i:s') }}<br>
                Realizado por:  {{ Auth::user()->name }}<br>
            </p>
        </div>
    </div>
</div>
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
            console.log(subtotal);

        };
    </script>
</body>
</html>
