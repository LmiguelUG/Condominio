@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">CuentasCobrar {{ $cuentascobrar->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/cuentas-cobrar') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/cuentas-cobrar/' . $cuentascobrar->id . '/edit') }}" title="Edit CuentasCobrar"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/cuentascobrar' . '/' . $cuentascobrar->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete CuentasCobrar" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $cuentascobrar->id }}</td>
                                    </tr>
                                    <tr><th> Idinquilino </th><td> {{ $cuentascobrar->idinquilino }} </td></tr><tr><th> Idcontrato </th><td> {{ $cuentascobrar->idcontrato }} </td></tr><tr><th> Idalquiler </th><td> {{ $cuentascobrar->idalquiler }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
