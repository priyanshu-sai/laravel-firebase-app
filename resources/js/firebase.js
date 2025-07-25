// resources/js/firebase.js

import { initializeApp } from "firebase/app";
import { getAuth } from "firebase/auth";

const firebaseConfig = {
  apiKey: "AIzaSyDeUE5W-NVvxN0PYZdmpE9aU5NuucohKgw",
  authDomain: "laravel-firebase-39f44.firebaseapp.com",
  projectId: "laravel-firebase-39f44",
  storageBucket: "laravel-firebase-39f44.firebasestorage.app",
  messagingSenderId: "990902993488",
  appId: "1:990902993488:web:15be5b6550450c6a830755",
  measurementId: "G-T5W41XV3HE"
};

const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

export { auth };
