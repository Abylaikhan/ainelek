@extends('admin.layouts.app')
@php
    $title = 'Преимущества';
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
                                                    'first' => $title,
                                                    'active' => 1
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
                            <a href="{{ route('admin.advantages.create') }}" class="btn btn-info">+ Добавить</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('admin.partials.errors')
                            @include('admin.advantages._table')
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            @if ($advantages->hasPages())
                                {{ $advantages->links() }}
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        </div>

    </section>

@endsection
