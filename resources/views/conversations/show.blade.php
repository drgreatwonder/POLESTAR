@extends('layouts.app')

@section('content')

<div class="card my-5">

        <div class="card-header">
        <img src="{{ '../avatars/' . $c->user->avatar }}" alt="" width="40px" height="40px">&nbsp; &nbsp; &nbsp;

        <span> {{ $c->user->name }}, <b>({{ $c->user->points." ".'points' }})</b></span>

            {{-- <span> {{ $c->user->name }}, {{ $c->created_at->diffForHumans() }}</span> --}}

        {{-- <span><a href=" {{ route('conversation', ['slug' => $c->slug ])}} " class="btn btn-success float-right">watch</a></span> --}}

        @if($c->is_being_watched_by_auth_user())

        <span><a href="{{ route('conversation.unwatch', ['id' => $c->id ])}}" class="btn btn-success float-right">unwatch</a></span>

        @else

        <span><a href="{{ route('conversation.watch', ['id' => $c->id ])}}" class="btn btn-success float-right">watch</a></span>

        @endif


    </div>

    <div class="card-body m-5">

        <h4 class="text-center">

            {{ $c->title }}
        </h4>

        <hr>

        <p class="text-center">

            {{ $c->content }}
        </p>

        <hr>


        @if($best_answer)

        <div class="text-center p-3">

            <h4 class="text-center">BEST ANSWER</h4>

            <div class="card card-success p-3">

                <div class="card-heading p-2">

                    <img src="{{ '../avatars/' . $best_answer->user->avatar }}" alt="" width="40px" height="40px">&nbsp; &nbsp; &nbsp;

                    <span> {{ $best_answer->user->name }}<b class="pl-1">({{ $best_answer->user->points." ".'points' }})</b></span>
                </div>

                <div class="card-body">

                    {{$best_answer->content}}
                </div>
            </div>
        </div>

        {{-- <a href="{{ route('response.best.answer', ['id' => $r->id])}}" class="btn btn-info float-right">Mark as best answer</a> --}}

        @endif
    </div>
    <div class="card-footer">

            <p>
                    <span class="float-right">{{ $c->created_at->diffForHumans() }}</span>

                {{-- {{ count($c->responses) }} Responses or the one below--}}

                {{-- {{ $c->responses->count() }} Responses --}}


            </p>
        </div>
</div>

@foreach ($c->responses as $r)

<div class="card my-5">

        <div class="card-header">
        <img src="{{ '../avatars/' . $r->user->avatar }}" alt="" width="40px" height="40px">&nbsp; &nbsp; &nbsp;

        {{-- <span> {{ $r->user->name }} <b>{{ $r->created_at->diffForHumans() }} </span><b>({{ $c->user->points." ".'points' }})</b> --}}

        <span> {{ $r->user->name }}, <b>({{ $r->user->points." ".'points' }})</b></span>

        @if(!$best_answer)

            @if(Auth::id() == $c->user->id)

        <a href="{{ route('response.best.answer', ['id' => $r->id])}}" class="btn btn-info float-right">Mark as best answer</a>

            @endif
        @endif

    </div>

    <div class="card-body m-5">

        <p class="text-center">

            {{ $r->content }}
        </p>

    </div>
    <div class="card-footer">

            <p>
                    <span class="float-right">{{ $c->created_at->diffForHumans() }}</span>

            <span class="float-left">

                @if($r->is_liked_by_auth_user())

            <a href="{{ route('response.unlike', ['id' => $r->id]) }}" class="btn btn-danger">Unlike<span class="badge badge-light ml-1">{{ $r->likes->count() }}</span></a>

                @else

                    <a href="{{ route('response.like', ['id' => $r->id]) }}" class="btn btn-success">Like<span class="badge badge-light ml-1">{{ $r->likes->count() }}</span></a>

                    {{-- <span class="badge">{{ $r->likes->count()</span> --}}
                @endif
            </span>

        </p>
        </div>
</div>
@endforeach

<div class="card my-5">

        <div class="card-header">

                <div class="card-body m-5">

                    @if(Auth::check())

                    <form action="{{ route('conversation.response', ['id' => $c->id ])}}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">

                                <label for="response">Leave a Response</label>

                                <textarea name="response" id="response" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                            <div class="form-group">

                                <div class="text-center">
                                    <button class="btn float-right btn-success">Leave a Response</button>
                                </div>
                            </div>
                            </form>

                    @else

                    <div class="text-center">

                        <h2>Sign In to Leave a Response</h2>
                    </div>

                    @endif
                    {{-- <form action="{{ route('conversation.response', ['id' => $c->id ])}}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">

                        <label for="response">Leave a Response</label>

                        <textarea name="response" id="response" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">

                        <div class="text-center">
                            <button class="btn float-right">Leave a Response</button>
                        </div>
                    </div>
                    </form> --}}

                </div>

        </div>

</div>
@endsection
