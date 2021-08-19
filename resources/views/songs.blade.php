@extends('layouts.master')

@section('title', 'Songs')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Songs</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Songs</li>
            </ol>
            <a href="{{ url('/songs/add') }}" class="btn btn-success">Add Song <i class="fa fa-plus"></i></a>
            <br>
            <div class="card mb-4">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {!! session('success') !!}
                        </div>
                    @endif
                    @if(session('danger'))
                        <div class="alert alert-danger">
                            {!! session('danger') !!}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                    <table class="table table-bordered table-striped" id="data-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Artist</th>
                                <th>Lyrics</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
