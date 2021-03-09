<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($keyword->name) ? $keyword->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('project_id') ? 'has-error' : ''}}">
    <label for="project_id" class="control-label">{{ 'Project Id' }}</label>
    <input class="form-control" name="project_id" type="number" id="project_id" value="{{ isset($keyword->project_id) ? $keyword->project_id : ''}}" required>
    {!! $errors->first('project_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
