<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <h2>Firebase Login</h2>
    <input type="email" id="email" placeholder="Email"><br><br>
    <input type="password" id="password" placeholder="Password"><br><br>
    <button id="loginBtn">Login</button>

    <script type="module">
        import { auth } from '/resources/js/firebase.js';
        import { signInWithEmailAndPassword } from "firebase/auth";

        document.getElementById('loginBtn').addEventListener('click', () => {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            signInWithEmailAndPassword(auth, email, password)
                .then(userCred => {
                    const user = userCred.user;
                    localStorage.setItem("firebase_uid", user.uid);
                    window.location.href = "/dashboard";
                })
                .catch(err => alert(err.message));
        });
    </script>
</body>
</html>
