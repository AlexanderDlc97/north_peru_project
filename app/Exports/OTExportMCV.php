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

class OTExportMCV implements FromView, WithColumnWidths, WithCustomStartCell, WithTitle
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Otrabajo::all();
    // }

    protected $orden_trabajo;

    public function __construct($orden_trabajo)
    {
        $this->ot = $orden_trabajo;
    }

    public function view(): View
    {
        $this->orden_trabajo;
        $admin_ot_seguimiento = Otrabajo::where('id', $this->ot)->first();
        return view('ADMINISTRADOR.REPORTES.seguimiento-ot.xlsx.valorizacion-mcv', compact('admin_ot_seguimiento'));
    }

    public function title(): string
    {
    	return 'MCV '.$this->ot;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5, 'B' => 17, 'C' => 20, 'D' => 25, 'E' => 15, 'F' => 17, 'G' => 30, 'H' => 15, 'I' => 15, 'J' => 8, 'K' => 8, 'L' => 25
        ];
    }
    
    public function startCell(): string
    {
        return 'A1';
    }


}
