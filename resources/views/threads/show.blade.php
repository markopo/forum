@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <article>
                    <h6><a href="#">{{$thread->creator->name}}</a></h6>
                    <h4>{{$thread->title}}</h4>
                    <div>{{$thread->body}}</div>
                </article>
                <hr />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>
    </div>
@endsection

