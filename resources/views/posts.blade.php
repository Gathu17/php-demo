{{-- @extends('layout')

@section('content')
       @foreach($posts as $post)
         <article>
            <a href="/posts/{{ $post->slug}}">
            <h1></h1>
            </a> 
            <p>
             By <a href='author/{{$post->author->username}}'>{{ $post->author->name}}</a> in  <a href="/categories/{{$post->category->slug}}">{{ $post->category->name }}</a>
            </p> 
            <div></div>
         </article>
        @endforeach
@endsection --}}

<x-layout>
        @include ('_post-header')

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
         
         @if($posts)
            
            <x-posts-grid  :posts="$posts" />
            {{ $posts->links()}}
         @else 
            <p class="text-center">No posts. Check back later</p>
         @endif
        </main>
</x-layout>