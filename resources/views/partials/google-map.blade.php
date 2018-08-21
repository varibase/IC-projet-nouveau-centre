<div id="map" style="width:100%; height: 750px;">
    {!! Mapper::render(0) !!}
</div>
<script type="text/javascript">
    function ShowOffer(idOffer) {
        $('#offer-'+idOffer).click();
    }
</script>