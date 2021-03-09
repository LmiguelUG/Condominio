<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($language->name) ? $language->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('extension') ? 'has-error' : ''}}">
    <label for="extension" class="control-label">{{ 'Extension' }}</label>
    <input class="form-control" name="extension" type="text" id="extension" value="{{ isset($language->extension) ? $language->extension : ''}}" required>
    {!! $errors->first('extension', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
