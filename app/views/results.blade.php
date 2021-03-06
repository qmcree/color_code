@extends('layout.master')

@section('content')
    @if ($whiteRuleTriggered)
    <div class="alert alert-info">
        <p>Because your highest and lowest color were so close, you are considered to be a WHITE.</p>
    </div>
    @endif

    <h3 class="text-center text-info {{ strtolower($predominant) }}">Your predominant color is <span class="color">{{ $predominant }}</span></h3>

    <div id="results-chart"></div>

    <div class="row">
        <div class="col-sm-3 bg-red">
            <h4>Reds: The Power Wielders</h4>

            <p>Reds are the power wielders of the world. Reds use logic, vision and determination. From a Red perspective,
            emotion has nothing to do with completing tasks.</p>

            <h5>Strengths</h5>
            <p>Action oriented, Assertive, Confident, Decisive, Determined, Disciplined, Independent, Leaders, Logical, Pragmatic, Proactive,
            Productive, Responsible, and Task-Dominant.</p>

            <h5>Limitations</h5>
            <p>Reds often have to be right. They may come across as harsh and critical, even when they don't mean to. Reds can be cheap. They may tend to
            give priority to work over personal relationships. Reds may be poor listeners. They can also exhibit controlling and domineering traits.</p>
        </div>
        <div class="col-sm-3 bg-blue">
            <h4>Blues: The Do-gooders</h4>

            <p>Life is a sequence of commitments for blues. They thrive on relationships and willingly sacrifice personal gain. Blues are highly demanding perfectionists
            . They can be distrusting and worry prone. They are complex and intuitive and can be very opinionated. Blues can also be emotional and moody. Blues can be
                self-righteous and insecure and can also be very self-disciplined and sincere.</p>

            <h5>Strengths</h5>
            <p>Blues are steady, ordered and enduring. Blues love with passion. They bring culture and dependency to society and home. They are highly
            committed and loyal. They are comfortable in creative environments. They strive to be the best they can be.</p>

            <h5>Limitations</h5>
            <p>Blues are the most controlling of the four colors. They can be insecure and judgmental. Lacking trust,
            they find themselves resentful or unforgiving. They often fail at seeing the positive side of life. They want to be loved and accepted,
                constantly seeking understanding from others while often refusing to understand and accept themselves.</p>
        </div>
        <div class="col-sm-3 bg-white">
            <h4>Whites: The Peacekeepers</h4>

            <p>Motivated by Peace, Whites will do anything to avoid confrontation. Their only demands from life are the things that make them feel comfortable. That
            feeling fosters their need to feel good inside.</p>

            <h5>Strengths</h5>
            <p>Whites are kind, considerate, patient and accepting. They are devoid of ego. They are good at constructing thoughts that did not exist
            before, just from careful listening and taking time to think things through.</p>

            <h5>Limitations</h5>
            <p>Whites don’t commonly share what they are feeling, understanding or seeing. They won't express conflict. Whites may be unwilling to set
            goals. They dislike working at someone else’s pace. They can be somewhat self-deprecating.</p>
        </div>
        <div class="col-sm-3 bg-yellow">
            <h4>Yellows: The Fun Lovers</h4>

            <p>Yellows are motivated by Fun. They are here to have a great time.</p>

            <h5>Strengths</h5>
            <p>Yellows are enthusiastic. They are very persuasive. They are spontaneous in nature. They are always looking for something new to do.</p>

            <h5>Limitations</h5>
            <p>They develop friendships with ease but can be very self-centered, keeping them from forming meaningful relationships. Often they have
            lots of friends, but only on a superficial level. Yellows may have difficulty getting down to business.</p>
        </div>
    </div>
@stop

@section('scripts')
    @parent

    <script type="application/json" id="results-data">
        {{ json_encode($tally, JSON_HEX_TAG | JSON_UNESCAPED_SLASHES); }}
    </script>
    <script type="text/plain" id="results-name">
        {{{ $name }}}
    </script>
@stop