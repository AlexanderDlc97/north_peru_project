<?php

namespace App\Exports;

use App\Models\Movimiento;
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

class MSExportFecha implements FromView, WithTitle
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Movimiento::all();
    // }

    protected $fi , $ff, $fi_i, $ff_f;

    public function __construct($fi , $ff, $fi_i, $ff_f)
    {
        $this->inicio = $fi;
        $this->fin = $ff;
        $this->inicio_i = $fi_i;
        $this->fin_f = $ff_f;
    }
    public function view(): View
    {
        $this->inicio;
        $this->fin;
        $admin_salidas = DB::table('detalle_movimientos as dm')
        ->join('movimientos as mov', 'dm.movimiento_id', '=', 'mov.id')
        ->select('mov.codigo as codigo_mov', 'mov.responsable as responsable_mov', 'mov.fecha_emision as fecha_emision_mov', 'mov.o_trabajo_salida','dm.codigo as codigo_producto', 'dm.producto as nombre_producto', 'dm.umedida', 'dm.cantidad')
        ->where('mov.tipo_movimiento', '=', 'SALIDA')
        ->whereBetween('dm.created_at', [$this->inicio,$this->fin])
        ->get();
        // $admin_salidas = Movimiento::where('tipo_movimiento','SALIDA')->whereBetween('created_at', [$this->inicio,$this->fin])->get();
        return view('ADMINISTRADOR.REPORTES.almacen.xlsx.mov-salidas', compact('admin_salidas'));
    }

    public function title(): string
    {
    	return 'MS '.$this->inicio_i.' AL '.$this->fin_f;
    }
}
