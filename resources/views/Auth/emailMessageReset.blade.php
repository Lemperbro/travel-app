<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333333;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #dddddd;
        }
        
        h2 {
            margin-top: 0;
        }
        
        p {
            margin-bottom: 20px;
        }
        
        .button {
            display: inline-block;
            background-color: #000000;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }
        
        .button:hover {
            background-color: #222222;
        }
        a{
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reset Password</h2>
        <p>Hi there,</p>
        <p>You have requested to reset your password. Click the button below to proceed:</p>
        <p>
            <a class="button" href="{{ $resetUrl }}">Reset Password</a>
        </p>
        <p>If you didn't request a password reset, you can ignore this email.</p>
        <p>Thanks,</p>
        <p>Growin Travel Team</p>
    </div>
</body>
</html>
