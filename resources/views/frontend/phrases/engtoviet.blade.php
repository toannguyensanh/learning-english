@extends('layouts.frontend')

@section('title','Learn Phrase Page - English to Vietnamese')

@section('add-style')

    <style>
        audio {
            width: 140px;
            max-width: 100%;
        }
    </style>
@endsection

@section('body_class', 'phrase-english-to-vietnamese')

@section('content')

<div class="row">
    <div class="col-md-9">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h1 class="text-center">Learn Phrase: English to Vietnamese</h1>
            </div>
            <div class="ibox-content form-horizontal">
                
                @foreach ($phrases as $phrase)    
                    <div class="form-group">
                        <label class="col-sm-12">{{ $phrase->english }}</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control input-content">
                            <input type="hidden" class="input-result" value="{{ $phrase->vietnamese }}">
                        </div>
                        <div class="col-sm-2">
                            <audio controls controlsList="nodownload">
                                <source src="/public{{ $phrase->audio_normal }}" type="audio/mpeg">
                            </audio>
                        </div>
                        <div class="col-sm-2">
                            <strong class="hidden hide-check-true">TRUE</strong>
                            <strong class="hidden hide-check-false">FALSE</strong>
                        </div>
                        <label class="col-sm-12 hide-result hidden">Result: <span>{{ $phrase->vietnamese }}</span></label>
                    </div>
                    <div class="hr-line-dashed"></div>
                @endforeach

                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-success dim" type="button" id="button-check-result">Check</button>
                        <button class="btn btn-primary dim hidden" type="button" id="button-show-result">Show Result</button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="ibox-content">
            <h3>Phrases</h3>
            <ul class="folder-list sidebar-list" style="padding: 0">
                <li><a href="/phrases"><i class="fa fa-hand-o-right"></i> All Phrases</a></li>
                <li><a href="/phrases/storgage"><i class="fa fa-hand-o-right"></i> Phrases Storgage</a></li>
                <li class="active">
                    <span><i class="fa fa-hand-o-right"></i> Learn Phrases</span>
                    <ul>
                        <li class="active"><a href="/phrases/learn/engtoviet"><i class="fa fa-hand-o-right"></i> Englist to Vietnamese</a></li>
                        <li><a href="/phrases/learn/viettoeng"><i class="fa fa-hand-o-right"></i> Vietnamese to English</a></li>
                    </ul>
                </li>
            </ul>
            <div class="hr-line-dashed"></div>
            <h3>Words</h3>
            <ul class="folder-list sidebar-list" style="padding: 0">
                <li><a href="#"><i class="fa fa-hand-o-right"></i> All words</a></li>
                <li><a href="#"><i class="fa fa-hand-o-right"></i> Words storgage</a></li>
                <li><a href="#"><i class="fa fa-hand-o-right"></i> Learn Words</a></li>
            </ul>
        </div>
    </div>
</div>

@endsection

@section('add-script')

    
@endsection