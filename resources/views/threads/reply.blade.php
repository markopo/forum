<div>
    <h5><a href="#"> {{$reply->owner->name}} </a>  said {{$reply->created_at->diffForHumans()}}</h5>
    <div>{{$reply->body}}</div>
</div>
<hr />