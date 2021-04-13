@component('mail::message')
# Order Received

Thank you for your order.

**Order ID:** {{ $order->id }}

**Order Email:** {{ $order->billing_email }}

**Order Name:** {{ $order->billing_name }}

**Order Total:** ${{ round($order->billing_total / 100, 2) }}

**Items Ordered**



@foreach ($order->products as $product)
Name: {{ $product->name }} <br>
Price: ${{ round($product->price / 100, 2)}} <br>
Quantity: {{ $product->pivot->quantity }} <br>
@component('mail::button', ['rule'=>'download','url' => Storage::disk(config('voyager.storage.disk'))->url(json_decode($product->file)[0]->download_link), 'color' => 'green'])
Download
@endcomponent
@endforeach

You can get further details about your order by logging into our website.


@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Go to Website
@endcomponent

Thank you again for choosing us.

Regards,<br>
{{ config('app.name') }}
@endcomponent
