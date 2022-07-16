<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      .container{
        padding: 0px 380px;
      }
      body{
        background: #E5E5E5;
      }
      .main{
        position: relative;
        width: 428px;
        height: 1274px;
        background: #FFFFFF;
        border-radius: 30px;
      }
      .rows{
        position: relative;
        width: 428px;
        height: 1274px;
        
        background: #FFFFFF;
        border-radius: 30px;
      }
        .box{
            /* Rectangle 368 */
            position: absolute;
            width: 428px;
            height: 346px;
            /* left: -1px; */
            top: 0px;

            background: linear-gradient(228.52deg, #2EFFCD 8.43%, #56D8F0 91.32%);
            border-radius: 0px 0px 30px 30px;
        }
        .time{
            /* Time */
            position: absolute;
            width: 54px;
            height: 18px;
            left: 27px;
            top: calc(50% - 18px/2 - 613px);

            font-family: 'SF Pro Text';
            font-style: normal;
            font-weight: 600;
            font-size: 15px;
            line-height: 18px;
            /* identical to box height */

            text-align: center;
            letter-spacing: -0.3px;

            color: #000000;
        }
        .rectangle{
            
            position: absolute;
            width: 327px;
            height: 246px;
            left: 49px;
            top: 107px;

            background: url(https://doctor-dentist.com/doctor-app/public/images/email-template/Rectangle.png);
        }
        .experience{
          /* Experience */


          position: absolute;
          width: 166px;
          height: 36px;
          left: 132px;
          top: 53px;

          font-family: 'Inter';
          font-style: normal;
          font-weight: 700;
          font-size: 30px;
          line-height: 36px;

          color: #000000;
        }
        .doctor-dentist{
          /* Doctor - Dentist */
          position: absolute;
          width: 152px;
          height: 24px;
          left: 150px;
          top: 97px;

          font-family: 'Inter';
          font-style: normal;
          font-weight: 400;
          font-size: 20px;
          line-height: 24px;

          color: #004845;
        }
        .vector27{
        position: absolute;
        left: 120.16px;
        top: 105.88px;

        /* background: #FFFFFF; */

        }
        .vector18{
          
        position: absolute;
        left: 118px;
        top: 94px;

        /* background: #E78E3D; */

        }
        .h-removebg-preview{
        position: absolute;
        width: 268px;
        height: 285px;
        left: 80px;
        top: 61px;

        background: url(https://doctor-dentist.com/doctor-app/public/images/email-template/h-removebg-preview.png);
        }
        .user-message{
          position: absolute;
          width: 238px;
          height: 12px;
          left: 95px;
          top: 374px;

          font-family: 'Inter';
          font-style: normal;
          font-weight: 400;
          font-size: 10px;
          line-height: 12px;

          color: #7A7A7A;

        }
        .esteemed-message{
          /* Hello Esteemed User. */
          position: absolute;
          width: 152px;
          height: 18px;
          left: 26px;
          top: 415px;

          font-family: 'Inter';
          font-style: normal;
          font-weight: 400;
          font-size: 15px;
          line-height: 18px;

          color: #000000;
        }
        .otp-message{
          position: absolute;
          width: 339px;
          height: 56px;
          left: 26px;
          top: 433px;

          font-family: 'Inter';
          font-style: normal;
          font-weight: 400;
          font-size: 15px;
          line-height: 18px;

          color: #000000;
        }
        .doctor-dentist-message{
          
          position: absolute;
          width: 157px;
          height: 13px;
          left: 26px;
          top: 488px;

          font-family: 'Inter';
          font-style: normal;
          font-weight: 400;
          font-size: 15px;
          line-height: 18px;

          color: #000000;

        }
        .rectangle1{
          position: absolute;
    width: 314px;
    height: 236px;
    /* left: -78px; */
    top: 526px;
    background: url(https://doctor-dentist.com/doctor-app/public/images/email-template/Rectangle1.png) no-repeat;
        }
        .rectangle2{
          position: absolute;
    width: 394px;
    height: 296px;
    left: 184px;
    top: 525px;
    background: url(https://doctor-dentist.com/doctor-app/public/images/email-template/Rectangle2.png) no-repeat;
        }
        .rectangle3{
          position: absolute;
    width: 314px;
    height: 236px;
    left: 15px;
    top: 500px;
    background: url(https://doctor-dentist.com/doctor-app/public/images/email-template/Rectangle3.png) no-repeat;
        }
        .rectangle4{
         
          position: absolute;
          width: 428px;
          height: 99px;
          left: 0px;
          top: 795px;

          background: #F2F2F2;
        }
        .download{
          position: absolute;
          width: 172px;
          height: 36px;
          left: 20px;
          top: 826px;

          font-family: 'Inter';
          font-style: normal;
          font-weight: 400;
          font-size: 15px;
          line-height: 18px;

          color: #000000;
        }
        .image5{
          position: absolute;
          width: 89px;
          height: 29px;
          left: 220px;
          top: 826px;

          background: url(https://doctor-dentist.com/doctor-app/public/images/email-template/image5.png);
        }
        .image6{
          position: absolute;
          width: 93px;
          height: 29px;
          left: 316px;
          top: 826px;

          background: url(https://doctor-dentist.com/doctor-app/public/images/email-template/image6.png);
        }
        .rectangle6{
          position: absolute;
          width: 450px;
          height: 337px;
          left: -4px;
          top: 883px;
          background: url(https://doctor-dentist.com/doctor-app/public/images/email-template/Rectangle6.png) no-repeat;
      }
        .para1 ul{
          position: absolute;
          width: 221px;
          height: 22px;
          top: 1000px;
          left: 150px;
          font-family: 'Inter';
          font-style: normal;
          font-weight: 400;
          font-size: 9px;
          line-height: 11px;

          color: #000000;
        }
        .shape{
          position: absolute;
          width: 154px;
          height: 171px;
          left: 0px;
          top: 952px;

          background: linear-gradient(214.21deg, #32E7DE 0%, #55DAF0 100%);
        }
        .one{
          position: absolute;
          width: 17px;
          height: 18px;
          left: 68px;
          top: 189px;

          font-family: 'Inter';
          font-style: normal;
          font-weight: 400;
          font-size: 15px;
          line-height: 18px;

          color: #000000;
        }
        .onemessage{
          
          position: absolute;
    width: 93px;
    height: 15px;
    left: 29px;
    top: 210px;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 7px;
    line-height: 8px;
    text-align: center;
    color: #000000;

        }
        .two{
          /* 01 */

          position: absolute;
    width: 19px;
    height: 18px;
    left: 187px;
    top: 235px;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 15px;
    line-height: 18px;
    color: #000000;
        }
        .twomessage{
          
          position: absolute;
    width: 93px;
    height: 15px;
    left: 147px;
    top: 254px;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 7px;
    line-height: 8px;
    text-align: center;
    color: #000000;

        }
        .three{
          /* 01 */


          position: absolute;
    width: 17px;
    height: 18px;
    left: 149px;
    top: 189px;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 15px;
    line-height: 18px;
    color: #000000;
        }
        .threemessage{
          
          position: absolute;
    width: 93px;
    height: 15px;
    left: 106px;
    top: 209px;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 7px;
    line-height: 8px;
    text-align: center;
    color: #000000;

        }
        .footer{
          position: absolute;
width: 428px;
height: 80px;
left: 0px;
top: 1194px;

background: linear-gradient(269.12deg, #35E7E0 0%, #54DBF0 97.34%);
        }
        .group{
          position: absolute;
          width: 20.25px;
          height: 20.25px;
          left: 28px;
          /* top: 1219px; */
        }
        .doctor-msg{
          
          position: absolute;
          width: 120px;
          height: 14px;
          left: 52px;
          top: 24px;
          font-family: 'Inter';
          font-style: normal;
          font-weight: 500;
          font-size: 15px;
          line-height: 18px;
          text-align: center;
          color: #434343;
        }
        .website{
          
          position: absolute;
          width: 131px;
          height: 10px;
          left: 214px;
          top: 19px;

          font-family: 'Inter';
          font-style: normal;
          font-weight: 500;
          font-size: 10px;
          line-height: 12px;

          color: #434343;
        }
        .email{          
        position: absolute;
        width: 144px;
        height: 10px;
        left: 214px;
        top: 35px;

        font-family: 'Inter';
        font-style: normal;
        font-weight: 500;
        font-size: 10px;
        line-height: 12px;

        color: #434343;
        }
        .team{          
          position: absolute;
          width: 194px;
          height: 10px;
          left: 212px;
          top: 53px;

          font-family: 'Inter';
          font-style: normal;
          font-weight: 400;
          font-size: 10px;
          line-height: 12px;

          color: #434343;

        }
        .iconimage{
          position: absolute;
          left: -12.67%;
          right: 8.33%;
          top: 8.33%;
          bottom: 8.33%;
          /* background: #000000;

          /* background: #000000; */
        }.vector188{
          position: absolute;
          top: 23px;
        }
        .vector277{
          position: absolute;
              top: 35px;
              left: 2px;
          }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row rows">
         
          <div class="box">
           <div class="time"><?= now(); ?></div>
            <div class="h-removebg-preview"></div>
         
            <div class="rectangle "></div>
            <h1 class="experience">Experience</h1>
            <img src="Ellipse18.png" class="vector18" alt="">
                <img src="Vector27.png" class="vector27" alt="">
            <p class="doctor-dentist">Doctor-Dentist</p>
            <p class="user-message">Here we send personalised messages to the user*</p>
            <p class="esteemed-message">Hello Esteemed User.</p>
            <p class="otp-message">The OTP is {{ $details['otp'] }}. This OTP is valid for 10
            <p class="doctor-dentist-message">Team Doctor - Dentist</p>
          
        
            <div class="rectangle1">
              <span class="one">01</span>
              <span class="onemessage">Robust Billing and Coupon added features.</span>
            </div>
            <div class="rectangle3">
              <span class="two">02</span>
              <span class="twomessage">Features : Map, Surgery, Test and Medicine selection</span>
            </div>
            <div class="rectangle2">
              <span class="three">03</span>
              <span class="threemessage">Easy In-Clinic, Telephonic and Video Consultation</span>
            </div>

            <div class="rectangle4"></div>
              <h2 class="download">Downlode The App Now For Superior Experience</h2>
              <div class="image5"></div>
              <div class="image6"></div>
             
            <div class="shape"></div>
              <div class="rectangle6"></div>
              <div class="para1">
                <ul class="para1">
                  <li>Meet your Doctor-Dentist team, India’s One of the Highest Rated Professional Team.</li>
                  <li>Doctor-Dentist provides never seen before Unparalleled & Industry redefining services.</li>
                  <li>Doctors, Patients, Parents, and well wishers; all look for satisfactory services which can assure great results.</li>
                  <li>Doctor-Dentist solves this very search and provides a transparent platform which you can totally trust.</li>
                </ul>
            </div>
            <div class="footer">
              <div class="group">
                <img src="Ellipse18.png" class="vector188" alt="">
                <img src="Vector27.png" class="vector277" alt="">
              </div>
              <h1 class="doctor-msg">Doctor-Dentist</h1>
              <p class="website"><img src="globe.png" class="iconimage" alt="">www.doctor-dentist.com</p>
              <p class="email"><img src="email.png" class="iconimage" alt="">helpline@doctor-dentist.com</p>
              <p class="team"><img src="right.png" class="iconimage" alt="">“MANAGE BY TEAM DOCTOR -DENTIST”</p>
            </div>
            </div>
        </div>
      </div>
      </div>
  </body>
</html>
