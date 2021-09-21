@extends('layouts.app')

@section('content')
    <form method="POST">
        @csrf
        <div style="width: 50%; margin-left: 50px">
        <h5>URL</h5>
        <input class="form-control" type="text" name="url" placeholder="Enter bookmark url">

        <h5>Comment</h5>
        <input class="form-control" type="text" name="comment" placeholder="Enter bookmark comment">

        <h5>Tag</h5>
        <select class="form-control" name="tag">
            @foreach($tags as $t)
                <option value="{{ $t->id }}">{{ $t->name }}</option>
            @endforeach
        </select>

        <h5>Is public</h5>
        <select class="form-control" name="isPublic">
            <option selected value="1">public</option>
            <option value="0">Not public</option>
        </select>
{{--        <input type="hidden" name="bId" value="{{ $bookmark->id }}">--}}
        <input class="form-control" type="text" name="tag_name" placeholder="Enter your new tag name">
        <input class="form-control" type="text" name="tag_info" placeholder="Enter your new tag info">
        <button class="btn alert-info" type="submit">Add</button>
        <a href="/home">Back</a>
        </div>
    </form>

@endsection
