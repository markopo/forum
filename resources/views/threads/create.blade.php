@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2>Create thread</h2>
                        </div>
                        <form action="/threads" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title" >Title:</label>
                                <input type="text" required="required" class="form-control" name="title" id="title" placeholder="" >
                            </div>

                            <div class="form-group">
                                <label for="body" >Body:</label>
                                <textarea name="body" id="body" required="required" rows="8" class="form-control" ></textarea>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary" >Publish</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection