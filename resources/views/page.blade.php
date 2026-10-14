@php
    $title = $data->title;
@endphp
@section('title', $title)
@section('keywords', $title)
@section('description', $title)
<x-app-layout>
    <div class="about-main">
        @include('layouts.partials.mobile-categories')
        <div class="about-link">
            <a href="{{ route('home') }}">Главная</a>
            <img src="{{ asset('assets/images/arrowRight.svg') }}" alt="">
            <a href="{{ route('page', ['slug' => $data->slug]) }}">{{ $title }}</a>
        </div>
        <div class="about-second" style="margin-bottom: 60px">
            <div class="about-title">{{ $title }}</div>
            <div class="about-content">
                {!! $data->content !!}
            </div>
        </div>
    </div>
</x-app-layout>
