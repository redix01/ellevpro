<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdrawal Notice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa; padding: 20px;">
    <div class="container" style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <!-- Header -->
        <div class="bg-primary text-center p-4">
            <img src="https://via.placeholder.com/150x50?text=Logo" alt="Logo" style="max-width: 100%;">
        </div>
        <!-- Body -->
        <div class="p-4">
            <h2 class="text-center text-dark">Withdrawal Notice</h2>
            <p>Dear {{ auth()->user()->name }},</p>
            <p>We want to inform you that a withdrawal request has been sent, Await for approval.</p>
            <div class="bg-light p-3 rounded mb-3">
                <p><strong>Details:</strong></p>
                <p><strong>Amount:</strong> ${{ number_format($data->amount) ?? '' }}</p>
                <p><strong>Date:</strong> {{ date('M d, Y', strtotime($data->created_at)) ?? ''}}</p>
            </div>
            <p>If you did not authorize this transaction, please contact us immediately.</p>
            <p class="mb-0">Thank you for using our service!</p>
        </div>
        <!-- Footer -->
        <div class="bg-light text-center p-3" style="border-top: 1px solid #e9ecef;">
            <small>&copy; {{ Date('Y') }} {{ env('APP_NAME') }}. All rights reserved.</small>
        </div>
    </div>
</body>
</html>
