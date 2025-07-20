@extends('pinetmart.layouts.app')

@section('title', 'Beranda')

@section('content')
    {{-- Main Content --}}
    @include('pinetmart.partials.main')
@endsection

@section('scripts')
    {{-- Script khusus homepage --}}
    @include('pinetmart.partials.script-carousel')
@endsection
