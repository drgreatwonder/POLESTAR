@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Platform: {{ $medium->title}} </div>
               <div class="card-body">
                   @if (session('status'))
                       <div class="alert alert-success" role="alert">
                           {{ session('status') }}
                       </div>
                   @endif
                   <form action="{{ route('medium.update', ['medium' => $medium->id ])}}" method="post">
                       {{ csrf_field()}}
                       {{ method_field('PUT')}}
                       <div class="form-group">
                           <input type="text" name="medium" value= "{{$medium->title}}" class="form-control">
                       </div>
                       <div class="form-group">
                           <div class="text-center">
                               <button class="btn btn-success" type="submit">
                                   Update Platform
                               </button>
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
@section('table')
<li class="list-group-item">
   {{ $medium->title }}
</li>
@endsection
