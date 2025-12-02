@extends('layouts.app')

@section('content')
  <div class="card">
    <h2>{{ $title }}</h2>

    <form method="POST" action="#">
      @csrf
      <div>
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" required>
      </div>

      <div>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div>
        <label for="message">Message :</label>
        <textarea id="message" name="message" rows="5" required></textarea>
      </div>

      <button type="submit">Envoyer</button>
    </form>
  </div>
@endsection
