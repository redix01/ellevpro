<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-success text-white text-center">
                <h3>Withdrawal Approved</h3>
            </div>
            <div class="card-body">
                <p>Dear {{ $withdraw->user->name }},</p>
                <p>We are pleased to inform you that your withdrawal request has been approved. The details of your transaction are as follows:</p>
                <table class="table table-bordered">
                    <tr>
                        <th>Withdrawal Amount</th>
                        <td>${{ number_format($withdraw->usd_amount, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Crypto Amount</th>
                        <td>{{ number_format($withdraw->amount, 8) }} {{ $withdraw->cryptoAsset->symbol }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>{{ $withdraw->created_at->format('F d, Y H:i A') }}</td>
                    </tr>
                </table>
                <p>Your funds will be processed shortly. If you have any questions, feel free to contact our support team.</p>
                <p>Best regards,<br><strong>{{ config('app.name') }} Team</strong></p>
            </div>
        </div>
    </div>
</body>
</html>
