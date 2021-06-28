<?php
    include './db/db_connect.php';
    include './helpers/helpers.php';
    
    $result = mysqli_query($conn, "SELECT * FROM paket" );
    $detail_result = mysqli_query($conn, "SELECT * FROM paket_detail" );

?>

<div class="section_three">
    <div class="container" style="max-width: 70%;">
        <div class="paket_hosting">
            <span class="title">Paket Hosting Singapura yang Tepat</span><br>
            <span class="desc">Diskon 40% + Domain dan SSL Gratis untuk Anda</span>
        </div>
        <div class="row wrapper">
            <?php foreach ($result as $key => $value) { ?>
            <div class="col-md-6 col-lg-6 col-xl-3 text-center text-dark">
                <div class="basic <?php echo $value['is_best_seller'] ? 'best_seller' : '' ?> ">
                    <?php
                        if ($value['is_best_seller']) { ?>
                        <div class="ribbon"><span>Recommend</span></div>
                    <?php } ?>
                    <div class="price-section">
                        <span class="judul_tabel"><?php echo $value['nama'] ?></span><br><br>
                        <span class="harga_awal">Rp <?php echo number_format($value['harga_awal'] ,0,',','.') ?></span><br>
                        <span class="diskon">
                            <sup style="top: -1.3em" class="rupiah">Rp </sup>
                            <span class="h1"> <?php echo format_price($value['harga_diskon'], 0) ?> </span>
                            <sup class="ribuan" style="top: -1.3em">.<?php echo format_price($value['harga_diskon'], 1) ?></sup>
                            <sup class="per_bulan" style="top: -1.3em">/ bln</sup>
                        </span><br>
                        <span class="member"><span class="total"><?php echo $value['total_pengguna'] ?> </span>Pengguna Terdaftar</span>
                    </div>
                    <div class="text-muted item-list desc_fitur">
                        <?php foreach ($detail_result as $key => $detail) { ?>
                            <?php
                            if ($value['id'] == $detail['paket_id']) { ?>
                                <span><small class="text-muted"><?php echo $detail['nama'] ?><br></small></span>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="button"><a href="#" class="btn btn-sm btn-rounded" data-abc="true">Pilih
                            Sekarang</a></div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>