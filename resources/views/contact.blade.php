@extends ('master')

@section ('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

body{
    margin: 0;
    font-family: sans-serif;
}


.menu{
    list-style-type: none;
    text-align: right;
}

.menu li{
    display: inline;
    padding: 10px;
}

.navbar{
    background-color: blue;
    padding: 5px;
}

.menu a{
    color: white;
    text-decoration: none;
    padding: 10px;
}

.active{
    background-color: red;
    border-radius: 10px;
}

.section-header{
    background-color: rgb(176, 179, 182);
    padding: 40px;
}



.section-grid{
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px ;
    padding: 10px 40px 0px 10px;
}

.section-img img{
    width: 70%;
    

}

.section-content{
    text-align: justify;
    color: rgb(65, 61, 61);

}

.section-content h3{
    color: blue;

}

.section-content>p{
    color: aliceblue;

}
.footer{
    background-color:rgb(36, 36, 108);
    color: white;
    padding: 50px;
}

.footer-about img{
    width: 100px;
    border-radius: 50%;
}

.upper-footer{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
}

.footer-head ul{
    list-style-type: none;
    padding: 0;
}

.footer-head a{
    color: white;
    text-decoration: none;
}

.footer-head li{
    margin: 10px 0px;
}

a.btn{
    background-color: rgb(82, 166, 51);
    padding: 10px;
    color: rgb(255, 255, 255);
    transition: 0.4s;
}

.btn:hover{
    background-color: yellow;
    color: black;
    border-radius: 5px;
}

.lower-footer{
    display: flex;
    justify-content: space-between;
    padding: 20px 0 10px 0;
}



.section-header{
    justify-content: center;
    align-items: center;
    display: block;
}

.frist_img img{
    width: 500px;

}

.secondimg img{
    width: 400px;
    height: 800px;
}

.sectionheader{
    display: flex;
}

.sectionheader{
    justify-content: center;
    align-items: center;
    border: 10px solid red;
    border-radius: 20px;

}

.fontchange{
    font-family: cursive;
}

.thirdsection{
    display: flex ;
    
    flex-direction: column;
    padding: 30px;
    
}

.gridsection{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 10px;
    
}

.gridcontent img{
    width: 500px;
    
    
    
}

.gridcontent{
    margin: 0px;
}

.thirdsection h2,h6{
  margin: 0 auto;
}


.thirdsection h2{
    color: red;
}

.thirdsection p{
    margin: 5px;
}
    
.frist_img p{
    text-align: justify;
}

.gridsection{
    padding: 0px 10px;
}

.section-grid{
    background: url('../images/netflix-logo.png');
    background-position: center;

    align-items: center;

}

.section-content h3{
    color: white;
}


.login-form{
    width: 500px;
    background-color: rgb(222, 208, 235);
  margin: auto;
  
    padding: 20px;
    text-align: center;
    border-radius: 10px;
}

.input-group{
    margin: 20px;
}

.input-group{
    text-align: left;
}

.input-group input, .input-group textarea{
    width: 95%;
    padding: 10px;
    border-radius: 10px;
    display: block;
    border: none;
}

.input-group input:focus{
    outline: 2px solid rgb(102, 102, 229);
}

.input-group input[type="Submit"]
{
    width: 50%;
    margin: auto;
    background-color: blue;
    color: white;
    border: none;
    transition: 0.5s;
}

.input-group input[type="submit"]:hover
{
    background-color: rgb(12, 12, 158);
    cursor: pointer;
}

.contact-div{
    display: grid;
    grid-template-columns: 1fr 1fr;
}

.map img{
    width: 100%;
}

.contact-form-div{
    background-color: rgb(229, 232, 234);
    text-align: center;
    
    
}


.contact-form-div h1{
    font-weight: bolder;
    font-size: large;
}

.form_div{
    background: url('../images/netflix-logo.png');
    background-position: center;
    background-size: auto;
    background-repeat: repeat-x;

   padding: 20px;
}








    </style>





    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    

    <section class="about-section">
        <div class="section-header">
            <h2>Contact Us</h2>

        </div>

        <div class="contact-div">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.252071569628!2d84.37640277475799!3d27.678603026759944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3994fbb6e6303717%3A0x1e05b7b82639ed2d!2sShivaghat%20Beach!5e0!3m2!1sen!2snp!4v1683880973039!5m2!1sen!2snp" width="1000" height="700" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>

            <div class="contact-form-div">
                

                <h1>Contact Us</h1>
            <form action="{{route('contactdetails')}}"  method="POST">
                @csrf
                <div class="input-group">
                    <label for="">Full Name</label>
                    <input type="text" placeholder="Enter Full Name" name="name">
                </div>

                <div class="input-group">
                    <label for="">Phone</label>
                    <input type="text" placeholder="Enter Phone" name="phone">
                </div>

                


                <div class="input-group">
                    <label for="">Email</label>
                    <input type="email" placeholder="Enter Email" name="email">
                </div>

                <div class="input-group">
                    <label for="">Message</label>
                    <textarea rows="8" name="message"></textarea>
                </div>

                <div class="input-group">
                    <input type="submit" value="Send Message">
                </div>
            </form>
        </div>

                


            </div>

        </div>

    </section>

    

    
            
        
</body>
</html>
@endsection