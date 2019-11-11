@extends('layouts.app')

@section('content')

<div class="card my-5">

        <div class="card-header">
        <img src="{{ '../avatars/' . $c->user->avatar }}" alt="" width="40px" height="40px">&nbsp; &nbsp; &nbsp;

        <span> {{ $c->user->name }}, <b>{{ $c->created_at->diffForHumans() }} </span>

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

    </div>
    <div class="card-footer">

            <p>

                {{-- {{ count($c->responses) }} Responses or the one below--}}

                {{-- {{ $c->responses->count() }} Responses --}}


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
