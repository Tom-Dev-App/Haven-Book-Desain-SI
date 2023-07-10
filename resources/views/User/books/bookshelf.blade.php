  @php
    use Illuminate\Support\Str;
  @endphp
<x-base>
  <x-slot:content>
      <x-navbar />
      <section class="profile py-7" id="" style="min-height: 100%">
        <div class="container mt-3">
          @if($books->isEmpty())
          <div class="d-flex justify-content-center mt-5">
            <span class="text-center">You don't have any rents yet.</span>
          </div>
          @else
            @foreach($books as $book)
            <a href="{{ route('read',$book->slug) }}" class="text-decoration-none">
              <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{ Storage::url($book->image) }}" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{ $book->title }}</h5>
                      <p class="card-text">{{ Str::limit($book->synopsis, $limit = 255, $end = '...') }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            @endforeach
          @endif
          </div>
      </section>
  </x-slot>
</x-base>