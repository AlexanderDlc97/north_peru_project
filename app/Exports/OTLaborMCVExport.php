<?php

namespace App\Exports;

use App\Models\Detallehorariot;
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

class OTLaborMCVExport implements FromView, WithDrawings,WithColumnWidths, WithCustomStartCell, WithTitle
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
        $horas_operarios = Detallehorariot::whereBetween('created_at', [$this->inicio,$this->fin])->get();
        return view('ADMINISTRADOR.REPORTES.seguimiento-ot.xlsx.labor_mcv', compact('horas_operarios', 'desde', 'hasta', 'fecha_actual'));
    }


    public function title(): string
    {
    	return 'LABOR POR CUENTAS';
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
