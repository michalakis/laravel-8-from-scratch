<x-layout>

    @include('partials.posts-header')


        @if ($posts->count())

            <x-post-featured-card :post="$posts[0]"/>

            @if ($posts->count() > 1)
                <x-post-grid :posts="$posts" />
            @endif

        @else

            <p class="text-center">No posts yet. Please check back later.</p>

        @endif

</x-layout>


