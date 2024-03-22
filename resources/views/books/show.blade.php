@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <!-- Book Information -->
      <div class="card mb-4">
        <div class="card-body">
          <h1 class="card-title mb-2 text-2xl">{{ $book->title }}</h1>
          <div class="book-info">
            <div class="book-author mb-4 text-lg font-semibold">by {{ $book->author }}</div>
            <div class="book-rating flex items-center">
              <div class="mr-2 text-sm font-medium text-slate-700">
                <x-star-rating :rating="$book->reviews_avg_rating" />
              </div>
              <span class="book-review-count text-sm text-gray-500">
                {{ $book->reviews_count }} {{ Str::plural('review', $book->reviews_count) }}
              </span>
            </div>
          </div>
        </div>
      </div>

      <!-- Add Review Link -->
      <div class="card mb-4">
        <div class="card-body">
          <a href="{{ route('books.reviews.create', $book) }}" class="btn btn-primary mr-2">Add a review!</a>
          <a href="{{ route('books.index', $book) }}" class="btn btn-secondary">Back</a>
        </div>
      </div>

      <!-- Reviews Section -->
      <div class="card">
        <div class="card-body">
          <h2 class="card-title mb-4 text-xl font-semibold">Reviews</h2>
          <ul class="list-unstyled">
            @forelse ($book->reviews as $review)
            <li class="book-item mb-4">
              <div>
                <div class="mb-2 flex items-center justify-between">
                  <div class="font-semibold">
                    <x-star-rating :rating="$review->rating" />
                  </div>
                  <div class="book-review-count">
                    {{ $review->created_at->format('M j, Y') }}</div>
                </div>
                <p class="text-gray-700">{{ $review->review }}</p>
              </div>
            </li>
            @empty
            <!-- No Reviews Found -->
            <li class="mb-4">
              <div class="empty-book-item">
                <p class="empty-text text-lg font-semibold">No reviews yet</p>
              </div>
            </li>
            @endforelse
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
