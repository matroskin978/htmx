<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap-5.3.8-dist/css/bootstrap.min.css">
    <style>
        .loader {
            display: none;
            opacity: 0;
        }

        .register-form:has(.htmx-swapping),
        .register-form.htmx-request {
            opacity: .5;
            pointer-events: none;
        }

        .register-form:has(.htmx-swapping) .loader,
        .register-form.htmx-request .loader {
            display: inline-block;
            opacity: 1;
        }

        .htmx-indicator {
            display: none;
        }
        .htmx-indicator.htmx-request {
            display: block;
        }
    </style>
</head>
<body>

<div class="container my-3">

    <div class="row">
        <div class="col-md-6">
            <form
                    class="register-form"
                    hx-post="server.php"
                    hx-swap="transition:true"
                    hx-target=".users-table"
                    hx-on::before-request="document.getElementById('res').innerHTML = ''"
                    hx-on::after-request="document.querySelector('.register-form').reset()"
            >

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Name">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input name="phone" type="tel" class="form-control" id="phone" placeholder="Phone">
                </div>

                <button class="btn btn-primary mb-3" type="submit">
                    Save
                </button>

                <div class="htmx-indicator">
                    <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                </div>

                <div id="res"></div>

            </form>
        </div>

        <div class="col-md-6">
            <div class="htmx-indicator" id="load-users">
                <span class="spinner-border" aria-hidden="true"></span>
            </div>
            <div
                    class="table-responsive users-table"
                    hx-trigger="load"
                    hx-indicator="#load-users"
                    hx-get="server.php"
                    hx-vals='{"action": "get-users"}'
                    hx-swap="transition:true"
            >

            </div>
        </div>
    </div>

</div>

<script src="assets/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/htmx.min.js"></script>
<script>
    /*document.addEventListener('htmx:beforeRequest', function (e) {
        console.log(e);
        // document.getElementById('res').innerHTML = '';
        e.detail.target.innerHTML = '';
    });
    document.addEventListener('htmx:afterRequest', function (e) {
        console.log(e);
        // document.querySelector('.register-form').reset();
        e.target.reset();
        // e.detail.target.innerHTML = e.detail.xhr.response;
    });*/
</script>
</body>
</html>
