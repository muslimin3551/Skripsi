<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<!-- HERO -->
<section class="hero hero-bg d-flex justify-content-center align-items-center">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-10 col-12 d-flex flex-column justify-content-center align-items-center">
				<div class="hero-text">
					<h2 class="text-white" data-aos="fade-up">
						Selamat Datang Di website Kami!
					</h2>
					<p class="text-white" data-aos="fade-up" data-aos-delay="200">
						Sistem Administrasi MI AL-MUBAROK
					</p>

					<a href="#" target="_blank" class="custom-btn btn-bg btn mt-3" data-aos="fade-up" data-aos-delay="100">
						<p style="color: #018249;font-size: 10px;">dapatkan informasi</p>
						Tagihan Sekolah
					</a>
					<a href="#" target="_blank" class="custom-btn btn-bg btn mt-3" data-aos="fade-up" data-aos-delay="100">
						<p style="color: #018249;font-size: 10px;">dapatkan informasi</p>
						Riwayat Pembayaran
					</a>
				</div>
			</div>

			<div class="col-lg-6 col-12">
				<div class="hero-image" data-aos="fade-up" data-aos-delay="300">
					<img src="landing/images/working-girl.png" class="img-fluid" alt="working girl" />
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Our Solution -->
<section class="about section-padding pb-0" id="about">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 mx-auto col-md-10 col-12">
				<h2 class="mb-4 text-center" data-aos="fade-up">
					Sejarah Sekolah
				</h2>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6" data-aos="fade-up">
				<img src="img/sejarah_ilus.png" class="img-fluid" alt="working girl" />
			</div>
			<div class="col-md-6" data-aos="fade-up">
				<p>Madrasah Ibtidaiyah Al-Mubarok berawal Madrasah Diniyah karna perkembangan zaman maka di rubahnya status menjadi Ibtidaiyah awal berdiri Madrasah Ibtidaiyah Al-Mubarok Secara resmi pada tanggal 7 November 1991 dengan nomor registrasi 15202041827 berdasarkan surat keputusan kepala Departemen Agama Provinsi Jawa Barat: w.y/ Hk.008/54/1992 Tanggal 30 Januari 1992' Madrasah Ibtidaiyah Al-Mubarok adalah salah satu satuan pendidikan dengan jenjang MI di panunggangan, kec. pinang kota Tangerang, Banten. Dalam menjalankan kegiatannya, Madrasah Ibtidaiyah Al-Mubarok berada di bawah naungan kementrian Agama.</p>
			</div>
		</div>
	</div>
	</div>
</section>
<!-- Our Team -->
<section class="project section-padding" id="teamkami">
	<div class="container">
		<div class="row" data-aos="fade-up" data-aos-delay="200">
			<div class="col-md-6" style="padding: 5%;">
				<h3 style="color: #0066BB;">TIM BERKAMPUAN LENGKAP</h3>
				<h1>Dipimpin Oleh Praktisi Berpengalaman</h1>
				<p style="color: #000000;">Tim kami terdiri dari beberapa ahli yang dapat
					memberikan solusi di bidang Network Management
					dan Software Development.</p>
			</div>
			<div class="col-md-6">
				<img src="landing/images/project/project-image01.jpg" class="img-fluid" style="border-radius: 5px;" alt="project image" />
			</div>
		</div>
		<div class="row" data-aos="fade-up" data-aos-delay="200">
			<div class="col-md-6"><img src="landing/images/project/project-image02.jpg" class="img-fluid" style="border-radius: 5px;" alt="project image" />
			</div>
			<div class="col-md-6" style="padding: 5%;">
				<h3 style="color: #0066BB;">BERKOLABORASI DENGAN FREELANCE</h3>
				<h1>Disupport oleh banyak Developer</h1>
				<p style="color: #000000;">Kami berkerjasama dengan para developer
					dari berbagai bidang bisnis.</p>
			</div>
		</div>
	</div>
</section>



<!-- TESTIMONIAL -->
<section class="about section-padding" id="tentangkami">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12 col-md-7 col-12 justify-content-center text-center">
				<h2 class="my-5 pt-3" data-aos="fade-up" data-aos-delay="100">
					<strong>Lokasi Sekolah</strong>
				</h2>
				<div class="quote" data-aos="fade-up" data-aos-delay="200"></div>

				<h4 class="mb-4" data-aos="fade-up" data-aos-delay="300">
					MI AL-Mubarok
				</h4>
				<div class="col-md-12" style="height: 290px;margin-bottom: 5%;" data-aos="fade-up" data-aos-delay="200">
					<div class="mapouter">
						<div class="gmap_canvas"><iframe width="1080" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=JL.%20KH.%20Dero%20Rt004/003,%20Kp.%20kosong,%20Panunggangan,%20%20Kec.%20Pinang%20Kota%20Tangerang%20Banten.&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies-online.net"></a><br>
							<style>
								.mapouter {
									position: relative;
									text-align: right;
									height: 500px;
									width: 1080px;
								}
							</style><a href="https://www.embedgooglemap.net"></a>
							<style>
								.gmap_canvas {
									overflow: hidden;
									background: none !important;
									height: 500px;
									width: 1080px;
								}
							</style>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<br>
					<br>
				</div>
			</div>
		</div>
	</div>
</section>
<?= $this->endSection() ?>