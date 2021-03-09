<div class="form-group {{ $errors->has('idinquilino') ? 'has-error' : ''}}">
    <label for="idinquilino" class="control-label">{{ 'Idinquilino' }}</label>
    <select class="form-control" name="idinquilino">
      @foreach ($inquilinos as $inq)
        <option value="{{ $inq->id }}" {{ $inq->id === (isset($cuentascobrar->idinquilino)?$cuentascobrar->idinquilino:'') ? 'selected': ''}} >{{ $inq->nombre }}</option>
      @endforeach

    </select>
    {!! $errors->first('idinquilino', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idcontrato') ? 'has-error' : ''}}">
    <label for="idcontrato" class="control-label">{{ 'Idcontrato' }}</label>
    <select class="form-control" name="idcontrato">
      @foreach ($contratos as $cont)
        <option value="{{ $cont->id }}" {{ $cont->id === (isset($cuentascobrar->idcontrato)?$cuentascobrar->idcontrato:'') ? 'selected': ''}} >{{ $cont->id }}</option>
      @endforeach

    </select>
    {!! $errors->first('idcontrato', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idalquiler') ? 'has-error' : ''}}">
    <label for="idalquiler" class="control-label">{{ 'Idalquiler' }}</label>
    <select class="form-control" name="idalquiler">
      @foreach ($alquilers as $alq)
        <option value="{{ $alq->id }}" {{ $alq->id === (isset($cuentascobrar->idalquiler)?$cuentascobrar->idalquiler:'') ? 'selected': ''}} >{{ $alq->id }}</option>
      @endforeach

    </select>
    {!! $errors->first('idalquiler', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
