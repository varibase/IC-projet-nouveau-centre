@extends('layout.admin')

@section('content')
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-body">
            <h1>Offer</h1>
            <hr>
            <form action="@if(!empty($offer->offer_id))/admin/offers/{{ $offer->offer_id }} @else /admin/offers @endif" method="post">
                {{ csrf_field() }}
            <div class="row">
                <div class="col-6 pt-4">
                    <div class="input-group pt-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="partnerSelect">Partner</label>
                        </div>
                        <select class="custom-select" id="partnerSelect" name="partner_id">
                            @foreach($partners as $partner)
                            <option value="{{ $partner->partner_id }}" @if($partner->partner_id == $offer->partner_id) selected @endif>{{ $partner->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Offer Date</label>
                        <div class="input-daterange input-group" id="datepicker">
                            <input type="text" class="input-sm form-control" name="start_date" value="{{ $offer->start_date }}" />
                            <span class="input-group-append rounded-0">
                                <span class="input-group-text">to</span>
                            </span>
                            <input type="text" class="input-sm form-control" name="end_date" value="{{ $offer->end_date }}"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-3 border-top">

                <div class="col-6 border-right">
                    <h3>EN</h3>
                    <div class="form-group">
                        <label for="title_en">Title</label>
                        <input type="text" class="form-control" id="title_en" name="info_en[title]" value="{{ $info_en->title }}">
                    </div>
                    <div class="form-group">
                        <label for="description_en">Description</label>
                        <textarea class="form-control" name="info_en[description]" id="description_en">{{ $info_en->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="howto_en">How To</label>
                        <textarea class="form-control" name="info_en[howto]" id="howto_en">{{ $info_en->howto }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="legal_en">Legal Terms</label>
                        <textarea class="form-control" name="info_en[legal_terms]" id="legal_en">{{ $info_en->legal_terms }}</textarea>
                    </div>
                </div>
                <div class="col-6 border-left">
                    <h3>FR</h3>
                    <div class="form-group">
                        <label for="title_fr">Title</label>
                        <input type="text" class="form-control" id="title_fr" name="info_fr[title]" value="{{ $info_fr->title }}">
                    </div>
                    <div class="form-group">
                        <label for="description_fr">Description</label>
                        <textarea class="form-control" name="info_fr[description]" id="description_fr">{{ $info_fr->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="howto_fr">How To</label>
                        <textarea class="form-control" name="info_fr[howto]" id="howto_fr">{{ $info_fr->howto }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="legal_fr">Legal Terms</label>
                        <textarea class="form-control" name="info_fr[legal_terms]" id="legal_fr">{{ $info_fr->legal_terms }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 pt-2" align="center">
                    <button type="submit" class="btn btn-danger btn-lg">Save</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <link href="/sb-admin/datepicker/bootstrap-datepicker3.min.css" rel="stylesheet">
    <script src="/sb-admin/datepicker/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.input-daterange').datepicker({
                format: 'yyyy-mm-dd'
            });
        });
    </script>
@endpush
