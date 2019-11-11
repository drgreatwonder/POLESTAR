@extends('layouts.app')

@section('content')
<div class="container">


 @foreach($conversation as $c)

 <div class="card my-5">

        <div class="card-header">
        <img src="{{ '../avatars/' . $c->user->avatar }}" alt="" width="40px" height="40px">&nbsp; &nbsp; &nbsp;

        <span> {{ $c->user->name }}, <b>{{ $c->created_at->diffForHumans() }} </span>



        @if($c->hasBestAnswer())

        <span class="btn float-right btn-danger ml-2">Concluded</span>

        @else

        <span class="btn float-right btn-info ml-2">OPEN</span>

        @endif

        <span><a href=" {{ route('conversation', ['slug' => $c->slug ])}} " class="btn btn-success float-right">view</a></span>


    </div>

    <div class="card-body m-5">

        <h4 class="text-center">

            {{ $c->title }}
        </h4>

        <p class="text-center">
            {{ str_limit($c->content, 100)}}
        </p>
        {{-- {{ $c->content }} --}}
    </div>
    <div class="card-footer">

            <p>

                {{-- {{ count($c->responses) }} Responses or the one below--}}

                {{ $c->responses->count() }} Responses

                 <a href="{{ route('medium', ['slug' => $c->medium->slug])}}" class="float-right btn btn-default btn-success">{{ $c->medium->title}}</a>
            </p>


        </div>
</div>


@endforeach

{{ $conversation->links() }}
@endsection


{{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

    <div class="panel-heading">
            @foreach($conversation as $c)
        <img src="{{ $c->user->avatar }}" alt="" width="70px" height="70px">
    </div>
    @endforeach

                </div>
            </div>
        </div>
    </div>
</div> --}}
