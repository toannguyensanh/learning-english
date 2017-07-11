@extends('layouts.admin')

@section('title', 'Admin Page Phrases')

@section('title-page', 'Phrases')

@section('breadcrumb')
<li>
    <a href="/admin">Admin</a>
</li>
<li>
    <strong>Phrases</strong>
</li>
@endsection

@section('body_class', 'admin-phrases-page')

@section('content')

<div class="ibox-content">

	<a href="/admin/phrases/create" class="btn btn-primary btn-lg" style="margin-bottom: 20px;">Add Phrases</a>

	<table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>English</th>
                <th>Vietnamese</th>
                <th>Categories</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        	@foreach ($phrases as $phrase)
				<tr>
					<td>{{$phrase->id}}</td>
					<td>{{$phrase->english}}</td>
					<td>{{$phrase->vietnamese}}</td>
					<td>
						@php 
							$cat = $phrase->Categories_phrases;
						@endphp
						<p>{{ $cat->name }}</p>
					</td>
					<td>
						<a href="/admin/phrases/edit/{{$phrase->id}}" class="btn btn-success">Edit</a>
						<a href="/admin/phrases/delete/{{$phrase->id}}" class="btn btn-danger">Delete</a>
					</td>
				</tr>
			@endforeach
        </tbody>
    </table>
</div>

@endsection