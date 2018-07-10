@extends('layouts.app')

@section('content')
    <div class="container">
       <div class="row">
           <div class="col-md-6 col-md-offset-2">
               <h2>Threads</h2>
               <div>
                   @foreach($threads as $thread)
                       <article>
                           <h4><a href="{{$thread->path()}}">{{$thread->title}}</a></h4>
                           <div>{{$thread->body}}</div>
                       </article>
                       <hr />
                   @endforeach
               </div>
           </div>
       </div>
    </div>
@endsection

