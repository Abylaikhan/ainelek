@php
    $title = 'Біз туралы';
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

    <!-- Start Who We Are Area -->
    <section class="who-we-are ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="who-we-are-content">
                        <span>Біз туралы</span>
                        <h3>Қысқаша ақпарат</h3>
                        <div>
                            {!! $about->content !!}
                        </div>
                        @if(count($services))
                            <ul class="who-we-are-list">
                                @php
                                    $counter = 0;
                                @endphp
                                @foreach($services as $service)
                                    @php
                                        $counter++;
                                    @endphp
                                    <li>
                                        <span>{{ $counter }}</span>
                                        {{ $service->title }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="who-we-are-image-wrap">
                        <img src="{{ asset('assets/img/apartment.png') }}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Who We Are Area -->

    <!-- Start Fun Facts Area -->
    @if(count($advantages))
        <section class="fun-facts-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    @php
                        $bg = 0;
                    @endphp
                    @foreach($advantages as $advantage)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-fun-fact bg-{{$bg}}">
                                <h3>
                                    <span class="odometer" data-count="{{ $advantage->description }}">00</span>
                                </h3>
                                <p>{{ $advantage->title }}</p>
                            </div>
                        </div>
                        @php
                            $bg++;
                        @endphp
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- End Fun Facts Area -->

    <!-- Start Teacher Area -->
    @if(count($staffs))
        <section class="teacher-area pt-100 pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-teacher-content">
                            <h3>
                                <a href="#">Балабақша тәрбиешілері –</a>
                            </h3>
                            <p>балаларға ойын арқылы дамып, үйренуге көмектесетін мейірімді жандар. Олар балаларға қауіпсіз әрі
                                жайлы орта жасап, қарым-қатынас, өз ойын жеткізу және өз бетінше әрекет ету дағдыларын
                                қалыптастырады.</p>
                        </div>
                    </div>
                    @foreach($staffs as $staff)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-teacher-item">
                                <div class="image">
                                    <img src="{{ $staff->image_path }}" alt="{{ $staff->full_name }}">

                                    <div class="content">
                                        <h3>{{ $staff->full_name }}</h3>
                                        <span>{{ $staff->position }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- End Teacher Area -->
</x-app-layout>
