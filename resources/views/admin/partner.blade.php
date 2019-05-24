@extends('layout.admin')

@section('content')
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-body">
            <h1>Partner</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <hr>
            <form action="@if(!empty($partner->partner_id))/admin/partners/{{ $partner->partner_id }}@else /admin/partners @endif" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="row">
                <div class="col-6 border-right border-top border-bottom pt-3">
                    <h3>EN</h3>
                    <div class="form-group">
                        <label for="name-en">Name</label>
                        <input type="text" class="form-control" id="name-en" name="name_en" value="@if(!empty($partner->name_en)){{ $partner->name_en }}@else{{ old('name_en') }}@endif">
                    </div>
                </div>
                <div class="col-6 border-left border-top border-bottom pt-3">
                    <h3>FR</h3>
                    <div class="form-group">
                        <label for="name-fr">Name</label>
                        <input type="text" class="form-control" id="name-fr" name="name_fr" value="@if(!empty($partner->name_fr)){{ $partner->name_fr }}@else{{ old('name_fr') }}@endif">
                    </div>
                </div>
                <div class="col-6 py-3">
                    <div class="row">

                        <div class="col-9">
                            <h3>Logo</h3>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="logo">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <div class="col-3 border rounded py-2" align="center">
                            <img src="/img/offers/{{ $partner->img }}" height="60" id="logo">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group pt-5">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="LocationSelect">Location</label>
                        </div>
                        <select class="custom-select" id="locationSelect" name="location_id">
                            @foreach($locations as $location)
                                <option value="{{ $location->location_id }}" @if($location->location_id == $partner->location_id) selected @endif>{{ $location->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row border-top py-3">
                <div class="col-6">
                    <h3>Address</h3>
                    <div class="form-group">
                        <label for="address1">Address 1</label>
                        <input type="text" class="form-control" id="address1" name="address[address_1]" value="@if(!empty($address->address_1)){{ $address->address_1 }}@else{{ old('address.address_1') }}@endif">
                    </div>
                    <div class="form-group">
                        <label for="address2">Address 2</label>
                        <input type="text" class="form-control" id="address2" name="address[address_2]" value="@if(!empty($address->address_2)){{ $address->address_2 }}@else{{ old('address.address_2') }}@endif">
                    </div>
                    <div class="form-group">
                        <label for="postal-code">Postal Code</label>
                        <input type="text" class="form-control" id="postal-code" name="address[postal_code]" value="@if(!empty($address->postal_code)){{ $address->postal_code }}@else{{ old('address.postal_code') }}@endif">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="address[city]" value="@if(!empty($address->city)){{ $address->city }}@else{{ old('address.city') }}@endif">
                    </div>
                    <div class="form-group">
                        <label for="province">Province</label>
                        <input type="text" class="form-control" id="province" name="address[province]" value="@if(!empty($address->province)){{ $address->province }}@else{{ old('address.province') }}@endif">
                    </div>
                </div>
                <div class="col-6 pt-5" style="height: 350px;">
                    {!! Mapper::render() !!}
                </div>
                <input type="hidden" name="address[longitude]" id="lng" value="{{ $address->longitude }}">
                <input type="hidden" name="address[latitude]" id="lat" value="{{ $address->latitude }}">
            </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-danger btn-lg">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init()
        });
        function getCoordinates(mapsData)
        {
            $("#lat").val(mapsData[1].markers[0].getPosition().lat());
            $("#lng").val(mapsData[1].markers[0].getPosition().lng());
        }

        function getImage(input)
        {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#logo').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#customFile").change(function(){
           getImage(this);
        });
    </script>
@endpush
