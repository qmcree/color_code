<h2>Color Code Personality Test</h2>

<form method="post" accept-charset="UTF-8">
    @foreach ($questions as $question)
    <div class="form-group">
        <h5>{{{ $question->text }}}</h5>

        @foreach ($question->options as $option)
            <div class="radio">
                <label>
                    <input type="radio" name="options[]" value="{{{ $option->id }}}">
                    {{{ $option->text }}}
                </label>
            </div>
        @endforeach
    </div>
    @endforeach
</form>