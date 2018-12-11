@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    New Users over time</div>
                <div class="card-body">
                    <canvas id="myAreaChart" width="100%" height="30"></canvas>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="display-2">Total : {{ $users->count() }}</h2>
                    <h4 class="display-4 text-success">Confirmed : {{ $users->where('confirmed', true)->count() }}</h4>
                    <h4 class="display-4 text-warning">Pending : {{ $users->where('confirmed', false)->count() }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            List of Users for {{ \Auth::guard('admin')->user()->location->name_en }}</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>Account Status</th>
                        <th>Physical Card</th>
                        <th>Creation Date</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <!--
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                    </tfoot>
                    -->
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>@isset($user->company->name) {{ $user->company->name }} @endisset</td>
                        <td>@if($user->confirmed) <span class="badge badge-success">CONFIRMED</span> @else <span class="badge badge-warning">PENDING CONFIRMATION</span> @endif</td>
                        <td>
                            @if($user->card()->where('type_id', 2)->count())
                                <span class="badge badge-success">YES</span>
                            @else
                                <span class="badge badge-danger">NO</span>
                            @endif
                        </td>
                        <td>{{ $user->created_at->toFormattedDateString() }}</td>
                        <td>
                            <button
                                    type="button"
                                    class="btn btn-primary btn-sm"
                                    data-toggle="modal"
                                    data-target="#userModal"
                                    data-fname="{{ $user->first_name }}"
                                    data-lname="{{ $user->last_name }}"
                                    data-company="@isset($user->company->name) {{ $user->company->name }} @endisset"
                                    data-lang="{{$user->lang}}"
                                    data-userid="{{ $user->user_id }}"
                                    @if($user->card()->count())
                                    data-card="{{ $user->card->card_number }}"
                                    @else
                                    data-card=""
                                    @endif
                                    data-email="{{ $user->email }}"
                                    id="user-{{$user->user_id}}"
                            >
                                Edit User
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('modals')
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/admin/update">
                <div class="modal-body">
                        @if(session()->has('updated'))
                            <div class="alert alert-success" role="alert">
                               User Successfully Updated
                            </div>
                        @elseif(session()->has('created'))
                            <div class="alert alert-success" role="alert">
                                User Successfully Created
                            </div>
                        @endif
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="first_name" class="col-form-label">First Name:</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="col-form-label">Last Name:</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="company" class="col-form-label">Company:</label>
                            <input type="text" class="form-control" id="company" name="company" required>
                        </div>
                        <div class="form-group">
                            <label for="lang" class="col-form-label">Lang:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="lang" id="langen" value="en" required>
                                <label class="form-check-label" for="langen">EN</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="lang" id="langfr" value="fr" required>
                                <label class="form-check-label" for="langfr">FR</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_card" class="col-form-label">Card Number:</label>
                            <input type="text" class="form-control" id="user_card" name="card_number" required>
                        </div>
                        <input type="hidden" name="user_id" id="user_id">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update User Info</button>
                </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
        $('#userModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var first_name = button.data('fname'); // Extract info from data-* attributes
            var last_name = button.data('lname'); // Extract info from data-* attributes
            var email = button.data('email'); // Extract info from data-* attributes
            var company = button.data('company'); // Extract info from data-* attributes
            var user_id = button.data('userid'); // Extract info from data-* attributes
            var lang = button.data('lang'); // Extract info from data-* attributes
            var card = button.data('card'); // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('#first_name').val(first_name);
            modal.find('#last_name').val(last_name);
            modal.find('#email').val(email);
            modal.find('#user_card').val(card);
            modal.find('#user_id').val(user_id);
            modal.find('#company').val(company);
            if(lang == 'fr')
            {
                modal.find('#langfr').prop('checked', true);
            }
            else
            {
                modal.find('#langen').prop('checked', true);
            }
        });

        $('#userModal').on('hidden.bs.modal', function (e) {
            $(".alert").alert('close');
        });

        @if(session()->has('updated'))
            $(document).ready(function() {
                $('#user-{{ session('updated') }}').trigger('click');
            });
        @endif

        @if(session()->has('created'))
        $(document).ready(function() {
            $('#user-{{ session('created') }}').trigger('click');
        });
        @endif


        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @foreach($graphData as $data)
                            @if($loop->first)[@endif
                            "{{ $data->date }}"
                            @if(!$loop->last),@endif
                            @if($loop->last)]@endif
                        @endforeach
                ,
                datasets: [{
                    label: "Users",
                    lineTension: 0.3,
                    backgroundColor: "rgba(2,117,216,0.2)",
                    borderColor: "rgba(2,117,216,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    pointHitRadius: 50,
                    pointBorderWidth: 2,
                    data: @foreach($graphData as $data)
                        @if($loop->first)[@endif
                        "{{ $data->count }}"
                        @if(!$loop->last),@endif
                        @if($loop->last)]@endif
                    @endforeach,
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 150,
                            maxTicksLimit: 5
                        },
                        gridLines: {
                            color: "rgba(0, 0, 0, .125)",
                        }
                    }],
                },
                legend: {
                    display: false
                }
            }
        });

    </script>
@endpush