@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Registros principales</div>

                    <div class="card-body">
                        <a href="admin/condominio" class="btn btn-primary mt-4">Condominio</a>
                        <a href="admin/inquilino" class="btn btn-primary mt-4">Inquilinos</a>
                        <a href="admin/propietario" class="btn btn-primary mt-4">Propietarios</a>
                        <a href="admin/inmueble" class="btn btn-primary mt-4">Inmuebles</a>
                        <a href="admin/contrato" class="btn btn-primary mt-4">Contratos</a>
                        <a href="admin/reserva" class="btn btn-primary mt-4">Reserva de Condominio</a>
                        <a href="admin/cuentas-cobrar" class="btn btn-primary mt-4">Cuentas por cobrar</a>
                        <a href="admin/cuentas-pagar" class="btn btn-primary mt-4 ">Cuentas por pagar</a>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header">Contratos/Reservas</div>

                    <div class="card-body">
                        <a href="admin/contrato" class="btn btn-primary mt-4">Contratos</a>
                        <a href="admin/reserva" class="btn btn-primary mt-4">Reserva de Condominio</a>
                        <a href="admin/alquiler" class="btn btn-primary mt-4">Alquiler</a>
                        <a href="admin/cuentas-cobrar" class="btn btn-primary mt-4">Cuentas por cobrar</a>
                        <a href="admin/cuentas-pagar" class="btn btn-primary mt-4 ">Cuentas por pagar</a>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header">Reportes de cuentas a pagar</div>

                    <div class="card-body">
                        <a href="admin/cuentas-cobrar" class="btn btn-primary mt-4">Cuentas por cobrar</a>
                        <a href="admin/cuentas-pagar" class="btn btn-primary mt-4 ">Cuentas por pagar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
