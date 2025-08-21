<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #1E88E5, #1565C0);
        }

        .admin-form {
            width: 350px;
            padding: 25px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            color: white;
        }

        h2 {
            margin-bottom: 20px;
            font-weight: 600;
        }

        .input-group {
            position: relative;
            margin-bottom: 15px;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .input-group input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .input-group input:focus {
            background: rgba(255, 255, 255, 0.3);
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            background: #0D47A1;
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #1976D2;
        }

        .error {
            color: red;
            margin-top: 10px;
            font-size: 14px;
        }

    </style>
</head>
<body>

    <div class="admin-form">
        <h2>Admin Login</h2>
        <div class="input-group">
            <input type="text" id="username" placeholder="Username">
        </div>
        <div class="input-group">
            <input type="password" id="password" placeholder="Password">
        </div>
        <button id="login">Login</button>
        <p class="error" id="error-msg"></p>
    </div>

    <script>
        document.getElementById('login').addEventListener('click', function() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            if (username === 'administrator' && password === '1234') {
                window.location.href = '<?= base_url('admin/dashboard') ?>';
            } else {
                document.getElementById('error-msg').textContent = 'Invalid username or password.';
            }
        });
    </script>

</body>
</html>
