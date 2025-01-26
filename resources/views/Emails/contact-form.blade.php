_<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
</head>
<body>
    <h2>You have a new message from the contact form:</h2>
    <p><strong>Name:</strong> {{ $details['name'] }}</p>
    <p><strong>Email:</strong> {{ $details['email'] }}</p>
    <p><strong>Message:</strong> {{ $details['message'] }}</p>
    @if(session('success'))
        <div class="p-4 bg-green-500 text-white rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif
</body>
</html>
