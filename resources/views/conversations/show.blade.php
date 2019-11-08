@extends('layouts.app')

@section('content')

<div class="card my-5">

        <div class="card-header">
        <img src="{{ '../avatars/' . $c->user->avatar }}" alt="" width="40px" height="40px">&nbsp; &nbsp; &nbsp;

        <span> {{ $c->user->name }}, <b>{{ $c->created_at->diffForHumans() }} </span>

        <span><a href=" {{ route('conversation', ['slug' => $c->slug ])}} " class="btn btn-success float-right">view</a></span>


    </div>

    <div class="card-body m-5">

        <h4 class="text-center">

            {{ $c->title }}
        </h4>

        <hr>

        <p class="text-center">

            {{ $c->content }}
        </p>

    </div>
    <div class="card-footer">

            <p>

                {{-- {{ count($c->responses) }} Responses or the one below--}}

                {{ $c->responses->count() }} Responses
            </p>
        </div>
</div>

@foreach ($c->responses as $r)

<div class="card my-5">

        <div class="card-header">
        <img src="{{ '../avatars/' . $r->user->avatar }}" alt="" width="40px" height="40px">&nbsp; &nbsp; &nbsp;

        <span> {{ $r->user->name }}, <b>{{ $r->created_at->diffForHumans() }} </span>

        {{-- <span><a href=" {{ route('conversation', ['slug' => $c->slug ])}} " class="btn btn-success float-right">view</a></span> --}}


    </div>

    <div class="card-body m-5">

        {{-- <h4 class="text-center">

            {{ $r->content }}
        </h4>

        <hr> --}}

        <p class="text-center">

            {{ $r->content }}
        </p>

    </div>
    <div class="card-footer">

            <p>

                like
            </p>
        </div>
</div>
@endforeach
@endsection
