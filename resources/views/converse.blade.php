@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header text-center">Create a New Conversation</div>
               <div class="card-body">
                   @if (session('status'))
                       <div class="alert alert-success" role="alert">
                           {{ session('status') }}
                       </div>
                   @endif
                   <form action="{{ route('conversations.store') }}" method="post">
                       {{ csrf_field() }}
                       <div class="form-group">
                           <label for="title">Title</label>
                           <input type="text" name="title" value="{{old('title')}}" class="form-control">
                       </div>
                       <div class="form-group">
                           <label for="medium">Pick a PlatForm</label>
                           <select name="medium_id" id="medium_id" class="form-control">
                               @foreach ($medium as $media)
                               <option value="{{ $media->id }}">
                                   {{ $media->title }}
                               </option>
                               @endforeach
                           </select>
                       </div>
                       <div class="form-group">
                           <label for="content">Ask a Question</label>
                           <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{old('content')}}</textarea>
                       </div>
                       <div class="form-group">
                           <button class="btn btn-success float-right" type="submit">Create Conversation</button>
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
