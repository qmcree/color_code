@extends('layout.master')

@section('content')
    <p>The following information and self-assessment instrument come from Dr. Taylor Hartman’s <em>The People Code: It’s All About Your Innate Motive</em>.
        Tests will enable you to learn about yourself, your driving core motive and any secondary motives,
        and about all the core motives and how this knowledge can help you grow and develop your relationships, personally and professionally.</p>

    <h4>Ensure accurate results</h4>
    <ul>
        <li>Unless instructed otherwise, answer every question from your <strong>earliest recollections of how you were as a child</strong>.</li>
        <li>If you're unsure, <strong>ask others for feedback</strong>.</li>
        <li>Choose answers that reflect most of your <strong>thoughts and/or actions</strong>.</li>
        <li><strong>Be honest and don't skew your answers.</strong> The test has been used by millions for years to produce reliable insights.</li>
    </ul>

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
                            <?php $checked = in_array($option['id'], Input::old('options', [])) ? 'checked' : ''; ?>
                            <input type="radio" name="options[{{ $question->id }}]" value="{{ $option['id'] }}" required {{ $checked }} />
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
                <input type="text" id="full-name" class="form-control" name="name" value="{{ Input::old('name') }}" required />
            </div>
            <div class="form-group col-sm-6">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" name="email" value="{{ Input::old('email') }}" required />
            </div>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token(); }}" />
        <button type="submit" class="btn btn-primary">Complete test</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
@stop