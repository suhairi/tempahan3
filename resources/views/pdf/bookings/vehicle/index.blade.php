<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PDF</title>
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body>
    <table border="1">
        <tr>
            <td align="center"><img src="{{ asset('images/logo.png') }}" height="120" width="120" class="mt-2 mb-2"></td>
        </tr>
        <tr>
            <td align="center"><strong>PERMOHONAN MENGGUNA KENDERAAN JABATAN / PEMANDU <br /> DI IBU PEJABAT MADA</td>
        </tr>
        <tr>
            <td>
                Permohonan menggunakan kenderaan jabatan sebelum / semasa / selepas waktu pejabat hendaklah mengisib utir-butir di ruangan yang <br />
                telah dikhaskan dalam borang ini.<br />
                <ol type="i">
                    <li>Permohonan ini wajib dihantar menggunakan Borang Tempahan Kenderaan beserta SURAT PROGRAM/AKTIVITI  dari pihak yang berkenaan.</li>
                    <li>Permohonan mestilah diserahkan ke Unit logistik, Cawangan Pentadbiran, Bahagian Khidmat Pengurusan selewat-lewatnya SATU (1)<br />
                        HARI sebelum tarikh penggunaan</li>
                    <li>Semua permohonan HENDAKLAH disahkan melalui Pengarah Bahagian / Ketua Cawangan / Ketua Seksyen</li>
                    <li>Permohonan akan dipertimbangkan tertakluk kepada kekosongan kenderaan dan juga pemandu.</li>
                    <li>Tempahan akan TERBATAL dengan sendirinya sekiranya pemohon tidak tiba dalam masa 30 minit dari masa yang dimohon.</li>
                    <li>Sila rujuk Peraturan-Peraturan Penggunaan Kenderaan MADA di mukasurat sebelah.</li>
                    <li>Borang Permohonan ini boleh didapati di Cawangan Pentadbiran Ibu Pejabat MADA atau Sistem GOE MADA.</li>
                </ol>
            </td>
        </tr>
        <tr>
            <td align="center"><strong>PEMOHON</strong></td>
        </tr>
        <tr>
            <td>
                <table width="100%">
                    <tr>
                        <td>
                            <br />
                            <strong>NAMA : </strong>{{ $record->name }} <br /><br />
                            <strong>UNIT / BAHAGIAN : </strong>{{ $record->staff->bahagian->info_bhgn }}<br /><br />
                            <strong>JAWATAN : </strong>{{ $record->staff->jawatan->info_jawatan }} - {{ $record->staff->gred->info_gred }} <br /><br />
                            <strong>TARIKH MOHON : </strong>{{ Carbon\Carbon::parse($record->created_at)->format('d-m-Y H:i A') }} <br /><br />
                            <strong>NO HP : </strong>{{ $record->staff->no_tel }}<br /><br />
                            <strong>TARIKH GUNA : </strong>{{ Carbon\Carbon::parse($record->start_date)->format('d-m-Y') }}<br /><br />
                            <strong>MASA : </strong>{{ Carbon\Carbon::parse($record->start_date)->format('H:i A') }}<br /><br />
                        </td>
                        <td valign="top">
                            <strong>Nama Penumpang Tambahan : </strong><br />
                            <ol type="1">
                            @foreach($record->passengers as $passenger)
                                <li>{{ $passenger->name }}</li>
                            @endforeach
                            </ol>
                        </td>
                    </tr>
                </table>              
            </td>
        </tr>
        <tr>
            <td>
                <br />
                <strong>DESTINASI / URUSAN : </strong>{{ $record->destination }}
                <br /><br />
            </td>
        </tr>
        <tr>
            <td>
                <br />
                <strong>JENIS KENDERAAN DIPOHON : </strong>{{ $record->cartype->name }}
                <br /><br />
            </td>
        </tr>
        <tr>
            <td align="center">
                <strong>PENGESAHAN KETUA SEKSYEN / CAWANGAN / BAHAGIAN</strong>
            </td>
        </tr>
        <tr>
            <td>
                <br />
                Pengesahan Pengarah Bahagian / Ketua Cawangan / Ketua Seksyen <br /><br />
                <strong>Nama Pengesah :</strong> {{ $record->approval->user->name }}  - {{ $record->approval->user->staff->gred->info_gred }} <br /><br />

                <small>**Ini adalah cetakan komputer, tandatangan tidak diperlukan.</small>
            </td>
        </tr>
        <tr>
            <td><strong>UNTUK KEGUNAAN UNIT LOGISTIK</strong></td>
        </tr>
        <tr>
            <td>
                <table class="mt-2 ml-2">
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>LULUS</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>TIDAK LULUS</td>
                    </tr>                   
                </table>
                <br />
                <strong>Nama Pemandu : </strong>{{ $record->driver->name }} <br />
                <strong>No Telefon : </strong>{{ $record->driver->staff->no_tel }} <br />
                <strong>Ulasan :</strong>.........................
            </td>
        </tr>
    </table>
    <strong>Nota Pengguna : </strong><br />
    <ul type="bullet">
        <li>Sila berada di kenderaan pada waktu yang dimohon</li>
        <li>Hubungi pemandu jika ada sebarang perubahan masa</li>
        <li>Perjalanan kenderaan adalah seperti yang dimohon sahaja</li>
    </ul> 
    
</body>
</html>