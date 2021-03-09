<div class="form-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
    <label for="tipo" class="control-label">{{ 'Tipo' }}</label>
    <select name="tipo" class="form-control" id="tipo" >
    @foreach (json_decode('{"abierto":"Factura"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($alquiler->tipo) && $alquiler->tipo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('detalle') ? 'has-error' : ''}}">
    <label for="detalle" class="control-label">{{ 'Detalle' }}</label>
    <input class="form-control" name="detalle" type="text" id="detalle" value="{{ isset($alquiler->detalle) ? $alquiler->detalle : ''}}" >
    {!! $errors->first('detalle', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('monto') ? 'has-error' : ''}}">
    <label for="monto" class="control-label">{{ 'Monto' }}</label>
    <input class="form-control" name="monto" type="number" id="monto" value="{{ isset($alquiler->monto) ? $alquiler->monto : ''}}" >
    {!! $errors->first('monto', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('saldo') ? 'has-error' : ''}}">
    <label for="saldo" class="control-label">{{ 'Saldo' }}</label>
    <input class="form-control" name="saldo" type="number" id="saldo" value="{{ isset($alquiler->saldo) ? $alquiler->saldo : ''}}" >
    {!! $errors->first('saldo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    <label for="fecha" class="control-label">{{ 'Fecha' }}</label>
    <input class="form-control" name="fecha" type="date" id="fecha" value="{{ isset($alquiler->fecha) ? $alquiler->fecha : ''}}" >
    {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idcontrato') ? 'has-error' : ''}}">
    <label for="idcontrato" class="control-label">{{ 'Idcontrato' }}</label>
    <select class="form-control" name="idcontrato">
      @foreach ($contratos as $cont)
        <option value="{{ $cont->id }}" {{ $cont->id === (isset($alquiler->idcontrato)?$alquiler->idcontrato:'') ? 'selected': ''}} >{{ $cont->id }}</option>
      @endforeach

    </select>
    {!! $errors->first('idcontrato', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idinmueble') ? 'has-error' : ''}}">
    <label for="idinmueble" class="control-label">{{ 'Idinmueble' }}</label>
    <select class="form-control" name="idinmueble">
      @foreach ($inmuebles as $inm)
        <option value="{{ $inm->id }}" {{ $inm->id === (isset($alquiler->idinmueble)?$alquiler->idinmueble:'') ? 'selected': ''}} >{{ $inm->Codigo }}</option>
      @endforeach

    </select>
    {!! $errors->first('idinmueble', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
