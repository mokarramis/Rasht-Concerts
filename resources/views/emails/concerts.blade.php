<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>لیست برنامه های اجرایی </title>
    <style>
        /* Inline styles for simplicity, consider using CSS classes for larger templates */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f1f1f1;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .message {
            padding: 20px;
            background-color: #ffffff;
        }

        .message p {
            margin-bottom: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        
        <div class="message">
            <p>لیست برنامه ها: </p>
            <ul>
                @foreach ($concerts as $concert)
                    <li>{{ $concert }}</li>
                @endforeach
            </ul>
        </div>
        
    </div>
</body>

</html>