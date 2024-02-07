<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" href="CSS\style_registro.css">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 37px;
            text-align: center;
        }

        h2 {
            color: #FF585F;
            margin-bottom: 20px;
        }

        p {
            color: #333;
            margin-bottom: 20px;
        }

        button {
            margin-right: -4px;
            width: 52%;
            height: 58px;
            border: none;
            border-radius: 14px;
            color: #ffffff;
            background: #FF585F;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Error</h2>
        <p><?php echo isset($_GET['message']) ? $_GET['message'] : 'Ha ocurrido un error.'; ?></p>
        <a href="javascript:history.back()" style="text-decoration: none;">
            <button>
                <i class="fas fa-arrow-left"></i> Volver al Registro
            </button>
        </a>
    </div>
</body>
</html>
