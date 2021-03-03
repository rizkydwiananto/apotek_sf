<?php
$pdf = new Pdf('P', 'mm', 'A5', true, 'UTF-8', false);
$pdf->SetTitle('Struk');
$pdf->SetHeaderMargin(10);
$pdf->SetTopMargin(10);
$pdf->setFooterMargin(10);
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');
$pdf->AddPage();

$html='
        <table align="center">
            <tr>
                <td style="font-size: 20px"><b>APOTEK SAHABAT FARMA</b></td>
            </tr>
            <tr>
                <td>Jl. Pangkalan Jati, RT.001/10 No. 13, Cipinang Melayu, Jakarta Timur 13620</td>
            </tr>
            <tr>
                <td>Telp. (021) 8631634 | 085609948038</td>
            </tr>
        </table>
        
        <h6>===================================================================================================================</h6>
        
        <table align="center">
            <tr>
                <td>No. Struk : '.$penjualan['nomor_struk'].'</td>
                <td>Tgl. Cetak: '.$penjualan['tgl_jual'].'</td>
                <td>Kasir : '.$penjualan['nama_user'].'</td>
            </tr>
        </table>
        
        <h6>===================================================================================================================</h6>
        
        <table>
            <tr>
                <td>Nama Customer / Pasien</td>
                <td style="width: 20px;">:</td>
                <td>'.$penjualan['customer'].'</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>'.$penjualan['alamat'].'</td>
            </tr>
            <tr>
                <td>Nomor Telpon</td>
                <td>:</td>
                <td>'.$penjualan['telpon'].'</td>
            </tr>
        </table>
        
        <h6>===================================================================================================================</h6>
        
        <table>
            <tr>
                <td style="width: 25px;" align="center">No<br></td>
                <td style="width: 90px;" align="center">Kode Barang</td>
                <td style="width: 310px;" align="center">Nama Barang</td>
                <td align="center" style="width: 100px;">Sub Total</td>
            </tr>';

$no = 0;
foreach ($penjualan_detail as $list){
    $no++;
$html.='
        <tr bgcolor="#ffffff">
            <td align="center">'.$no.'</td>
            <td align="center">'.$list["kode_brg"].'</td>
            <td align="center">
                '.$list["nama_barang"].' '.$list["satuan_brg"].' <br>
                . &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Rp. '.number_format($list["hrg_jual"],0,".",".").',- &nbsp; &nbsp; X &nbsp; &nbsp; '.$list["jual_qty"].' <br>
            </td>
            <td align="right"><br> <br> Rp. '.number_format($list["jual_total"],0,".",".").' ,-</td>
        </tr>';
}

$html.='
        <h6>===================================================================================================================</h6>
        <table>
            <tr bgcolor="#ffffff">
                <td style="width: 250px;"></td>
                <td style="width: 110px;">Total</td>
                <td style="width: 160px" align="right">Rp. '.number_format($penjualan["jumlah_total"],0,".",".").',-</td>
            </tr>
            <tr bgcolor="#ffffff">
                <td></td>
                <td>Pembulatan</td>
                <td align="right">Rp. '.number_format($penjualan["pembulatan"],0,".",".").',-</td>
            </tr>
        </table>
        
        <h6>===================================================================================================================</h6>
        
        <table>
            <tr bgcolor="#ffffff">
                <td style="width: 250px;"></td>
                <td style="width: 110px; font-size: 20px"><b>Sub Total</b></td>
                <td style="width: 160px; font-size: 20px" align="right"><b>Rp. '.number_format($penjualan["total_jual"],0,".",".").',-</b></td>
            </tr>
        </table>
        
        <h6>===================================================================================================================</h6>
        
        <table>
            <tr bgcolor="#ffffff">
                <td style="width: 250px;"></td>
                <td style="width: 110px; font-size: 15px">Pembayaran</td>
                <td style="width: 160px; font-size: 15px" align="right">Rp. '.number_format($penjualan["bayarcash"],0,".",".").',-</td>
            </tr>
            <tr bgcolor="#ffffff">
                <td></td>
                <td style="width: 110px; font-size: 20px"><b>Kembalian</b></td>
                <td style="width: 160px; font-size: 20px" align="right"><b>Rp. '.number_format($penjualan["kembali"],0,".",".").',-</b></td>
            </tr>
        </table>      
        
        <h6>===================================================================================================================</h6>
        <h1></h1>
        <h1></h1>
        
        <table align="center">
            <tr>
                <td>TERIMA KASIH</td>
            </tr>
            <tr>
                <td>-- Semoga Lekas Sembuh --</td>
            </tr>
        </table>
';
$html.='</table>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output(''.$penjualan['nomor_struk'].'.pdf', 'I');