@extends('layouts.frontend')

@section('title','HomePage')

@section('body_class', 'homepage')

@section('content')

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

            <div>
                <a href="/phrases" class="btn btn-success btn-lg">Learn Phrase</a>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h1 class="text-center">1000 Most Common English Words</h1>
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
                    @php $j = 1; @endphp
                    @foreach ($words as $word)
                        <tr>
                            <td>{{ $j }}</td>
                            <td>{{ $word->english }}</td>
                            <td>{{ $word->vietnamese }}</td>
                            <td>
                                <audio controls controlsList="nodownload">
                                    <source src="/public/{{ $word->audio }}" type="audio/mpeg">
                                </audio>
                            </td>
                        </tr>
                        @php $j++; @endphp
                    @endforeach
                </tbody>
            </table>
            <div>{{ $phrases->links() }}</div>

            <div>
                <a href="/word" class="btn btn-success btn-lg">Learn Word</a>
            </div>
        </div>
    </div>
</div>

@endsection