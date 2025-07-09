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

class MIExportFecha implements FromView, WithTitle
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
        $admin_ingresos = Movimiento::where('tipo_movimiento','INGRESO')->whereBetween('created_at', [$this->inicio,$this->fin])->get();
        return view('ADMINISTRADOR.REPORTES.almacen.xlsx.mov-ingresos', compact('admin_ingresos'));
    }

    public function title(): string
    {
    	return 'MI '.$this->inicio_i.' AL '.$this->fin_f;
    }
}
