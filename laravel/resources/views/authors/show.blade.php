@extends('layout')

@section('content')
<section class="text-gray-600 body-font">
  <div class="container mx-auto px-5 py-10">
    <h1 class="text-2xl font-bold mb-8">Artikel oleh {{ $author->name }}</h1>

    <div class="-my-8 divide-y-2 divide-gray-100">
      @forelse ($posts as $post)
      <div class="py-8 flex flex-wrap md:flex-nowrap">
        {{-- Gambar Thumbnail --}}
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
          <img class="object-cover object-center rounded" alt="{{ $post->title }}"
            src="{{ $post->getFirstMediaUrl('featured_images') }}">
        </div>

        {{-- Konten Artikel --}}
        <div class="md:flex-grow md:pl-6">
          <span class="text-sm text-gray-500">
            {{ \Carbon\Carbon::parse($post->published_at)->translatedFormat('d M Y') }}
          </span>
          <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">
            {{ $post->title }}
          </h2>
          <p class="leading-relaxed">
            {{ Str::limit(strip_tags($post->content), 200) }}
          </p>
          <a href="{{ route('article.show', $post->id) }}" class="text-indigo-500 inline-flex items-center mt-4">
            Lihat selengkapnya
            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 12h14"></path>
              <path d="M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>
      @empty
      <p class="text-center text-gray-600 mt-8">Penulis ini belum memiliki artikel yang dipublikasikan.</p>
      @endforelse
    </div>
  </div>
</section>
@endsection
