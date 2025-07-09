@extends('TEMPLATE.administrador')

@section('title', 'DASHBOARD')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    th, td{
        border-collapse: collapse;
        border: 1px solid black;
        padding: 5px;
    }
    .chartjs-thead{
        font-weight: bold;
        text-align: center;
        font-size: 12px;
    }
    .chartjs-tbody{
        text-align: center;
    }
</style>
@endsection
 
@section('content')
<!-- Encabezado -->
    <div class="header_section">
        <div class="bg-transparent mb-3" style="height: 67px"></div>
        <div class="container-fluid">
            <div class="" data-aos="fade-right">
                <h1 class="titulo h2 text-uppercase fw-bold mb-0"> Dashboard</h1>
                <div class="" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none link" href="">Principal</a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none link" href="{{ url('admin-dashboard') }}">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<!-- Fin encabezado-->

{{-- Contenido --}}
    <div class="container-fluid">    
        <div class="row g-3 mb-3" id="cards_principal">
            <div class="col-6 col-md-6 col-lg-3">
                <div class="card border-0 rounded-0 shadow-sm">
                    <div class="row g-0">
                        <div class="col-3 bg-primary d-flex justify-content-center align-items-center" style="box-shadow: 5px 0 5px -4px #535151;">
                            <i class="fa-solid fa-users text-white fs-2"></i>
                        </div>
                        <div class="col-9">
                            <div class="card-body">
                                <p class="mb-1 fw-bold text-uppercase small text-muted">Empleados</p>
                                <p class="mb-0 text-end fs-5" id="report_cate">47</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3">
                <div class="card border-0 rounded-0 shadow-sm">
                    <div class="row g-0">
                        <div class="col-3 bg-primary d-flex justify-content-center align-items-center" style="box-shadow: 5px 0 5px -4px #535151;">
                            <i class="fa-solid fa-boxes-stacked text-white fs-2"></i>
                        </div>
                        <div class="col-9">
                            <div class="card-body">
                                <p class="mb-1 fw-bold text-uppercase small text-muted">Activos y Materiales</p>
                                <p class="mb-0 text-end fs-5" id="report_bi">1192</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3" id="cards_graficos">
            <div class="col-12 col-md-6">
                <div class="card border-0 rounded-0 shadow-sm">
                    <div class="card-header bg-transparent">
                        <div class="row g-2">
                            <div class="col-12 col-md-6 d-flex">
                                <span class="fw-bold align-self-center text-muted" style="font-size: 13px" id="titulo_ots">ORDENES DE TRABAJO - 2025</span>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text bg-white fw-bold" id="basic-addon1">AÑO</span>
                                    <select id="" class="form-select form-select-sm select2_bootstrap_2" data-placeholder="Seleccione" required>
                                        <option selected="selected" value="2025">2025</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="contenedor_ots1"><canvas id='chart_ot'></canvas></div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card border-0 rounded-0 shadow-sm">
                    <div class="card-header bg-transparent">
                        <div class="row g-2">
                            <div class="col-12 col-md-6 d-flex">
                                <span class="fw-bold align-self-center text-muted" style="font-size: 13px" id="titulo_cc">MATERIAL MÁS REQUERIDO - 2025</span>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text bg-white fw-bold" id="basic-addon1">AÑO</span>
                                    <select id="mes__id__ots_costo" class="form-select form-select-sm select2_bootstrap_2" data-placeholder="Seleccione" required>
                                        <option selected="selected" value="2025">2025</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="contenedor_ots2" class="chartbox"><canvas id="chart_mat"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- Fin contenido --}}
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    var venta_id = $('#report_cate').html();
    var compra_id = $('#report_bi').html();
    var caja_id = $('#report_esp').html();
    var bienes_id = $('#report_equip').html();
    var valor_sede = $('#sedes_ids_value').val();

    $('#empleados_id').val(venta_id);
    $('#acti_materia_id').val(compra_id);
    $('#espec_id').val(caja_id);
    $('#equipo_id').val(bienes_id);
    $('#sede_id').val(valor_sede);
</script>
<script>
    var meses_generales = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    var year = $('#year__id__total').val();
    var mes = $('#mes__id__ots').val();
    var valor_sede = $('#sedes_ids_value').val();

</script>



<script>
    const ctx = document.getElementById('chart_ot');

    new Chart(ctx, {
        type: 'bar',
        data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        datasets: [{
            label: 'OT POR MES',
            data: [120, 190, 30, 50, 20, 80, 10, 0, 0, 0, 0, 0],
            backgroundColor: [
                '#ab0c12',
                '#ab0c12',
                '#ab0c12',
                '#ab0c12',
                '#ab0c12',
                '#ab0c12',
                '#ab0c12',
                '#ab0c12',
                '#ab0c12',
                '#ab0c12',
                '#ab0c12',
                '#ab0c12'
            ],
            maxBarThickness:20,
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
    });
</script>

<script>
    const ctx1 = document.getElementById('chart_mat');

    new Chart(ctx1, {
        type: 'line',
        data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        datasets: [{
            label: 'OT POR MES',
            data: [100, 130, 120, 150, 28, 70, 10, 0, 0, 0, 0, 0],
            backgroundColor: [
                '#ab0c12',
                '#ab0c12',
                '#ab0c12',
                '#ab0c12',
                '#ab0c12',
                '#ab0c12',
                '#ab0c12',
                '#ab0c12',
                '#ab0c12',
                '#ab0c12',
                '#ab0c12',
                '#ab0c12'
            ],
            maxBarThickness:20,
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
    });
</script>
@endsection