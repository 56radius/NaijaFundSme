<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> NaijaFundSme </title>

    <!-- styling -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<!-- countdown styling -->
<style type="text/css">
    #Count-Down{
        position: absolute;
        top: 150%;
        left: 50%;
        transform: translateX(-50%) translateY(-50%);
        text-align: center;
        border: 1px solid #ccc; 
        padding: 10px;
        border-radius: 7px;
        background: #097730;
        box-shadow: 0 .5rem 3rem rgba(0,0,0,.9);
    }

    #info{
        font-size: 60px;
    }

    #count {
        font-size: 50px;
        color:red;
        font-style: italic;
        display: block;
        margin-left: 50px;
    }
</style>
<body>

    <!-- header -->
    <header>
        <a href="#" class="logo"><span id="fund"> NaijaFundSme </span></a>
        <input type="checkbox" id="menu-bar">
        <label for="menu-bar" class="fas fa-bars"></label>

            <!-- navbar -->
            <nav class="navbar">
                <a href="#home"> Home </a>
                <a href="#countdown"> Countdown </a>
                <a href="#services"> Services </a>
                <a href="#about"> About </a>
                <a href="#contact"> Contact </a>
            </nav>
    </header>


    <!-- home section -->
    <section class="home" id="home">
        <div class="content">
            <h3> Naija <span id="fund"> FundSme </span></h3>
            <p> Good day ladies and gentlemen welcome to NaijafundSME  in nigeria. NaijafundSME uses a platform called crowd funding so that you the users can cut in time and other ventures can register their own ventures and access their own grant. </p>
            <a href="Get_started" class="btn"> Get Started </a>
        </div>

        <div class="image">
            <img src="img/hello.png" alt="">
        </div>
    </section>


    <!-- Countdown -->
    <section class="countdown" id="countdown">
        <h1 class="heading"><span> Countdown </span></h1>
                <!-- Waiting for marvelous -->
                <table id="Count-Down">
                    <tr id="info">
                        <td colspan="4"> NaijaFundSme </td>
                    </tr>

                    <tr id="info">
                        <td id="days"></td>
                        <td id="hours"></td>
                        <td id="minutes"></td>
                        <td id="seconds"></td>
                    </tr>

                    <tr>
                        <td>Days</td>
                        <td>Hours</td>
                        <td>Minutes</td>
                        <td> Seconds</td>
                    </tr>
                </table>
                    <span id="count"></span>
            </div>
    </section>


    <!-- services -->
    <section class="services" id="services">
        <h1 class="heading"> Services </h1>

        <div class="box-container">
            <div class="box">
                <img src="images/f-icon1.png" alt="">
                <h3> Safe Transactions </h3>
                <p> We have provided a safe transaction between ventures and their customers which is now trusted by 80 percent of Nigerians. </p>
                <a href="#" class="btn">read more</a>
            </div>

            <div class="box">
                <img src="images/f-icon2.png" alt="">
                <h3> Trust & Partnership </h3>
                <p> NaijaFundSME is the one place where trust and partnership can exist peacefully because there is a free one to one business transaction which can attract more ventures in the country. </p>
                <a href="#" class="btn">read more</a>
            </div>

            <div class="box">
                <img src="images/f-icon3.png" alt="">
                <h3> Digital Marketing </h3>
                <p> Day by day NaijaFundSME team are always working to improve the marketing strategy through technology which can benefit Nigerians. </p>
                <a href="#" class="btn">read more</a>
            </div>
        </div>
    </section>

    <!-- about -->
    <section class="about" id="about">
        <h1 class="heading"> About </h1>
            <div class="column">
                <div class="image">
                    <img src="images/about-img.png" alt="">
                </div>

                <div class="content">
                    <h3> The best and perfect solution for investment, loans and funding </h3>
                    <p> All users are meant to have loaned or invested before the countdown expires once the countdown expires, users will not be able to make loans and ventures will not be able to invest. </p>
                    <p> We are here to provide a safe transaction and remove all errors in the world of fintech. This is NaijaFundSme. You can subscribe so you can get the latest updates and contenfts. </p>
                        <div class="buttons">
                            <a href="#" class="btn"> <i class="fab fa-apple"></i> app store </a>
                            <a href="#" class="btn"> <i class="fab fa-google-play"></i> google-play </a>
                         </div>
                </div>
            </div>
    </section>

    <!-- newsletter  -->
    <div class="newsletter">
        <h3 style="color: #097730">Subscribe For New Features</h3>
        <p style="color: black"> Subscribe to get the latest contents about us </p>
            <form action="">
                <input type="email" placeholder="enter your email">
                <input type="submit" value="Subscribe">
            </form>
    </div>

    <!-- Contact -->
    <section class="contact" id="contact">
        <div class="image">
            <img src="images/contact-img.png" alt="">
        </div>
        <form action="">
            <h1 class="heading">contact us</h1>
                <div class="inputBox">
                    <input type="text" required>
                    <label>name</label>
                </div>

                <div class="inputBox">
                    <input type="email" required>
                    <label>email</label>
                </div>

                <div class="inputBox">
                    <input type="number" required>
                    <label>phone</label>
                </div>

                <div class="inputBox">
                    <textarea required name="" id="" cols="30" rows="10"></textarea>
                    <label>message</label>
                </div>

                <input type="submit" class="btn" value="send message">
        </form>
    </section>

    <!-- footer  -->
    <div class="footer">
        <div class="box-container">
            <div class="box">
                <h3 style="color: black">about us</h3>
                <p style="color: black">We have created a good platform for a safe transaction between investors, clients or curstomers, ventures and other parties.</p>
            </div>

            <div class="box">
                <h3 style="color: black">quick links</h3>
                <a href="#home" style="color: black">Home</a>
                <a href="#countdown" style="color: black"> Countdown </a>
                <a href="#services" style="color: black"> Services </a>
                <a href="#about" style="color: black"> About </a>
                <a href="#contact" style="color: black"> Contact </a>
            </div>

            <div class="box">
                <h3 style="color: black"> follow us </h3>
                    <a href="#" style="color: black">facebook</a>
                    <a href="#" style="color: black">instagram</a>
                    <a href="#" style="color: black">pinterest</a>
                    <a href="#" style="color: black"s>twitter</a>
            </div>

            <div class="box">
                <h3 style="color: black">contact info</h3>
                    <div class="info">
                        <i class="fas fa-phone"></i>
                        <p style="color: black"> 08101295652 <br> 081443292 </p>
                    </div>
                    <div class="info">
                        <i class="fas fa-envelope"></i>
                        <p style="color: black"> cussmeritmohammed@gmail.com <br> marvelloussolomon49@gmail.com <br> wizzydreadmil@gmail.com <br> toluadtech@gmail.com </p>
                    </div>
                    <div class="info">
                        <i class="fas fa-map-marker-alt"></i>
                        <p style="color: black"> Ogun state, Nigeria - 400104 </p>
                    </div>
            </div>       
        </div>

        <!-- end-credit -->
        <h1 class="credit"> Created By Code-In </a> | &#169; 2022 All Rights Reserved </h1>
    </div>

        <!-- scripting -->
        <script>
        // Set the date we're counting down to
            var countDownDate = new Date("April 12,2022 15:20:10").getTime();
                var x = setInterval(function() {
                    var now = new Date().getTime();
    
                        var expire = countDownDate - now;   
                            let d = Math.floor(expire / (1000 * 60 * 60 * 24));
                            let h = Math.floor((expire % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            let m = Math.floor((expire % (1000 * 60 * 60)) / (1000 * 60));
                            let s = Math.floor((expire % (1000 * 60)) / 1000)
  
                            document.getElementById("days").innerHTML = d;
                            document.getElementById("hours").innerHTML = h;
                            document.getElementById("minutes").innerHTML =m;
                            document.getElementById("seconds").innerHTML = s;
  
                            if (expire < 0) {
                                clearInterval(x);
                                x.nextElementSibling.textContent = "Expired";
                            }
                }, 1000);
        </script>
</body>
</html>
<!-- Coded By Code-In -->