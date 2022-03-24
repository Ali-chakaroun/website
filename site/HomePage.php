<?php
include_once 'header.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    
</head>
<body>

    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" id="Closebtn" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <a href="#" onclick="infoOpen1()">

                <img src="Infopic/1.jpg" alt="" class="Dog1">
                <h2>About</h2>
                <!--<h3>
                    We help all the desperate animals wanthing attentions.
                    <br>
                    We have facilities all over the world that fight to help the needed.
                </h3>-->
                <h3></h3>
            </a>
        </div>
        <div class="overlay-content" onclick="infoOpen2()">
            <a href="#">

                <img src="Infopic/2.jpg" alt="" class="Dog">
                <h2>Services</h2>
                <!--<h3>We provide services like:
                <br />Animal shelter.
                <br />Medical care.</h3>-->
            </a>
        </div>
        <div class="overlay-content" onclick="infoOpen3()">
            <a href="#">

                <img src="Infopic/3.jpg" alt="" class="Dog">
                <h2>Contact</h2>
            </a>
        </div>
        <div class="overlay-content">
            <a href="Waldo.php">

                <img src="Infopic/4.jpg" alt="" class="Dog">
                <h2>Find Waldo</h2>
                <!--<h3>Help us find the number 1 criminal in the universe.</h3>-->
            </a>
        </div>

    </div>
    <div class="About-overlay" id="info1">
        <a href="javascript:void(0)" class="closebtn" onclick="infoClose1()">&times;</a>
        <div class="About-us">
            <p>
                We are a team of animal lovers with a mission to help the animals in need.
                <br />
                Our team consist of animal lovers witha  goal to save wounded/left out animals and finding them a new owner/home to go to.
            </p>


        </div>
        <div class="About-us-images">
            <img src="About-us/1.jpg">
            <img src="About-us/2.jpg">
            <img src="About-us/3.jpg">
        </div>
    </div>

    <div class="Services-overlay" id="info2">
        <a href="javascript:void(0)" class="closebtn" onclick="infoClose2()">&times;</a>
        <div class="Services">
            <p>
                We proved animal services like:
                <br />
                Healthcare.
                <br />
                Dog hotel.
                <br />
                barber shop.
                <br />
                ETC.
            </p>


        </div>
        <div class="Services-images">
          <img src="About-us/1.jpg">
          <img src="About-us/2.jpg">
          <img src="About-us/3.jpg">
        </div>
    </div>

    <div class="Services-overlay" id="info3">
        <a href="javascript:void(0)" class="closebtn" onclick="infoClose3()">&times;</a>
        <div class="Contact">
            <p>
                To contact us for more informations:
                <br />
                phone number: 000-9982131
                <<br />
                email: animallover@yahoooooo.com
                <br />
                fax: 06823131122
            </p>


        </div>
        <div class="Contact-images">
            <!--<img src="Services/1.jpg">
            <img src="Services/2.jpg">
            <img src="Services/3.jpg">-->
        </div>
    </div>

    <div class="Tab">
      <?php
      if (isset($_SESSION["username"])) {
        echo "<p> Welcome " .$_SESSION["username"]."</p>";
      }
      ?>
    </div>
    <div class="Tab">
        <div id="Button" class="button">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

        </div>
    </div>

        <script>
            function openNav() {
                document.getElementById("myNav").style.width = "100%";
                document.getElementById("Button").style.visibility = "hidden";
            }

            function closeNav() {
                document.getElementById("myNav").style.width = "0%";
                document.getElementById("Button").style.visibility = "visible";
            }
            function infoOpen1() {
                document.getElementById("info1").style.width = "100%";
                document.getElementById("Closebtn").style.visibility = "hidden";

            }
            function infoClose1() {
                document.getElementById("info1").style.width = "0";
                document.getElementById("Closebtn").style.visibility = "visible";
            }
            function infoOpen2() {
                document.getElementById("info2").style.width = "100%";
                document.getElementById("Closebtn").style.visibility = "hidden";

            }
            function infoClose2() {
                document.getElementById("info2").style.width = "0";
                document.getElementById("Closebtn").style.visibility = "visible";
            }
            function infoOpen3() {
                document.getElementById("info3").style.width = "100%";
                document.getElementById("Closebtn").style.visibility = "hidden";

            }
            function infoClose3() {
                document.getElementById("info3").style.width = "0";
                document.getElementById("Closebtn").style.visibility = "visible";
            }

        </script>


        <div class="Tab">
            <div class="images">
                <div class="IMG">
                    <a href="Doggallary.php">
                        <img src="DogPic/doghomepage.jpg" alt="" class="Dog">

                        <h2>See more Dogs</h2>

                    </a>
                </div>
                <div class="IMG">
                    <a href="Catgallary.php">
                        <img src="CatPic/Cathomepage.jpg" alt="">

                        <h2>See more Cats</h2>
                    </a>
                </div>
                <div class="IMG">
                    <a href="Birdgallary.php">
                        <img src="BirdPic/Birdhomepage.jpg" alt="">

                        <h2>See more Birds</h2>
                    </a>
                </div>
                <div class="IMG">
                    <a href="Liongallary.php">
                        <img src="LionPic/Lionhomepage.jpg" alt="">

                        <h2>See more Lions</h2>
                    </a>
                </div>
                <!--<div class="IMG">
                    <a href="Liongallary.html">
                        <img src="LionPic/Lionhomepage.jpg" alt="">

                        <h2>See more Lions</h2>
                    </a>
                </div>-->
            </div>
        </div>


</body>
</html>
