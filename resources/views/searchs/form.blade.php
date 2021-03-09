<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="control-label">{{ 'Date' }}</label>
    <input class="form-control" name="date" type="date" id="date" value="{{ isset($search->date) ? $search->date : ''}}" required>
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($search->user_id) ? $search->user_id : ''}}" required>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('keyword_id') ? 'has-error' : ''}}">
    <label for="keyword_id" class="control-label">{{ 'Keyword Id' }}</label>
    <input class="form-control" name="keyword_id" type="number" id="keyword_id" value="{{ isset($search->keyword_id) ? $search->keyword_id : ''}}" required>
    {!! $errors->first('keyword_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
