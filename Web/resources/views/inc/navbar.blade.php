@guest
<nav class="mb-4 navbar navbar-expand-lg navbar-dark fixed-top bg-unique-dark" style=" background:white;box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); border-bottom:solid 1px #ccc;">
    <a class="navbar-brand" href="/home"><img src="{{asset('img/logo.png')}}" style="width:120px;  "></a>
    <button class="navbar-toggler" style=" border-color:#ccc; outline: 0; -webkit-box-shadow: none; box-shadow: none;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3" aria-controls="navbarSupportedContent-3" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" style=" background-image: url('https://mdbootstrap.com/img/svg/hamburger7.svg?color=#ccc');"></span>
    </button>
</nav>
@else
<!--Navbar -->
<nav class="mb-4 navbar navbar-expand-lg navbar-dark fixed-top bg-unique-dark" style=" background:white;box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); border-bottom:solid 1px #ccc;">
    <a class="navbar-brand" href="/home"><img src="{{asset('img/logo.png')}}" style="width:120px;  "></a>
    <button class="navbar-toggler" style=" border-color:#ccc; outline: 0; -webkit-box-shadow: none; box-shadow: none;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3" aria-controls="navbarSupportedContent-3" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" style=" background-image: url('https://mdbootstrap.com/img/svg/hamburger7.svg?color=#ccc');"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent-3">
        <ul class="navbar-nav mr-auto">
            @can('isAdmin')
            <li class="nav-item dropdown">
                <a style="color: grey" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastro
                </a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/home/aluno/cadastrar">Aluno</a>
                    <a class="dropdown-item" href="/home/dispositivo/cadastrar">Dispositivo</a>
                </div>
            </li>
            @endcan
            <li class="nav-item dropdown">
                <a style="color: grey" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/sair">Sair</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!--/.Navbar -->
@endguest