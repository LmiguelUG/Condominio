<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($propietario->nombre) ? $propietario->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
    <label for="telefono" class="control-label">{{ 'Telefono' }}</label>
    <input class="form-control" name="telefono" type="text" id="telefono" value="{{ isset($propietario->telefono) ? $propietario->telefono : ''}}" >
    {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('condominio') ? 'has-error' : ''}}">
    <label for="condominio" class="control-label">{{ 'Condominio' }}</label>
    <select class="form-control" name="idcondominio">
      @foreach ($condominios as $cond)
        <option value="{{ $cond->id }}" {{ $cond->id === (isset($propietario->idcondominio)?$propietario->idcondominio:'') ? 'selected': ''}} >{{ $cond->nombre }}</option>
      @endforeach

    </select>

    {!! $errors->first('condominio', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
