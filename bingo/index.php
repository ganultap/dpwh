<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../images/dpwh_logo.png" type="image/x-icon">

    <title>DPWH Bingo!</title>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,500;1,600&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Climate+Crisis&family=Poppins:ital,wght@0,500;0,600;0,700;1,500;1,600&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Anton&family=Climate+Crisis&family=Poppins:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Tilt+Prism&display=swap");

body {
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    background-image: linear-gradient(to bottom right, #05014a, #ff4d01);
}
/* Add animation for button click */
.clicked {
  transform: scale(0.95);
  transition: transform 0.6s ease;
}

/* Style locked cells to visually indicate that they are disabled */
.bingo2.locked {
  pointer-events: none; /* Disable pointer events on locked cells */
  opacity: 0.5; /* Optionally reduce opacity to visually indicate disabled state */
}

td {
    min-width: 55px;

}
body {
  margin: 0;
  padding: 0;
  border: 0;
  background: url(/image/wow.png);
  background-size: cover;
  /* box-sizing: border-box; */
  /* background: radial-gradient(circle, #c7c7c9, #d9480a); */
  /* height: 100%; */
}

body:focus {
  outline: none;
}

.content {
  height: 100vh;
  width: 100vw;
  overflow: hidden;
  background-color: #efeaea;
  position: absolute;
  display: flex;
  justify-content: center;
}

.loader {
  --path: #2f3545;
  --dot: #5628ee;
  --duration: 3s;
  width: 100px;
  height: 100px;
  position: relative;
  display: center;
  /* overflow: hidden; */
}

th {
    min-width: 50px;
}

.loader:before {
  content: "";
  width: 10px;
  height: 10px;
  border-radius: 50%;
  position: absolute;
  display: block;
  background: var(--dot);
  top: 70px;
  left: 55px;
  transform: translate(-18px, -18px);
  animation: dotRect var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86)
    infinite;
}

.loader svg {
  display: block;
  width: 100%;
  height: 100%;
}

.loader svg rect,
.loader svg polygon,
.loader svg circle {
  fill: none;
  stroke: var(--path);
  stroke-width: 10px;
  stroke-linejoin: round;
  stroke-linecap: round;
}

.loader svg polygon {
  stroke-dasharray: 145 76 145 76;
  stroke-dashoffset: 0;
  animation: pathTriangle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86)
    infinite;
}

.loader svg rect {
  stroke-dasharray: 192 64 192 64;
  stroke-dashoffset: 0;
  animation: pathRect 3s cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
}

.loader svg circle {
  stroke-dasharray: 150 50 150 50;
  stroke-dashoffset: 75;
  animation: pathCircle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86)
    infinite;
}

.loader.triangle {
  width: 48px;
}

.loader.triangle:before {
  left: 21px;
  transform: translate(-10px, -18px);
  animation: dotTriangle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86)
    infinite;
}

@keyframes pathTriangle {
  33% {
    stroke-dashoffset: 74;
  }

  66% {
    stroke-dashoffset: 147;
  }

  100% {
    stroke-dashoffset: 221;
  }
}

@keyframes dotTriangle {
  33% {
    transform: translate(0, 0);
  }

  66% {
    transform: translate(10px, -18px);
  }

  100% {
    transform: translate(-10px, -18px);
  }
}

@keyframes pathRect {
  25% {
    stroke-dashoffset: 64;
  }

  50% {
    stroke-dashoffset: 128;
  }

  75% {
    stroke-dashoffset: 192;
  }

  100% {
    stroke-dashoffset: 256;
  }
}

@keyframes dotRect {
  25% {
    transform: translate(0, 0);
  }

  50% {
    transform: translate(18px, -18px);
  }

  75% {
    transform: translate(0, -36px);
  }

  100% {
    transform: translate(-18px, -18px);
  }
}

@keyframes pathCircle {
  25% {
    stroke-dashoffset: 125;
  }

  50% {
    stroke-dashoffset: 175;
  }

  75% {
    stroke-dashoffset: 225;
  }

  100% {
    stroke-dashoffset: 275;
  }
}

