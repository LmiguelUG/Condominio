<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <select name="status" class="form-control" id="status" >
    @foreach (json_decode('{"abierto":"Abierto","cerrado":"Cerrado"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($contrato->status) && $contrato->status == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idinmueble') ? 'has-error' : ''}}">
    <label for="idinmueble" class="control-label">{{ 'Idinmueble' }}</label>
    <select class="form-control" name="idinmueble">
      @foreach ($inmuebles as $inm)
        <option value="{{ $inm->id }}" {{ $inm->id === (isset($contrato->idinmueble)?$contrato->idinmueble:'') ? 'selected': ''}} >{{ $inm->Codigo }}</option>
      @endforeach

    </select>
    {!! $errors->first('idinmueble', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idinquilino') ? 'has-error' : ''}}">
    <label for="idinquilino" class="control-label">{{ 'Idinquilino' }}</label>
    <select class="form-control" name="idinquilino">
      @foreach ($inquilinos as $inq)
        <option value="{{ $inq->id }}" {{ $inq->id === (isset($contrato->idinquilino)?$contrato->idinquilino:'') ? 'selected': ''}} >{{ $inq->nombre }}</option>
      @endforeach

    </select>
    {!! $errors->first('idinquilino', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('desde') ? 'has-error' : ''}}">
    <label for="desde" class="control-label">{{ 'Desde' }}</label>
    <input class="form-control" name="desde" type="date" id="desde" value="{{ isset($contrato->desde) ? $contrato->desde : ''}}" >
    {!! $errors->first('desde', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('hasta') ? 'has-error' : ''}}">
    <label for="hasta" class="control-label">{{ 'Hasta' }}</label>
    <input class="form-control" name="hasta" type="date" id="hasta" value="{{ isset($contrato->hasta) ? $contrato->hasta : ''}}" >
    {!! $errors->first('hasta', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
