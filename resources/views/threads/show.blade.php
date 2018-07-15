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
            <div class="col-md-10 col-md-offset-2">
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>
        @if(auth()->check())
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <h5>Reply:</h5>
                    <form method="post" action="{{ '/'. $thread->path() . '/replies' }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="body" id="body" placeholder="Have something to say?" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default" >Post</button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <p class="text-center" >Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion</p>
        @endif
    </div>
@endsection

