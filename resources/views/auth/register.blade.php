<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siles</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <style type="text/tailwindcss">
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        * {cursor: url(https://cur.cursors-4u.net/cursors/cur-2/cur117.cur), auto !important;}
        body {
            font-family: 'Roboto', sans-serif;
        }
        #grid1 {
            width: 100%;
            height: 7rem;
            @apply fixed bg-[#ca0000];
        }
        #grid2 {
            width: 100%;
            height: calc(100% - 7rem);
            top: 7rem;
            @apply fixed bg-[#f7f6fe] overflow-y-scroll;
        }
        ::-webkit-scrollbar {
            @apply w-3 h-3;
        }
        ::-webkit-scrollbar-track {     
            @apply bg-[#f7f6fe] rounded-full; 
        }
        ::-webkit-scrollbar-thumb {
            @apply bg-[#ca0000] rounded-full;
        }
    </style>
</head>
<body>
    <div id="grid1" class="grid grid-cols-1 place-items-center px-4">
        <div class="text-right w-full text-white">
            <h1 class="text-5xl">SILES</h1>
            <h2 class="text-2xl">Sistem Informasi Pendataan Toko Lestari</h2>
        </div>
    </div>
    <div id="grid2" class="px-10 py-8">
        <div class="grid grid-cols-2 md:px-10 lg:px-20 xl:px-40">
            <a href="/login" class="w-full text-center bg-[#d74a4c] text-white py-2 text-xl rounded-xl">Login</a>
            <a href="#" class="w-full text-center bg-[#ca0000] text-white py-2 text-xl rounded-xl">Registrasi</a>
            <form action="/post_register" method="post" class="col-span-2">
                @csrf
                <div class="w-full text-center bg-white rounded-xl grid grid-cols-2 text-xl gap-4 py-20 px-10">
                    <div class="col-span-2"><input type="text" placeholder="Nama Lengkap" class="w-full bg-transparent border-b border-black py-2" name="nama"></div>
                    <div><input type="email" placeholder="Email" class="w-full bg-transparent border-b border-black py-2" name="email"></div>
                    <div><input type="text" placeholder="Nomor HP" class="w-full bg-transparent border-b border-black py-2" name="no_hp"></div>
                    <div class="col-span-2"><input type="text" placeholder="Username" class="w-full bg-transparent border-b border-black py-2" name="username"></div>
                    <div><input type="password" placeholder="Password" class="w-full bg-transparent border-b border-black py-2" name="password"></div>
                    <div><input type="password" placeholder="Konfirmasi Password" class="w-full bg-transparent border-b border-black py-2" name="konfirmasi_password"></div>
                    <div class="text-center col-span-2"><button type="submit" class="bg-[#ca0000] px-10 rounded-full text-white">Registrasi</button></div>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    @if(Session::has('error'))
    swal.fire("{{ Session::get('error') }}")
    @endif

    @error("email")
    swal.fire("Username dan password telah terdaftar")
    @endif

    @error("username")
    swal.fire("Username dan password telah terdaftar")
    @endif
</script>

</html>
