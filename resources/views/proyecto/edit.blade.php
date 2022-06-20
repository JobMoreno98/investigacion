@extends('layouts.app')
@section('content')
<div class="container">
    @if(Auth::check())
        @if (session('message'))
            <div class="alert alert-success">
                <h2>{{ session('message') }}</h2>

            </div>
        @endif
        <div class="row">
            <h2>Convocatoria de Registro a proyectos de investigación </h2>
            <hr>
        </div>
        <form action="{{route('proyectos.store')}}" method="post" enctype="multipart/form-data" class="col-12">
            <div class="row align-items-center">
                <div class="col">
                    {!! csrf_field() !!}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                Debe de llenar los campos marcados con un asterisco (*) o el formulario y su información ya se registró.
                            </ul>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-12">
                    <label for="datos_generales"><h4>A. DATOS GENERALES</h4><p>* Campos Obligatorios</p></label>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-3">
                    <label for="anio">Año*</label>
                    <select class="form-control" id="anio" name="anio">
                        <option value="" selected>Selecciona una opción</option>
                        <option {{($proyecto->anio == '2021') ? 'selected' : ''}}value="2021">2021</option>
                        <option  {{($proyecto->anio == '2022') ? 'selected' : ''}} value="2022">2022</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <label for="nombre_responsable">A.1 Nombre del responsable del proyecto *</label>
                    <input type="hidden" class="form-control" id="IdUser" name="IdUser" value="{{Auth::user()->id}}" readonly >
                    <input type="text" class="form-control" id="nombre_responsable" name="nombre_responsable" value="{{$proyecto->nombre_responsable}}" required>
                </div>
                <div class="col-md-4">
                    <label for="correo_responsable">A.2 Correo electrónico *</label>
                    <input type="email" class="form-control" id="correo_responsable" name="correo_responsable" value="{{$proyecto->correo_responsable }}" required>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-6">
                    <label for="nombramiento">A.3 Nombramiento *</label>
                    <input type="text" class="form-control" id="nombramiento" name="nombramiento" value="{{$proyecto->nombramiento }}" required>
                </div>

                <div class="col-md-6">
                    <label for="cuerpo_academico">A.4 Cuerpo Académico</label>
                    <input type="text" class="form-control" id="cuerpo_academico" name="cuerpo_academico" value="{{$proyecto->cuerpo_academico }}" required>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-4">
                    <label for="reconocimiento_sni">A.5 Reconocimiento S.N.I *</label>
                    <select class="form-control" id="reconocimiento_sni" name="reconocimiento_sni">
                        <option selected value="{{$proyecto->reconocimiento_sni}}" selected>{{$proyecto->reconocimiento_sni}}</option>
                        <option  value="No" >No</option>
                        <option value="Nivel 1">Nivel 1</option>
                        <option value="Nivel 2">Nivel 2</option>
                        <option value="Nivel 3">Nivel 3</option>
                        <option value="Candidato">Candidato</option>
                        <option value="Emérito">Emérito</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="reconocimiento_promep">A.6 Reconocimiento PROMEP *</label>
                    <select class="form-control" id="reconocimiento_promep" name="reconocimiento_promep">
                        <option selected value="{{$proyecto->reconocimiento_promep}}" selected>{{$proyecto->reconocimiento_promep}}</option>
                        <option value="No" >No</option>
                        <option value="Si">Si</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="reconocimiento_proesde">A.7 Reconocimiento PROESDE *</label>
                    <select class="form-control" id="reconocimiento_proesde" name="reconocimiento_proesde">
                        <option selected value="{{ $proyecto->reconocimiento_promep }}" selected>{{ $proyecto->reconocimiento_promep }}</option>
                        <option value="No" >No</option>
                        <option value="Si">Si</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-6">
                    <label for="departamento">A.8 Departamento*</label>
                    <select class="form-control" id="departamento" name="departamento">
                        <option  selected value="{{$proyecto->departamento}}">{{$proyecto->departamento}}</option>
                        <option  disabled>Elegir</option>
                        <option value="Departamento de Lenguas Modernas">Departamento de Lenguas Modernas</option>
                        <option value="Departamento de Filosofía">Departamento de Filosofía</option>
                        <option value="Departamento de Geografía y Ordenación Territorial">Departamento de Geografía y Ordenación Territorial</option>
                        <option value="Departamento de Historia">Departamento de Historia</option>
                        <option value="Departamento de Letras">Departamento de Letras</option>
                        <option value="Departamento de Derecho Público">Departamento de Derecho Público</option>
                        <option value="Departamento de Derecho Privado">Departamento de Derecho Privado</option>
                        <option value="Departamento de Derecho Social">Departamento de Derecho Social</option>
                        <option value="Departamento de Disciplinas sobre el Derecho">Departamento de Disciplinas sobre el Derecho</option>
                        <option value="Departamento de Estudios en Lenguas Indígenas">Departamento de Estudios en Lenguas Indígenas</option>
                        <option value="Departamento de Estudios de la Comunicación Social">Departamento de Estudios de la Comunicación Social</option>
                        <option value="Departamento de Estudios Literarios">Departamento de Estudios Literarios</option>
                        <option value="Departamento de Estudios Mesoamericanos y Mexicanos">Departamento de Estudios Mesoamericanos y Mexicanos</option>
                        <option value="Departamento de Sociología">Departamento de Sociología</option>
                        <option value="Departamento de Estudios Políticos">Departamento de Estudios Políticos</option>
                        <option value="Departamento de Trabajo Social">Departamento de Trabajo Social</option>
                        <option value="Departamento de Relaciones Internacionales">Departamento de Relaciones Internacionales</option>
                        <option value="Departamento de Desarrollo Social">Departamento de Desarrollo Social</option>
                        <option value="Departamento de Estudios en Educación">Departamento de Estudios en Educación</option>
                        <option value="Departamento de Estudios Ibéricos y Latinoamericanos">Departamento de Estudios Ibéricos y Latinoamericanos</option>
                        <option value="Departamento de Estudios sobre Movimientos Sociales">Departamento de Estudios sobre Movimientos Sociales</option>
                        <option value="Departamento de Estudios Socio Urbanos">Departamento de Estudios Socio Urbanos</option>
                        <option value="Departamento de Estudios del Pacífico">Departamento de Estudios del Pacífico</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="division">A.9 División *</label>
                    <select class="form-control" id="division" name="division">
                        <option selected value="{{$proyecto->division}}">{{$proyecto->division}}</option>
                        <option  disabled>Elegir</option>
                        <option value="División de Estudios Históricos y Humanos">División de Estudios Históricos y Humanos</option>
                        <option value="División de Estudios Jurídicos">División de Estudios Jurídicos</option>
                        <option value="División de Estudios de la Cultura">División de Estudios de la Cultura</option>
                        <option value="División de Estudios Políticos y Sociales">División de Estudios Políticos y Sociales</option>
                        <option value="División de Estudios de Estado y Sociedad">División de Estudios de Estado y Sociedad</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-6">
                    <label for="tipo_registro">A.10 Opción de registro *</label>
                    <select class="form-control" id="tipo_registro" name="tipo_registro" class="form-control" onChange="cambio()">
                        <option {{($proyecto->tipo_registro == 'Registro') ? 'selected' : ''}} value="Registro" >Registro sin apoyo económico</option>
                        <option {{($proyecto->tipo_registro == 'Registro y apoyo') ? 'selected' : ''}} value="Registro y apoyo">Registro con apoyo económico</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="registro_otras_instituciones">A.11 Registro y Apoyo Económico en otras Instituciones </label>
                    <select class="form-control" id="registro_otras_instituciones" name="registro_otras_instituciones">
                        <option selected value="{{$proyecto->registro_otras_instituciones}}">{{$proyecto->registro_otras_instituciones}}</option>
                        <option >Elegir</option>
                        <option value="CONACYT">CONACYT</option>
                        <option value="SEP">SEP</option>
                        <option value="Organismo Internacional">Organismo Internacional</option>
                        <option value="Dependencia Estatal">Dependencia Estatal</option>
                        <option value="Dependencia Federal">Dependencia Federal</option>
                        <option value="Otro">Otro</option>
                        <option value="No Aplica" selected>No Aplica</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <label for="financiamiento">A.11.1 En caso de recibir financiamiento especificar Institución y monto</label>
                    <textarea class="form-control" id="financiamiento" name="financiamiento">{{ $proyecto->financiamiento }}</textarea>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="row g-3 align-items-center">
                    <div class="col-md-12">
                        <label for="datos_generales"><h4>B. RESUMEN DEL PROYECTO</h4></label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-10">
                    <label for="titulo_proyecto">B.1 Título del proyecto *</label>
                    <input type="hidden" class="form-control" id="IdUser" name="IdUser" value="{{Auth::user()->id}}" readonly>
                    <input type="text" class="form-control" id="titulo_proyecto" name="titulo_proyecto" value="{{$proyecto->titulo_proyecto}}" required>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-6">
                    <label for="fecha_inicio">B.2 Fecha inicio (mes/año) *</label>
                    <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{$proyecto->fecha_inicio}}" required>
                </div>
                <div class="col-md-6">
                    <label for="fecha_fin">B.3 Fecha fin (mes/año) *</label>
                    <input type="text" class="form-control" id="fecha_fin" name="fecha_fin" value="{{$proyecto->fecha_fin}}" required>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <label for="abstract">B.4 Resumen (máximo 500 caracteres) *</label>
                    <textarea class="form-control" id="abstract" name="abstract" required>{{$proyecto->abstract}}</textarea>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <label for="justificacion_proyecto">B.5 Justificación (máximo 500 caracteres) *</label>
                    <textarea class="form-control" id="justificacion_proyecto" name="justificacion_proyecto" required>{{$proyecto->justificacion_proyecto}}</textarea>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <label for="metodologia">B.6 Metodología (máximo 1000 caracteres) *</label>
                    <textarea class="form-control" id="metodologia" name="metodologia" required>{{ $proyecto->metodologia }}</textarea>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <label for="objetivos">B.7 Objetivos (máximo 500 caracteres)*</label>
                    <textarea class="form-control" id="objetivos" name="objetivos" required>{{$proyecto->objetivos }}</textarea>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <label for="preguntas">B.8 Preguntas (máximo 500 caracteres) *</label>
                    <textarea class="form-control" id="preguntas" name="preguntas" required>{{$proyecto->preguntas}}</textarea>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <label for="hipotesis">B.9 Hipótesis (máximo 500 caracteres) *</label>
                    <textarea class="form-control" id="hipotesis" name="hipotesis" required>{{$proyecto->hipotesis}}</textarea>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-6">
                    <label for="tipo_proyecto">B.10 Tipo de Proyecto *</label>
                    <select class="form-control" id="tipo_proyecto" name="tipo_proyecto">
                        <option value="Proyecto nuevo" selected>Proyecto nuevo</option>
                        <option value="Continuacion">Continuación</option>
                    </select>
                </div>

            </div>

            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <label for="criterios_eticos">B.11 Criterios Éticos (máximo 500 caracteres) *</label>
                    <textarea class="form-control" id="criterios_eticos" name="criterios_eticos" required>{{$proyecto->criterios_eticos}}</textarea>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <label for="referencias">B.12 Referencias (máximo 500 caracteres) *</label>
                    <textarea class="form-control" id="referencias" name="referencias" required>{{$proyecto->referencias}}</textarea>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <label for="anexos">B.13 Anexos *</label>
                    <input type="file" class="form-control" id="anexos" name="anexos" value="{{$proyecto->anexos }}" >
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-6">
                    <label for="cronograma"> B.14 Cronograma de trabajo *</label>
                    <input type="file" class="form-control" id="cronograma" name="cronograma" value="{{$proyecto->cronograma}}" >
                </div>
            </div>
            <br>


            <div class="row g-3 align-items-center" id="presupuesto" style="display: none;">
                <div class="col-md-12">
                    <label><h5> Presupuesto Solicitado</h5></label>
                </div>
                <div class="col-md-12">

                    <hr>
                    <table>
                        <tr>
                            <td><label for="monto_pasaje_aereo_nacional">B.14.1 Monto para pasaje aereo nacional </label></td>
                            <td><input type="number" step="any" min="0" class="form-control" id="monto_pasaje_aereo_nacional" name="monto_pasaje_aereo_nacional" value="{{$proyecto->monto_pasaje_aereo_nacional}}" required></td>
                        </tr>
                        <tr>
                            <td><label for="monto_pasaje_terrestre_nacional">B.14.2 Monto para pasaje terrestre nacional </label></td>
                            <td><input type="number" step="any" min="0" class="form-control" id="monto_pasaje_terrestre_nacional" name="monto_pasaje_terrestre_nacional" value="{{$proyecto->monto_pasaje_terrestre_nacional}}" required></td>
                        </tr>
                        <tr>
                            <td><label for="monto_combustible_vehiculo">B.14.3 Monto para combustible para vehículo </label></td>
                            <td><input type="number" step="any" min="0" class="form-control" id="monto_combustible_vehiculo" name="monto_combustible_vehiculo" value="{{$proyecto->monto_combustible_vehiculo}}" required></td>
                        </tr>
                        <tr>
                            <td><label for="monto_viaticos">B.14.4 Monto para viáticos (Hotel, alimentos) </label></td>
                            <td><input type="number" step="any" min="0" class="form-control" id="monto_viaticos" name="monto_viaticos" value="{{$proyecto->monto_viaticos}}" required></td>
                        </tr>
                        <tr>
                            <td><label for="monto_equipos_menores_oficina">B.14.5 Monto para materiales menores de oficina (Toner, Papelería, Fotocopias) </label></td>
                            <td><input type="number" step="any" min="0" class="form-control" id="monto_equipos_menores_oficina" name="monto_equipos_menores_oficina" value="{{$proyecto->monto_equipos_menores_oficina}}" required></td>
                        </tr>
                    </table>
                    <br>
                    <table align="center">
                        <tr>
                            <td><label for="monto_total">B.14.7 Monto total </label></td>
                            <td><input type="number" step="any" min="0" max="50000.00" class="form-control" id="monto_total" name="monto_total" value="{{$proyecto->monto_total}}"  required></td>
                        </tr>
                    </table>
                    <br>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-md-12">
                        <label for="justificacion">B.14.8 Justificación de Presupuesto</label>
                        <textarea class="form-control" id="justificacion" name="justificacion" value="{{old('justificacion')}}"></textarea>
                    </div>
                </div>
                <hr>
            </div>

           
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <label for="personal_adscrito">B.15 Personal adscrito al proyecto. Señalar nombre y Departamento de Adscripción</label>
                    <textarea class="form-control" id="personal_adscrito" name="personal_adscrito">{{$proyecto->personal_adscrito}}</textarea>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <label for="estudiantes_adscritos">B.16 Estudiantes colaboradores o asistentes al proyecto (especificar nombre y programa educativo del estudiante)</label>
                    <textarea class="form-control" id="estudiantes_adscritos" name="estudiantes_adscritos">{{$proyecto->estudiantes_adscritos}}</textarea>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <label for="colaboradores_externos">B.17 Colaboradores o asistentes al proyecto, externos de la UdeG (especificar nombre e institución)</label>
                    <textarea class="form-control" id="colaboradores_externos" name="colaboradores_externos">{{$proyecto->colaboradores_externos}}</textarea>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <label for="actividades_divulgacion">B.18 Actividades de divulgación previstas</label>
                    <textarea class="form-control" id="actividades_divulgacion" name="actividades_divulgacion">{{$proyecto->actividades_divulgacion}}</textarea>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <label for="actividades_vinculacion">B.19 Actividades de vinculación previstas</label>
                    <textarea class="form-control" id="actividades_vinculacion" name="actividades_vinculacion">{{$proyecto->actividades_vinculacion}}</textarea>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <label for="vinculacion_otros_investigadores"> B.20 Vinculación con otros investigadores, especifique</label>
                    <textarea class="form-control" id="vinculacion_otros_investigadores" name="vinculacion_otros_investigadores">{{$proyecto->vinculacion_otros_investigadores}}</textarea>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <label for="vinculacion_grupos_investigacion"> B.21 Vinculación con otros grupos de investigación, especifique</label>
                    <textarea class="form-control" id="vinculacion_grupos_investigacion" name="vinculacion_grupos_investigacion">{{$proyecto->vinculacion_grupos_investigacion}}</textarea>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <label for="vinculacion_sectores"> B.22 Vinculación con sectores de la sociedad civil o instituciones gubernamentales, especifique</label>
                    <textarea class="form-control" id="vinculacion_sectores" name="vinculacion_sectores">{{$proyecto->vinculacion_sectores}}</textarea>
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <label for="datos_generales"><h4>C. PROYECTOS DE INVESTIGACIÓN</h4></label>
                </div>
                <div class="col-md-6">
                    <label for="proyecto_extenso">C.1 Proyecto en extenso </label>
                    <input type="file" class="form-control" id="proyecto_extenso" name="proyecto_extenso" value="{{$proyecto->proyecto_extenso}}" >
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-6">
                    <a href="{{ route('home') }}" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success">Guardar datos</button>
                </div>
            </div>
        </form>
        <br>
        <div class="row g-3 align-items-center">
            <br>
            <h5>En caso de tener alguna duda, contactar a la Coordinación de Investigación  con el correo electrónico: investigación.cuch@administrativos.udg.mx</h5>
            <hr>
            <p>Secretaría Académica / Coordinación de investigación al teléfono 3338193300 ext. 23499, 23590, 23402.</p>
            <p>CUCSH</p>
        </div>
</div>

    @else
        El periodo de Registro de Proyectos a terminado
    @endif
    <script>
        function cambio(){
            let area = document.getElementById("tipo_registro");
            if(area.value == 'Registro'){
                document.getElementById("presupuesto").style.display = "none";
            }else if(area.value == 'Registro y apoyo'){
                document.getElementById("presupuesto").style.display = "block";
            }
        }
    </script>
@endsection
