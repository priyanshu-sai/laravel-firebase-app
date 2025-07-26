<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- ✅ Firebase v8 CDN (IMPORTANT) -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
</head>
<body>
  <h2>Firebase Login</h2>

  <form id="loginForm">
    <input type="email" id="email" placeholder="Email"><br><br>
    <input type="password" id="password" placeholder="Password"><br><br>
    <button type="submit">Login</button>
  </form>

  <script>
    // ✅ Firebase Config
    var firebaseConfig = {
      apiKey: "AIzaSyDeUE5W-NVvxN0PYZdmpE9aU5NuucohKgw",
      authDomain: "laravel-firebase-39f44.firebaseapp.com",
      projectId: "laravel-firebase-39f44",
    };

    // ✅ Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    // ✅ Login with Firebase Auth
    $('#loginForm').submit(function (e) {
      e.preventDefault();
      var email = $('#email').val();
      var password = $('#password').val();

      firebase.auth().signInWithEmailAndPassword(email, password)
        .then((userCredential) => {
          var user = userCredential.user;
          localStorage.setItem("firebase_uid", user.uid);
          alert("Login Successful");
          window.location.href = "/dashboard";
        })
        .catch((error) => {
          alert("Login Failed: " + error.message);
        });
    });
  </script>
</body>
</html>
