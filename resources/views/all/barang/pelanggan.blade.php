<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siles - KATALOG</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        * {cursor: url(https://cur.cursors-4u.net/cursors/cur-2/cur117.cur), auto !important;}
        body {
            font-family: 'Roboto', sans-serif;
        }
        #grid1 {
            width: 15rem;
            height: 7rem;
            @apply fixed bg-[#740000];
        }
        #grid2 {
            width: calc(100% - 15rem);
            height: 7rem;
            left: 15rem;
            @apply fixed bg-[#ca0000];
        }
        #grid3 {
            width: 15rem;
            height: calc(100% - 7rem);
            top: 7rem;
            @apply fixed bg-[#740000];
        }
        #grid4 {
            width: calc(100% - 15rem);
            height: calc(100% - 7rem);
            left: 15rem;
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
    <div id="grid1" class="grid grid-cols-1 place-items-center">
        <h1 class="font-bold text-4xl text-white">PENDATAAN</h1>
    </div>
    <div id="grid2" class="grid grid-cols-1 place-items-center px-4">
        <div class="text-right w-full text-white">
            <h1 class="text-5xl">SILES</h1>
            <h2 class="text-2xl">Sistem Informasi Pendataan Toko Lestari</h2>
        </div>
    </div>
    <div id="grid3">
        <ul class="text-white mt-4 px-2">
            <a href="/profil_toko/pelanggan">
                <li class="text-center text-2xl mb-2 py-1">Profile Toko</li>
            </a>
            <a href="/artikel/pelanggan">
                <li class="text-center text-2xl mb-2 py-1">Artikel</li>
            </a>
            <a href="/barang/pelanggan">
                <li class="text-center text-2xl bg-[#ca0000] mb-2 py-1">Barang</li>
            </a>
        </ul>
        <ul class="text-white px-2 absolute w-full bottom-2">
            <a href="/login">
                <li class="text-center text-2xl mb-2 py-1">Login</li>
            </a>
        </ul>
    </div>
    <div id="grid4" class="px-10 py-8">
        <h1 class="text-3xl font-medium text-center mb-8">KATALOG</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 justify-items-center">
            @foreach($data as $dt)
            <a href="/barang/pelanggandetail/{{$dt->id}}">
                <div class="w-[20rem] bg-white p-3 rounded-lg">
                    <img src="{{ asset('foto-barang/'.$dt->foto_barang) }}" style="width: 450px; height:200px;" alt="" class="rounded-lg">
                    <div class="relative">
                        <h1 class="text-xl font-bold">{{$dt->nama_barang}}</h1>
                        
                    </div>
                    <p>Stok: {{$dt->stok_barang}} kg</p>
                    <p>Rp{{number_format($dt->harga_barang)}}</p>
                    <p>{{$dt->deskripsi_barang}}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</body>

</html>