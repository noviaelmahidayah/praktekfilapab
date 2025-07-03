@extends('layout')
@section('content')
<section class="text-gray-600 body-font">
  <div class="container mx-auto px-5 py-24">
    @foreach ($post_list as $post) 
      {{-- Gambar dibatasi ukurannya dan ditengah --}}
      <img 
        class="mb-6 w-full max-w-sm lg:w-1/10 object-cover object-center rounded mx-auto block" 
        src="{{ $post->getFirstMediaUrl('featured_images') }}" 
        alt="blog"
      >

      <div class="text-center lg:w-2/3 w-full mx-auto">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
          {{ $post->title }}
        </h1>
        <p class="mb-8 leading-relaxed">
          {{ $post->excerpt }}
        </p>
      </div>
    @endforeach
  </div>
</section>
@endsection
