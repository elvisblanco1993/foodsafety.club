@extends('layouts.website')

@section('content')

    {{-- Header bar --}}
    <div class="w-full h-16 sm:h-20 bg-white border-b border-b-slate-200">
        <nav class="h-full max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <a href="/" class="text-lg font-bold leading-tight">{{ __("Food Safety Club") }}</a>

            <div class="flex items-center space-x-4">
                <a href="/why-food-safety-club" class="text-xs uppercase tracking-widest font-medium">{{__("About")}}</a>
                @livewire('web.subscribe')
            </div>
        </nav>
    </div>

    {{-- Hero section --}}
    <header class="w-full">
        <div class="h-full max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-44">
            <h1 class="text-4xl font-bold text-center">{{__("Your Source for Food Recall Notifications")}}</h1>
        </div>
    </header>

    {{-- Why Food Safety Club? --}}
    <main class="w-full text-lg">
        <div class="h-full max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center">{{__("Why Food Safety Club?")}}</h2>
            <p class="mt-3">
                {{__("At Food Safety Club, we keep you updated on food recalls. Whenever the USDA or FDA issues a recall, we'll notify you promptly so you can make informed decisions.")}}
            </p>
            <ul class="mt-3 list-none">
                <li>✅ {{__("Stay Updated: No need to constantly check for recalls. We'll email you as soon as new recalls are announced.")}}</li>
                <li>✅ {{__("Peace of Mind: Make sure you're taking the necessary precautions to protect your loved ones.")}}</li>
                <li>✅ {{__("Quick Sign-Up: Joining is easy. Enter your email below, and you're all set!")}}</li>
            </ul>
            <div class="mt-3">
                {{__("Let's work together to keep your kitchen and meals safe. Join us today for a worry-free dining experience.")}}
            </div>
        </div>
    </main>

    {{-- Subscribe CTA --}}

@endsection