.loader {
  display: inline-block;
  margin: 0 16px;
  margin-top: 250px;
}

.container {
  display: flex;
  justify-content: center;
  /* margin-top: 50px; */
  height: 50vh;
  background-color: transparent;
  /* width: 100%;
  display: flex;
  justify-content: space-evenly;
  text-align: center;
  flex-wrap: wrap; */
}

/* .container > * :nth-child(1) {
  flex: 1 1 70%;
}

.container > * :nth-child(2) {
  flex: 1 1 30%;
} */

#bingotable {
  width: 50%; /* set width for each table */
  float: left; /* float both tables to the left */
  border-collapse: collapse;
  text-align: center;
  border: black;
  width: 350px;
  margin-top: 70px;
  font-size: 20pt;
  font-family: Poppins;
  cursor: pointer;
  background-color: #f1f1f2;
  transition: ease-in-out 0.3s;
  box-shadow: inset 0 0 0 0 #ececec;
  /* border-collapse: collapse;
  height: 58rem;
  width: 58rem;
  text-align: center;
  font-size: 22pt;
  cursor: pointer;
  border: rgb(0, 0, 0);
  font-family: Poppins;
  background-color: #d2cef9;
  margin-top: 350px;
  transition: ease-in-out 0.3s;
  box-shadow: inset 0 0 0 0 #ececec;
  border-radius: 20px; */
}

#bingotable,
th,
td {
  text-align: center;
  padding: 0.33rem;
  justify-content: center;
  border: 1.5px solid #000000;
}

#bingotable td:hover {
  transition: ease-in-out 0.3s;
}
.header1 {
  width: 10%;
  background: #050564;
  border-radius: 15px;
  color: #56d726;
  border: 2.5px solid #3b3c7c;
  font-family: "Anton", sans-serif;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px,
    rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;

  /* border: 8.5px solid #ada6f0;
  width: 20%;
  background: #ada6f0;
  color: #f8f6ff;
  font-family: "Anton", sans-serif;
  font-size: 60px;
  height: 20%;
  border-radius: 50px; */
}

.header2 {
  width: 10%;
  background: #050564;
  border-radius: 15px;
  color: #f91111;
  border: 2.5px solid #3b3c7c;
  font-family: "Anton", sans-serif;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px,
    rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
}

.header3 {
  width: 10%;
  background: #050564;
  border-radius: 15px;
  color: #0094d9;
  border: 2.5px solid #3b3c7c;
  font-family: "Anton", sans-serif;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px,
    rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
}

.header4 {
  width: 10%;
  background: #050564;
  border-radius: 15px;
  color: #f5d400;
  border: 2.5px solid #3b3c7c;
  font-family: "Anton", sans-serif;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px,
    rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
}

.header5 {
  width: 10%;
  background: #050564;
  border-radius: 15px;
  color: #f93416;
  border: 2.5px solid #3b3c7c;
  font-family: "Anton", sans-serif;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px,
    rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
}
#squarefree {
  font-family: Poppins;
  margin: 0 auto;
  /* background: #635883; */
  background-color: #e83609;
  text-align: center;
  font-weight: 700;
  font-size: 12px;

  /* font-family: "Anton", sans-serif;
  font-size: 20pt;
  background: #ada6f0;
  color: #f8f6ff;
  text-align: center; */
}

#bingotable2 {
  margin-left: 50px;
  margin-top: 50px;
  width: 50%; /* set width for each table */
  float: left; /* float both tables to the left */
  border-collapse: collapse;
  text-align: center;
  border: black;
  width: 700px;
  height: 350px;
  background-color: #f1f1f2;
  transition: ease-in-out 0.3s;
  box-shadow: inset 0 0 0 0 #ececec;
  cursor: pointer;
  /* border-collapse: collapse;
  width: 100rem;
  text-align: center;
  font-size: 22pt;
  cursor: pointer;
  border: black;
  font-family: Poppins;
  background-color: #d2cef9;
  margin-top: 250px;
  margin-right: 100px;
  transition: ease-in-out 0.3s;
  box-shadow: inset 0 0 0 0 #ececec;
  border-radius: 20px; */
}

