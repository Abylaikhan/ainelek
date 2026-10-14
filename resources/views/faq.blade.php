@php
    $title = 'Жиі қойылатын сұрақтар';
@endphp
@section('title', $title)
@section('keywords', $title)
@section('description', $title)
<x-app-layout>
    <!-- Start Page Banner -->
    <div class="page-banner-area item-bg2">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>Жиі қойылатын сұрақтар</h2>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Басты бет</a>
                            </li>
                            <li>Жиі қойылатын сұрақтар</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Banner -->

    <!-- Start FAQ Area -->
    @if($faqs)
    <section class="faq-area ptb-100">
        <div class="container">
            <div class="section-title">
                <h2>Төменде жиі қойылатын сұрақтар тізімі берілген</h2>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-accordion">
                        <ul class="accordion">
                            @foreach($faqs as $key => $faq)
                                <li class="accordion-item">
                                    <a class="accordion-title @if($key == 0) active @endif" href="javascript:void(0)">
                                        <i class='bx bx-plus'></i>
                                        {{ $faq->question }}
                                    </a>

                                    <div class="accordion-content @if($key == 0) show @endif">
                                        {!! $faq->answer !!}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- End FAQ Area -->
</x-app-layout>
