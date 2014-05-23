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
                    <input type="radio" name="options[{{ $question->id }}]" value="{{ $option['id'] }}">
                    {{{ $option['text'] }}}
                </label>
            </div>
        @endforeach
    </div>
    @endforeach
</form>