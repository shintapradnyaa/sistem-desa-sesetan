<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password</title>
</head>

<body>
    <h1 class="justify-content-center">Lupa Password</h1>

    <p class="justify">Hallo, Anda menerima email ini, karena kami menerima permintaan ubah password pada akun anda.
        Silahkan klik link dibawah ini untuk mengubah password anda.</p>
    <button type="button" class="btn btn-primary btn-lg" href="{{ url('lupa_password/edit/' . $token) }}">Reset
        Password</button>
    {{-- <a class="btn btn-primary col-6" href="{{ url('lupa_password/edit/' . $token) }}">Reset Password</a> --}}
    <p class="justify">Apabila Anda tidak pernah melakukan permintaan ubah password, abaikan link tersebut. Terima Kasih
    </p>

    <p>Hormat kami,</p>
    <p>Bendesa Adat Sesetan</p>
</body>
</script>

</html>
