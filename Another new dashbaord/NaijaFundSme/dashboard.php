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

	<title> Sme's Dashboard </title>
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

	</style>
<body>
	<!-- Sidebar nav -->
	<section id="sidebar">
		<a href="#" class="brand">	
			 Naija <span id="funding"> FundSme </span> 
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text"> Dashboard </span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text"> Start a NaijaFundSme </span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-bank'></i>
					<span class="text"> Balance </span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-wallet' ></i>
					<span class="text"> Wallet </span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text"> Goals </span>
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
			<a href="#" class="nav-link"> Wallet </a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
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
					<h1> Welcome, Wisdom Dakoh </h1>
					<ul class="breadcrumb">
						<li>
							<a href="#"> Dashboard </a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' style="color: green" ></i>
					<span class="text">
						<h3>  </h3>
						<p> Overview </p>
					</span>
				</li>
				
				<li>
					<i class="fa-solid fa-naira-sign"></i>
					<span class="text">
						<h3> #0.00 </h3>
						<p> Available Balance </p>
					</span>
				</li>
			</ul>

		</main>
	</section>

	
	<!-- Scripting -->
	<script src="js/script.js"></script>
</body>
</html>
<!-- Coded By Code-In -->