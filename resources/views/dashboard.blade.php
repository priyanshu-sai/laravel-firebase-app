<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <h2>Welcome to Task Viewer</h2>

  <div id="taskContainer"></div>

  <br><br>
  <button id="logoutBtn">Logout</button>

  <script>
    const uid = localStorage.getItem("firebase_uid");

    if (!uid) {
      alert("Please login first.");
      window.location.href = "/";
    }

    $('#logoutBtn').click(function () {
      localStorage.removeItem("firebase_uid");
      window.location.href = "/";
    });

    $.ajax({
      url: "/api/get-tasks",
      type: "POST",
      data: { uid: uid },
      success: function (response) {
        let html = "";

        if (response.length === 0) {
          html = "<p>No tasks found.</p>";
        } else {
          response.forEach(task => {
            html += `
              <div style="border:1px solid #ccc; padding:10px; margin:10px;">
                <h3>${task.title}</h3>
                <p>${task.description}</p>
                <p>Status: <strong>${task.status}</strong></p>
              </div>
            `;
          });
        }

        $('#taskContainer').html(html);
      },
      error: function (xhr) {
        $('#taskContainer').html("<p style='color:red;'>Failed to load tasks</p>");
        console.log(xhr.responseText);
      }
    });
  </script>
</body>
</html>
