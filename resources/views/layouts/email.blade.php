<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=@, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to All American Finishing.</title>
</head>
<body>
        <style>
                body{
                    display: flex;
                    flex-direction: column;
                    max-width: 100%;
                    margin: 0;
                    position: relative;
                    color: #FFF;
                }
                body >*{
                    margin-bottom: 5%;
                }
                *{
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    box-sizing: border-box;
                }
                a{
                    color: #FFF;
                    text-decoration: none;
                }
                td{
                    position: relative;
                    z-index: 2;
                    margin: 0 auto;
                    padding-top: 5%;
                    padding-bottom: 5%;
                    padding-right: 20%;
                    padding-left: 20%
                }
                img{
                    width: 100%;
                }
                .content >*{
                    margin-bottom: 5%;
                }
            </style>
    <table style="width: 100%; margin-bottom: 0; border-collapse: collapse; background-color: #1E4380; color : #FFF; position: relative;">
        <thead style="background-color: #FFFFFF;">
            <tr>
                <td style=" position: relative;
                            width: 100%;">
                    <figure style=" width: 40%;
                            margin-top: 40px;
                            margin-bottom: 40px;">
                        <img src="{{asset('img/svg/logo.svg')}}" alt="">
                    </figure>
                    <span style="width: 100%;
                        position: absolute;
                        height: 10px;
                        background-color: #A11E2D;
                        left: 0;
                        bottom: 10px;"></span>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="color: #FFF; min-height: 300px;">
                    @yield('content')
                </td>
            </tr>
            <tr style="position: relative; z-index: 2;">
                <td style="padding-top: 0; padding-bottom: 0;">
                    <p style="border-bottom: solid thin #FFF; border-top: solid thin #FFF; padding: 5% 0;">
                        Need help, contact us. 
                        <br>
                        <a href="http://allamericanfinishing.com/contact-us" target="_blank">http://allamericanfinishing.com/contact-us</a>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 0; position: relative;">
                    <article style=" border-bottom: solid thin #FFF; padding-bottom: 5%;">
                            <p>Follow us on: </p>
                            <figure style=" width: 100%; margin: 0;">
                                <a href="https://www.facebook.com" target="_blank">
                                    <svg style="width: 5%;
                                            height: 5%;
                                            fill: #FFF;
                                            margin-right: 5%;" class="facebook" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                                        <path d="M12.94,16.54h5.17v-2.35v-2.3v-0.38c0-2.21,0.06-5.63,1.67-7.75C21.47,1.52,23.79,0,27.8,0c6.52,0,9.27,0.93,9.27,0.93
                                            l-1.29,7.66c0,0-2.15-0.62-4.17-0.62s-3.81,0.72-3.81,2.73v0.81v2.68v2.35h8.24l-0.57,7.48H27.8V50h-9.69V24.01h-5.17V16.54
                                            L12.94,16.54z"/>
                                    </svg>
                                </a>
                                <a href="https://www.instagram.com" target="_blank">
                                    <svg style="width: 5%;
                                            height: 5%;
                                            fill: #FFF;
                                            margin-right: 5%;" class="instagram" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50" xml:space="preserve">
                                        <path d="M35.3,50H14.7C6.6,50,0,43.6,0,35.7V14.3C0,6.4,6.6,0,14.7,0h20.6C43.4,0,50,6.4,50,14.3v21.4
                                            C50,43.6,43.4,50,35.3,50z M14.7,3.7c-6,0-10.9,4.8-10.9,10.6v21.4c0,5.9,4.9,10.6,10.9,10.6h20.6c6,0,10.9-4.8,10.9-10.6V14.3
                                            c0-5.9-4.9-10.6-10.9-10.6H14.7z"/>
                                        <path d="M25,38.2c-7.5,0-13.7-6-13.7-13.3c0-3.6,1.5-7.1,4.2-9.6c2.6-2.5,6-3.7,9.5-3.6c4.3,0.1,7.8,1.5,10.2,4
                                            c2.3,2.4,3.5,5.6,3.4,9.3c-0.1,3.5-1.5,6.9-4,9.3C32,36.8,28.6,38.2,25,38.2z M24.7,16.1c-2.2,0-4.3,0.8-5.9,2.4
                                            c-1.8,1.7-2.8,4-2.8,6.4c0,4.9,4.1,8.8,9.1,8.8c5,0,8.9-3.9,9.1-8.9l0,0c0.1-2.5-0.7-4.6-2.1-6.1c-1.6-1.6-4-2.5-7-2.6
                                            C24.9,16.1,24.8,16.1,24.7,16.1z"/>
                                        <path d="M35.8,11.3a3.2,3.1 0 1,0 6.4,0a3.2,3.1 0 1,0 -6.4,0" />
                                    </svg>  
                                </a>     
                                <a href="https://www.linkedin.com" target="_blank">
                                    <svg style="width: 5%;
                                            height: 5%;
                                            fill: #FFF;
                                            margin-right: 5%;" class="in" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                                        <path d="M0.78,16.6h10.38V50H0.78V16.6z M5.97,0c3.32,0,6.02,2.7,6.02,6.02c0,3.32-2.7,6.01-6.02,6.01
                                            c-3.33,0-6.01-2.69-6.01-6.01C-0.04,2.7,2.64,0,5.97,0"/>
                                        <path d="M17.67,16.6h9.96v4.57h0.15c1.38-2.63,4.77-5.39,9.82-5.39c10.51,0,12.45,6.92,12.45,15.9V50H39.67V33.76
                                            c0-3.87-0.07-8.86-5.4-8.86c-5.4,0-6.22,4.22-6.22,8.58V50H17.67V16.6z"/>
                                    </svg>
                                </a>
                            </figure>
                    </article>
                    <img style="position: absolute;
                            bottom: 0;
                            right: 0;
                            width: 30%;
                            height: auto;
                            z-index: 0;
                            margin-bottom: 0;" src="{{asset('img/mailing/transtar.png')}}" alt="">
                </td>
            </tr>
            @yield('unsuscribe')
        </tbody>
    </table>
    <table style="width: 100%; margin-bottom: 0; border-collapse: collapse; background-color: #A11E2D; color : #FFF;">
        <tr>
            <td style="width: 100%;
                padding-right: 20%;
                padding-left: 20%;">
                    Please don't reply to this email.
            </td>
        </tr>
    </table>
</body>
</html>