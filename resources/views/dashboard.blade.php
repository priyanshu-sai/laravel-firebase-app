<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <h2>Welcome to Task Viewer</h2>
    <div id="taskContainer"></div>

    <br><br>
    <button id="logoutBtn">Logout</button>

    <script type="module">
        import { auth } from '/resources/js/firebase.js';
        import { onAuthStateChanged, signOut } from "firebase/auth";

        onAuthStateChanged(auth, (user) => {
            if (user) {
                const uid = user.uid;
                localStorage.setItem("firebase_uid", uid);
                fetchTasks(uid);
            } else {
                alert("Please login first.");
                window.location.href = "/";
            }
        });

        document.getElementById('logoutBtn').addEventListener('click', () => {
            signOut(auth).then(() => {
                localStorage.removeItem("firebase_uid");
                window.location.href = "/";
            });
        });

        function fetchTasks(uid) {
            fetch("/api/get-tasks", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                },
                body: JSON.stringify({ uid: uid })
            })
            .then(res => res.json())
            .then(tasks => {
                let html = "";

                if (tasks.length === 0) {
                    html = "<p>No tasks found.</p>";
                } else {
                    tasks.forEach(task => {
                        html += `
                            <div style="border:1px solid #ccc; padding:10px; margin:10px;">
                                <h3>${task.title}</h3>
                                <p>${task.description}</p>
                                <p>Status: <strong>${task.status}</strong></p>
                            </div>
                        `;
                    });
                }

                document.getElementById("taskContainer").innerHTML = html;
            })
            .catch(err => {
                console.error(err);
                document.getElementById("taskContainer").innerHTML = "<p style='color:red;'>Error loading tasks.</p>";
            });
        }
    </script>

</body>
</html>
