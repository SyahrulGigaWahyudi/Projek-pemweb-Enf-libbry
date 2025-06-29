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
  <h1>Ini adalah halaman bookmark</h1>
</main>
@endsection
