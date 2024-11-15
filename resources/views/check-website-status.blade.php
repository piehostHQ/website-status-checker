<!-- resources/views/check-website-status.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Status Checker</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center mb-4">Website Status Checker</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form id="status-check-form" action="/check-website-status" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="url" class="form-label">Website URL:</label>
                        <input type="text" name="url" id="url" class="form-control" placeholder="https://example.com" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Check Status</button>
                </form>

                <div id="result" class="mt-3 alert d-none"></div>
            </div>
        </div>

    </div>

    <!-- Add Bootstrap JS and Popper.js for interactive components -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('status-check-form').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('/check-website-status', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
            })
            .then(response => response.json())
            .then(data => {
                const resultDiv = document.getElementById('result');
                resultDiv.classList.remove('d-none', 'alert-success', 'alert-danger');

                if (data.status === 'up') {
                    resultDiv.classList.add('alert-success');
                    resultDiv.innerText = data.message;
                } else {
                    resultDiv.classList.add('alert-danger');
                    resultDiv.innerText = data.message;
                }
            })
            .catch(error => {
                const resultDiv = document.getElementById('result');
                resultDiv.classList.remove('d-none', 'alert-success');
                resultDiv.classList.add('alert-danger');
                resultDiv.innerText = 'An error occurred while checking the website status.';
            });
        });
    </script>
</body>
</html>