#bingotable2 td {
  border: 2px solid black;
  text-align: center;
  font-family: fantasy;
  font-size: 25px;
  /* padding: 30px;
  font-family: fantasy;
  font-size: 50px; */
}

#bingotable2 td:hover {
  transition: ease-in-out 0.3s;
}

#bingotable2 td::before {
  transition: ease-in-out 0.3s;
}

#bingotable2 td::after {
  transition: ease-in 0 0 0 0 #ececec;
}

.header6 {
  width: 10%;
  background: #050564;
  color: #56d726;
  font-family: "Anton", sans-serif;
  border: 2.5px solid #3b3c7c;
  border-radius: 15px;
  font-size: 25px;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px,
    rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
  /* border: 8.5px solid #ada6f0;
  background: #ada6f0;
  color: #f8f6ff;
  padding: 50px;
  font-family: "Anton", sans-serif;
  font-size: 80px;
  border-radius: 50px; */
}

.header7 {
  width: 10%;
  background: #050564;
  color: #f91111;
  font-family: "Anton", sans-serif;
  border: 2.5px solid #3b3c7c;
  border-radius: 15px;
  font-size: 25px;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px,
    rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
}

.header8 {
  width: 10%;
  background: #050564;
  color: #0094d9;
  font-family: "Anton", sans-serif;
  border: 2.5px solid #3b3c7c;
  border-radius: 15px;
  font-size: 25px;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px,
    rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
}

.header9 {
  width: 10%;
  background: #050564;
  color: #f5d400;
  font-family: "Anton", sans-serif;
  border: 2.5px solid #3b3c7c;
  border-radius: 15px;
  font-size: 25px;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px,
    rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
}

.header10 {
  width: 10%;
  background: #050564;
  color: #f93416;
  font-family: "Anton", sans-serif;
  border: 2.5px solid #3b3c7c;
  border-radius: 15px;
  font-size: 25px;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px,
    rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
}

.box1 {
  display: flex;
  justify-content: center;
  margin-top: 125px;
  /* height: 20vh; */
  justify-content: center;
  gap: 2rem;
  /* justify-content: space-evenly;
  display: flex;
  margin-top: 100px;
  height: 500px; */
}

#showId th {
  margin: 20px;
  height: 10px;
  width: 125px;
  font-family: Poppins;
  color: #ececec;
  border: 0px;
  background-color: #e26111;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px,
    rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
  /* height: 50px;
  font-family: Poppins;
  border: 0px;
  font-size: 100px;
  color: #ececec; */
}

#showId td {
  /* margin: 20px; */
  height: 130px;
  width: 130px;
  font-size: 50px;
  font-family: fantasy;
  background-color: #f2f2f2;
  background-image: url(/image/dd.jpeg);
  background-size: cover;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px,
    rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
  /* border: 2px solid rgb(108, 93, 70);
  font-family: fantasy;
  background-color: #f2f2f2;
  font-size: 100px;
  height: 300px; */
}

#showCounter1 th {
  margin: 20px;
  height: 10px;
  font-family: Poppins;
  color: #ececec;
  border: 0px;
  background-color: #e26111;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px,
    rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
  /* height: 2px;
  font-family: Poppins;
  border: 0px;
  font-size: 100px;
  color: #ececec; */
}

#showCounter1 td {
  margin: 20px;
  height: 130px;
  width: 130px;
  font-size: 50px;
  font-family: fantasy;
  background-color: #f2f2f2;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px,
    rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
  /* border: 2px solid rgb(108, 93, 70);
  font-family: fantasy;
  background-color: #f2f2f2;
  font-size: 100px;
  height: 300px; */
}

