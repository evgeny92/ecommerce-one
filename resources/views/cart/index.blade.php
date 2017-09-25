@extends('layout.main')

@section('content')

    <div class="row">

    <h3>Cart Items</h3>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Size</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cartItems as $cartItem)
            <tr>
                <td>{{ $cartItem->name }}</td>
                <td>{{ $cartItem->price }}</td>
                <td width="5px">
                    {!! Form::open(['route' => ['cart.update', $cartItem->rowId], 'method' => 'put']) !!}
                    <input name="qty" type="text" value="{{ $cartItem->qty }}">

                </td>
                <td>
                    <div>
                    {!! Form::select('size', ['small' => 'Small', 'medium' => 'Medium', 'large' => 'Large'], $cartItem->options->has('size') ? $cartItem->options->size : '') !!}
                    </div>
                </td>
                <td>
                    <input style="float: left" type="submit" value="ok" class="button small success" >
                    {!! Form::close() !!}
                    <form action="{{ route('cart.destroy', $cartItem->rowId) }}" method="POST">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}
                        <input class="button small alert" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach

        <tr>
            <td></td>
            <td>
                Tax: ${{ Cart::tax() }} <br>
                Sub Total: {{ Cart::subtotal() }}<br>
                Grand Total: {{ Cart::total() }}
            </td>
            <td>Items: {{ Cart::count() }}</td>
        </tr>
        </tbody>
    </table>

        <a href="{{ route('checkout.shipping') }}" class="button small">Checkout</a>
    </div>

@endsection


