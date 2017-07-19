@extends('layouts.frontend')

@section('title','HomePage')

@section('body_class', 'homepage')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h1 class="text-center">1000 Most Common English Phrases</h1>
            </div>
            <div class="ibox-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>English</th>
                            <th>Vietnamese</th>
                            <th>Audio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($phrases as $phrase)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $phrase->english }}</td>
                                <td>{{ $phrase->vietnamese }}</td>
                                <td>
                                    <audio controls controlsList="nodownload">
                                        <source src="/public/{{ $phrase->audio_normal }}" type="audio/mpeg">
                                    </audio>
                                </td>
                            </tr>
                            @php $i++; @endphp
                        @endforeach
                    </tbody>
                </table>
                <div>{{ $phrases->links() }}</div>
            </div>
        </div>
    </div>
</div>

@endsection