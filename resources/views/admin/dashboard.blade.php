<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siles - ADMIN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
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
                <li class="text-center text-2xl bg-[#ca0000] mb-2 py-1">Dashboard</li>
            </a>
            @endif
            @if(Auth::user()->role_id == 2)
            <a href="/karyawan/dashboard">
                <li class="text-center text-2xl bg-[#ca0000] mb-2 py-1">Dashboard</li>
            </a>
            @endif
            <a href="/profil_toko">
                <li class="text-center text-2xl mb-2 py-1">Profile Toko</li>
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
        <h1 class="text-4xl font-medium text-center" style="color:red">SELAMAT DATANG {{ Auth::user()->nama }} !</h1><br><br>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-2 gap-4">
            <div class="w-[30rem] bg-white p-3 rounded-lg">
                <p style="font-size:20px;" class="text-center"><b>Mini Rekap Keuangan</b></p><br>
                <p style="font-size:12px;" class="text-left"><b>Mini Rekap Keuangan terbaru</b></p>
                <table class="table-auto w-full bg-white">
                    <thead>
                        <tr>
                            <th class="border border-black px-2 py-0">No</th>
                            <th class="border border-black px-2 py-0">Keterangan</th>
                            <th class="border border-black px-2 py-0">Transaksi</th>
                            <th class="border border-black px-2 py-0">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($rekap as $rkp)
                        <tr>
                            <td class="border border-black px-2 py-0">{{$no++}}</td>
                            <td class="border border-black px-2 py-0">{{$rkp->keterangan}}</td>
                            <td class="border border-black px-2 py-0">{{$rkp->transaksi}}</td>
                            <td class="border border-black px-2 py-0">Rp{{number_format($rkp->total_transaksi)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-2 gap-2">
                    <div></div>
                    <div class="ml-10">
                        <a href="/keuangan" class="text-white mt-2 px-2 rounded bg-[#ca0000] font-bold">Lihat selengkapnya</a>
                    </div>
                </div>
            </div>
            <div>
                <div class="w-[30rem] bg-white p-3 rounded-lg">
                    <p style="font-size:20px;" class="text-center"><b>Catatan Keuangan</b></p>
                    <p style="font-size:12px;" class="text-center">Detail data aset keuangan</p><br>
                    <p style="font-size:14px;" class="text-left"><b>Keseluruhan Debit:</b> <span style="color:blue;">Rp{{number_format($debit)}}</span></p>
                    <p style="font-size:14px;" class="text-left"><b>Keseluruhan Kredit:</b> <span style="color:red">Rp{{number_format($kredit)}}</span></p>
                    <p style="font-size:20px;" class="text-right"><b>Saldo:</b>
                        @if($pendapatan < 0) 
                        <span style="color:red">Rp{{number_format($pendapatan)}}</span>
                        @endif
                        @if($pendapatan > 0)
                        <span style="color:blue">Rp{{number_format($pendapatan)}}</span>
                        @endif
                    </p>
                    <p style="font-size:12px;" class="text-center">Lihat keseluruhan detail keuangan <a href="/keuangan"><u><i><b>Disini!</b></i></u></a></p>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    @if(Session::has('success'))
    swal.fire("{{ Session::get('success') }}")
    @endif
</script>

</html>