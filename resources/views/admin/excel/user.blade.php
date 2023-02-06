<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pengembalian E - Perpus</title>
</head>

<body>
    <center>
        <h1>Laporan Pengembalian E - Perpus</h1>
        <h4>{{ $identitas->alamat_app }}</h4>
        <h4>{{ $identitas->email_app }} | {{ $identitas->nomor_hp }}</h4>
        <br>
    </center>

    <table>
        <thead>
            <tr>
                <th style="border: 1px solid black">No.</th>
                <th style="border: 1px solid black">Nama</th>
                <th style="border: 1px solid black">Judul Buku</th>
                <th style="border: 1px solid black">Tanggal Peminjaman</th>
                <th style="border: 1px solid black">Tanggal Pengembalian</th>
                <th style="border: 1px solid black">Kondisi Buku Saat Dipinjam</th>
                <th style="border: 1px solid black">Kondisi Buku Saat Dikembalikan</th>
                <th style="border: 1px solid black">Denda</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $key => $a)
                <tr>
                    <td style="border: 1px solid black">{{ $key + 1 }}</td>
                    <td style="border: 1px solid black">{{ $a->user->username }}</td>
                    <td style="border: 1px solid black">{{ $a->buku->judul }}</td>
                    <td style="border: 1px solid black">{{ $a->tgl_peminjaman }}</td>
                    <td style="border: 1px solid black">{{ $a->tgl_pengembalian }}</td>
                    <td style="border: 1px solid black">{{ $a->kondisi_buku_saat_dipinjam }}</td>
                    <td style="border: 1px solid black">{{ $a->kondisi_buku_saat_dikembalikan }}</td>
                    <td style="border: 1px solid black">{{ $a->denda }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