#disableBingoButton {
  border-radius: 4px;
  height: 60px;
  width: 100px;
  transition: all 0.3s ease-in-out;
  cursor: pointer;
  border: 1px solid black;
  background-color: #e83609;
  font-size: 17px;
  font-weight: 600;
  font-family: Poppins;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px,
    rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
  transition: all 0.3s ease-in-out;
}
#disableBingoButton:hover {
  background-color: hsl(13, 84%, 55%);
  color: white;
  transform: translateY(-4px) translateX(-2px);
  box-shadow: 2px 5px 5px 0 rgb(209, 205, 205);
}

#disableBingoButton:active {
  transform: translateY(2px) translateX(1px);
  box-shadow: 0 0 0 0 rgb(187, 178, 178);
}

#lockButton {
  border-radius: 4px;
  height: 60px;
  width: 100px;
  transition: all 0.3s ease-in-out;
  cursor: pointer;
  border: 1px solid black;
  background-color: #e83609;
  font-size: 17px;
  font-weight: 600;
  font-family: Poppins;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px,
    rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
  transition: all 0.3s ease-in-out;
  /* background-color: white;
  color: black;
  border-radius: 10em;
  font-size: 17px;
  font-weight: 600;
  padding: 1em 2em;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  border: 1px solid black;
  box-shadow: 0 0 0 0 black; */
}
#lockButton:hover {
  background-color: hsl(13, 84%, 55%);
  color: white;
  transform: translateY(-4px) translateX(-2px);
  box-shadow: 2px 5px 5px 0 rgb(209, 205, 205);
}

#lockButton:active {
  transform: translateY(2px) translateX(1px);
  box-shadow: 0 0 0 0 rgb(187, 178, 178);
}

#reset-button {
  color: white;
  height: 40px;
  transition: all 0.3s ease-in-out;
  cursor: pointer;
  border: 1px solid black;
  border-radius: 4px;
  background-color: #e83609;
  font-size: 17px;
  font-weight: 600;
  font-family: Poppins;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px,
    rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
  transition: all 0.3s ease-in-out;
  /* background-color: white;
  color: black;
  border-radius: 10em;
  font-size: 17px;
  font-weight: 600;
  padding: 1em 2em;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  border: 1px solid black;
  box-shadow: 0 0 0 0 black; */
}

#reset-button:hover {
  background-color: hsl(13, 84%, 55%);
  transform: translateY(-4px) translateX(-2px);
  box-shadow: 2px 5px 5px 0 rgb(209, 205, 205);
}

#reset-button:active {
  transform: translateY(2px) translateX(1px);
  box-shadow: 0 0 0 0 rgb(187, 178, 178);
}

/* Responsive */

