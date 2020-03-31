<html lang="en"><head>
<meta charset="UTF-8">
<title>Lost in space</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
@import url("https://fonts.googleapis.com/css?family=Comfortaa");
* {
  font-family: "Comfortaa", cursive;
}

html {
    overflow-y: hidden; 
    overflow-X: hidden;
}

/* text center */
.center-align {
  text-align: center;
  font-family: roboto, Arial, sans-serif;
}

.space {
  animation: daylight 15s ease infinite;
  background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
  background-size: 400% 400%;
  bottom: 0;
  color: #fff;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
}

.space h1 {
  font-size: 4.2rem;
  line-height: 110%;
  margin: 2.1rem 0 1.68rem 0;
}

.space h3 {
  font-size: 1.64rem;
  font-weight: 400;
  line-height: 110%;
  margin-top: -30px;
}

.space h5 {
  font-size: 1.64rem;
  font-weight: 400;
  line-height: 110%;
  margin-top: -30px;
}

.space .stars {
  height: 100%;
  margin: 0;
  overflow: hidden;
  padding: 0;
  width: 100%;
}

.space div, html .space div, .stars div, .space div:after, html .space div:after, .stars div:after, .space div:before, html .space div:before, .stars div:before {
  position: absolute;
}

body .astronaut, html .astronaut, .stars .astronaut {
  animation: astronaut alternate 25s cubic-bezier(0.37, 0.44, 0.53, 0.59) 0s infinite;
  height: 200px;
  left: 200px;
  position: absolute;
  top: 35%;
  transform: translate(-50%, -50%);
  width: 70px;
}

body .astronaut div, html .astronaut div, .stars .astronaut div, body .astronaut div:after, html .astronaut div:after, .stars .astronaut div:after, body .astronaut div:before, html .astronaut div:before, .stars .astronaut div:before {
  background: white;
}

body .astronaut .head, html .astronaut .head, .stars .astronaut .head {
  border-radius: 80px / 65px;
  height: 65px;
  left: -2px;
  top: -3px;
  width: 75px;
}

body .astronaut .head:before, html .astronaut .head:before, .stars .astronaut .head:before {
  background: #213f5b;
  border-radius: 100px / 80px;
  box-shadow: inset -5px -5px 0 rgba(225, 225, 225, 0.75);
  content: '';
  height: 40px;
  left: 10px;
  top: 17px;
  width: 55px;
}

body .astronaut .head:after, html .astronaut .head:after, .stars .astronaut .head:after {
  background: white;
  border-radius: 100%;
  box-shadow: 5px -7px 0 -1.5px white;
  content: '';
  height: 5px;
  left: 20px;
  top: 30px;
  width: 5px;
}

body .astronaut .torso, html .astronaut .torso, .stars .astronaut .torso {
  background: transparent;
  border-bottom: 62px solid white;
  border-left: 6px solid transparent;
  border-radius: 5px;
  border-right: 6px solid transparent;
  height: 0;
  top: 65px;
  width: 45px;
}

body .astronaut .torso:before, html .astronaut .torso:before, .stars .astronaut .torso:before {
  background: #b14b4f;
  border-radius: 10px;
  box-shadow: -8px 60px 0 1px #b14b4f, 8px 60px 0 1px #b14b4f;
  content: '';
  height: 7px;
  left: -2px;
  top: -5px;
  width: 50px;
}

body .astronaut .torso:after, html .astronaut .torso:after, .stars .astronaut .torso:after {
  background: #a4d2a4;
  border-left: 25px solid #ecb28a;
  border-top: 10px solid transparent;
  content: '';
  height: 0;
  left: 10px;
  top: 15px;
  width: 0;
}

