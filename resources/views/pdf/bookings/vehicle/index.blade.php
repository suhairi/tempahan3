<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>e-Tempahan - Kenderaan</title>

    <script src="https://cdn.tailwindcss.com"></script>
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <style type="text/css">
        body {
            font-family: 'Times New Roman', Courier, monospace;
            font-size: 16px;
        }
        div.page
        {
            page-break-after: always;
            page-break-inside: avoid;
        }
        .peraturan {
            font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
        }
    </style>

</head>
<body>
    <div class="page">
        <table border="1" width="100%">
            <tr>
                <td align="center"><img src="{{ asset('images/logo.png') }}" height="120" width="120" class="mt-2 mb-2"></td>
            </tr>
            <tr>
                <td align="center" bgcolor="#CCC"><strong>PERMOHONAN MENGGUNA KENDERAAN JABATAN / PEMANDU <br /> DI IBU PEJABAT MADA</td>
            </tr>
            <tr>
                <td>
                    Permohonan menggunakan kenderaan jabatan sebelum / semasa / selepas waktu pejabat hendaklah mengisi butir-butir di ruangan yang <br />
                    telah dikhaskan dalam borang ini.<br />
                    <ol type="i">
                        <li>Permohonan ini wajib dihantar menggunakan Borang Tempahan Kenderaan beserta <strong>SURAT PROGRAM/AKTIVITI</strong>  dari pihak yang berkenaan.</li>
                        <li>Permohonan mestilah diserahkan ke <strong>Unit logistik, Cawangan Pentadbiran, Bahagian Khidmat Pengurusan</strong> selewat-lewatnya <strong>SATU (1)<br />
                            HARI</strong> sebelum tarikh penggunaan</li>
                        <li>Semua permohonan <strong>HENDAKLAH</strong> disahkan melalui <strong>Pengarah Bahagian / Ketua Cawangan / Ketua Seksyen</strong></li>
                        <li>Permohonan akan dipertimbangkan tertakluk kepada kekosongan kenderaan dan juga pemandu.</li>
                        <li>Tempahan akan <strong>TERBATAL</strong> dengan sendirinya sekiranya pemohon tidak tiba dalam masa <strong>30 minit</strong> dari masa yang dimohon.</li>
                        <li>Sila rujuk <strong>Peraturan-Peraturan Penggunaan Kenderaan MADA</strong> di mukasurat sebelah.</li>
                        <li>Borang Permohonan ini boleh didapati di <strong>Cawangan Pentadbiran Ibu Pejabat MADA</strong> atau <strong>GOE MADA.</strong></li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td align="center" bgcolor="#CCC"><strong>PEMOHON</strong></td>
            </tr>
            <tr>
                <td class="ms-1">
                    <table width="100%">
                        <tr>
                            <td>
                                <br />
                                <strong>NAMA : </strong>{{ $record->name }} <br />
                                <strong>UNIT / BAHAGIAN : </strong>{{ $record->staff->bahagian->info_bhgn }}<br />
                                <strong>JAWATAN : </strong>{{ $record->staff->jawatan->info_jawatan }} - {{ $record->staff->gred->info_gred }} <br />
                                <strong>NO HP : </strong>{{ $record->staff->no_tel }}<br /><br />

                                <strong>TARIKH MOHON : </strong>{{ Carbon\Carbon::parse($record->created_at)->format('d-m-Y H:i A') }} ({{ Carbon\Carbon::parse($record->created_at)->diffForHumans() }})<br />
                                <strong>TARIKH GUNA : </strong>{{ Carbon\Carbon::parse($record->start_date)->format('d-m-Y') }}<br />
                                <strong>MASA : </strong>{{ Carbon\Carbon::parse($record->start_date)->format('H:i A') }} ({{ Carbon\Carbon::parse($record->start_date)->diffForHumans() }})<br /><br />
                                <strong>STATUS : </strong> 
                                    @if($record->approval->status == 0)
                                        <font color="red">Un-approved</font>
                                    @else
                                        <font color="green">Approved at {{ Carbon\Carbon::parse($record->approval->updated_at)->format('d-m-Y H:i A') }}</font>
                                    @endif
                                
                                <br /><br />
                            </td>
                            <td valign="top">
                                <strong>Nama Penumpang Tambahan : </strong><br />
                                <ol type="1">
                                @foreach($passengers as $passenger)
                                    <li>{{ $passenger }}</li>
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
                <td align="center" bgcolor="#CCC">
                    <strong>PENGESAHAN KETUA SEKSYEN / CAWANGAN / BAHAGIAN</strong>
                </td>
            </tr>
            <tr>
                <td>
                    <br />
                    <u>Pengesahan Pengarah Bahagian / Ketua Cawangan / Ketua Seksyen</u> <br /><br />
                    <strong>Nama Pengesah :</strong> {{ $record->approval->user->name }}  - {{ $record->approval->user->staff->gred->info_gred }} <br /><br />

                    <small>**Ini adalah cetakan komputer, tandatangan tidak diperlukan.</small>
                </td>
            </tr>
            <tr>
                <td bgcolor="#CCC"><strong>UNTUK KEGUNAAN UNIT LOGISTIK</strong></td>
            </tr>
            <tr>
                <td>
                    <table class="border-0 mt-2 ms-2">
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
                    <strong>No Telefon : </strong>{{ $record->driver->staff->no_tel }} <br /><br />
                    <strong>Ulasan :</strong>.................................................................................................... <br />
                </td>
            </tr>
        </table>
        <br />
        <strong>Nota Pengguna : </strong><br />
        <ul type="bullet">
            <li>Sila berada di kenderaan pada waktu yang dimohon</li>
            <li>Hubungi pemandu jika ada sebarang perubahan masa</li>
            <li>Perjalanan kenderaan adalah seperti yang dimohon sahaja</li>
        </ul>
    </div>

    <div class="page peraturan mt-6" align="center">
        <br /><br />
        <table border="1" width="90%">
            <tr>
                <td align="center"><strong>PERATURAN-PERATURAN PENGGUNAAN KENDERAAN MADA</strong></td>
            </tr>
            <tr class="mt-2">
                <td>
                    <br />
                    <ol type="1">
                        <li>
                            <strong>PERMOHONAN KENDERAAN</strong>
                            <br /><br />
                            <ol type="1.1">
                                <li>
                                    Permohonan ini perlu dihantar menggunakan Borang Tempahan Kenderaan beserta Surat Program/Aktiviti dari pihak yang berkenaan.
                                </li>
                                <li>
                                    Kenderaan MADA adalah untuk membawa anggota MADA sahaja. 
                                    Penumpang-penumpang selain dari yang dinyatakan dalam permohonan adalah diluluskan mengikut kepentingan perkhidmatan bagi 
                                    penggunaan kenderaan tersebut.
                                </li>
                                <li>
                                    Sila kemukakan permohonan untuk menggunakan kereta dan van selewat-lewatnya satu (1) hari sebelum penggunaan kenderaan
                                    dan bagi lori hendaklah dikemukakan selewat-lewatnya tiga (3) hari sebelum penggunaan. 
                                </li>
                                <li>
                                    Kelewatan mengemukakan permohonant idak akan dipertimbangkan kecuali jika terdapat kekosongan penggunaan kenderaan pada waktu tersebut.
                                </li>
                                <li>
                                    Pengagihan penggunaan kenderaan adalah atas budi bicara Pengarah Bahagian Khidmat Pengurusan.
                                </li>
                                <li>
                                    Bahagian ini boleh membatalkan mana-mana tempahan kenderaan yang telah diluluskan sekiranya terdapat keperluan tugas yang lebih mendesak.
                                </li>
                                <li>
                                    Pegawai yang menggunakan kenderaan MADA tidak layak membuat tuntutan perjalanan tersebut.
                                </li>
                                <li>
                                    Penggunaan kenderaan adalah untuk urusan rasmi sahaja. 
                                </li>
                            </ol>
                        </li>
                        <br /><br />
                        <li>
                            <strong>TANGGUNGJAWAB PEMANDU DAN PENGGUNA KENDERAAN</strong>
                            <br /><br />
                            <ol>
                                <li>Pemandudan pengguna kenderaan MADA bertanggungjawab melaporkan sebarang kemalangan atau kecederaan kepada pihak polis dan pegawai logistik 
                                    di Bahagian Khidmat Pengurusan. Sila hubungi En. Mohd Nadzri/Cik Jamaliah di talian sambungan 135.
                                    Pengguna kenderaan hendaklah menandatangani buku log kenderaan bagi mengesahkan penggunaan kenderaan telah dilaksanakan dengan sempurna.
                                </li>
                            </ol>
                        </li>
                        <br /><br />
                        <li>
                            <strong>PEMBATALAN PENGGUNAAN KENDERAAN</strong>
                            <br /><br />
                            <ol>
                                <li>
                                    Tempahan akan terbatal dengan sendirinya sekiranya pengguna tidak berada di tempat yang ditetapkan 30 minit dari masa yang ditetapkan. 
                                    Adalah menjadi tanggungjawab pengguna menghubungi Pegawai Logistik atau pemandu mengenai sebarang perubahan pada jadual perjalanan.
                                </li>
                            </ol>
                        </li>
                    </ol>
                </td>
            </tr>
        </table>
    </div>
    
</body>
</html>