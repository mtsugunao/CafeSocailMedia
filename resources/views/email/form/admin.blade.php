@component('mail::message')

# We recieved an inquery from {{ $form_data['name'] }},

Details
==============================
■Name: {{ $form_data['name'] }}<br>
■Email: {{ $form_data['email'] }}<br>
■Message: {{ $form_data['message'] }}<br>
------------------------------

@endcomponent