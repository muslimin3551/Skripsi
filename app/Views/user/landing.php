<?= $this->extend('template/landing_page/home_layout') ?>

<?= $this->section('content') ?>
<div id="first">
	<div class="jumbotron jumbotron-fluid welcome-div" style="padding-top: 15%;">
		<div class="row">
			<div class="col-md-8">
				<h1 class="h1">Hello, Welcome To This Website</h1>
				<br>
				<br>
				<p>This is a website for TOEIC materials and practice tests. It’s such designed to give Global Students a different experience of accessing the TOIEC Materials and working on the Practice Tests. You will find 5 units of discussions followed by the total of 250 questions served as practice tests and 100 question items in the review part. Explore all parts and sharpen your English test mastery. Go for it!</p>
				<br>
				<br>
				<h1>Are you ready to Test?</h1>
			</div>
			<div class="col-md-4">
				<img src="<?= base_url('img/idea.png') ?>" width="100%" height="100%" alt="ilustrator">
			</div>
		</div>
	</div>
</div>
<div id="home">
	<div class="container text-center" style="padding-top: 10%;">
		<h1 class="center">Our Feature</h1>
		<hr>
		<br>
		<div class="row">
			<div class="col-md-6  text-left">
				<div class="card">
					<div class="card-body">
						<h2 class="card-title"><i class="fas fa-fw fa-sitemap"></i> Module Test</h2>
						<br>
						<br>
						<p class="card-text">updated TOEIC sample questions module.</p>
					</div>
				</div>
				<hr>
				<div class="card">
					<div class="card-body">
						<h2 class="card-title"><i class="fas fa-fw fa-list"></i> Unit Test</h2>
						<br>
						<br>
						<p class="card-text">TOEIC test questions are updated and appear most often on tests.</p>
					</div>
				</div>
				<hr>
				<div class="card">
					<div class="card-body">
						<h2 class="card-title"><i class="fa fa-scroll"></i> Test Annaouncement</h2>
						<br>
						<br>
						<p class="card-text">announcement of the latest test schedule and events related to TOEIC.</p>
					</div>
				</div>
				<hr>
				<div class="card">
					<div class="card-body">
						<h2 class="card-title"><i class="fa fa-user-secret"></i> Tips & Tricks</h2>
						<br>
						<br>
						<p class="card-text">very useful tips and tricks on how to do the TOEIC test.</p>
					</div>
				</div>
				<hr>
			</div>
			<div class="col-md-6">
				<img src="<?= base_url('img/website-maintenance.png') ?>" width="100%" height="80%" alt="ilustrator">
			</div>
		</div>
	</div>
	<div id="about">
		<div class="container">
			<div class="text-center">
				<h1>About Us</h1>
			</div>
			<hr>
			<br>
			<div class="row">
				<div class="col-md-6 p-5">
					<img src="<?= base_url('img/website-interface.png') ?>" width="100%" height="100%" alt="ilustrator">
				</div>
				<div class="col-md-6 p-5">
					<p>Our website design on TOEIC is for the purpose of practices in the Reading Section. We try our best to accommodate the needs of those expecting to sharpen their performance in a test, particularly an English test. The reading part is chosen to help test takers stay more focused since the question items encompass not only sentence structure and grammar but also diverse business-related vocabulary. We do hope that this website can be beneficial and serve as an alternative learning medium to anyone accessing it.</p>
				</div>
			</div>
		</div>
	</div>
	<?= $this->endSection() ?>