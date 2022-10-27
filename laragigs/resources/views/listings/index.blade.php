{{-- With Layouts --}}
{{-- @extends('layout')

@section('content') --}}

{{-- With Component --}}
<x-layout>
    {{-- <h1>{{ $heading }}</h1> --}}

    @include('partials._hero')
    @include('partials._search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @unless(count($listings) === 0)
            @foreach ($listings as $listing)
                {{-- <a href="http://laragigs.vel/listings/{{ $listing['id'] }}">
                    <h2>{{ $listing['title'] }}</h2>
                </a>
                <p>Description: {{ $listing['description'] }}</p> --}}

                {{-- Without Components --}}
                {{-- <div class="bg-gray-50 border border-gray-200 rounded p-6">
                    <div class="flex">
                        <img class="hidden w-48 mr-6 md:block" src="{{ asset('images/no-image.png') }}" alt="" />
                        <div>
                            <h3 class="text-2xl">
                                <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a>
                            </h3>
                            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
                            <ul class="flex">
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                    <a href="#">Laravel</a>
                                </li>
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                    <a href="#">API</a>
                                </li>
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                    <a href="#">Backend</a>
                                </li>
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                    <a href="#">Vue</a>
                                </li>
                            </ul>
                            <div class="text-lg mt-4">
                                <i class="fa-solid fa-location-dot"></i>
                                {{ $listing->location }}
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- With Components --}}
                <x-listing-card :listing="$listing" />
            @endforeach
        @else
            <p>No Listings found !</p>
        @endunless
    </div>
    <div class="mt-6 p-4">
        {{ $listings->links() }}
    </div>
    {{-- With Layouts --}}
    {{-- @endsection --}}

    {{-- With Component --}}
</x-layout>
