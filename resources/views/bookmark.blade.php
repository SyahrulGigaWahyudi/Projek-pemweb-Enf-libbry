@extends('layouts.master')

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
    <h1>Bookmark</h1>
  <div style="display: flex; flex-wrap: wrap; gap: 20px;">
        @foreach($bookmarks as $bookmark)
            <div style="display: flex; flex-direction: column;">
                <div style=" width: 100px; " >
                    <div>
                        <a href="{{$bookmark->book->link_url}}">
                            <img src="{{asset('book-images/example-book.png')}}" alt="" style="width: 100px; height: 150px;">
                        </a>
                    </div>
                <div>
                </div>
                    <p>{{$bookmark->book->title}}</p>
                    <p>{{$bookmark->book->author}}</p>
                </div>
            </div>
        @endforeach
    </div>
</main>
@endsection
