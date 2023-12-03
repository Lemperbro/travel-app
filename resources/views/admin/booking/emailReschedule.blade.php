<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reschedule Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 10px;
        }

        .highlight {
            font-weight: bold;
            color: #FF0000;
        }

        .btn {
            display: inline-block;
            background-color: #4CAF50;
            color: #FFFFFF;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Reschedule Notification</h1>
        <p>Dear {{ $name }},</p>
        <p>We would like to inform you that your reschedule request has been successfully processed. Your appointment has been rescheduled to the new date and time.</p>
        <p>If you have any questions or need further assistance, please feel free to contact us.</p>
        <p>Thank you for your understanding and cooperation.</p>
        <p>Best regards,<br>Grow In Travel Indonesia</p>
    </div>
</body>

</html>
