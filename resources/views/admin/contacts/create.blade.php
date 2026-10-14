@extends('admin.layouts.app')
@php
    $title = 'Добавить Контакт';
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
                                'first' => 'Контакты',
                                'first_link' => route('admin.contacts.index'),
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
                            <a href="{{ route('admin.contacts.create') }}" class="btn btn-info">+ Добавить</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('admin.partials.errors')
                            <form action="{{ route('admin.contacts.store') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @include('admin.contacts._form')
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>

@endsection
