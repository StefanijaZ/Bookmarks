@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Laravel</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <h5 class="h5"><span class="text-secondary">All Bookmarks By Selected Tag - Comment Vibible Only For Bookmark User</span></h5>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Url</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Tag</th>
                                <th scope="col">Public</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bookmarks as $b)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $b->url }}</td>
                                    @if($userId == $b->user_id)
                                        <td>{{ $b->comment }}</td>
                                    @else
                                        <td>/</td>
                                    @endif
                                    <td>{{ $b->getTag->name }}</td>
                                    <td>{{ $b->public }}</td>
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
