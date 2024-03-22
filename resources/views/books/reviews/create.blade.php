@extends('layouts.app')

@section('content')
  <!-- Title -->
  <h1 class="mb-10 text-2xl">Add Review for {{ $book->title }}</h1>

  <!-- Review Form -->
  <form method="POST" action="{{ route('books.reviews.store', $book) }}">
    @csrf
    <label for="review">Review</label>
    <textarea name="review" id="review" required class="input mb-4"></textarea>

    <label for="rating">Rating</label>
    <select name="rating" id="rating" class="input mb-4" required>
      <option value="">Select a Rating</option>
      @for ($i = 1; $i <= 5; $i++)
        <option value="{{ $i }}">{{ $i }}</option>
      @endfor
    </select>

    <div class="flex justify-between items-center">
      <!-- Back Button (Hyperlink) -->
      <a href="{{ route('books.show', $book) }}" class="btn btn-secondary btn-link">Back</a>

      <!-- Add Review Button -->
      <button type="submit" class="btn btn-primary">Add Review</button>
    </div>
  </form>
@endsection
