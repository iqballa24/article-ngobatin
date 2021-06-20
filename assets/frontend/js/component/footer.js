const footer = () => {
    let footerHTML = `
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <h1 class="mb-5 footer__title">Ngobatin<span>.</span></h1>
                            <p>Platform website pembanding harga obat obatan apotek dan perlengkapan penunjang kegiatan luar rumah yang dibangun untuk membantu masyarakat dalam menemukan harga terbaik di masa pandemi.</p>
                        </div>
                        <div class="col-12 ">
                            <a href="" class="button button__sosialmedia"><i class="fab fa-facebook-f" style="width: 30px; color: white;"></i></a>
                            <a href="" class="button button__sosialmedia"><i class="fab fa-linkedin-in" style="width: 30px; color: white;"></i></a>
                            <a href="" class="button button__sosialmedia"><i class="fab fa-instagram" style="width: 30px; color: white;"></i></a>
                            <a href="" class="button button__sosialmedia"><i class="fas fa-envelope" style="width: 30px; color: white;"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ul class="list-group">
                        <li class="list-group__item"><i class="fas fa-map-marker-alt"></i> Jl. Raya, RT.4/RW.1, Meruya Sel., Kec. Kembangan, Jakarta</li>
                        <li class="list-group__item"><i class="fas fa-phone"></i> + 62 812 8431 4407</li>
                        <li class="list-group__item"><i class="fas fa-envelope"></i> admin@ngobatin.com</li>
                    </ul>
                </div>
                <div class="col-12">
                    <div class="box-cprght">
                        <p>Copyright 2021 <span>Ngobatin</span>. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    `
    document.getElementById('footer').innerHTML = footerHTML;
}

export default footer;