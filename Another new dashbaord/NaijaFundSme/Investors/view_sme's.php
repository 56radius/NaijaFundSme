<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

	<!-- Fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	<link rel="stylesheet"  href="dashboard.css">

	<title> View Sme's </title>
</head>
	<style type="text/css">
		#sidebar .side-menu.top li a:hover {
			color: green;
		}

		#sidebar .brand {
			font-size: 24px;
			font-weight: 700;
			height: 56px;
			display: flex;
			align-items: center;
			color: black;
			position: sticky;
			top: 0;
			left: 0;
			background: var(--light);
			z-index: 500;
			padding-bottom: 20px;
			box-sizing: content-box;
		}

		#funding {
			color: green;
		}

		#content nav .nav-link:hover {
			color: green;
		}

		.active {
			color: black;
		}

		#sidebar .side-menu.top li.active a {
			color: black;
		}

		#sidebar .side-menu.top li.active a:hover {
			color: green;
		}

		#content main .head-title .left .breadcrumb li a.active {
			color: black;
			pointer-events: unset;
		}

		#content main .head-title .left .breadcrumb li a.active:hover {
			color: green;
		}

		#content nav form .form-input button {
			width: 36px;
			height: 100%;
			display: flex;
			justify-content: center;
			align-items: center;
			background: green;
			color: var(--light);
			font-size: 18px;
			border: none;
			outline: none;
			border-radius: 0 36px 36px 0;
			cursor: pointer;
		}

		#content nav .switch-mode::before {
			content: '';
			position: absolute;
			top: 2px;
			left: 2px;
			bottom: 2px;
			width: calc(25px - 4px);
			background: green;
			border-radius: 50%;
			transition: all .3s ease;
		}

		/* view sme's css */
		.wrapper .header{
			width: 100%;
			height: 50px;
			background: #e36686;
			color: #fff;
			text-align: center;
			display: flex;
			justify-content: center;
			align-items: center;
			font-size: 20px;
			text-transform: uppercase;
			letter-spacing: 5px;
			font-weight: 900;
		}

		.cards_wrap{
			padding: 20px;
			width: 100%;
			display: flex;
			justify-content: space-between;
			flex-wrap: wrap;
		}

		.cards_wrap .card_item{
			padding: 15px 25px;
			width: 25%;
		}
	
		.cards_wrap .card_inner{
			background: #fff;
			border-radius: 5px;
			padding: 5px 20px;
			min-width: 225px;
			min-height: 315px;
			max-height: 370px;
			width: 100%;
		}

		.cards_wrap .card_item img{
			width: 100%;
			height: 80px;
			margin-bottom: 5px;
		}

		.cards_wrap .card_item .role_name{
			color: green;
			font-weight: 900;
			letter-spacing: 2px;
			text-transform: uppercase;
			font-size: 15px;
			white-space: nowrap;
    		overflow: hidden;
    		text-overflow: ellipsis;
		}

		.cards_wrap .card_item .real_name{
			color: #b6c0c2;
			font-size: 12px;
			font-weight: 100;
			margin: 5px 0 10px;
		}

		.cards_wrap .card_item .film{
			font-size: 14px;
			line-height: 24px;
			color: #7b8ca0;
		}

		@media screen and (max-width: 1024px){
			.cards_wrap .card_item{
				width: 33%;
			}
		}

		@media screen and (max-width: 768px){
			.cards_wrap .card_item{
				width: 50%;
			}
	
			.wrapper .header{
				font-size: 16px;
				height: 60px;
			}
		}

		@media screen and (max-width: 568px){
			.cards_wrap .card_item{
				width: 100%;
			}
	
			.wrapper .header{
				font-size: 14px;
			}
		}
}
	</style>
