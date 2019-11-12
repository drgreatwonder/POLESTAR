@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header text-center">Update a Response</div>
               <div class="card-body">
                   @if (session('status'))
                       <div class="alert alert-success" role="alert">
                           {{ session('status') }}
                       </div>
                   @endif
                   <form action="{{ route('response.update', ['id' => $response->id]) }}" method="post">
                       {{ csrf_field() }}

                       <div class="form-group">
                           <label for="content">Answer a Question</label>
                           <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $response->content }}</textarea>
                       </div>
                       <div class="form-group">
                           <button class="btn btn-success float-right" type="submit">Save Updated Response</button>
                       </div>
                   </form>
               </div>
           </div>

           <div class="py-4">

                @if($errors->count() > 0)

                <ul class="list-group-item">

                    @foreach($errors->all() as $error)

                        <li class="list-group-item text-danger">

                            {{ $error }}
                        </li>
                    @endforeach
                </ul>

                @endif
            </div>

       </div>
   </div>
</div>
@endsection
