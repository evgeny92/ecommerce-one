@extends('layout.main')

@section('content')

   <div class="row">
       <div class="small-6 small-centered columns">
        <form action="{{ route('payment.store') }}" method="post" id="payment-form">
           {{ csrf_field() }}
                <div class="form-row"><br>
                    <label for="card-element">
                        Credit or debit card:
                    </label><br>
                    <div id="card-element">
                        <!-- a Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display Element errors -->
                    <div id="card-errors" role="alert"></div>
                </div>
            <br>
            <input type="submit" class="submit button success" value="Submit Payment">
            
        </form>
       </div>
   </div>

@endsection