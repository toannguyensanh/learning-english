@extends('layouts.frontend')

@section('title','Learn Words Page - English to Vietnamese')

@section('add-style')

    <link href="{{URL::asset('public/assets/css/icheck.css')}}" rel="stylesheet">

    <style>
        audio {
            width: 140px;
            max-width: 100%;
        }
    </style>
@endsection

@section('body_class', 'word-english-to-vietnamese')

@section('content')

<div class="row">
    <div class="col-md-9">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h1 class="text-center">Learn Word: English to Vietnamese</h1>
            </div>
            <div class="ibox-content form-horizontal">
                
                @foreach ($words as $word)    
                    <div class="form-group">
                        <label class="col-sm-12">{{ $word->english }}</label>
                        <div class="col-sm-8 quest-item">
                            @php $arr_result = App\Http\Controllers\Frontend\WordController::get_four_words($word->id); @endphp
                            @foreach ($arr_result as $val)
                                <label class="checkbox-inline i-checks">
                                    <input type="radio" name="word_{{ $word->id }}" value="{{$val->vietnamese}}"> {{$val->vietnamese}} </label>
                            @endforeach
                            <!-- <input type="text" class="form-control input-content"> -->
                            <input type="hidden" class="input-result" value="{{ $word->vietnamese }}">
                        </div>
                        <div class="col-sm-2">
                            <audio controls controlsList="nodownload">
                                <source src="/public{{ $word->audio }}" type="audio/mpeg">
                            </audio>
                        </div>
                        <div class="col-sm-2">
                            <strong class="hidden hide-check-true">TRUE</strong>
                            <strong class="hidden hide-check-false">FALSE</strong>
                        </div>
                        <label class="col-sm-12 hide-result hidden m-t">Result: <span>{{ $word->vietnamese }}</span></label>
                    </div>
                    <div class="hr-line-dashed"></div>
                @endforeach

                <div class="form-group">
                    <div class="col-sm-5 col-sm-offset-2">
                        <button class="btn btn-success dim" type="button" id="button-check-result-word">Check</button>
                        <button class="btn btn-primary dim hidden" type="button" id="button-show-result">Show Result</button>
                        <label class="m-l" id="show-result-total"></label>
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
                <li>
                    <span><i class="fa fa-hand-o-right"></i> Learn Phrases</span>
                    <ul>
                        <li><a href="/phrases/learn/engtoviet"><i class="fa fa-hand-o-right"></i> Englist to Vietnamese</a></li>
                        <li><a href="/phrases/learn/viettoeng"><i class="fa fa-hand-o-right"></i> Vietnamese to English</a></li>
                    </ul>
                </li>
            </ul>
            <div class="hr-line-dashed"></div>
            <h3>Words</h3>
            <ul class="folder-list sidebar-list" style="padding: 0">
                <li><a href="/word"><i class="fa fa-hand-o-right"></i> All words</a></li>
                <li><a href="/word/storgage"><i class="fa fa-hand-o-right"></i> Words storgage</a></li>
                <li>
                    <span><i class="fa fa-hand-o-right"></i> Learn Word</span>
                    <ul>
                        <li class="active"><a href="/word/learn/engtoviet"><i class="fa fa-hand-o-right"></i> Englist to Vietnamese</a></li>
                        <li><a href="/word/learn/viettoeng"><i class="fa fa-hand-o-right"></i> Vietnamese to English</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection

@section('add-script')
    <!-- Datatables -->
    <script src="{{URL::asset('public/assets/js/icheck.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
    
@endsection