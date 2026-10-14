@extends('admin.layouts.app')
@php
    $title = 'Добавить Слайдер';
@endphp
@section('title', $title)
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    @include('admin.partials.breadcrumbs', [
                                'first' => 'Слайдер',
                                'first_link' => route('admin.sliders.index'),
                                'second' => $title,
                                'active' => 2
                            ])
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.sliders.create') }}" class="btn btn-info">+ Добавить</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('admin.partials.errors')
                            <form action="{{ route('admin.sliders.store') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @include('admin.sliders._form')
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>

@endsection
