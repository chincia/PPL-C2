<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siles - Ubah Profil Toko</title>
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
            @if(Auth::user()->role_id == 1)
            <a href="/admin/dashboard">
                <li class="text-center text-2xl mb-2 py-1">Dashboard</li>
            </a>
            @endif
            @if(Auth::user()->role_id == 2)
            <a href="/karyawan/dashboard">
                <li class="text-center text-2xl mb-2 py-1">Dashboard</li>
            </a>
            @endif
            <a href="/profil_toko">
                <li class="text-center text-2xl bg-[#ca0000] mb-2 py-1">Profile Toko</li>
            </a>
            @if(Auth::user()->role_id == 1)
            <a href="/admin/admin">
                <li class="text-center text-2xl mb-2 py-1">Admin</li>
            </a>
            @endif
            <a href="/karyawan">
                <li class="text-center text-2xl mb-2 py-1">Karyawan</li>
            </a>
            <a href="/pelanggan">
                <li class="text-center text-2xl mb-2 py-1">Pelanggan</li>
            </a>
            <a href="/artikel">
                <li class="text-center text-2xl mb-2 py-1">Artikel</li>
            </a>
            <a href="/barang">
                <li class="text-center text-2xl mb-2 py-1">Barang</li>
            </a>
        </ul>
        <ul class="text-white px-2 absolute w-full bottom-2">
            <a href="/logout">
                <li class="text-center text-2xl mb-2 py-1">Logout</li>
            </a>
        </ul>
    </div>
    <div id="grid4" class="px-10 py-8">
        <form action="/profil_toko/update" method="post">
            @csrf
            <div class="grid grid-cols-1 text-2xl gap-2">
                <div class="text-3xl text-center">DATA PROFILE PEMILIK</div>
                <div><input type="text" placeholder="Nama Pemilik" class="w-full bg-transparent border-b border-black py-2" name="nama_pemilik" value="{{$data->nama_pemilik}}"></div>
                <div><input type="text" placeholder="No HP" class="w-full bg-transparent border-b border-black py-2" name="no_hp" value="{{$data->no_hp}}"></div>
                <div><input type="number" placeholder="Tahun Berdiri" class="w-full bg-transparent border-b border-black py-2" name="tahun_berdiri" value="{{$data->tahun_berdiri}}"></div>
                <div><textarea name="deskripsi" id="" rows="3" placeholder="Deskripsi" class="w-full border border-black rounded-lg p-2">{{$data->deskripsi}}</textarea></div>
                <div class="text-center"><button type="submit" class="bg-[#ca0000] px-10 rounded-full text-white">Simpan</button></div>
            </div>
        </form>
    </div>
</body>
</html>