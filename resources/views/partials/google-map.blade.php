<div id="map" style="width:100%; height: 750px;">
    @if(count($offers))
    {!! Mapper::render(0) !!}
    @endif
</div>
<script type="text/javascript">
    function ShowOffer(idOffer) {
        $('#offer-'+idOffer).click();
    }
</script>