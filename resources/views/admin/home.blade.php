@extends('admin.layouts.app')
@php
    $title = 'Главная';
@endphp
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    {{--                    @include('admin.partials.breadcrumbs', [--}}
                    {{--                                                    'first' => $title,--}}
                    {{--                                                    'active' => 1--}}
                    {{--                                                ])--}}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

            </div>
        </div>
    </section>
@endsection
