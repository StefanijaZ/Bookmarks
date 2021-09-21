@extends('layouts.app')

@section('content')
    <form method="POST">
        @csrf
        <div style="width: 50%; margin-left: 50px">
            <h5>URL</h5>
            <input class="form-control" type="text" name="url" value="{{ $bookmark->url }}" placeholder="{{ $bookmark->url }}">

            <h5>Comment</h5>
            <input class="form-control" type="text" name="comment" value="{{ $bookmark->comment }}" placeholder="{{ $bookmark->comment }}">

            <h5>Tag</h5>
            <select class="form-control" name="tag">
                <option selected value="{{ $bookmark->getTag->id }}">{{ $bookmark->getTag->name }}</option>
                @foreach($tags as $t)
                    @if($t->id != $bookmark->getTag->id)
                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                    @endif
                @endforeach
            </select>

            <h5>Is public</h5>
            <select class="form-control" name="isPublic">
                @if($bookmark->public == 1)
                    <option selected value="1">public</option>
                    <option value="0">Not public</option>
                @else
                    <option value="1">public</option>
                    <option selected value="0">Not public</option>
                @endif
            </select>
            <input class="form-control" type="hidden" name="bId" value="{{ $bookmark->id }}">

            <button class="btn alert-info" type="submit">Save</button>
            <a href="/home">Back</a>
        </div>
    </form>

@endsection