@media screen and (max-width: 3840px) and (min-width: 2160px) {
  .container {
    width: 100%;
    display: flex;
    justify-content: space-evenly;
    text-align: center;
    flex-wrap: wrap;
  }

  #bingotable {
    border-collapse: collapse;
    height: 58rem;
    width: 58rem;
    text-align: center;
    font-size: 22pt;
    margin-top: 350px;
    /* border-radius: 20px; */
    /* cursor: pointer; */
    /* border: rgb(0, 0, 0); */
    /* font-family: Poppins; */
    /* background-color: #d2cef9; */
    /* transition: ease-in-out 0.3s; */
    /* box-shadow: inset 0 0 0 0 #ececec; */
  }

  .header1,
  .header2,
  .header3,
  .header4,
  .header5 {
    border: 8.5px solid #ada6f0;
    width: 20%;
    font-size: 60px;
    height: 20%;
    border-radius: 50px;
    /* background: #ada6f0; */
    /* color: #f8f6ff; */
    /* font-family: "Anton", sans-serif; */
  }

  #squarefree {
    font-size: 25pt;
    text-align: center;
    /* background: #ada6f0; */
    /* color: #f8f6ff; */
    /* font-family: "Anton", sans-serif; */
  }

  #bingotable2 {
    height: 60rem;
    width: 100rem;
    text-align: center;
    font-size: 22pt;
    margin-top: 225px;
    transition: ease-in-out 0.3s;
    /* border-radius: 20px; */
    /* cursor: pointer; */
    /* border: rgb(0, 0, 0); */
    /* font-family: Poppins; */
    /* background-color: #d2cef9; */
    /* box-shadow: inset 0 0 0 0 #ececec; */
    /* border-collapse: collapse; */
  }

  #bingotable2 td {
    padding: 40px;
    font-size: 50px;
    /* font-family: fantasy; */
  }

  .header6,
  .header7,
  .header8,
  .header9,
  .header10 {
    border: 8.5px solid #3b3c7c;
    padding: 50px;
    font-size: 80px;
    border-radius: 50px;
    /* background: #ada6f0; */
    /* font-family: "Anton", sans-serif;
    color: #f8f6ff; */
  }

  .box1 {
    justify-content: center;
    gap: 7rem;
    display: flex;
    margin-top: 400px;
    height: 50px;
  }

  #showId th {
    height: 50px;
    border: 0px;
    font-size: 70px;
    /* color: #ececec; */
    /* font-family: Poppins; */
  }

  #showId td {
    border: 2px solid rgb(108, 93, 70);
    font-size: 200px;
    height: 500px;
    width: 500px;
    /* font-family: fantasy; */
    /* background-color: #f2f2f2; */
  }

  #showCounter1 th {
    margin-top: 100px;
    border: 0px;
    font-size: 70px;
    /* color: #ececec; */
    /* font-family: Poppins; */
  }

  #showCounter1 td {
    border: 2px solid rgb(108, 93, 70);
    font-size: 200px;
    height: 500px;
    width: 540px;
    /* font-family: fantasy;
    background-color: #f2f2f2; */
  }

  #reset-button {
    height: 300px;
    width: 200px;
    margin-top: 150px;
    border-radius: 10em;
    font-size: 50px;
    font-weight: 600;
    /* padding: 1em 2em; */
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    border: 1px solid black;
    /* box-shadow: 0 0 0 0 rgb(255, 255, 255); */
    /* background-color: rgb(220, 88, 88);
    color: black; */
  }

  #reset-button:hover {
    transform: translateY(-20px) translateX(-10px);
    box-shadow: 2px 5px 0 0 rgb(224, 23, 23);
  }

  #reset-button:active {
    transform: translateY(8px) translateX(5px);
    box-shadow: 0 0 0 0 rgb(215, 215, 215);
  }

  .loader {
    /* --path: #2f3545;
    --dot: #5628ee;
    --duration: 3s; */
    width: 300px;
    height: 250px;
    /* position: relative;
    display: center; */
    /* overflow: hidden; */
  }

  .loader {
    display: inline-block;
    margin: 0 80px;
    margin-top: 850px;
  }

  .loader:before {
    content: "";
    width: 40px;
    height: 40px;
    border-radius: 50%;
    position: absolute;
    display: block;
    background: var(--dot);
    top: 165px;
    left: 130px;
    transform: translate(-18px, -18px);
    animation: dotRect var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86)
      infinite;
  }
}
</style>
  </head>
  <body>
    <div class="content">
    <div class="loader">
      <svg viewBox="0 0 80 80">
          <circle id="test" cx="40" cy="40" r="32"></circle>
      </svg>
  </div>
  
  <div class="loader">
      <svg viewBox="0 0 86 80">
          <polygon points="43 8 79 72 7 72"></polygon>
      </svg>
  </div>
  
  <div class="loader">
      <svg viewBox="0 0 80 80">
          <rect x="8" y="8" width="64" height="64"></rect>
      </svg>
  </div>

