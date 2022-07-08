<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $this->validate($request,[
            'p_01'=>'required',
            'm_p_01'=>'required',
            'p_02'=>'required',
            'm_p_02'=>'required',
            'p_03'=>'required',
            'm_p_03'=>'required',
            'p_04'=>'required',
            'm_p_04'=>'required',
            'p_05'=>'required',
            'm_p_05'=>'required',
            'p_06'=>'required',
            'm_p_06'=>'required',
            'p_07'=>'required',
            'm_p_07'=>'required',
            'p_08'=>'required',
            'm_p_08'=>'required',
            'p_09'=>'required',
            'm_p_09'=>'required',
            'p_10'=>'required',
            'm_p_10'=>'required',
            ]);
        
        date_default_timezone_set('America/Mexico_City');

        $hoy = date("Y-m-d H:i:s");
        return $request;

        $evaluacion = new Evaluacion();
        $evaluacion->IdProyecto = $request->IdProyecto;
        $evaluacion->propuesta_calificacion = $request->propuesta_calificacion;
        $evaluacion->propuesta_motivos_calificacion = $request->motivo_propuesta_calificacion;
        $evaluacion->conocimiento_calificacion = $request->conocimiento_calificacion;
        $evaluacion->conocimiento_motivos_calificacion = $request->conocimiento_motivos_calificacion;
        /** Inician las Preguntas */
        $evaluacion->problema_calificacion = $request->p_01;
        $evaluacion->problema_motivos_calificacion = $request->m_p_01;

        $evaluacion->planteamiento_calificacion = $request->p_02;
        $evaluacion->planteamiento_motivos_calificacion = $request->m_p_02;

        $evaluacion->metodologia_calificacion = $request->p_03;
        $evaluacion->metodologia_motivos_calificacion = $request->m_p_03;

        $evaluacion->resultados_calificacion = $request->p_04;
        $evaluacion->resultados_motivos_calificacion = $request->m_p_04;

        $evaluacion->colaboracion_calificacion = $request->p_05;
        $evaluacion->colaboracion_motivos_calificacion = $request->m_p_05;

        $evaluacion->p_06 = $request->p_06;
        $evaluacion->m_p_06 = $request->m_p_06;
        $evaluacion->p_07 = $request->p_07;
        $evaluacion->m_p_07 = $request->m_p_07;
        $evaluacion->p_08 = $request->p_08;
        $evaluacion->m_p_08 = $request->m_p_08;
        $evaluacion->p_09 = $request->p_09;
        $evaluacion->m_p_09 = $request->m_p_09;
        $evaluacion->p_10 = $request->p_10;
        $evaluacion->m_p_10 = $request->m_p_10;
        /**Fin de las Preguntas */
        $evaluacion->evaluacion = $request->evaluacion;
        $evaluacion->observaciones = $request->observaciones;
        $evaluacion->fecha_evaluacion = $request->$hoy;
        $evaluacion->nombre_evauador = Auth::user()->name;
        $evaluacion->save();

        return redirect('proyectos')->with(array(
            'message'=>'La Evaluación se guardo Correctamente'
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evaluacion = Evaluacion::find($id);
        return view('evaluacion.edit')->with('evaluacion', $evaluacion);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $this->validate($request,[
            'propuesta_calificacion'=>'required',
            'propuesta_motivos_calificacion'=>'required'
        ]);
        $evaluacion = Evaluacion::find($id);
        $evaluacion->IdProyecto = $request->input('IdProyecto');
        $evaluacion->propuesta_calificacion = $request->input('propuesta_calificacion');
        $evaluacion->propuesta_motivos_calificacion = $request->input('propuesta_motivos_calificacion');
        $evaluacion->conocimiento_calificacion = $request->input('conocimiento_calificacion');
        $evaluacion->conocimiento_motivos_calificacion = $request->input('conocimiento_motivos_calificacion');
        $evaluacion->problema_calificacion = $request->input('problema_calificacion');
        $evaluacion->problema_motivos_calificacion = $request->input('problema_motivos_calificacion');
        $evaluacion->planteamiento_calificacion = $request->input('planteamiento_calificacion');
        $evaluacion->planteamiento_motivos_calificacion = $request->input('planteamiento_motivos_calificacion');
        $evaluacion->metodologia_calificacion = $request->input('metodologia_calificacion');
        $evaluacion->metodologia_motivos_calificacion = $request->input('metodologia_motivos_calificacion');
        $evaluacion->resultados_calificacion = $request->input('resultados_calificacion');
        $evaluacion->resultados_motivos_calificacion = $request->input('resultados_motivos_calificacion');
        //$evaluacion->colaboracion_calificacion = $request->input('colaboracion_calificacion');
        //$evaluacion->colaboracion_alumnos_calificacion = $request->input('colaboracion_alumnos_calificacion');
        $evaluacion->evaluacion = $request->input('evaluacion');
        $evaluacion->observaciones = $request->input('observaciones');
        $evaluacion->fecha_evaluacion = $request->input('fecha_evaluacion');
        $evaluacion->nombre_evaluador = $request->input('nombre_evaluador');
        $evaluacion->codigo_evaluador = $request->input('codigo_evaluador');
        $evaluacion->save();
        return redirect('proyectos')->with(array(
            'message'=>'La evaluación se actualizó correctamente'
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Funcion de crear evaluacion
    public function create_evaluacion($proyecto_id){
        return view('evaluacion.create')->with('proyecto_id', $proyecto_id);
    }
}
