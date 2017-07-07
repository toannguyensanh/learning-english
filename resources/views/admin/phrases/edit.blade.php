@extends('layouts.admin')

	@php $phrase = isset($phrase) ? $phrase : false ; @endphp

@section('title')
	 Admin Page {{ $phrase ? "Edit" : "Create" }}  Phrases
@endsection

@section('title-page')
	{{ $phrase ? "Edit" : "Create" }} Phrases
@endsection

@section('breadcrumb')
<li>
    <a href="/admin">Admin</a>
</li>
<li>
    <a href="/admin/phrase">Phrases</a>
</li>
<li>
    <strong>{{ $phrase ? "Edit" : "Create" }}</strong>
</li>
@endsection

@section('body_class')
	admin-{{ $phrase ? "edit" : "create" }}-phrases-page
@endsection

@section('content')

<div class="ibox-content">

	

	<form method="post" class="form-horizontal" action="/admin/phrases/update">

		{{ csrf_field() }}

		<input type="hidden" name="id" value="{{ $phrase ? $phrase->id : '' }}">

	    <div class="form-group">
	        <label class="col-sm-2 control-label">English</label>
	        <div class="col-sm-10">
	            <input type="text" name="english" class="form-control" value="{{ old('english') ? old('english') : $phrase ? $phrase->english : '' }}" required>
	        </div>
	    </div>
	    <div class="hr-line-dashed"></div>

	    <div class="form-group">
	        <label class="col-sm-2 control-label">Vietnamese</label>
	        <div class="col-sm-10">
	            <input type="text" name="vietnamese" value="{{ old('vietnamese') ? old('vietnamese') : $phrase ? $phrase->vietnamese : '' }}" class="form-control" required>
	        </div>
	    </div>
	    <div class="hr-line-dashed"></div>

	    <div class="form-group">
	        <label class="col-sm-2 control-label">Alias</label>
	        <div class="col-sm-10">
	            <input type="text" name="alias" value="{{ old('alias') ? old('alias') : $phrase ? $phrase->alias : '' }}" class="form-control" required>
	        </div>
	    </div>
	    <div class="hr-line-dashed"></div>

	    <div class="form-group">
	        <label class="col-sm-2 control-label">Audio slow</label>
	        <div class="col-sm-10 wrapper-file-upload" data-cat="audio">
	            <div class="input-group">
		            <input type="text" name="audio_slow" value="{{ old('audio_slow') ? old('audio_slow') : $phrase ? $phrase->audio_slow : '' }}" class="form-control url_file_upload" id="url_file_upload" readonly>
		            <span class="input-group-btn">
		            	@php $url = asset('/Filemanager/index.html'); @endphp
		            	<button type="button" class="btn btn-success" onclick="BrowseServer('{{$url}}', 'url_file_upload');"><i class="fa fa-upload"></i></button> 
		            </span>
		            <span class="input-group-btn">
		            	<button type="button" class="btn btn-danger delete_url_file_upload"><i class="fa fa-times"></i></button> 
		            </span>
	            </div>
	        </div>
	    </div>
	    <div class="hr-line-dashed"></div>

	    <div class="form-group">
	        <label class="col-sm-2 control-label">Audio normal</label>
	        <div class="col-sm-10 wrapper-file-upload" data-cat="audio">
	            <div class="input-group">
		            <input type="text" name="audio_normal" value="{{ old('audio_normal') ? old('audio_normal') : $phrase ? $phrase->audio_normal : '' }}" class="form-control url_file_upload" id="url_file_upload_2" readonly>
		            <span class="input-group-btn">
		            	@php $url = asset('/Filemanager/index.html'); @endphp
		            	<button type="button" class="btn btn-success" onclick="BrowseServer('{{$url}}', 'url_file_upload_2');"><i class="fa fa-upload"></i></button> 
		            </span>
		            <span class="input-group-btn">
		            	<button type="button" class="btn btn-danger delete_url_file_upload"><i class="fa fa-times"></i></button> 
		            </span>
	            </div>
	        </div>
	    </div>
	    <div class="hr-line-dashed"></div>

	    <div class="form-group">
	        <label class="col-sm-2 control-label">Filter</label>
	        <div class="col-sm-10">
	            <input type="text" name="filter" value="{{ old('filter') ? old('filter') : $phrase ? $phrase->filter : '' }}" class="form-control">
	        </div>
	    </div>
	    <div class="hr-line-dashed"></div>

	    <div class="form-group">
	        <div class="col-sm-4 col-sm-offset-2">
	        	<a href="/admin/role"><button class="btn btn-default dim" type="button">Back</button></a>
	            <button class="btn btn-primary dim" type="submit">Save changes</button>
	        </div>
	    </div>
	</form>
</div>

@endsection