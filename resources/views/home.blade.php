@extends('layouts.app')

@section('content')
<div class="container">

    <img src="/banner/catbanner-phography.jpg" style="width: 100%;height: 400px;">

    <div class="row">
        @foreach($albums as $album)

        <div class="col-lg-3">
            <div class="card mt-4" style="min-height: 230px;">
            <img src="{{asset('album')}}/{{$album->image}}" class="card-img-top img-thumbnail"style="min-height: 180px;">

            <div class="card-body">
                <h5 class="card-title"><center>{{$album->name}}</center></h5>
                <center>
                    <a href="{{route('view.album',[$album->slug,$album->id])}}" class="btn btn-primary">View Album</a>
                </center>
            </div>
        </div>

    </div>
        @endforeach

    </div>

{{$albums->links()}}


</div>
@endsection
