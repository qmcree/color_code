@extends('layout.master')

@section('content')
    <h2>The Hartman Personality Profile <small>The People Code</small></h2>

    <p>The following information and self-assessment instrument come from Dr. Taylor Hartman’s <em>The People Code: It’s All About Your Innate Motive</em> (New
        York: Scribner, 2007), pages 17 – 21.</p>

    <p>In taking the Hartman Personality Profile, <strong>be as candid and honest as you can</strong>. Discovering your core motive and insights about your personality
        is the purpose of the profile, and whether you elect to attend a presentation on The People Code or read Dr. Hartman's book, you will learn about yourself,
        your driving core motive and any secondary motives, and about all the core motives and how this knowledge can help you grow personally and
        professionally and help you develop your relationships – whether professional or personal.</p>

    <h3>Enhance the accuracy of your results.</h3>
    <ul>
        <li>Unless otherwise directed in the profile, answer every question from your <strong>earliest recollections of how you were as a child</strong>. Since Dr. Hartman’s
            theory of personality assumes that personality is innate, this will provide a more accurate perspective on who you innately are. Of course we have all grown,
            changed, learned, and adapted since childhood, but our core remains important, and we will talk about this during the presentation.</li>
        <li>Some of the choices are not easy! Do not hesitate to <strong>ask others for feedback</strong> – especially people who knew you as a child and those who may not
                always agree with you.</li>
        <li>Strive to choose answers that were/are most often typical of your thoughts and/or actions. Subconsciously,
            you may want to “be” something different than the real you, but tough it out. You will cheat yourself of the rewards of adding to and enhancing your
            understanding of yourself.</li>
        <li>Don’t try to look for patterns or “beat” or skew the profile, even though it appears to be an oversimplified profile design. It has been used for
            years by millions to produce reliable insights.</li>
    </ul>

    <form method="post" accept-charset="UTF-8">
        <ol>
            @foreach ($questions as $question)
            <li>
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
            </li>
            @endforeach
        </ol>

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