<?php

namespace App\Exports;

use App\Models\Almacen;
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

class INVExportFecha implements FromView, WithTitle
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Almacen::all();
    // }

    protected $now;

    public function __construct($now)
    {
        $this->fecha = $now;
    }
    public function view(): View
    {
        $almacen = Almacen::all();
        return view('ADMINISTRADOR.REPORTES.almacen.xlsx.inventario', compact('almacen'));
    }

    public function title(): string
    {
    	return 'ACTIVOS Y MATERIALES';
    }
}
