import { initializeApp } from "firebase/app";
import { getAuth, signInWithEmailAndPassword } from "firebase/auth";

const firebaseConfig = {
  apiKey: "AIzaSyDeUE5W-NVvxN0PYZdmpE9aU5NuucohKgw",
  authDomain: "laravel-firebase-39f44.firebaseapp.com",
  projectId: "laravel-firebase-39f44",
};

const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

// Login Button Event
document.addEventListener("DOMContentLoaded", function () {
  const loginForm = document.getElementById("loginForm");

  if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
      e.preventDefault();

      const email = document.getElementById("email").value;
      const password = document.getElementById("password").value;

      signInWithEmailAndPassword(auth, email, password)
        .then((userCredential) => {
          const user = userCredential.user;
          localStorage.setItem("firebase_uid", user.uid);
          alert("Login successful");
          window.location.href = "/dashboard";
        })
        .catch((error) => {
          alert("Login failed: " + error.message);
        });
    });
  }
});
