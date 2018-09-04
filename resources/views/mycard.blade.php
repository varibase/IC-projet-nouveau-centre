<div class="container h-100">
    <div class="row h-100">
        <div class="col">
            <h1>@lang('pages.mycard.titre')</h1>
            <div id="macarte">

                <svg class="img-fluid" width="686" height="1082" viewBox="0 0 181.50416 286.27917" version="1.1" id="svg16">
                    <defs id="defs10" />
                        <g id="layer1" transform="translate(0,-10.720817)">
                        <g id="layer2">
                            <image
                                y="11.287775"
                                x="-0.037804745"
                                id="image27"
                                xlink:href="/img/fond-macarte.png"
                                preserveAspectRatio="none"
                                height="286.27917"
                                width="181.50417" />
                        </g>
                        <text x="74" y="30" style="fill: #000000; stroke: none;font-family:Arial; font-size: 8px;font-weight:bold;writing-mode: tb;text-transform:uppercase;">{{ $user->first_name}} {{ $user->last_name}}</text>
                        <text x="33" y="153" text-anchor="middle" alignment-baseline="middle" style="fill: #000000; stroke: none;font-family: 'Libre Barcode 128 Text', cursive; font-size: 40px;writing-mode: tb;">{{ $user->card->card_number }}</text>
                </svg>

            </div>
        </div>   
    </div>
</div>