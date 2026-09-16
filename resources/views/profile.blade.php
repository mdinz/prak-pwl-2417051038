<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ffd6e7, #ffb6d9);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: white;
            width: 350px;
            padding: 30px;
            border-radius: 25px;
            text-align: center;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.15);
        }

        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #ff9fc8;
        }

        h1 {
            color: #e75480;
            margin-top: 20px;
        }

        .data {
            text-align: left;
            margin-top: 20px;
            color: #555;
            font-size: 16px;
        }

        .data p {
            background: #ffeaf3;
            padding: 10px;
            border-radius: 10px;
        }

        .footer {
            margin-top: 20px;
            color: #e75480;
            font-size: 14px;
        }

    </style>

</head>

<body>

<div class="card">

    <img src="{{ asset('images/foto.png') }}" class="profile-img">

    <h1>{{ $nama }}</h1>

    <div class="data">
        <p>NPM : {{ $npm }}</p>
        <p>Kelas : {{ $kelas }}</p>
    </div>

    <div class="footer">
        ✿ My Profile ✿
    </div>

</div>

</body>
</html>