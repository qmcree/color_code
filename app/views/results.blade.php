@extends('layout.master')

@section('content')
    <h3>Your color is <span class="color" style="color: {{ strtolower($predominant) }}">{{ strtoupper($predominant) }}</span></h3>

    <h4>Detailed results for <strong>{{{ $name }}}</strong></h4>
    <ul>
        @foreach ($tally as $category => $count)
        <li>{{ $category }} - {{ $count }}</li>
        @endforeach
    </ul>

    <div class="row">
        <div class="col-sm-3">
            <h4>Red</h4>

        </div>
        <div class="col-sm-3">
            <h4>Blue</h4>
        </div>
        <div class="col-sm-3">
            <h4>White</h4>


        </div>
        <div class="col-sm-3">
            <h4>Yellow</h4>
        </div>
    </div>
@stop