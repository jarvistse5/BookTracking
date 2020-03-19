@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
	   <!-- <div class="alert alert-success" role="alert">
                    Welcome back! {{ Auth::user()->username }}!
            </div>-->

 	            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

		<div class="card">

		<div class="card-header">Dashboard</div>

                <div class="card-body">



                    <div class="">
                        <a href="{{ route('manageBook') }}">Book Management</a>
                    </div>
                    <div class="">
                        <a href="{{ route('searchBook') }}">Search Book</a>
                    </div>
                    <div class="">
                        <a href="{{ route('manageUser') }}">User Management</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Important!!!</div>
                <div class="card-body">
                    <div class="">
                        <p>/app/Http/Controllers/BooksController.php</p>
                        <p>^^^^^^^^^</p>
                        <p>This part is different from the zip file</p>
                        <p>Since the upload image method is different</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Github</div>
                <div class="card-body">
                    <div class="">
                        <a href="https://github.com/jarvisTse/BookTracking">https://github.com/jarvisTse/BookTracking</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Update info</div>
                <div class="card-body">
                    <div class="">
                        <p>
                          <a class="btn btn-primary" data-toggle="collapse" href="#update1">18/2 21:45 Update List:</a>
                        </p>
                        <div class="collapse pb-2" id="update1">
                          <div class="card card-body">
                            <p>Whole /resources/views directory</p>
                            <p>/app/Http/Controllers/BooksController.php</p>
                            <p>/routes/web.php</p>
                          </div>
                        </div>
                        <p>
                          <a class="btn btn-primary" data-toggle="collapse" href="#update2">19/2 11:30 Update List:</a>
                        </p>
                        <div class="collapse pb-2" id="update2">
                          <div class="card card-body">
                            <p>Whole /resources/views directory</p>
                            <p>/app/Http/Controllers/BooksController.php</p>
                            <p>/routes/web.php</p>
                          </div>
                        </div>
                        <p>
                          <a class="btn btn-primary" data-toggle="collapse" href="#update3">19/2 21:45 Update List:</a>
                        </p>
                        <div class="collapse pb-2" id="update3">
                          <div class="card card-body">
                            <p>php artisan make:controller UsersController</p>
                            <p>php artisan make:middleware Admin</p>
                            <p>php artisan make:middleware Manager</p>
                            <p>whole /resources/views/ directory</p>
                            <p>/app/Http/Controller/Auth/LoginController.php</p>
                            <p>/app/Http/Controller/Auth/RegisterController.php</p>
                            <p>/app/Http/Controller/BooksController.php</p>
                            <p>/app/Http/Controller/UsersController.php</p>
                            <p>/app/Http/kernel.php</p>
                            <p>/app/User.php</p>
                            <p>/database/migrations/2014_10_12_000000_create_users_table.php</p>
                            <p>/public/js/book_manage.js</p>
                            <p>/public/js/uesr_manage.js</p>
                            <p>/routes/web.php</p>
                            <p>php artisan migrate:refresh --path=/database/migrations/2014_10_12_000000_create_users_table.php</p>
                          </div>
                        </div>
                        <p>
                          <a class="btn btn-primary" data-toggle="collapse" href="#update4">21/2 21:45 Update List:</a>
                        </p>
                        <div class="collapse pb-2" id="update4">
                          <div class="card card-body">
                            <p>whole /resources/views/ directory</p>
                            <p>/app/Http/Controller/UsersController.php</p>
                            <p>/database/migrations/2020_02_13_110255_create_books_table.php</p>
                            <p>/public/js/book_manage.js</p>
                            <p>php artisan storage:link</p>
                            <p>php artisan migrate:refresh --path=/database/migrations/2020_02_13_110255_create_books_table.php</p>
                          </div>
                        </div>
                        <p>
                          <a class="btn btn-primary" data-toggle="collapse" href="#update5">22/2 20:45 (From Tony) Update List:</a>
                        </p>
                        <div class="collapse pb-2" id="update5">
                          <div class="card card-body">
                            <p>/resources/views/book/manage.blade.php</p>
                            <p>/resources/views/book/search.blade.php</p>
                          </div>
                        </div>
                        <p>
                          <a class="btn btn-primary" data-toggle="collapse" href="#update6">24/2 18:00 Update List:</a>
                        </p>
                        <div class="collapse pb-2" id="update6">
                          <div class="card card-body">
                            <p>Update content:</p>
                            <p>visual update</p>
                            <p>Add default book img in search & manage views</p>
                            <p>Remove view button in search view</p>
                            <p>Add hyber link when click the whole table column</p>
                            <br>
                            <p>Update file:</p>
                            <p>/resources/views/book/detail.blade.php</p>
                            <p>/resources/views/book/manage.blade.php</p>
                            <p>/resources/views/book/search.blade.php</p>
                            <p>/resources/views/layouts/app.blade.php</p>
                            <p>/resources/views/home.blade.php</p>
                          </div>
                        </div>
                        <p>
                          <a class="btn btn-primary" data-toggle="collapse" href="#update7">26/2 17:30 Update List:</a>
                        </p>
                        <div class="collapse pb-2" id="update7">
                          <div class="card card-body">
                            <p>Update content:</p>
                            <p>Add book tracking preview webpage</p>
                            <br>
                            <p>Update file:</p>
                            <p>/resources/views/book/track.blade.php</p>
                            <p>/resources/views/book/detail.blade.php</p>
                            <p>/resources/views/layouts/app.blade.php</p>
                            <p>/resources/views/home.blade.php</p>
                            <p>/routes/web.php</p>
                            <p>/public/img</p>
                            <p>/public/js/book_track.js</p>
                            <p>Dont blindly copy, view "important" >>>> /app/Http/Controller/BooksController.php</p>
                          </div>
                        </div>
                        <p>
                          <a class="btn btn-primary" data-toggle="collapse" href="#update8">19/3 22:00 Update List:</a>
                        </p>
                        <div class="collapse pb-2" id="update8">
                          <div class="card card-body">
                            <p>Update content:</p>
                            <p>Borrow System</p>
                            <p>I has almost updated all the file</p>
                          </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
