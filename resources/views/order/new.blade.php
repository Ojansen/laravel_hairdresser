@extends('layouts.app')

@section('content')
<div class="col-md-12">

    <div class="card-deck">
        @foreach($hairdressers as $slave)
        <div class="card">
            <h4 class="card-header">{{ $slave->user->name }}</h4>
            <div class="card-body">
                <p>Bio {{ $slave->bio }}</p>
                <br>
                <h4>Treatments</h4>
                <table class="table-responsive-sm table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Sex</th>
                        </tr>
                    </thead>
                @foreach($slave->hairlink as $hairstyle)
                    @foreach($hairstyle->hairstyle as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>€ {{ $item->price }}</td>
                            <td>
                                @if ($item->sex == 0)
                                    Male
                                @elseif($item->sex == 1)
                                    Female
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @endforeach
                </table>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-outline-success" >Select</a>
            </div>
        </div>
        @endforeach
    </div>



    <div class="card">
        <h3 class="card-header">New appointment</h3>
        <div class="card-body">
            <form action="/order" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Example select</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Example multiple select</label>
                    <select multiple class="form-control" id="exampleFormControlSelect2">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<script>

</script>
