<!DOCTYPE html>
<html>

<head>
    <title>403 Forbidden</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        @keyframes heartbeat {
            0% {
                transform: scale(1);
                color: #ff0080;
            }

            25% {
                transform: scale(1.2);
                color: #c700ff;
            }

            50% {
                transform: scale(1);
                color: #ff0080;
            }

            75% {
                transform: scale(1.2);
                color: #c700ff;
            }

            100% {
                transform: scale(1);
                color: #ff0080;
            }
        }

        .heart {
            display: inline-block;
            animation: heartbeat 1s infinite;
        }

        .back-to-dashboard {
            background-image: linear-gradient(to right, #ff0080, #c700ff);
            color: #ffffff;
            border-color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mt-5">
                <h1 class="display-4">
                    <span class="heart">&#10084;</span>
                    403 Forbidden
                    <span class="heart">&#10084;</span>
                </h1>
                <p class="lead">Directory access is forbidden.</p>
                <a href="<?= base_url('siswa'); ?>" class="btn btn-primary back-to-dashboard">Back to Dashboard</a>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>