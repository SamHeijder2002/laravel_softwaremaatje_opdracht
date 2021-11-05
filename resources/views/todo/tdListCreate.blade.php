@extends('layouts.app')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="justify-center pt-8 sm:justify-start">
            <div class="container">
                <div class="row justify-content-center">
                    <h1>Create To-do list item:</h1>
                </div>
                <div class="row justify-content-center">
                    <form action="/create" method="POST">
                        @csrf
                        <div class="from-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="desc">Description:</label>
                            <textarea name="desc" id="desc" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-block btn-lg btn-primary" value="Create">
                        </div>                        
                    </form>
                </div>   
                <div class="row justify-content-center">
                    <div class="form-group">
                        <a href="/" class="btn btn-block btn-lg btn-secondary"><- Back</a>
                    </div>  
                </div>                                                    
            </div>
        </div>
    </div>
</div>
@endsection