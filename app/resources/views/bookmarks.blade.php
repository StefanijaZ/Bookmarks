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

                            <a href="/add">Add new Bookmark</a>
                            <br>
                    </div>

                    <form action="/search">
                        <input class="form-control" name="search_url" type="text" placeholder="Search by url">
                        <input class="form-control" name="search_comment" type="text" placeholder="Search by comment">
                        <button type="submit" class="btn alert-info">Search</button>
                    </form>
                    <br>
                    <div>

                        <h4 class="h4"><span class="text-secondary">All Bookmarks Descending By Created At</span></h4>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Url</th>
                                <th scope="col">Tag</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Is public</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bookmarks as $b)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $b->url }}</td>
                                    <td>{{ $b->getTag->name }}</td>
                                    <td>{{ $b->created_at }}</td>
                                    <td>{{ $b->comment }}</td>
                                    <td>{{ $b->public }}</td>
                                    <td><a href="/delete/{{ $b->id }}">Delete</a></td>
                                    <td><a href="/edit/{{ $b->id }}">Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
