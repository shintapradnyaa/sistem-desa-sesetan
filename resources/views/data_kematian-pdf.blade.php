<!DOCTYPE html>
<html>

<head>
    <style>
        #datakematian {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #datakematian td,
        #datakematian th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #datakematian tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #datakematian tr:hover {
            background-color: #ddd;
        }

        #datakematian th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #ffffff;
            color: rgb(0, 0, 0);
        }
    </style>
</head>

<body>

    <h2>Data Kematian Desa Adat Sesetan</h2>
    <h2>Tahun 2022</h2>

    <table id="datakematian">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Banjar</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Alamat</th>
            <th scope="col">Tanggal Kematian</th>
            <th scope="col">Tanggal Ngaben</th>
            <th scope="col">Sebab Kematian</th>
            <th scope="col">Ahli Waris</th>
        </tr>
        @php
            $no = 1;
        @endphp
        @foreach ($data as $row_kematian)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $row_kematian->nama }}</td>
                <td>{{ $row_kematian->banjar }}</td>
                <td>{{ $row_kematian->jenis_kelamin }}</td>
                <td>{{ $row_kematian->tgl_lahir }}</td>
                <td>{{ $row_kematian->alamat }}</td>
                <td>{{ $row_kematian->tgl_kematian }}</td>
                <td>{{ $row_kematian->tgl_ngaben }}</td>
                <td>{{ $row_kematian->sebab_kematian }}</td>
                <td>{{ $row_kematian->ahli_waris }}</td>
            </tr>
        @endforeach

    </table>

</body>

</html>
