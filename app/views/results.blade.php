@extends('layout.master')

@section('content')
    <h3>Your color is <span class="color {{ strtolower($predominant) }}">{{ strtoupper($predominant) }}</span></h3>

    <h4>Detailed results for <strong>{{{ $name }}}</strong></h4>
    <ol>
        @foreach ($tally as $category => $count)
        <li>{{ $category }} - {{ $count }}</li>
        @endforeach
    </ol>
@stop