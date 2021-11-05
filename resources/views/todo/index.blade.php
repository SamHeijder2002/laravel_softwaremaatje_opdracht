@extends('layouts.app')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="container">
            <div class="row justify-content-center">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <h1>To-Do List</h1>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Name</th>
                                <th></th>
                            </tr>                    
                        </thead>
                        <tbody>
                        <!-- DATABASE INFO -->
                        @foreach($Todo as $todo)
                            <tr><td class="align-middle">{{ $todo->id }}</td><td class="align-middle">{{ $todo->name }}</td><td class="align-middle">{{ $todo->description }}</td><td class="align-middle">{{ $todo->user['name'] }}</td><td><a href="details/{{ $todo->id }}" class="btn btn-block btn-lg btn-primary">Change</a></td></tr>
                        @endforeach
                        </tbody>
                    </table>
                    <p>{{ session('msg') }}</p>
                    <a href="/tdListCreate" class="btn btn-block btn-lg btn-primary">Add To-do</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
