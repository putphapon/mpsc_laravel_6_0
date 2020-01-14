@extends('layouts.layout')

@section('title-bar','Home')

@section('content')

    @include('contents.title')
    @include('contents.database')    
    @include('contents.scholar')    
    @include('contents.manuscripts')    
    @include('contents.vdo')    
    @include('contents.events')    
    @include('contents.shops')

@endsection