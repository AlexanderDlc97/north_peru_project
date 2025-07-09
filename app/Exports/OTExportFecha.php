<?php

namespace App\Exports;

use App\Models\Detalleprogreso;
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
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class OTExportFecha implements WithMultipleSheets
{
    use Exportable;
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Otrabajo::all();
    // }

    protected $fi , $ff, $fi_i, $ff_f, $now;

    public function __construct($fi, $ff, $fi_i, $ff_f, $now)
    {
        $this->inicio = $fi;
        $this->fin = $ff;
        $this->inicio_i = $fi_i;
        $this->fin_f = $ff_f;
        $this->now = $now;
    }

    public function sheets(): array
    {
        $filtro_fi = $this->inicio;
        $filtro_ff = $this->fin;
        $filtro_fi_i = $this->inicio_i;
        $filtro_ff_f = $this->fin_f;
        $filtro_now = $this->now;

        $sheets = [];
        // Agregas las hojas
        array_push($sheets, new OTProgresoExport($filtro_fi, $filtro_ff, $filtro_fi_i, $filtro_ff_f, $filtro_now));
        array_push($sheets, new OTHorasOpExport($filtro_fi, $filtro_ff, $filtro_fi_i, $filtro_ff_f, $filtro_now));
        array_push($sheets, new OTMaterialesExport($filtro_fi, $filtro_ff, $filtro_fi_i, $filtro_ff_f, $filtro_now));
        return $sheets;
    }
}
