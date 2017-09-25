@extends('admin.layout.admin')

@section('content')

    <h3>Orders</h3><br>

    <ul>
        @foreach($orders as $order)
            <li>
                <h4>Order by {{ $order->user->name }}<br> Total Price {{ $order->total }}</h4>

                <form action="{{ route('toggle.deliver', $order->id) }}" method="post" class="pull-right">
                    {{csrf_field()}}
                    <label for="delivered">Delivered</label>
                    <input type="checkbox" value="1" name="delivered" {{ $order->delivered == 1 ? "checked" : "" }}>
                    <input type="submit" class="button success small" value="Submit">

                </form>
                
                
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->pivot->qty }}</td>
                            <td>{{ $item->pivot->total }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </li>
        @endforeach
    </ul>
@endsection