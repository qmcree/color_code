<h2>{{{ $name }}}, you're a {{ strtoupper($predominant); }}</h2>

<h3>Your detailed results</h3>
<ul>
    @foreach ($tally as $category => $score)
    <li>{{ $category }} - {{ sprintf("%.0f%%", ($score / 45) * 100) }} ({{ $score }})</li>
    @endforeach
</ul>