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
    </style>
</head>
<body>

<div class="container my-3">

    <form
            class="register-form"
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

        <button
                class="btn btn-primary mb-3"
                type="submit"
                hx-get="server.php"
                hx-params="name, phone, token"
                hx-include="closest form, [name='token']"
                hx-swap="innerHTML transition:true swap:1s"
                hx-target="#res"
        >
            Name, Phone
            <span class="loader spinner-border spinner-border-sm" aria-hidden="true"></span>
        </button>

        <button
                class="btn btn-primary mb-3"
                type="submit"
                hx-post="server.php"
                hx-params="email, phone, token, city, dt"
                hx-include="[name='token']"
                hx-vals='js:{"city": "NY", "dt": Math.floor(Date.now() / 1000)}'
                hx-swap="innerHTML transition:true swap:1s"
                hx-target="#res"
        >
            Email, Phone
            <span class="loader spinner-border spinner-border-sm" aria-hidden="true"></span>
        </button>

        <div id="res"></div>

    </form>

    <input type="hidden" name="token" value="1234567890">

</div>

<script src="assets/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/htmx.min.js"></script>
</body>
</html>
