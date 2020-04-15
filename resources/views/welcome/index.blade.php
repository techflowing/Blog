@extends('tpl-page')

@include('welcome.header')

@section('content')

    <img class="welcome-background" src="http://api.dujin.org/bing/1920.php"/>

    <div class="keyboard">
        <div class="key s2 esc" data-key="💀">💀</div>
        <div class="key" on-shift="!" data-key="1">1</div>
        <div class="key" on-shift="@" data-key="2">2</div>
        <div class="key" on-shift="#" data-key="3">3</div>
        <div class="key" on-shift="$" data-key="4">4</div>
        <div class="key" on-shift="%" data-key="5">5</div>
        <div class="key" on-shift="^" data-key="6">6</div>
        <div class="key" on-shift="&amp;" data-key="7">7</div>
        <div class="key" on-shift="*" data-key="8">8</div>
        <div class="key" on-shift="(" data-key="9">9</div>
        <div class="key" on-shift=")" data-key="0">0</div>
        <div class="key sub" on-shift="_" data-key="-">-</div>
        <div class="key add" on-shift="+" data-key="=">=</div>
        <div class="key s4 back" data-key="😅">😅</div>
        <div class="key s3 tab" data-key="📑">📑</div>
        <div class="key" data-key="Q">Q</div>
        <div class="key" data-key="W">W</div>
        <div class="key" data-key="E">E</div>
        <div class="key" data-key="R">R</div>
        <div class="key" data-key="T">T</div>
        <div class="key" data-key="Y">Y</div>
        <div class="key" data-key="U">U</div>
        <div class="key" data-key="I">I</div>
        <div class="key" data-key="O">O</div>
        <div class="key" data-key="P">P</div>
        <div class="key openbracket" on-shift="{" data-key="[">[</div>
        <div class="key closebracket" on-shift="}" data-key="]">]</div>
        <div class="key s3 pipe" on-shift="|" data-key="\">\</div>
        <div class="key s4 cap" data-key="🔓">🔓</div>
        <div class="key" data-key="A">A</div>
        <div class="key" data-key="S">S</div>
        <div class="key" data-key="D">D</div>
        <div class="key dotted" data-key="F">F</div>
        <div class="key" data-key="G">G</div>
        <div class="key" data-key="H">H</div>
        <div class="key dotted" data-key="J">J</div>
        <div class="key" data-key="K">K</div>
        <div class="key" data-key="L">L</div>
        <div class="key semi" on-shift=":" data-key=";">;</div>
        <div class="key comma" on-shift="&quot;" data-key=",">,</div>
        <div class="key s4 enter" data-key="😤">😤</div>
        <div class="key s5 shift" data-key="💪">💪</div>
        <div class="key" data-key="Z">Z</div>
        <div class="key" data-key="X">X</div>
        <div class="key" data-key="C">C</div>
        <div class="key" data-key="V">V</div>
        <div class="key" data-key="B">B</div>
        <div class="key" data-key="N">N</div>
        <div class="key" data-key="M">M</div>
        <div class="key openangular" on-shift="&lt;" data-key=",">,</div>
        <div class="key closeangular" on-shift="&gt;" data-key=".">.</div>
        <div class="key slash" on-shift="?" data-key="/">/</div>
        <div class="key s5 shift up" data-key="💪">💪</div>
        <div class="key s3 control" data-key="☕">☕</div>
        <div class="key s3 win" data-key="🤩">🤩</div>
        <div class="key s3 alt" data-key="⭐️">⭐️</div>
        <div class="key s12 space" data-key=""></div>
        <div class="key s3 alt" data-key="⭐️">⭐️</div>
        <div class="key s2 fn left" data-key="🌈">🌈</div>
        <div class="key s2 fn down" data-key="👨‍💻">👨‍💻</div>
        <div class="key s2 control right" data-key="☕">☕</div>
    </div>

    <script src="{{ mix('static-welcome/js/app.js') }}"></script>

@endsection
