@extends('layouts.app')
@section('styles')
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        .pagination
        {
            display: none; !important;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard
                        <a class="btn btn-success btn-xs pull-right" href="{{ url('/') }}">Refresh</a>
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped table-hover no-margin">
                            <thead><tr>
                                <th class="col-md-1">#</th>
                                <th class="col-md-5">Text</th>
                                <th class="col-md-1">Retweet</th>
                                <th class="col-md-1">Fav</th>
                                <th class="col-md-3 text-right">Posted</th>
                            </tr></thead>
                            <tbody id="data-items">
                            @forelse($tweets as $tweet)
                                <tr class="item">
                                    <th>{{ $tweet->tw_id }}</th>
                                    <td>
                                        {!! Twitter::linkify($tweet->tw_text) !!}
                                    </td>
                                    <td>
                                        {{ $tweet->tw_retweet_count }}
                                    </td>
                                    <td>
                                        {{ $tweet->tw_favorite_count }}
                                    </td>
                                    <td class="text-right">
                                        {{--Twitter::ago($tweet->tw_created_at) --}}
                                        {{  $tweet->tw_created_at }}
                                    </td>
                                </tr>
                            @empty
                                Empty
                            @endforelse
                            </tbody>
                            </table>
                    </div>
                    {!! $tweets->appends(Request::except('page'))->render() !!}
                    <div id="loading" class="text-center"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            var loading_options = {
                selector: "#loading",
                finishedMsg: "<em>You've reached the end of Internet ;)</em>",
                msgText: "<em>Loading the next set of data…</em>"
            };

            /**
             * Infinite scroll call.
             */
            $('#data-items').infinitescroll({
                loading: loading_options,
                navSelector: ".pagination",
                nextSelector: ".pagination li.active + li a",
                itemSelector: "#data-items .item"
            });
        });
    </script>
@endsection