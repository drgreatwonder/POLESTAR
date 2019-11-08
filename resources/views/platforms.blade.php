@extends('layouts.app')

@section('content')
<div class="container">


 @foreach($conversation as $c)

 <div class="card my-5">

        <div class="card-header">
        <img src="{{ $c->user }}" alt="" width="70px" height="70px">
    </div>

    <div class="card-body">

        {{ $c->content }}
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
