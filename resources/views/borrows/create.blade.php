@extends('layouts.app')

@section('content')

<div class="container" id="create_borrow">
    <div class="row justify-content-center">
        <div class="col-6">
            <h1 align="center">Create Borrow / Lend Record</h1>
            <form class="" action="/borrow/add" method="post">
                @csrf
                <div class="row justify-content-between">
                    <div class="form-group row col-3">
                        <label for="book_id" class="pl-3 col-form-label text-md-right">Book ID</label>
                        <input id="book_id" type="text" class="form-control" name="book_id" value="{{ $book_id }}" disabled autocomplete="book_id" autofocus>
                    </div>
                    <div class="form-group row col-9">
                        <label for="book_name" class="pl-3 col-form-label">Book Name</label>
                        <select id="book_name" class="form-control custom-select custom-select-lg" name="book_name" onchange="selectBook()">
                            @foreach ($books as $book)
                                @if($book->id == $book_id)
                                <option value="{{ $book->id }}" selected>{{ $book->title }}</option>
                                @else
                                <option value="{{ $book->id }}">{{ $book->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="form-group row col-3">
                        <label for="user_id" class="pl-3 col-form-label text-md-right">User ID</label>
                        <input id="user_id" type="text" class="form-control" name="user_id" disabled autocomplete="user_id" autofocus>
                    </div>
                    <div class="form-group row col-9">
                        <label for="user_name" class="pl-3 col-form-label">User Name</label>
                        <select id="user_name" class="form-control custom-select custom-select-lg" name="user_name" onchange="selectUser()">
                            <option value="" selected disabled>--- Please Select ---</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="form-group row col-6" onchange="change_deadline()">
                        <label for="borrow_at" class="pl-3 col-form-label text-md-right">Borrow Date (default: Today)</label>
                        <input id="borrow_at" type="text" class="form-control selectDate" name="borrow_at" required autocomplete="borrow_at" autofocus>
                    </div>
                    <div class="form-group row col-6">
                        <label for="deadline_at" class="pl-3 col-form-label text-md-right">Return Deadline (default: 2 weeks)</label>
                        <input id="deadline_at" type="text" class="form-control selectDate" name="deadline_at" required autocomplete="deadline_at" autofocus>
                    </div>
                </div>
                <div class="row justify-content-center pt-4">
                    <div class="col-4">
                        <button type="submit" class="btn btn-success btn-lg btn-block">
                            <strong>Submit</strong>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
