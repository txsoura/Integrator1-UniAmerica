@extends('layouts.app')

@section('content')
<div class="col-md-12" style="padding:100px;max-width:1200px;margin:auto;">
    <h4 style="text-align:center">Opções</h4>
    <style>
        .col-sm-4,
        .col-sm-6,
        .col-sm-8 {
            overflow: hidden;
            height: 180px;
            margin: 20px auto;
            padding: 0px;
            border-radius: 8px;
        }

        .img-responsive {
            width: 100%;
            height: 180px;
            border-radius: 8px;
        }

        .col-sm-4 {
            max-width: 340px;
        }

        .col-sm-6 {
            max-width: 540px;
        }

        .col-sm-8 {
            max-width: 740px;
        }

        .col-sm-4 img,
        .col-sm-6 img,
        .col-md-8 img {
            -webkit-transition: .3s ease-in-out;
            transition: .3s ease-in-out;
        }

        .img-responsive:hover {
            -moz-transform: scale(1.3);
            -webkit-transform: scale(1.3);
            transform: scale(1.3);
        }

        .image-responsive:hover+#a {
            font-size: 25pt;
            transition: .3s ease-in-out;
        }

        @media(max-width:1200px) {
            .row {
                margin: auto;
            }

            .col-sm-4,
            .col-sm-6,
            .col-sm-8 {
                margin: 10px auto;
            }

            .col-sm-4 {
                max-width: 340px;
            }

            .col-sm-6 {
                max-width: 520px;
            }

            .col-sm-8 {
                max-width: 720px;
            }
        }

        @media(max-width:1160px) {
            .col-sm-4 {
                max-width: 300px;
            }

            .col-sm-6 {
                max-width: 490px;
            }

            .col-sm-8 {
                max-width: 670px;
            }
        }

        @media(max-width:1060px) {
            .col-sm-4 {
                max-width: 300px;
            }

            .col-sm-4 {
                max-width: 460px;
            }

            .col-sm-8 {
                max-width: 630px;
            }
        }

        @media(max-width:1000px) {
            .col-sm-4 {
                max-width: 280px;
            }

            .col-sm-6 {
                max-width: 440px;
            }

            .col-sm-8 {
                max-width: 610px;
            }
        }

        @media(max-width:930px) {
            .col-sm-4 {
                max-width: 260px;
            }

            .col-sm-6 {
                max-width: 400px;
            }

            .col-sm-8 {
                max-width: 560px;
            }

        }

        @media(max-width:860px) {
            .col-sm-4 {
                max-width: 250px;
            }

            .col-sm-6 {
                max-width: 390px;
            }

            .col-sm-8 {
                max-width: 530px;
            }
        }

        @media(max-width:825px) {
            .col-md-12 {
                padding: 10px;
            }

            .col-sm-4 {
                max-width: 230px;
            }

            .col-sm-6 {
                max-width: 360px;
            }

            .col-sm-8 {
                max-width: 490px;
            }
        }

        @media(max-width:750px) {
            .col-sm-4 {
                max-width: 210px;
            }

            .col-sm-6 {
                max-width: 330px;
            }

            .col-sm-8 {
                max-width: 450px;
            }
        }

        @media(max-width:680px) {
            .col-sm-4 {
                max-width: 180px;
            }

            .col-sm-6 {
                max-width: 290px;
            }

            .col-sm-8 {
                max-width: 390px;
            }
        }

        @media(max-width:585px) {

            .col-sm-4,
            .col-sm-6,
            .col-sm-8 {
                max-width: 490px;
            }
        }
    </style>

    @can('isAdmin')
    <div class="row">
        <div class="col-sm-4">
            <a href="/home/aluno/visualizar"><img src="{{asset('img/A.png')}}" class="img-responsive " alt="Image"></a>
        </div>

        <div class="col-sm-4">
            <a href="/home/dispositivo/visualizar"><img src="{{asset('img/R.png')}}" class="img-responsive " alt="Image"></a>
        </div>
        <div class="col-sm-4">
            <a href="/home/requisicao/visualizar"><img src="{{asset('img/L.png')}}" class="img-responsive " alt="Image"></a>
        </div>
    </div>
    @endcan

    @can('isUser')
    <div class="row">
        <div class="col-sm-4">
            <a href="/home/dispositivo"><img src="{{asset('img/R.png')}}" class="img-responsive " alt="Image"></a>
        </div>

        <div class="col-sm-4">
            <a href="/home/requisicao"><img src="{{asset('img/L.png')}}" class="img-responsive " alt="Image"></a>
        </div>
        <div class="col-sm-4"></div>
    </div>
    @endcan
</div>
@endsection