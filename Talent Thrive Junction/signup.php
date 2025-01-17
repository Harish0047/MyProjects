

<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background: url('background_image.jpg') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        color: #fff;
    }

    .signup-container {
        width: 400px;
        padding: 20px;
        background-color: rgba(0, 0, 0, 0.7);
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    h2 {
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 8px;
        font-weight: bold;
    }

    input {
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #fff;
        border-radius: 5px;
        background-color: rgba(255, 255, 255, 0.8);
        color: #333;
    }

    button {
        background-color: #2ecc71;
        color: #fff;
        padding: 12px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
    }

    button:hover {
        background-color: #27ae60;
    }
</style>

<div class="signup-container">
    <h2>Sign Up</h2>
    <form action="signup_process.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <button type="submit">Sign Up</button>
    </form>
</div>
                                    