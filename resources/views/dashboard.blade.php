@extends('layouts.app')
@section('content')
<div class="container my-5">

    <!-- Card -->
<div class="card testimonial-card">

        <!-- Background color -->
        <div class="card-up indigo lighten-1"></div>

        <!-- Avatar -->
        <div class="avatar mx-auto white">
          <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%2810%29.jpg" class="rounded-circle" alt="woman avatar">
        </div>

        <!-- Content -->
        <div class="card-body">
          <!-- Name -->
          <h4 class="card-title">{{Auth::user()->name}}</h4>
          <hr>
          <!-- Quotation -->
          <label>Email:</label><span class="px-3"><p> {{Auth::user()->email}}</p>
        <hr>

        <label>Hobby:</label><span class="px-3"><p>{{Auth::user()->hobby}}</p>
            <hr>

            <label>Country:</label><span class="px-3"><p>{{Auth::user()->country}}</p>
                <hr>

                <label>About Me:</label><span class="px-3"><p>{{Auth::user()->about_me}}</p>

        </div>

        <div class="card-footer bg-secondary text-center"> <p>Joined {{ Auth::user()->created_at->diffForHumans() }}</p></div>
      </div>
      <!-- Card -->


</div>
@endsection
