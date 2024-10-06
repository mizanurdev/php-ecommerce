<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Page</title>
    <style>
        body {
            background-color: #E0E7FF;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .verify-box {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .verify-box h2 {
            margin: 0;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .verify-box p {
            margin: 0.5rem 0;
            color: #333;
        }

        .code-input {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 1rem 0;
        }

        .code-input input {
            width: 240px; /* Adjusted width for a single input */
            height: 40px;
            text-align: center;
            font-size: 1.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 1rem; /* Added margin for spacing between inputs */
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="verify-box">
            <h2>Verify</h2>
            <p>Your code was sent to you via email</p>
            <form action="userCodeSave.php" method="post">
                <div class="code-input">
                    <input type="email" name="email" placeholder="Enter email address" required>
                    <input type="text" name="code" placeholder="Enter code" required>
                </div>
                <button type="submit">Verify</button>
            </form>
        </div>
    </div>
</body>
</html>
