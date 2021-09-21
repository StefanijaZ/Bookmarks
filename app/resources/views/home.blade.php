@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <div>
                    <h4 class="h4"><span class="text-secondary">All Tags That Have Public Bookmark - Descending (Number of Bookmarks) </span></h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tag name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tags as $t)
                                @foreach($t->getBookmarks as $b)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        @if($b->public == 1)
                                            <td><a href="/info/{{ $t->id }}">{{ $t->name }}</a></td>
                                            @break
                                        @endif
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
