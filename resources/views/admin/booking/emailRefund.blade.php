<!DOCTYPE html>
<html>

<head>
    <title>Refund Successful</title>
    <style>
        /* CSS Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        .button {
            display: inline-block;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .team {
            color: orangered;
            font-weight: 800;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>HI {{ $name }}</h1>
        <h1>Refund Successful for {{ $wisata }} Order</h1>
        <p>We are pleased to inform you that the refund process has been successfully completed.</p>
        <p>If you have any further questions or concerns, please don't hesitate to contact our support team.</p>
        <p>Thank you for your understanding.</p>
        <p class="team">Grow In Travel Team.</p>

    </div>
</body>

</html>
