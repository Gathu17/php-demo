@props(['comment'])

<x-plane>
<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
                        <div class="flex-shrink-0">
                            <img src="https://i.pravatar.cc/60?u={{ $comment->id}}" alt="" width="60" height="60">
                        </div>
                        <div>
                             <header>
                                <h3 class="font-bold">{{$comment->author->username}}</h3>
                             </header>
                             <p class="text-xs">
                                Posted <time>
                                    {{ $comment->created_at->diffForHumans()}}
                                </time>
                             </p>
                             <p>{{$comment->body}}</p>
                        </div> 
</article>

</x-plane>
