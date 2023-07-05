<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Midas Touch</title>
</head>
<style>
    body{
        font-family: 'Open Sans', sans-serif;
    }

    a.btn.btn-primary.mt-3 {
    padding: 10px;
    text-decoration: none;
    background: #05ab93;
    color: #fff;
    border-radius: 10px;
}

    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap');
    /* Default button styles */
    .download-button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    margin-top: 10px;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    border: none;
    background-color: #4CAF50;
    color: #FFFFFF;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Hover effect */
.download-button:hover {
  background-color: #45a049;
}

/* Active effect */
.download-button:active {
  background-color: #3e8e41;
}

.thank {
    max-width: 600px;
    margin: 10px;
    text-align: center;
    /* background: rgba(25,129,179,0.5); */
    background: rgba(0,0,0,0.5);
    padding: 30px;
    border-radius: 20px;
}
.thank h1 {
    font-size: 50px;
    color: #75bdd9;
}

.thank h2 {
    font-size: 20px;
    color: #fff;
}

.thank_banner {
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
        /* background-color: rgb(0, 0, 0); */
        position: relative;
        background-image: url('/assets/images/video_homebanner.png');
    background-repeat: no-repeat;
    background-position-y: center;
    background-position-x: center;
    background-size: cover;
    height: 100vh;
    display: flex;
    align-items: center;
    z-index: 0;

}

.thank_banner::before {
    display: block;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    z-index: -1;
    background-color: rgba(0, 0, 0, 0.15);
    padding: 0;
    width: 100%;
    content: '';
}

.thank span {
    display: inline-block;
    padding: 20px;
    background: #ffc107;
    color: black;
    border-radius: 50%;
    margin: 20px;
}

.preview{
    background: #ffc107;
}

.logo img {
    max-width: 150px;
}

.logo{
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 4;
}


video#videoPlayer {
    max-width: 100%;
}

.video_box {
    padding: 10px;
    background: #598b9e;
    border-radius: 20px;
    max-width: 500px;
    max-height: 500px;
}
*{
    margin:0;
    padding:0;
}

@media screen and (max-width: 768px){
    .thank_banner {
    background-image: url('/vide_banner_mob.jpg');
}
}
</style>
<body>

    <a href="/" class="logo">
        <img src="{{asset('assets/images/ajantaone-logo.png')}}">
      </a>

    <div class="thank_banner">
        <div class="thank">
            <h1>THANK YOU!</h1>
                <div>
                    <span><i class="fa fa-check" style="font-size:36px"></i></span>
                </div>

   <p style="color:#fff;margin-bottom:20px;">Grateful for 50 Years of Healing Hands: Thank You for Your Dedication and Excellence!</p>
    {{-- <a href="{{ route('doctors.certificate', ['drid' => $doctor->id]) }}" class="btn btn-primary mt-3">Download Certificate</a> --}}
    {{-- <a href="{{ route('doctors.certificate', ['drid' => $drid]) }}" class="btn btn-primary mt-3">Download Certificate</a> --}}
    <a href="{{ route('doctors.certificate', ['drid' => $video->drid]) }}" class="btn btn-primary mt-3">Download Certificate</a> 

        </div>
    </div>
</body>
</html>