body .astronaut .arms, body .astronaut .arms:before, body .astronaut html .astronaut .arms:before, html .astronaut body .astronaut .arms:before, body .astronaut .stars .astronaut .arms:before, .stars .astronaut body .astronaut .arms:before, html .astronaut .arms, html .astronaut .arms:before, html .astronaut .stars .astronaut .arms:before, .stars .astronaut html .astronaut .arms:before, .stars .astronaut .arms, .stars .astronaut .arms:before {
  background-image: linear-gradient(to left, transparent 44px, #c0636a 0, #c0636a 50px, transparent 48px);
  background-position: 0 20px;
  border-radius: 5px;
  height: 15px;
  left: -50px;
  top: 60px;
  transform: rotate(20deg);
  width: 60px;
}

body .astronaut .arms:before, html .astronaut .arms:before, .stars .astronaut .arms:before {
  background-image: linear-gradient(to right, transparent 44px, #c0636a 0, #c0636a 50px, transparent 48px);
  content: '';
  left: 86px;
  top: -32px;
  transform: rotate(-40deg);
}

body .astronaut .hands, body .astronaut .hands:before, body .astronaut html .astronaut .hands:before, html .astronaut body .astronaut .hands:before, body .astronaut .stars .astronaut .hands:before, .stars .astronaut body .astronaut .hands:before, html .astronaut .hands, html .astronaut .hands:before, html .astronaut .stars .astronaut .hands:before, .stars .astronaut html .astronaut .hands:before, .stars .astronaut .hands, .stars .astronaut .hands:before {
  background: white;
  border-radius: 10px;
  box-shadow: 5px 6px 0 -1px white;
  height: 10px;
  left: -13px;
  top: -4px;
  transform: rotate(20deg);
  width: 20px;
}

body .astronaut .hands:before, html .astronaut .hands:before, .stars .astronaut .hands:before {
  background: white;
  box-shadow: 5px -5px 0 -1px white;
  content: '';
  left: 115px;
  top: -96px;
  transform: rotate(100deg);
}

body .astronaut .legs, body .astronaut .legs:before, body .astronaut html .astronaut .legs:before, html .astronaut body .astronaut .legs:before, body .astronaut .stars .astronaut .legs:before, .stars .astronaut body .astronaut .legs:before, html .astronaut .legs, html .astronaut .legs:before, html .astronaut .stars .astronaut .legs:before, .stars .astronaut html .astronaut .legs:before, .stars .astronaut .legs, .stars .astronaut .legs:before {
  background-image: linear-gradient(to top, transparent 10px, #71b4d2 10px, #71b4d2 15px, transparent 15px, transparent 25px, #c0636a 24px, #c0636a 15px);
  background-position: 0 60px;
  background-size: 1px 30px;
  border-radius: 10px;
  height: 80px;
  top: 120px;
  transform: rotate(10deg);
  width: 20px;
  z-index: -2;
}

body .astronaut .legs:before, html .astronaut .legs:before, .stars .astronaut .legs:before {
  background-position: 0 44px;
  content: '';
  left: 40px;
  top: -8px;
  transform: rotate(160deg);
}

body .astronaut .feet, body .astronaut .feet:before, body .astronaut html .astronaut .feet:before, html .astronaut body .astronaut .feet:before, body .astronaut .stars .astronaut .feet:before, .stars .astronaut body .astronaut .feet:before, html .astronaut .feet, html .astronaut .feet:before, html .astronaut .stars .astronaut .feet:before, .stars .astronaut html .astronaut .feet:before, .stars .astronaut .feet, .stars .astronaut .feet:before {
  border-radius: 10px 0 3px 4px;
  height: 15px;
  left: -15px;
  top: 65px;
  width: 35px;
}

body .astronaut .feet:before, html .astronaut .feet:before, .stars .astronaut .feet:before {
  border-radius: 0 10px 3px 6px;
  content: '';
  left: 67px;
  top: -12px;
  transform: rotate(-20deg);
}

.stars {
  background-image: radial-gradient(circle, rgba(250, 250, 250, 0.8) 50%, transparent 50%), radial-gradient(circle, rgba(250, 250, 250, 0.2) 50%, transparent 50%), radial-gradient(circle, rgba(250, 250, 250, 0.5) 50%, transparent 50%), radial-gradient(circle, rgba(250, 250, 250, 0.4) 50%, transparent 50%), radial-gradient(circle, rgba(250, 250, 250, 0.7) 50%, transparent 50%), radial-gradient(circle, rgba(250, 250, 250, 0.8) 50%, transparent 50%), radial-gradient(circle, rgba(250, 250, 250, 0.4) 50%, transparent 50%), radial-gradient(circle, rgba(250, 250, 250, 0.6) 50%, transparent 50%), radial-gradient(circle, rgba(250, 250, 250, 0.5) 50%, transparent 50%);
  background-position: 60% 20%, 20% 80%, 90% 70%, 25% 48%, 55% 75%, 30% 40%, 50% 60%, 80% 35%, 10% 20%;
  background-repeat: no-repeat;
  background-size: 20px 20px, 10px 10px, 20px 20px, 20px 20px, 20px 20px, 15px 15px, 11px 11px, 22px 22px, 8px 8px;
}

.stars .saturn {
  background: linear-gradient(170deg, #f79fa9 10%, #bf4997 30%, #531b96 60%);
  border-radius: 100%;
  height: 100px;
  left: 80%;
  top: 70%;
  transform: rotate(-20deg);
  width: 100px;
  z-index: 1;
}

.stars .saturn.top {
  clip: rect(0px, 100px, 50px, 0px);
  z-index: 2;
}

.stars .ring {
  border: 3px solid #fc9ca4;
  border-radius: 50%;
  height: 20px;
  left: 79%;
  top: 74%;
  transform: rotate(160deg);
  width: 135px;
  z-index: 1;
}

.stars .saturn:after {
  border-bottom: 0;
  border-top-left-radius: 120px;
  border-top-right-radius: 120px;
  content: '';
  height: 40px;
  width: 70px;
  z-index: 1;
}

.stars .neptune {
  border-radius: 100%;
  height: 120px;
  left: 20%;
  top: 65%;
  width: 120px;
}

.stars .neptune:before {
  background: linear-gradient(145deg, #a4ea84 10%, #458da5, #3a2d3b 70%);
  border-radius: 100%;
  content: '';
  height: 70px;
  left: 595%;
  top: -210%;
  width: 70px;
}

.stars .jupiter {
  background: linear-gradient(145deg, #fecf4e 1%, #a62a44 50%, #310441 100%);
  border-radius: 100%;
  height: 120px;
  left: 20%;
  top: 65%;
  width: 120px;
  /*background: #f2a822;*/
}

.stars .jupiter:before {
  background: linear-gradient(145deg, #fff75e 10%, #fb4f4c, #321e6f 85%);
  border-radius: 100%;
  content: '';
  height: 50px;
  left: 415%;
  top: 120%;
  width: 50px;
}

.stars .moon {
  background: #FEF2BF;
  /*linear-gradient(145deg, #FEF2BF 10%, #FBE4C9 30%, #BBDED6 60%);*/
  border-radius: 100%;
  height: 180px;
  left: 30%;
  top: 10%;
  width: 180px;
}

.stars .moon:before {
  background: #FBE1B6;
  border-radius: 100%;
  box-shadow: inset -4px -3px 0 0 #E5CDA6, 58px 10px 0 -4px #FBE1B6, 59px 10px 0 -3px #E5CDA6, 63px 35px 0 -6px #FBE1B6, 64px 35px 0 -5px #E5CDA6, 13px 45px 0 -7px #FBE1B6, 14px 45px 0 -6px #E5CDA6, -9px 30px 0 -8px #FBE1B6, -8px 31px 0 -7px #E5CDA6, 9px 28px 0 -9px #FBE1B6, 8px 29px 0 -8px #E5CDA6, 19px 18px 0 -7px #FBE1B6, 19px 19px 0 -6px #E5CDA6, 88px 78px 0 -4px #FBE1B6, 89px 78px 0 -3px #E5CDA6, 38px 68px 0 -2px #FBE1B6, 39px 68px 0 -1px #E5CDA6, 99px -6px 0 -6px #FBE1B6, 99px -5px 0 -5px #E5CDA6, 63px -35px 0 -6px #FBE1B6, 64px -35px 0 -5px #E5CDA6, 9px 95px 0 -9px #FBE1B6, 8px 96px 0 -8px #E5CDA6, 67px 115px 0 -8px #FBE1B6, 68px 116px 0 -7px #E5CDA6, 105px 50px 0 -5px #FBE1B6, 106px 50px 0 -4px #E5CDA6;
  content: '';
  height: 20px;
  left: 20px;
  top: 40px;
  width: 20px;
}

@keyframes astronaut {
  0% {
    left: -15%;
    transform: rotate(20deg);
  }
  50% {
    left: 110%;
  }
  100% {
    left: -15%;
    transform: rotate(780deg);
  }
}
.meteors {
  height: 100%;
  position: absolute;
  width: 100%;
  z-index: 20;
}

.m1, .m2, .m3, .m4 {
  background: radial-gradient(ellipse farthest-corner at 35px -10px, #fff 35%, rgba(0, 0, 0, 0) 60%);
  border-radius: 20%;
  height: 10px;
  position: absolute;
  transform: rotate(210deg) scale(0.5);
  width: 200px;
}

.m1 {
  left: 90%;
  top: 20%;
}

.m2 {
  left: 40%;
  top: 65%;
}

.m3 {
  left: 60%;
  top: 15%;
}

.m4 {
  animation-delay: 2s;
  animation-duration: 5s;
  animation-iteration-count: infinite;
  animation-name: moves;
  left: 80%;
  top: 230%;
}

@-webkit-keyframes moves {
  0% {
    left: 0;
    top: 0;
  }
  100% {
    left: 100%;
    top: 70%;
  }
}
@-webkit-keyframes twinkle {
  0% {
    -webkit-filter: brightness(100%);
  }
  100% {
    -webkit-filter: brightness(150%);
  }
}
@keyframes daylight {
  0% {
    background-position: 0 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0 50%;
  }
}

.back {
	z-index: 10;
  text-decoration: none;
  background: #5b5a5a;
  color: #fff;
  padding: 10px 20px;
  font-size: 20px;
  font-weight: 700;
  line-height: normal;
  text-transform: uppercase;
  border-radius: 3px;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  transform: scale(1);
  transition: all 0.5s ease-out;
}
</style>

</head>
<body class="vsc-initialized">
<div class="space">
<h1 class="center-align"><b>Todo List<br><br>Error 404</b></h1>
<h3 class="center-align">
<span>Page Inconnue</span>
<i class="fa fa-exclamation"></i>
<br><br>
<a href="{{ url('/') }}" class="back">Retour Page d'accueil</a>
</h3>

<div class="stars" style="left: 60px;">
<div class="saturn top"></div>
<div class="saturn"></div>
<div class="ring"></div>
<div class="jupiter"></div>
<div class="neptune"></div>
<div class="moon"></div>
<div class="meteorite"></div>
</div>
<div class="astronaut" style="z-index:25">
<div class="head"></div>
<div class="torso"></div>
<div class="arms">
<div class="hands"></div>
</div>
<div class="legs">
<div class="feet"></div>
</div>
</div>
<div class="meteors">
<div class="m1"></div>
<div class="m2"></div>
<div class="m3"></div>
<div class="m4"></div>
</div>
</div>

</body></html>