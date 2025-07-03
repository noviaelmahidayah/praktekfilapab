@extends('layout')
@section('content')
<section class="text-gray-600 body-font overflow-hidden">
  <div class="container px-5 py-24 mx-auto">
    <!-- <h1 class="text-3xl font-bold mb-10">Daftar Artikel</h1> -->
    <div class="-my-8 divide-y-2 divide-gray-100">

      @forelse ($post_list as $post)
      <div class="py-8 flex flex-wrap md:flex-nowrap">
        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
          <!-- <span class="font-semibold title-font text-gray-700">Artikel</span>
          <span class="mt-1 text-gray-500 text-sm">{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</span> -->
          <img src="{{ $post->getFirstMediaUrl('featured_images') }}" alt="{{ $post->title }}" class="mt-4 w-48 h-32 object-cover rounded">
        </div>
        <div class="md:flex-grow">
          <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{ $post->title }}</h2>
          <p class="leading-relaxed">{{ Str::limit(strip_tags($post->content), 200) }}</p>
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
        <p class="text-center py-12 text-gray-500">Tidak ada artikel yang tersedia.</p>
      @endforelse

    </div>
  </div>
</section>
@endsection
