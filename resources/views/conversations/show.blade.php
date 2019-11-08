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


    </div>

    <div class="card-body m-5">

        <p class="text-center">

            {{ $r->content }}
        </p>

    </div>
    <div class="card-footer">

            <p>
                @if($r->is_liked_by_auth_user())

                <a href="{{ route('response.unlike', ['id' => $r->id ]) }}" class="btn btn-danger btn-xs">Unlike<span class="badge">{{ $r->likes->count()}}</span></a>

                @else

                <a href="{{ route('response.like', ['id' => $r->id ]) }}" class="btn btn-success">Like <span class="badge">{{ $r->likes->count()}}</span></a>

                @endif
            </p>
        </div>
</div>
@endforeach

<div class="card my-5">

        <div class="card-header">

                <div class="card-body m-5">

                    <form action="{{ route('conversation.response', ['id' => $c->id ])}}" method="post">
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
                    </form>

                </div>

        </div>

</div>
@endsection
