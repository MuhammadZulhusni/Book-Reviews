@if ($rating)
  <!-- Display star rating -->
  @for ($i = 1; $i <= 5; $i++)
    {{ $i <= round($rating) ? '★' : '☆' }}
  @endfor
@else
  <!-- Display message when there's no rating -->
  No rating yet
@endif