</div>

      <div class="container">
        <!-- <a href="index.php"><img src="./dpwh_logo.png" alt="DPWH Logo" style="height: 30px; width: 30px;" class="text-center"></a> -->
        <table id="bingotable">
          <tr>
            <th class="header1">B</th>
            <th class="header2">I</th>
            <th class="header3">N</th>
            <th class="header4">G</th>
            <th class="header5">O</th>
          </tr>
          <tr>
            <td class="bingo" id="square0">&nbsp;</td>
            <td class="bingo" id="square1">&nbsp;</td>
            <td class="bingo" id="square2">&nbsp;</td>
            <td class="bingo" id="square3">&nbsp;</td>
            <td class="bingo" id="square4">&nbsp;</td>
          </tr>
          <tr>
            <td class="bingo" id="square5">&nbsp;</td>
            <td class="bingo" id="square6">&nbsp;</td>
            <td class="bingo" id="square7">&nbsp;</td>
            <td class="bingo" id="square8">&nbsp;</td>
            <td class="bingo" id="square9">&nbsp;</td>
          </tr>
          <tr>
            <td class="bingo" id="square10">&nbsp;</td>
            <td class="bingo" id="square11">&nbsp;</td>
            <td class="bingo" id="squarefree">FREE</td>
            <td class="bingo" id="square12">&nbsp;</td>
            <td class="bingo" id="square13">&nbsp;</td>
          </tr>
          <tr>
            <td class="bingo" id="square14">&nbsp;</td>
            <td class="bingo" id="square15">&nbsp;</td>
            <td class="bingo" id="square16">&nbsp;</td>
            <td class="bingo" id="square17">&nbsp;</td>
            <td class="bingo" id="square18">&nbsp;</td>
          </tr>
          <tr>
            <td class="bingo" id="square19">&nbsp;</td>
            <td class="bingo" id="square20">&nbsp;</td>
            <td class="bingo" id="square21">&nbsp;</td>
            <td class="bingo" id="square22">&nbsp;</td>
            <td class="bingo" id="square23">&nbsp;</td>
          </tr>
        </table>
        
        <table id="bingotable2">
          <tr>
            <th class="header6">B</th>
            <td class="bingo2" id="B-1">1</td>
            <td class="bingo2" id="B-2">2</td>
            <td class="bingo2" id="B-3">3</td>
            <td class="bingo2" id="B-4">4</td>
            <td class="bingo2" id="B-5">5</td>
            <td class="bingo2" id="B-6">6</td>
            <td class="bingo2" id="B-7">7</td>
            <td class="bingo2" id="B-8">8</td>
            <td class="bingo2" id="B-9">9</td>
            <td class="bingo2" id="B-10">10</td>
            <td class="bingo2" id="B-11">11</td>
            <td class="bingo2" id="B-12">12</td>
            <td class="bingo2" id="B-13">13</td>
            <td class="bingo2" id="B-14">14</td>
            <td class="bingo2" id="B-15">15</td>
          </tr>
          <tr>
            <th class="header7">I</th>
            <td class="bingo2" id="I-16">16</td>
            <td class="bingo2" id="I-17">17</td>
            <td class="bingo2" id="I-18">18</td>
            <td class="bingo2" id="I-19">19</td>
            <td class="bingo2" id="I-20">20</td>
            <td class="bingo2" id="I-21">21</td>
            <td class="bingo2" id="I-22">22</td>
            <td class="bingo2" id="I-23">23</td>
            <td class="bingo2" id="I-24">24</td>
            <td class="bingo2" id="I-25">25</td>
            <td class="bingo2" id="I-26">26</td>
            <td class="bingo2" id="I-27">27</td>
            <td class="bingo2" id="I-28">28</td>
            <td class="bingo2" id="I-29">29</td>
            <td class="bingo2" id="I-30">30</td>
          </tr>
          <tr>
            <th class="header8">N</th>
            <td class="bingo2" id="N-31">31</td>
            <td class="bingo2" id="N-32">32</td>
            <td class="bingo2" id="N-33">33</td>
            <td class="bingo2" id="N-34">34</td>
            <td class="bingo2" id="N-35">35</td>
            <td class="bingo2" id="N-36">36</td>
            <td class="bingo2" id="N-37">37</td>
            <td class="bingo2" id="N-38">38</td>
            <td class="bingo2" id="N-39">39</td>
            <td class="bingo2" id="N-40">40</td>
            <td class="bingo2" id="N-41">41</td>
            <td class="bingo2" id="N-42">42</td>
            <td class="bingo2" id="N-43">43</td>
            <td class="bingo2" id="N-44">44</td>
            <td class="bingo2" id="N-45">45</td>
          </tr>
          <tr>
            <th class="header9">G</th>
            <td class="bingo2" id="G-46">46</td>
            <td class="bingo2" id="G-47">47</td>
            <td class="bingo2" id="G-48">48</td>
            <td class="bingo2" id="G-49">49</td>
            <td class="bingo2" id="G-50">50</td>
            <td class="bingo2" id="G-51">51</td>
            <td class="bingo2" id="G-52">52</td>
            <td class="bingo2" id="G-53">53</td>
            <td class="bingo2" id="G-54">54</td>
            <td class="bingo2" id="G-55">55</td>
            <td class="bingo2" id="G-56">56</td>
            <td class="bingo2" id="G-57">57</td>
            <td class="bingo2" id="G-58">58</td>
            <td class="bingo2" id="G-59">59</td>
            <td class="bingo2" id="G-60">60</td>
          </tr>
          <tr>
            <th class="header10">O</th>
            <td class="bingo2" id="O-61">61</td>
            <td class="bingo2" id="O-62">62</td>
            <td class="bingo2" id="O-63">63</td>
            <td class="bingo2" id="O-64">64</td>
            <td class="bingo2" id="O-65">65</td>
            <td class="bingo2" id="O-66">66</td>
            <td class="bingo2" id="O-67">67</td>
            <td class="bingo2" id="O-68">68</td>
            <td class="bingo2" id="O-69">69</td>
            <td class="bingo2" id="O-70">70</td>
            <td class="bingo2" id="O-71">71</td>
            <td class="bingo2" id="O-72">72</td>
            <td class="bingo2" id="O-73">73</td>
            <td class="bingo2" id="O-74">74</td>
            <td class="bingo2" id="O-75">75</td>
          </tr>
        </table>
        
      </div>

      <div class="box1">
      <button class="btn btn-danger" id="disableBingoButton">Lock Pattern</button>
      <button class="btn btn-danger" id="lockButton">Lock Pattern</button>
        <table id="showId">
          <tr>
            <th>Last Called</th>
          </tr>
          <tr>
            <td id="showRecentId">&nbsp;</td>
          </tr>
        </table>

        <table id="showCounter1">
          <tr>
            <th>Count</th>
          </tr>
          <tr>
            <td id="showCounter"></td>
          </tr>
        </table>

        <button id="reset-button" onclick="resetBtn()">RESET</button>
        
      </div>
    </div>

    
  </body>
  <script>
  // Wait for the window to load
  window.addEventListener('load', function () {
    // Fade out the content with class 'content' over 7 seconds
    $(".content").fadeOut(7000);
    // Fade in the container with class 'container' over 1 second
    $(".container").fadeIn(1000);
  });
