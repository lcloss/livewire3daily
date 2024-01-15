<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-lg font-bold mb-4">{{ $post->title }}</h1>

                    <p class="mb-3">{!! nl2br( $post->body ) !!}</p>

                    <p>Comments: {{ $commentsCount }}</p>

                    <hr class="mt-3 mb-3" />

                    <livewire:create-comment :post="$post" />

                    <!-- List comments from post using TailwindCSS in this Breeze project. List date time created and body. -->
                    <livewire:show-comments :post="$post" lazy />
                </div>
            </div>
        </div>
    </div>
</div>
