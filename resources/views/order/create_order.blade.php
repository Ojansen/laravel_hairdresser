@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card-deck">
            <div class="card">
                <h3 class="card-header">Select date</h3>
                <div class="card-body">
                    <form method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input id="date" class="form-control" type="date" min="{{ \Carbon\Carbon::now()->toDateString() }}" onchange="checkDate()">
                            </div>
                            <div class="col">
                                <select class="form-control" id="select-date">
                                @foreach($times as $item)
                                    <option value="{{ $item }}">
                                        {{ $item }}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function checkDate() {
            $date = $('#date').val();
            $hairdresser = {{ $hairdresser }}

            $.post('/order/' + $hairdresser + "/" + $date,
                {
                    '_token': $('meta[name=csrf-token]').attr('content'),
                    date: $date,
                }, function (resp) {
                    // $times = $.parseJSON(resp);
                    $.each(resp, function (elem) {
                       console.log(elem.set);
                    });
                    console.log(resp);
                    var option = $('<option></option>').attr("value", "option value").text("Text");
                    $("#select-date").empty().append(option);
                });
        }
    </script>
@endsection