<body>
	<!-- Sidebar nav -->
	<section id="sidebar">
		<a href="#" class="brand">	
			Naija <span id="funding"> FundSme </span> 
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text"> Dashboard </span>
				</a>
			</li>

			<li>
				<a href="view_sme's.php">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text"> View available Sme's </span>
				</a>
			</li>

			<li>
				<a href="#">
					<i class='bx bxs-bank'></i>
					<span class="text"> Transaction History </span>
				</a>
			</li>

			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text"> Status </span>
				</a>
			</li>
		</ul>
		<hr>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>

	<!-- horizontal nav -->
	<section id="content">
		<!-- Navbar -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search Sme's...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num"> 8 </span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		
		<main>
			<div class="head-title">
				<div class="left">
					<h1> Available Sme's </h1>
					<ul class="breadcrumb">
						<li>
							<a href="#"> view Sme's </a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="dashboard.php">Home</a>
						</li>
					</ul>
				</div>
				
			</div>

			<!-- Sme's card section -->
			<div class="wrapper">
				<div class="cards_wrap">
					<div class="card_item">
						<div class="card_inner">
							<img src="bitcoin.jpg">
							<div class="role_name"> loura, Kano </div>
							<div class="real_name"> Wisdom School </div>
							<div class="film">
								Hi, my name is Dakoh Wisdom and i really need wisdom please fund me in having sense please 
							</div>
							<div class="input-box button">
          						<input type="button" name="" value="Login">
        					</div>
						</div>
					</div>

					<div class="card_item">
						<div class="card_inner">
							<img src="doctor_strange.png">
							<div class="role_name"> Mikwe, Kaduna </div>
							<div class="real_name"> KingstenFund </div>
							<div class="film">
								We are here to gather Nigerians to help support ukraine in the current war between ukraine and russia
							</div>
						</div>
					</div>

					<div class="card_item">
						<div class="card_inner">
							<img src="doctor_strange.png">
							<div class="role_name"> Mikwe, Kaduna </div>
							<div class="real_name"> KingstenFund </div>
							<div class="film">
								We are here to gather Nigerians to help support ukraine in the current war between ukraine and russia
							</div>
						</div>
					</div>

					<div class="card_item">
						<div class="card_inner">
							<img src="doctor_strange.png">
							<div class="role_name"> Mikwe, Kaduna </div>
							<div class="real_name"> KingstenFund </div>
							<div class="film">
								We are here to gather Nigerians to help support ukraine in the current war between ukraine and russia
							</div>
						</div>
					</div>

					<div class="card_item">
						<div class="card_inner">
							<img src="doctor_strange.png">
							<div class="role_name"> Mikwe, Kaduna </div>
							<div class="real_name"> KingstenFund </div>
							<div class="film">
								We are here to gather Nigerians to help support ukraine in the current war between ukraine and russia
							</div>
						</div>
					</div>

					<div class="card_item">
						<div class="card_inner">
							<img src="doctor_strange.png">
							<div class="role_name"> Mikwe, Kaduna </div>
							<div class="real_name"> KingstenFund </div>
							<div class="film">
								We are here to gather Nigerians to help support ukraine in the current war between ukraine and russia
							</div>
						</div>
					</div>

					<div class="card_item">
						<div class="card_inner">
							<img src="doctor_strange.png">
							<div class="role_name"> Mikwe, Kaduna </div>
							<div class="real_name"> KingstenFund </div>
							<div class="film">
								We are here to gather Nigerians to help support ukraine in the current war between ukraine and russia
							</div>
						</div>
					</div>

					<div class="card_item">
						<div class="card_inner">
							<img src="doctor_strange.png">
							<div class="role_name"> Mikwe, Kaduna </div>
							<div class="real_name"> KingstenFund </div>
							<div class="film">
								We are here to gather Nigerians to help support ukraine in the current war between ukraine and russia
							</div>
						</div>
					</div>	
				</div>
		</main>
	</section>
	
	<!-- Scripting -->
	<script src="js/script.js"></script>
</body>
</html>
<!-- Coded By Code-In -->