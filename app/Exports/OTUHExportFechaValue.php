<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrdenTrabajoExportValue implements FromCollection, WithHeadings, WithStyles
{
    protected $ordenTrabajos;

    public function __construct($ordenTrabajos)
    {
        $this->ordenTrabajos = $ordenTrabajos;
    }

    public function collection()
    {
        $data = [];
        foreach ($this->ordenTrabajos as $orden_trabajo) {
            // Agregar la información de la orden de trabajo
            $data[] = [
                'codigo' => $orden_trabajo['codigo'],
                'equipo' => $orden_trabajo['equipo'],
                'descripcion_orden' => $orden_trabajo['descripcion_orden'],
                'fecha_i' => $orden_trabajo['fecha_i'],
                'fecha_f' => $orden_trabajo['fecha_f'],
                'centro_costo' => $orden_trabajo['centro_costo'],
                'status_sistema' => $orden_trabajo['status_sistema'],
                'ubicacion_tecnica' => $orden_trabajo['ubicacion_tecnica'],
                'suma_costo_plan' => $orden_trabajo['suma_costo_plan'],
                'autor' => $orden_trabajo['autor'],
                'nivel_importancia' => $orden_trabajo['nivel_importancia'],
                'rubro' => $orden_trabajo['rubro'],
                'categoria' => $orden_trabajo['categoria'],
                'responsable' => $orden_trabajo['responsable'],
                'estado' => $orden_trabajo['estado'],
                'porcentaje' => $orden_trabajo['porcentaje'],
                'orden_id' => $orden_trabajo['orden_id'],
            ];

            // Agregar los detalles si existen
            foreach ($orden_trabajo['dtlles'] as $dtlles_value) {
                $data[] = [
                    'usuario' => $dtlles_value['usuario'],
                    'hp' => $dtlles_value['hp'],
                    'hh' => $dtlles_value['hh'],
                    'hsh' => $dtlles_value['hsh'],
                    'codigo' => $dtlles_value['codigo'],
                    'producto' => $dtlles_value['producto'],
                    'umedida' => $dtlles_value['umedida'],
                    'cantidad' => $dtlles_value['cantidad'],
                    'cantidad_utilizada' => $dtlles_value['cantidad_utilizada'],
                    'cantidad_devuelta' => $dtlles_value['cantidad_devuelta'],
                    'pen' => $dtlles_value['pen'],
                ];
            }
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'CÓDIGO',
            'EQUIPO',
            'DESCRIPCIÓN DE LA OT',
            'FECHA I.',
            'FECHA F.',
            'CENTRO COSTO',
            'STATUS DEL SISTEMA',
            'UBICACIÓN TÉCNICA',
            'SUMA COSTO PLAN',
            'AUTOR',
            'NIVEL IMPORTANCIA',
            'RUBRO',
            'CATEGORÍA',
            'RESPONSABLE',
            'ESTADO',
            'PORCENTAJE',
            'ORDEN ID',
            'USUARIO',
            'HP',
            'HH',
            'HSH',
            'CÓDIGO DETALLE',
            'PRODUCTO',
            'UNIDAD DE MEDIDA',
            'CANTIDAD',
            'CANTIDAD UTILIZADA',
            'CANTIDAD DEVUELTA',
            'PEN',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:Z1')->getFont()->setBold(true);
        $sheet->getStyle('A1:Z1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID); //color solido
        $sheet->getStyle('A1:Z1')->getFill()->getStartColor()->setARGB('FF116931'); //tonalidad de color en rgb
        return [];
    }

}