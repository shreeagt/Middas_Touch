<html><head>
    <meta charset="UTF-8">
    <style>
    *{
        margin: 0;
        padding:0;
    }
    </style>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Middas Touch</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body style="text-align: center;">
        <div class="logo_cover" style="position:absolute;top:140px;width:100%;text-align: center;">
        {{-- <img src="logo-dark.png" alt="logo" style="max-width:70px;height:auto;"> --}}
        <h1 style="font-size: 40px;color: #2f2884;margin-top: 100px;">Dr. {{ $doctor->doctorname }}</h1>  
        {{-- <h1 style="font-size: 30px;color: #2f2884;letter-spacing: 1.5px;margin-top: 10px;">{{ $doctor->speciality }}</h1>   --}}
        <p style="max-width:300px;color: #2f2884;font-size:25px;margin: auto;"> {{ $doctor->location }}</p>
        </div>
        <img src="banner_midas.png" style="position:absolute;left:0;top:0;z-index:-1;height:100%;margin:auto;width:100%;" alt="banner_midas">
    </body></html>    