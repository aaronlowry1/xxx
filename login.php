

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <style>
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }
  .login-form input[type="email"], .login-form input[type="password"] {
  width: 350px !important;
  padding: 20px !important;
  margin: 0 auto !important;
  border: 1px solid #ccc !important;
  box-sizing: border-box !important;
  border-radius: 10px !important;
  display: block !important;
  font-size: 18px !important; /* Add this line to increase font size */
}

.login-form input[type="email"] {
  margin-bottom: 20px !important;
}

.login-form input[type="password"] {
  margin-top: 20px !important;
}
  button[type="button"] {
    padding: 10px 20px;
    margin: 10px;
    border: none;
    border-radius: 5px;
    background-color: #4CAF50;
    color: #fff;
    cursor: pointer;
  }

  button[type="button"]:hover {
    background-color: #3e8e41;
  }
  .login-form input[type="email"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
}

.login-form input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-top: 0;
  border: 1px solid #ccc;
}
.login-form {
  margin-top: 20px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 255, 0.1);
  background-color: #f9f9f9;
}
.login-logo {
  text-align: center;
  margin-bottom: 20px;
}

.login-btn {
  background-color: #007bff; /* Blue color */
  color: #fff; /* White text color */
  padding: 10px 20px; /* Add some padding */
  border: none; /* Remove border */
  border-radius: 10px; /* Curved edges */
  cursor: pointer; /* Change cursor shape on hover */
  box-shadow: 0 0 10px #007bff; /* Blue glow effect */
}

.login-btn:hover {
  background-color: #0069d9; /* Darker blue on hover */
  box-shadow: 0 0 15px #0069d9; /* Increased glow on hover */
}
.google-login {
  display: inline-block;
  padding: 0;
  border: none;
  background: none;
  box-shadow: none;
}

.google-login img {
  width: calc(1.2 * 24px);
  height: calc(1.2 * 24px);
  border: none;
  vertical-align: middle;
}
</style>
</head>
<body>
    <!-- Login form -->
    <div class="login-container">
    <div class="login-logo">
    <img src="logo.png" alt="Logo" width="150" height="auto">  </div>
    <div class="login-form">
  <input type="email" id="email" placeholder="Email" required>
  <input type="password" id="password" placeholder="Password" required>
  <button class="login-btn" onclick="handleEmailLogin()">Login with Email</button><br><br>
  <a class="google-login" href="#" onclick="googleLogin()">
    <img src="google.png" alt="Google Logo">
  </a>
</div>
    </div>


    <!-- Firebase App Integration -->
    <script type="module">
      import { initializeApp } from "https://www.gstatic.com/firebasejs/10.11.1/firebase-app.js";
      import { getAuth, signInWithEmailAndPassword, GoogleAuthProvider, signInWithPopup } from "https://www.gstatic.com/firebasejs/10.11.1/firebase-auth.js";

      // Your Firebase configuration
      const firebaseConfig = {
        apiKey: "AIzaSyB1scC8HPbsautu-vhsOzSWFUWLIpsGeTo",
        authDomain: "xxxx-ccfd2.firebaseapp.com",
        projectId: "xxxx-ccfd2",
        storageBucket: "xxxx-ccfd2.appspot.com",
        messagingSenderId: "318073371021",
        appId: "1:318073371021:web:08d48b614142b3c1a925c4",
        measurementId: "G-2FJTPDPCNJ"
      };

      // Initialize Firebase
      const app = initializeApp(firebaseConfig);
      const auth = getAuth(app);

      // Function to handle Email/Password login
 // Function to handle Google sign-in
// Function to handle Google sign-in
// Function to handle Google sign-in
async function googleLogin() {
    const provider = new GoogleAuthProvider();
    try {
        await signInWithRedirect(auth, provider);
    } catch (error) {
        console.error("Error logging in with Google:", error);
        alert("Google login failed: " + error.message);
    }
}


      // Function to handle Google sign-in
      async function googleLogin() {
  const provider = new GoogleAuthProvider();
  try {
    const result = await signInWithPopup(auth, provider);
    const user = result.user;
    console.log(user); // User information
    window.location.href = 'dashboard.php'; // Redirect to dashboard.php
  } catch (error) {
    console.error("Error logging in with Google:", error);
    if (error.code === 'auth/popup-closed-by-user') {
      // Do nothing if the user cancelled the login
    } else {
      alert('Google login failed: ' + error.message);
    }
  }
}

      // Expose the Google login function to the global scope
      window.googleLogin = googleLogin;

      // Function to handle email login click event
      window.handleEmailLogin = function() {
          const email = document.getElementById('email').value;
          const password = document.getElementById('password').value;
          loginUser(email, password);
      }
    </script>
</body>
</html>
