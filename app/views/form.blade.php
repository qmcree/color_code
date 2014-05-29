@extends('layout.master')

@section('content')
    <h2>Color Code Personality Test</h2>

    <form method="post" accept-charset="UTF-8">
        @foreach ($questions as $question)
        <div class="form-group">
            <h5>{{{ $question->text }}}</h5>

            <?php
            $options = $question->options->toArray();
            shuffle($options);
            ?>

            @foreach ($options as $option)
            <div class="radio">
                <label>
                    <input type="radio" name="options[{{ $question->id }}]" value="{{ $option['id'] }}" required>
                    {{{ $option['text'] }}}
                </label>
            </div>
            @endforeach
        </div>
        @endforeach
        <div class="form-group">
            <label for="full-name">Full name</label>
            <input type="text" id="full-name" class="form-control" name="name" required />
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" name="email" required />
        </div>
        <button type="submit" class="btn btn-primary">Complete test</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
@stop