<?php

namespace App\Http\Controllers;

use App\Models\VsEquiposPorTicket;
use App\Models\VsPrestamo;
use App\Models\Proyecto;
use App\Models\VsTicket;
use App\Models\Evaluacion;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function imprimirProyecto($proyecto_id){
     $proyecto = Proyecto::where('id','=',$proyecto_id)->first();
        $pdf = \PDF::loadView('proyecto.formatoProyecto', compact('proyecto'));
        return $pdf->stream('formatoProyecto.pdf');

    }
    public function imprimirEvaluacion($proyecto_id){
        $proyecto = Proyecto::where('id','=',$proyecto_id)->first();
        $evaluacion = Evaluacion::where('idProyecto','=',$proyecto_id)->first();
        $pdf = \PDF::loadView('evaluacion.formatoEvaluacion', compact('proyecto','evaluacion'));
        /*$pdf->setOption('enable-javascript', true);
        return $pdf;*/
        return $pdf->stream('formatoEvaluacion.pdf');

    }
}
