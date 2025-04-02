<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4>New Contact Submission</h4>
            </div>
            <div class="card-body">
                <p><strong>First Name:</strong> {{ $data['first_name'] }}</p>
                <p><strong>Last Name:</strong> {{ $data['last_name'] }}</p>
                <p><strong>Business Email:</strong> {{ $data['business_email'] }}</p>
                <p><strong>Phone Number:</strong> {{ $data['phone_number'] }}</p>
                <p><strong>Company Name:</strong> {{ $data['company_name'] }}</p>
                <p><strong>Inquiry Type:</strong> {{ $data['inquiry_type'] }}</p>
                <p><strong>Message:</strong></p>
                <p>{{ $data['message'] }}</p>
            </div>
        </div>
    </div>
</body>
</html>
