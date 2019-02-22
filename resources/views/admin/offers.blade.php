@extends('layout.admin')

@section('content')
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            List of offers for {{ \Auth::guard('admin')->user()->location->group->group_name }}
            <a href="/admin/offers/edit/" class="btn btn-primary float-right">New Offer</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Partner</th>
                        <th>Title (EN)</th>
                        <th>Title (FR)</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($offers as $offer)
                        <tr>
                            <td>{{ $offer->partner->name_en }}</td>
                            <td>{{ $offer->getLangInfo('en')->title }}</td>
                            <td>{{ $offer->getLangInfo('fr')->title }}</td>
                            <td>{{ $offer->start_date }}</td>
                            <td>
                                @isset($offer->end_date)
                                    {{ $offer->end_date }}
                                @endisset
                            </td>
                            <td>
                                <a
                                        class="btn btn-primary btn-sm"
                                        href="/admin/offers/edit/{{ $offer->offer_id }}"
                                >
                                    Edit Offer
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