</script>
<script>
function selectedRow() {
  var cells = document.getElementsByClassName("bingo");

  // Loop through each cell
  for (var i = 0; i < cells.length; i++) {
    // Add a click event listener to the cell
    cells[i].addEventListener("click", function () {
      // Toggle the background color of the cell
      this.style.backgroundColor = (this.style.backgroundColor === "rgb(232, 54, 9)") ? "" : "#e83609";
    });
  }
}

selectedRow();

function selectedRowCounter() {
  var cells = document.getElementsByClassName("bingo2");
  let counter = 0;
  var counterDisplay = document.getElementById("showCounter");
  var insert = document.getElementById("showRecentId");
  insert.innerHTML = "START"; // Initialize insert with "START"

  // Loop through each cell
  for (var i = 0; i < cells.length; i++) {
    // Add a click event listener to the cell
    cells[i].addEventListener("click", function () {
      // Toggle background color and text color of the cell

      if (this.style.backgroundColor === "rgb(232, 54, 9)") {
        this.style.backgroundColor = "";
        this.style.color = "black";
        counter--;
        counterDisplay.innerHTML = counter;
      } else {
        this.style.backgroundColor = "rgb(232, 54, 9)";
        this.style.color = "white";
        counter++;
        counterDisplay.innerHTML = counter;
      }
      if (counter === 0) {
        insert.innerHTML = "START";
      } else {
        // Update insert with the ID of the last clicked cell
        insert.innerHTML = this.id;
      }
    });
  }
}

