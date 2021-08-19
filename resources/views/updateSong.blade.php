@extends('layouts.master')

@section('title', 'Update Songs')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Songs</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Songs</li>
                <li class="breadcrumb-item active">Update Song</li>
            </ol>
            <br>
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="{{ url('/songs/update') }}">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="song_id" id="song_id" class="form-control" value="{{ $song->song_id }}" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Song Title" value="{{ $song->title }}" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="artist">Artist</label>
                            <input type="text" name="artist" d="artist" class="form-control" placeholder="Song artist" value="{{ $song->artist }}" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="lyrics">Lyrics</label>
                            <textarea name="lyrics" id="lyrics" class="form-control" placeholder="Song Lyrics" required>{{ $song->lyrics }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-2 pull-right">Add <i class="fa fa-plus"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
