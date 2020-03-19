@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/img/map.png" class="border" height="600px" weight="600px">
        </div>
        <div class="col-4">
            <div class="border">
                <h1 align="center">Books List</h1>
                <table class="table table-hover">
                    <tbody id="trackTable">
                        @foreach ($books as $book)
                        <tr onclick="trackTableChangeColor(this)">
                            <td width="30%">
                                @if($book->image)
                                <img src="/storage/{{ $book->image }}" weight="40" height="65" class="rounded mx-auto d-block border">
                                @else
                                <img src="/storage/uploads/default.png" weight="40" height="65" class="rounded mx-auto d-block border">
                                @endif
                            </td>
                            <td width="60%">
                                <h3 class="text-success"><strong>{{ $book->title }}</strong></h3>
                                <h5 style="color:#444444">Author: @if($book->author) {{ $book->author }} @else N/A @endif</h5>
                                <h5 style="color:#444444">Language: @if($book->language) {{$book->language }} @else N/A @endif</h5>
                            </td>
                            <td width="10%" class="align-middle">
                                <a href="{{ url('/b/detail/' . $book->id) }}" class="book-show-modal btn btn-info btn-lg">
                                <i class="glyphicon glyphicon-eye-open"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
