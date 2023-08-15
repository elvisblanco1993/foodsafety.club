@extends('layouts.website')
@section('content')
{{-- Why Food Safety Club? --}}
<main class="my-12 w-full text-lg">
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
@endsection
