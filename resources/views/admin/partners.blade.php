@extends('layout.admin')

@section('content')
    <!-- DataTables Example -->
    <div class="row">
        <div class="col">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            List of Partners for {{ \Auth::guard('admin')->user()->location->group->group_name }}
            <a href="/admin/partners/edit/" class="btn btn-primary float-right">New Partner</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr align="center">
                        <th>Logo</th>
                        <th>Name (EN)</th>
                        <th>Name (FR)</th>
                        <th>Address</th>
                        <th>Location</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($partners as $partner)
                        <tr>
                            <td align="center" style="vertical-align: middle;">
                                <img src="/img/offers/{{ $partner->img }}" height="60">
                            </td>
                            <td>{{ $partner->name_en }}</td>
                            <td>{{ $partner->name_fr }}</td>
                            <td>
                                {{ $partner->address->address_1 }}<br>
                                @if($partner->address->address_2)
                                    {{ $partner->address->address_2 }}<br>
                                @endif
                                {{ $partner->address->city }} ({{ $partner->address->province }}), {{ $partner->address->postal_code }}
                            </td>
                            <td>
                                {{ $partner->location->name_en }}
                            </td>
                            <td>
                                <a
                                        class="btn btn-primary btn-sm"
                                        href="/admin/partners/edit/{{ $partner->partner_id }}"
                                >
                                    Edit Partner
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        </div>
    </div>
@endsection
