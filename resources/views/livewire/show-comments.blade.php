<div class="mt-4">
    @foreach($comments as $comment)
        <div class="mb-4">
            <p class="text-sm font-bold">{{ $comment->created_at->diffForHumans() }}</p>
            <p>{!! nl2br( $comment->body )  !!}</p>
        </div>
    @endforeach
</div>
