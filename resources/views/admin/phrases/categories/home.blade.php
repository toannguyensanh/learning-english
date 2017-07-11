@extends('layouts.admin')

@section('title', 'Admin Page Categories Phrases')

@section('title-page', 'Categories Phrases')

@section('breadcrumb')
<li>
    <a href="/admin">Admin</a>
</li>
<li>
    <strong>Categories Phrases</strong>
</li>
@endsection

@section('body_class', 'admin-categories-phrases-page')

@section('content')

<div class="ibox-content">

	<a href="/admin/cat-phrases/create" class="btn btn-primary btn-lg" style="margin-bottom: 20px;">Add Categories</a>

	<table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Alias</th>
                <th>Description</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        	@foreach ($cat_phrases as $cat)
				<tr>
					<td>{{$cat->id}}</td>
					<td>{{$cat->name}}</td>
					<td>{{$cat->alias}}</td>
                    <td>{{$cat->description}}</td>
					<td>
						<a href="/admin/cat-phrases/edit/{{$cat->id}}" class="btn btn-success">Edit</a>
						<a href="/admin/cat-phrases/delete/{{$cat->id}}" class="btn btn-danger">Delete</a>
					</td>
				</tr>
			@endforeach
        </tbody>
    </table>
</div>

@endsection