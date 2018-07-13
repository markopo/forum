@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <article>
                    <h4>{{$thread->title}}</h4>
                    <div>{{$thread->body}}</div>
                </article>
                <hr />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                @foreach($thread->replies as $reply)
                    <div>
                        <h5><a href="#"> {{$reply->owner->name}} </a>  said {{$reply->created_at->diffForHumans()}}</h5>
                        <div>{{$reply->body}}</div>
                    </div>
                    <hr />

                @endforeach
            </div>
        </div>
    </div>
@endsection

