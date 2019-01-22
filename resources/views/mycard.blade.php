<div class="container">
    <div class="row">
        <div class="col">
            <h1>@lang('pages.mycard.titre')</h1>
            <div id="macarte-portrait" class="h-100" >

                <svg class="img-fluid" viewBox="0 0 181.50416 286.27917" version="1.1" id="svg16">
                    <defs id="defs10" />
                        
                        <g id="layer2">
                            <image
                                y="2"
                                x="0"
                                id="image27"
                                xlink:href="/img/fond-macarte-verticale.png"
                                preserveAspectRatio="none"
                                height="286.27917"
                                width="181.50417" />
                        </g>
                        <text x="90" y="215" text-anchor="middle" alignment-baseline="middle" style="fill: #000000; stroke: none;font-family:Arial; font-size: 8px;font-weight:bold;text-transform:uppercase;">{{ $user->first_name}} {{ $user->last_name}}</text>
                        <text x="90" y="250" text-anchor="middle" alignment-baseline="middle" style="fill: #000000; stroke: none;font-family: 'Libre Barcode 128 Text', cursive; font-size: 38px;">{{ $user->card->card_number }}</text>
                </svg>

            </div>

            <div id="macarte-landscape" class="w-100">

                <svg class="img-fluid" viewBox="0 0 286.27917 181.50416" version="1.1" id="svg18">
                    <defs id="defs12" />
                        
                        <g id="layer2">
                            <image
                                y="2"
                                x="0"
                                id="image27"
                                xlink:href="/img/fond-macarte-paysage.png"
                                preserveAspectRatio="none"
                                height="181.50417"
                                width="286.27917" />
                        </g>
                        <text x="20" y="110" style="fill: #000000; stroke: none;font-family:Arial; font-size: 8px;font-weight:bold;text-transform:uppercase;">{{ $user->first_name}} {{ $user->last_name}}</text>
                        <text x="143" y="145" text-anchor="middle" alignment-baseline="middle" style="fill: #000000; stroke: none;font-family: 'Libre Barcode 128 Text', cursive; font-size: 40px;">{{ $user->card->card_number }}</text>
                </svg>

            </div>
        </div>   
    </div>
</div>