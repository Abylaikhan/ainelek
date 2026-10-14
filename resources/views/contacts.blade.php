@php
    $title = 'Байланыстар';
@endphp
@section('title', $title)
@section('keywords', $title)
@section('description', $title)
<x-app-layout>
    <!-- Start Page Banner -->
    <div class="page-banner-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>{{ $title }}</h2>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Басты бет</a>
                            </li>
                            <li>{{ $title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Banner -->

    <!-- Start Contact Area -->
    <section class="contact-area ptb-100">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-12">
                    <div class="contact-information">
                        <h3>Ақпарат:</h3>
                        <ul class="contact-list">
                            <li><i class='bx bx-map'></i> Мекенжай: <span>{{ $address->content }}</span></li>
                            <li><i class='bx bx-phone-call'></i> Телефон: <a href="tel:{{ $phone->content }}">{{ $phone->content }}</a></li>
                            <li><i class='bx bx-envelope'></i> Email: <a href="mailto:{{ $email->content }}">{{ $email->content }}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="contact-information">
                        <h3>Жұмыс уақыты:</h3>
                        <ul class="opening-hours">
                            <li><span>Дүйсенбі – жұма:</span>  08:00 - 18:30</li>
                            <li><span>Сенбі – жексенбі: </span> жабық</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Area -->

    <!-- Map -->
    <div id="map">
        {!! $map->content !!}
    </div>
    <!-- End Map -->
</x-app-layout>
