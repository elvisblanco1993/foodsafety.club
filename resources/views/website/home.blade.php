@extends('layouts.website')

@section('content')
    {{-- Hero section --}}
    <header class="w-full bg-cover bg-center" style="background-image: url('{{asset('ca-creative-5PDlOQOKOpA-unsplash.jpg')}}')">
        <div class="bg-white/60 backdrop-blur-sm">
            <div class="h-full max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-44">
                <div class="border-2 border-black">
                    <h1 class="text-3xl md:text-4xl -translate-x-1.5 -translate-y-1.5 py-3 px-4 bg-black border border-black text-white font-semibold text-center">{{__("Your Source for Food Recall Notifications")}}</h1>
                </div>
            </div>
            <p class="text-right text-xs text-slate-600 p-2">
                {{__("Photo by")}} <a href="https://unsplash.com/@ca_creative?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">CA Creative</a> {{__("on")}} <a href="https://unsplash.com/photos/5PDlOQOKOpA?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
            </p>
        </div>
    </header>

    {{-- Recall List --}}
    <main class="my-12 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        @livewire('recall.index')
    </main>
@endsection
