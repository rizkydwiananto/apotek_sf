<?php
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Cetak Pembelian');
$pdf->SetHeaderMargin(30);
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');
$pdf->AddPage();

$nomor_po = $pembelian['nomor_po'];
$html='
        <table>
            <tr>
                <td style="width: 300px;"><b>APOTEK SAHABAT FARMA</b></td>
               
                <td style="width: 20px;"></td>
                <td style="width: 210px;"><h3><b>Pesanan Pembelian</b></h3></td>
            </tr>
            <tr>
                <td>Jl. Pangkalan Jati, RT.001/10 No. 13, Cipinang Melayu, Jakarta Timur 13620</td>
                <td></td>
                <td>Kepada Yth :</td>
            </tr>
            <tr>
                <td>Telp. (021) 8631634 | 085609948038</td>
                <td></td>
                <td>'.$pembelian['nama_supplier'].'</td>
            </tr>
            <tr>
                <td></td>               
                <td></td>
                <td>'.$pembelian['alamat_supplier'].'</td>
            </tr>
            <tr>
                <td></td>
                
                <td></td>
                <td>'.$pembelian['telpon_supplier'].'</td>
            </tr>
        </table>
        
        <p>============================================================================</p>
        
        <table>
            <tr>
                <td>Tanggal Pembelian</td>
                <td style="width: 20px;">:</td>
                <td>'.$pembelian['tgl_beli'].'</td>
            </tr>
            <tr>
                <td>Nomor PO</td>
                <td>:</td>
                <td>'.$pembelian['nomor_po'].'</td>
            </tr>
            <tr>
                <td>Supplier</td>
                <td>:</td>
                <td>'.$pembelian['kode_supplier'].' - '.$pembelian["nama_supplier"].'</td>
            </tr>
            <tr>
                <td>Penginput Data Pembelian</td>
                <td>:</td>
                <td>'.$pembelian['nama_user'].'</td>
            </tr>
        </table>
        
        <p>============================================================================</p>
        
        <table cellspacing="1" bgcolor="#666666" cellpadding="2">
            <tr bgcolor="#ffffff">
                <th style="width: 20px;" align="center">No</th>
                <th align="center">Kode Barang</th>
                <th style="width: 125px;" align="center">Nama Barang</th>
                <th align="center" style="width: 50px;">Satuan</th>
                <th align="center">Harga</th>
                <th align="center">Qty Order</th>
                <th align="center" style="width: 100px;">Sub Total</th>
            </tr>';
$no = 0;
foreach ($pembelian_detail as $list){
    $no++;
$html.='<tr bgcolor="#ffffff">
            <td align="center">'.$no.'</td>
            <td>'.$list["kode_brg"].'</td>
            <td>'.$list["nama_barang"].'</td>
            <td>'.$list["satuan_brg_beli"].'</td>
            <td>Rp. '.number_format($list["hrg_beli"],0,".",".").' ,-</td>
            <td>'.$list["beli_qty"].'</td>
            <td align="right">Rp. '.number_format($list["beli_total"],0,".",".").' ,-</td>
        </tr>';
}

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " Belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " Seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " Seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
    }
    return $temp;
}

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return $hasil;
}
$html.='
        <table cellspacing="1" bgcolor="#666666" cellpadding="2">
            <tr bgcolor="#ffffff">
                <td colspan="4" style="width: 271px;"></td>
                <td colspan="2" align="center">Total Pembelian</td>
                <td align="right" style="width: 100px;">Rp. '.number_format($pembelian['total_beli'],0, ".",".").' ,-</td>
            </tr>
        </table>
        
        <table cellspacing="1" bgcolor="#666666" cellpadding="2">
            <tr bgcolor="#ffffff">
                <td style="width: 529px;">Terbilang : <i>'.terbilang($pembelian['total_beli']).' Rupiah</i></td>
            </tr>
        </table>
';
$html.='
        <p bgcolor="#ffffff">============================================================================</p>
        
        <table align="center" cellspacing="1" bgcolor="#666666" cellpadding="2">
            <tr bgcolor="#ffffff">
                <td style="width: 264px;">Dibuat Oleh
                    <br>
                    <br>
                    <br>
                    <br>
                    ................................
                </td>
                <td style="width: 264px;">Mengetahui
                    <br>
                    <br>
                    <br>
                    <br>
                    ................................
                </td>
            </tr>
        </table>
';
$html.='</table>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output(''.$pembelian['nomor_po'].'.pdf', 'I');