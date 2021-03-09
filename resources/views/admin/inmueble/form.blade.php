<div class="form-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
    <label for="tipo" class="control-label">{{ 'Tipo' }}</label>
    <select name="tipo" class="form-control" id="tipo" >
    @foreach (json_decode('{"apartamento":"Apartamento","casa":"Casa","local":"Local"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($inmueble->tipo) && $inmueble->tipo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('alicuota') ? 'has-error' : ''}}">
    <label for="alicuota" class="control-label">{{ 'Alicuota' }}</label>
    <input class="form-control" name="alicuota" type="number" id="alicuota" value="{{ isset($inmueble->alicuota) ? $inmueble->alicuota : ''}}" >
    {!! $errors->first('alicuota', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Codigo') ? 'has-error' : ''}}">
    <label for="Codigo" class="control-label">{{ 'Codigo' }}</label>
    <input class="form-control" placeholder="Ingrese un codigo para identificar EJ: C01" name="Codigo" type="text" id="Codigo" value="{{ isset($inmueble->Codigo) ? $inmueble->Codigo : ''}}" >
    {!! $errors->first('Codigo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('condominio') ? 'has-error' : ''}}">
    <label for="condominio" class="control-label">{{ 'Condominio' }}</label>
    <select class="form-control" name="idcondominio">
      @foreach ($condominios as $cond)
        <option value="{{ $cond->id }}" {{ $cond->id === (isset($inmueble->idcondominio)?$inmueble->idcondominio:'') ? 'selected': ''}} >{{ $cond->nombre }}</option>
      @endforeach

    </select>

    {!! $errors->first('condominios', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('propietario') ? 'has-error' : ''}}">
    <label for="propietario" class="control-label">{{ 'Propietario' }}</label>
    <select class="form-control" name="idprop">
      @foreach ($propietarios as $prop)
        <option value="{{ $prop->id }}" {{ $prop->id === (isset($inmueble->idprop)?$inmueble->idprop:'') ? 'selected': ''}} >{{ $prop->nombre }}</option>
      @endforeach

    </select>

    {!! $errors->first('propietarios', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
