@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-2">
                <div class="card-header">PlatForms</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <th>
                                Name
                            </th>
                            <th>
                                Edit
                            </th>
                            <th>
                                Delete
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($medium as $media)
                                <tr>
                                    <td>
                                        {{ $media->title }}
                                    </td>
                                    <td>
                                        <a href="{{ route('medium.edit', ['medium' => $media->id ])}}" class="btn btn-xs btn-info">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('medium.destroy', ['medium' => $media->id ])}}" method="post">

                                                {{ csrf_field()}}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-xs btn-danger" type="submit">Destroy</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
 </div>
 @endsection
 @section('table')
 @foreach($medium as $media)
 <li class="list-group-item">
    {{ $media->title }}
 </li>
 @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
