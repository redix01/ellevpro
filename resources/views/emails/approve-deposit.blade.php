<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #f8f9fa;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white text-center">
                        <img src="{{ asset('img2/logo.png') }}" alt="{{ env('APP_NAME') }}" style="max-width: 150px; margin-bottom: 10px;">
                        <h2>Deposit Approval</h2>
                    </div>
                    <div class="card-body">
                        <p>Dear {{ $deposit->user->name ?? '' }},</p>
                        <p>We are pleased to inform you that your recent deposit has been successfully approved.</p>
                        <ul>
                            <li><strong>Amount:</strong> ${{ number_format($deposit->amount, 2) }}</li>
                            <li><strong>Date:</strong> {{ date('d M, Y', strtotime($deposit->created_at)) }}</li>
                        </ul>
                        <p>The funds have been credited to your account and are now available for use.</p>
                        <div class="text-center my-4">
                            <a href="{{ route('user.dashboard') }}" class="btn btn-success">Go to Dashboard</a>
                        </div>
                        <p>If you have any questions or need further assistance, please do not hesitate to contact our support team.
                            <a href="{{ env('MAIL_FROM_ADDRESS_2') }}">{{ env('MAIL_FROM_ADDRESS_2') }}</a>
                        </p>
                        <p>Thank you for choosing our services.</p>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <small>&copy; {{ Date('Y') }} {{ env('APP_NAME') }}. All rights reserved.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
