@extends('layout.master')

@section('content')
    <form method="post" accept-charset="UTF-8" class="questions">
        <ol class="row">
            @foreach ($questions as $question)
            <li class="col-sm-4">
                <div class="form-group">
                    @if (!empty($question->text))
                    <h5>{{{ $question->text }}}</h5>
                    @endif

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
            </li>
            @endforeach
        </ol>

        <h4>You're almost done! <small>Provide us some info., and we'll email you your results.</small></h4>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="full-name">Your full name</label>
                <input type="text" id="full-name" class="form-control" name="name" required />
            </div>
            <div class="form-group col-sm-6">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" name="email" required />
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Complete test</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
@stop