selectedRowCounter();

// Function to lock or unlock cell clicking based on button state
function toggleLock() {
  var lockButton = document.getElementById("lockButton");
  var cells = document.getElementsByClassName("bingo2");

  if (lockButton.classList.contains("locked")) {
    // Unlock cells
    for (var i = 0; i < cells.length; i++) {
      cells[i].classList.remove("locked");
      cells[i].disabled = false;
    }
    lockButton.classList.remove("locked");
    lockButton.innerHTML = "PLAYING";
    
  } else {
    // Lock cells
    for (var i = 0; i < cells.length; i++) {
      cells[i].classList.add("locked");
      cells[i].disabled = true;
    }
    lockButton.classList.add("locked");
    lockButton.innerHTML = "STOPPED";
    
  }
}

// Function to handle click on bingo cells
function handleClick() {
  // Toggle the background color of the cell
  this.style.backgroundColor = (this.style.backgroundColor === "rgb(232, 54, 9)") ? "" : "#e83609";
}

// Add event listener to bingo cells initially
var bingoCells = document.getElementsByClassName("bingo");
for (var i = 0; i < bingoCells.length; i++) {
  bingoCells[i].addEventListener("click", handleClick);
}

// Add event listener to the lock button
document.getElementById("lockButton").addEventListener("click", function() {
  toggleLock();
  // Add animation class
  this.classList.add("clicked");
  // Remove animation class after a short delay
  setTimeout(() => {
    this.classList.remove("clicked");
  }, 200);
});

// Initialize game
toggleLock();


function toggleBingoClick() {
  var lockButton = document.getElementById("disableBingoButton");
  var bingoCells = document.getElementsByClassName("bingo");

  if (lockButton.classList.contains("locked")) {
    for (var i = 0; i < bingoCells.length; i++) {
      if (bingoCells[i].classList.contains("disabled")) {
        bingoCells[i].classList.remove("disabled");
        bingoCells[i].addEventListener("click", handleClick);
      } else {
        bingoCells[i].classList.add("disabled");
        bingoCells[i].removeEventListener("click", handleClick);
      }
    }
    lockButton.classList.remove("locked");
    lockButton.innerHTML = "PATTERN LOCKED";
  } else {
    for (var i = 0; i < bingoCells.length; i++) {
      if (!bingoCells[i].classList.contains("disabled")) {
        bingoCells[i].classList.add("disabled");
        bingoCells[i].removeEventListener("click", handleClick);
      }
    }
    lockButton.classList.add("locked");
    lockButton.innerHTML = "LOCK PATTERN";
  }
}

// Add event listener to the disable bingo button
document.getElementById("disableBingoButton").addEventListener("click", function() {
  toggleBingoClick();
});

// Initialize bingo clicking
toggleBingoClick();

  // Reset button functionality
  function handleResetButtonClick() {
    var password = prompt("Please enter the password:");
    if (password === "bingo") {
        location.reload();
    } else if (password !== null) {
        alert("Incorrect password. Reset canceled.");
    } else {
        // Handle the case where the user cancels the prompt (password is null)
        console.log("Reset canceled by user.");
        // No action required if the user cancels, so we don't reload the page or show an alert
    }
}
document.getElementById("reset-button").addEventListener("click", handleResetButtonClick);
  // Initialize functions when the document is loaded
  window.addEventListener('load', function () {
    handleTableDataCellClick();
  });

</script>




</html>
