@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-md-12 col-lg-12">
    @foreach ($posts as $post)
        <article class="post vt-post">
            <div class="row">
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4">
                    <div class="post-type post-img">
                        <a><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="image post"></a>
                    </div>
                    <div class="author-info author-info-2">
                        <ul class="list-inline">
                            <li>
                                <div class="info">
                                    <p>Comments:</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
                    <div class="caption">
                        <h3 class="md-heading"><a href="{{route('post.show', $post->id)}}" >{{$post->pavadinimas}}</a></h3>
                        <h5>Kategorija: {{$post->kategorija}}</h5>
                        <p> {{substr($post->aprasymas, 0, 50)}}...  </p>
                        <a class="btn btn-default" href="{{route('post.show', $post->id)}}" role="button">Read More</a> </div>
                        <hr>
                   
                        


            </div>
        </article>
        @endforeach
@endsection
