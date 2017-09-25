@component('mail::message')
# Order Shipped

Order has been shipped.
Your total price {{ $order->total }}

@component('mail::button', ['url' => 'http://ecommerce-one'])
Go to E-commerce
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
