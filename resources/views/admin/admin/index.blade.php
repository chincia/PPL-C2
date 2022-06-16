<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siles - Data ADMIN</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
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
                <li class="text-center text-2xl mb-2 py-1">Profile Toko</li>
            </a>
            @if(Auth::user()->role_id == 1)
            <a href="/admin/admin">
                <li class="text-center bg-[#ca0000] text-2xl mb-2 py-1">Admin</li>
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
            <a href="/penjualan">
                <li class="text-center text-2xl mb-2 py-1">Penjualan</li>
            </a>
            @if(Auth::user()->role_id == 1)
            <a href="/keuangan">
                <li class="text-center text-2xl mb-2 py-1">Keuangan</li>
            </a>
            <a href="/keuntungan">
                <li class="text-center text-2xl mb-2 py-1">Keuntungan</li>
            </a>
            @endif
        </ul>
        <ul class="text-white px-2 absolute w-full bottom-2">
            <a href="/logout">
                <li class="text-center text-2xl mb-2 py-1">Logout</li>
            </a>
        </ul>
    </div>
    <div id="grid4" class="px-10 py-8">
        <h1 class="text-center text-3xl mb-8">DATA ADMIN</h1>
        <table class="table-auto w-full bg-white">
            <thead>
                <tr>
                    <th class="border border-black px-2 py-0">No</th>
                    <th class="border border-black px-2 py-0">Nama</th>
                    <th class="border border-black px-2 py-0">No HP</th>
                    <th class="border border-black px-2 py-0">Email</th>
                    <th class="border border-black px-2 py-0">Tanggal Lahir</th>
                    <th class="border border-black px-2 py-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach($data as $dt)
                <tr>
                    <td class="border border-black px-2 py-0">{{$no++}}</td>
                    <td class="border border-black px-2 py-0">{{$dt->nama}}</td>
                    <td class="border border-black px-2 py-0">{{$dt->no_hp}}</td>
                    <td class="border border-black px-2 py-0">{{$dt->email}}</td>
                    <td class="border border-black px-2 py-0">{{$dt->tanggal_lahir}}</td>
                    <td class="border border-black px-2 py-0">
                        <a href="/admin/detail/{{$dt->id}}" class="text-white px-2 rounded-full bg-[#ca0000] font-bold">Detail</a>
                        <a href="/admin/edit/{{$dt->id}}" class="text-white px-2 rounded-full bg-[#ca0000] font-bold">Ubah</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

<script>
    @if(Session::has('success'))
    swal.fire("{{ Session::get('success') }}")
    @endif
</script>

</html>