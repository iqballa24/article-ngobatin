<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/css/main.css'); ?>">
    <title>Ngobatin</title>
</head>
<body>

    <main>

        <!-- <div id="carousel"></div> -->

        <div class="search__section">
            <h1>Cari obat terlengkap</h1>
            <p class="p_title">Di sini kamu bisa mencari dan membandingkan harga obat dari berbagai toko/apotek di seluruh Indonesia. Mulai pencarianmu sekarang yuk!</p>
            <div class="search__box">
                <input id="search" class="searchbar" type="text" title="Search" placeholder="Cari nama obat...">
                <i class="fas fa-search icon__search"></i>
            </div>
            
            <select id="selector" class=" button custom-select search__select" id="inputGroupSelect01">
                <option value="obatBatuk">Obat Batuk</option>
                <option value="obatHerbal">Obat Herbal</option>
                <option value="obatDemam">Obat Demam</option>
                <option value="obatKulit">Obat Kulit</option>
                <option value="alatKesehatan">Alat Kesehatan</option>
            </select>
            
            <!-- jumlah hasil pencarian -->
            <h3 class="count__result" id="count_result"></h3>

            <!-- hasil pencarian -->
            <div id="resultlist" class="resultlist row mt-5"></div>

            <!-- spinner -->
            <div id="spinner" class="text-center">
                <div class="spinner-border text-info" style="width: 5rem; height: 5rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <!-- selected item -->
            <div id="selectedItem" class="row">

            </div>
            <!-- <div class="text-center">
                <button href="" class="button button__primary load__more col-6">Load more</button>
            </div> -->

        </div>
    </main>

    <script type="module" src="<?= base_url('assets/frontend/js/app.js'); ?>"></script>

</body>
</html>