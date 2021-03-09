<div class="form-group {{ $errors->has('filename') ? 'has-error' : ''}}">
    <label for="filename" class="control-label">{{ 'Filename' }}</label>
    <input class="form-control" name="filename" type="text" id="filename" value="{{ isset($file->filename) ? $file->filename : ''}}" required>
    {!! $errors->first('filename', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('language_id') ? 'has-error' : ''}}">
    <label for="language_id" class="control-label">{{ 'Language Id' }}</label>
    <input class="form-control" name="language_id" type="number" id="language_id" value="{{ isset($file->language_id) ? $file->language_id : ''}}" required>
    {!! $errors->first('language_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('project_id') ? 'has-error' : ''}}">
    <label for="project_id" class="control-label">{{ 'Project Id' }}</label>
    <input class="form-control" name="project_id" type="number" id="project_id" value="{{ isset($file->project_id) ? $file->project_id : ''}}" required>
    {!! $errors->first('project_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
