<div class="form-group {{ $errors->has('idcondominio') ? 'has-error' : ''}}">
    <label for="idcondominio" class="control-label">{{ 'Idcondominio' }}</label>
    <select class="form-control" name="idcondominio">
      @foreach ($condominios as $cond)
        <option value="{{ $cond->id }}" {{ $cond->id === (isset($reserva->idcondominio)?$reserva->idcondominio:'') ? 'selected': ''}} >{{ $cond->nombre }}</option>
      @endforeach

    </select>
    {!! $errors->first('idcondominio', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cuota') ? 'has-error' : ''}}">
    <label for="cuota" class="control-label">{{ 'Cuota' }}</label>
    <input class="form-control" name="cuota" type="number" id="cuota" value="{{ isset($reserva->cuota) ? $reserva->cuota : ''}}" >
    {!! $errors->first('cuota', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
