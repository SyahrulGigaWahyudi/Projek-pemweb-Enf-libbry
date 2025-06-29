@extends('layouts.app')

@section('content')
<style>
  main { padding: 2em; }
  section { margin-top: 2em; }
  button {
    padding: 10px 20px;
    font-size: 1em;
    cursor: pointer;
    background-color: #2e3a59;
    color: white;
    border: none;
    border-radius: 4px;
  }
  ul { list-style: none; padding: 0; }
  ul li::before { content: "✔️ "; }

  
</style>

<main>
    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
        @foreach($books as $book)
        <div style=" width: 100px; " >
            <div>
                <a href="{{$book->link_url}}">
                    <img src="{{asset('book-images/example-book.png')}}" alt="" style="width: 100px; height: 150px;">
                </a>
            <div>
        </div>
            <p>{{$book->title}}</p>
            <p>{{$book->author}}</p>
        </div>
        </div>
        @endforeach
    </div>
</main>
@endsection 