<div class="form-group {{ $errors->has('idpropietario') ? 'has-error' : ''}}">
    <label for="idpropietario" class="control-label">{{ 'Idpropietario' }}</label>
    <select class="form-control" name="idpropietario">
      @foreach ($propietarios as $prop)
        <option value="{{ $prop->id }}" {{ $prop->id === (isset($cuentaspagar->idpropietario)?$cuentaspagar->idpropietario:'') ? 'selected': ''}} >{{ $prop->nombre }}</option>
      @endforeach

    </select>
    {!! $errors->first('idpropietario', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idcontrato') ? 'has-error' : ''}}">
    <label for="idcontrato" class="control-label">{{ 'Idcontrato' }}</label>
    <select class="form-control" name="idcontrato">
      @foreach ($contratos as $cont)
        <option value="{{ $cont->id }}" {{ $cont->id === (isset($cuentaspagar->idcontrato)?$cuentaspagar->idcontrato:'') ? 'selected': ''}} >{{ $cont->id }}</option>
      @endforeach

    </select>
    {!! $errors->first('idcontrato', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idalquiler') ? 'has-error' : ''}}">
    <label for="idalquiler" class="control-label">{{ 'Idalquiler' }}</label>
    <select class="form-control" name="idalquiler">
      @foreach ($alquilers as $alq)
        <option value="{{ $alq->id }}" {{ $alq->id === (isset($cuentaspagar->idalquiler)?$cuentaspagar->idalquiler:'') ? 'selected': ''}} >{{ $alq->id }}</option>
      @endforeach

    </select>
    {!! $errors->first('idalquiler', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
