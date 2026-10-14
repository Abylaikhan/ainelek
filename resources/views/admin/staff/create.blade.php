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
                                'first' => 'Персонал',
                                'first_link' => route('admin.staff.index'),
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
                            <a href="{{ route('admin.staff.create') }}" class="btn btn-info">+ Добавить</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('admin.partials.errors')
                            <form action="{{ route('admin.staff.store') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @include('admin.staff._form')
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>

@endsection
