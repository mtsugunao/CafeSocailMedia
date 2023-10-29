@component('mail::message')

Dear {{ $form_data['name'] }},

We have received your inquiry and would like to express our gratitude for reaching out to us. Your feedback is valuable to us, and we are committed to providing a prompt and informative response to your questions or comments.

Here is a summary of the information you provided:

@component('mail::panel')
■ Name: {{ $form_data['name'] }}<br>
■ Email: {{ $form_data['email'] }}<br>
■ Message: {{ $form_data['message'] }}<br>
@endcomponent


Our team is actively reviewing your inquiry and will get back to you as soon as possible. We appreciate your patience during this process.

In the meantime, if you have any further questions or need additional assistance, please do not hesitate to contact us at admin@examle.com.

Thank you for considering us, and we look forward to assisting you.

Best regards,

The Cafe-In Team

@endcomponent
