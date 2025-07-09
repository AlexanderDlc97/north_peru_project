<?php

namespace App\Exports;

use App\Models\Otrabajo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class OTUHExportFecha implements FromView, WithDrawings,WithColumnWidths, WithCustomStartCell, WithTitle
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Otrabajo::all();
    // }

    protected $filtro_fi, $filtro_ff, $filtro_fi_i, $filtro_ff_f, $filtro_now;

    public function __construct($filtro_fi, $filtro_ff, $filtro_fi_i, $filtro_ff_f, $filtro_now)
    {
        $this->inicio = $filtro_fi;
        $this->fin = $filtro_ff;
        $this->inicio_i = $filtro_fi_i;
        $this->fin_f = $filtro_ff_f;
        $this->now = $filtro_now;
    }

    public function view(): View
    {
        $this->inicio;
        $this->fin;
        $desde = $this->inicio_i;
        $hasta = $this->fin_f;
        $fecha_actual = $this->now;

        $orden_trabajos = Otrabajo::whereBetween('created_at', [$this->inicio,$this->fin])->get();
        $array_as = [];
        foreach($orden_trabajos as $orden_trabajo){
            $join = DB::table('operaciones_polifuncionales as op')
            ->join('orden_trabajos as ot', 'ot.id', 'op.orden_trabajo_id')
            ->join('detalleo_trabajos as dot', 'dot.orden_trabajo_id', 'ot.id')
            ->select('op.usuario','op.hp','op.hh','op.hsh','dot.id', 'dot.codigo', 'dot.producto', 'dot.umedida', 'dot.cantidad', 'dot.cantidad_utilizada', 'dot.cantidad_devuelta', 'dot.pen')
            ->groupBy('op.usuario','op.hp','op.hh','op.hsh','dot.id', 'dot.codigo', 'dot.producto', 'dot.umedida', 'dot.cantidad', 'dot.cantidad_utilizada', 'dot.cantidad_devuelta', 'dot.pen')
            ->where('ot.id', $orden_trabajo->id)
            ->get();

            $array_as_dtlle = [];
            foreach($join as $joins){
                $array_as_dtlle[] = ['usuario' => $joins?$joins->usuario:'', 'hp' => $joins?$joins->hp:'', 'hh' => $joins?$joins->hh:'', 'hsh' => $joins?$joins->hsh:'', 'codigo' => $joins?$joins->codigo:'', 'producto' => $joins?$joins->producto:'', 'umedida' => $joins?$joins->umedida:'', 'cantidad' => $joins?$joins->cantidad:'', 'cantidad_utilizada' => $joins?$joins->cantidad_utilizada:'', 'cantidad_devuelta' => $joins?$joins->cantidad_devuelta:'', 'pen' => $joins?$joins->pen:''];
            }
            $array_as[] = ['codigo' => $orden_trabajo->codigo, 'equipo' => $orden_trabajo->equipo, 'descripcion_orden' => $orden_trabajo->descripcion_orden,'fecha_i' => \Carbon\Carbon::parse($orden_trabajo->fecha_inicio)->format('d-m-Y'),'fecha_f' => \Carbon\Carbon::parse($orden_trabajo->fecha_fin)->format('d-m-Y'),'centro_costo' => $orden_trabajo->centro_costo,'status_sistema' => $orden_trabajo->status_sistema, 'ubicacion_tecnica' => $orden_trabajo->ubicacion_tecnica, 'suma_costo_plan' => $orden_trabajo->suma_costo_plan,'autor' => $orden_trabajo->autor ,'nivel_importancia' => $orden_trabajo->nivel_importancia ,'rubro' => $orden_trabajo->rubro,'categoria' => $orden_trabajo->categoria, 'responsable' => $orden_trabajo->responsable, 'estado' => $orden_trabajo->estado, 'porcentaje' => $orden_trabajo->porcentaje, 'orden_id' => $orden_trabajo->id, 'dtlles' => $array_as_dtlle];
            
        }
        // dd($array_as[10]);
        
        return view('ADMINISTRADOR.REPORTES.seguimiento-ot.xlsx.total-orden-trabajos', compact('orden_trabajos', 'desde', 'hasta', 'fecha_actual','array_as'));
    }


    public function title(): string
    {
    	return 'OT';
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10.78, 'B' => 10.78, 'C' => 10.78, 'D' => 10.78, 'E' => 10.78, 'F' => 10.78, 'G' => 10.78, 'H' => 10.78, 'I' => 10.78, 'J' => 10.78, 'K' => 10.78, 'L' => 10.78, 'M' => 10.78, 'N' => 10.78, 'O' => 10.78, 'P' => 10.78, 'Q' => 10.78, 'R' => 10.78
        ];
    }
    
    public function startCell(): string
    {
        return 'A1';
    }
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('images/LOGO1.png'));
        $drawing->setHeight(35);
        $drawing->setOffsetX(-50);
        $drawing->setOffsetY(2);
        $drawing->setCoordinates('B1');

        return $drawing;
    }
}
