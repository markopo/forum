@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <article>
                    <h4>{{$thread->title}}</h4>
                    <div>{{$thread->body}}</div>
                </article>
            </div>
        </div>
    </div>
@endsection

