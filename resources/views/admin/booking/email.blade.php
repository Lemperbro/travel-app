<!DOCTYPE html>
<html>

<head>
    <title>Tour Confirmed</title>
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
            background-color: #272438;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        a {
            color: white
        } 
        .team{
            color:orangered;
            font-weight: 800;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tour {{ $wisata }} Confirmed</h1>
        <p>Congratulations, the tour you have booked has been confirmed.</p>
        <p>Please click the button below to view the booking details:</p>
        <a href="{{ $url }}" class="button">View Booking</a>
        <p>If you have any questions, feel free to contact us.</p>
        <p>Thank you for your trust.</p>
        <p class="team">Grow In Travel Team.</p>
    </div>
</body>

</html>
