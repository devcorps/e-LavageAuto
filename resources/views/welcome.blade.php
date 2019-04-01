@extends('layouts.main')

@section('title', '| Accueil')

@section('content')

<!-- Header -->
<header id="head">
    <div class="container">
        <div class="row">
            <h1 ><span style="color: black; ">E-WASH</span></h1>
            <h2 class="tagline"><span style="color: black; ">E-Lavage est un service de gestion de station automobile en ligne développée par</span>
                    <a href="http://www.reseaudigitaltechnologies-ci.com/"><span style="color: black; ">Reseau Digital Technologies</span></a></h2>
            <p><a href="{{url('about')}}" class="btn btn-default btn-lg" role="button"><span style="color: black; ">PLUS D'INFO</span></a></p>
        </div>
    </div>
</header>
<!-- /Header -->

<!-- Intro -->
<div class="container text-center">
    <br> <br>
    <h2 class="thin">E-WASH, plateforme N°1 de gestion des stations lavages</h2>
    <p class="text-muted">
       La prémiere plateforme plateforme en côte d'ivoire qui vous permettra de gérer toute vos activité<br>
    liées a votre station de lavage automobile, facilement et rapidement
    </p>
</div>
<!-- /Intro-->

<div class="slider" id="slider" style="">
    <div class="slider__content" id="slider-content">
        <div class="slider__images">
            <div class="slider__images-item slider__images-item--active" data-id="1"><img src="assets/images/car.jpg"/></div>
            <div class="slider__images-item" data-id="2"><img src="assets/images/washci.jpeg"/></div>
            <div class="slider__images-item" data-id="3"><img src="assets/images/lavag.jpg"/></div>
            <div class="slider__images-item" data-id="4"><img src="assets/images/lav.jpg"/></div>
            <div class="slider__images-item" data-id="5"><img src="assets/images/lav1.jpg"/></div>
        </div>
        <div class="slider__text">
            <div class="slider__text-item slider__text-item--active" data-id="1">
                <div class="slider__text-item-head">
                    <h3>E-WASH</h3>
                </div>
                <div class="slider__text-item-info">
                    <p>“La première application de gestion de station de lavage automobile”</p>
                </div>
            </div>
            <div class="slider__text-item" data-id="2">
                <div class="slider__text-item-head">
                    <h3>E-WASH</h3>
                </div>
                <div class="slider__text-item-info">
                    <p>“La première application de gestion de station de lavage automobile”</p>
                </div>
            </div>
            <div class="slider__text-item" data-id="3">
                <div class="slider__text-item-head">
                    <h3>E-WASH</h3>
                </div>
                <div class="slider__text-item-info">
                    <p>“La première application de gestion de station de lavage automobile”</p>
                </div>
            </div>
            <div class="slider__text-item" data-id="4">
                <div class="slider__text-item-head">
                    <h3>E-WASH</h3>
                </div>
                <div class="slider__text-item-info">
                    <p>“La première application de gestion de station de lavage automobile”</p>
                </div>
            </div>
            <div class="slider__text-item" data-id="5">
                <div class="slider__text-item-head">
                    <h3>E-WASH</h3>
                </div>
                <div class="slider__text-item-info">
                    <p>“La première application de gestion de station de lavage automobile”</p>
                </div>
            </div>
        </div>
    </div>
    <div class="slider__nav">
        <div class="slider__nav-arrows">
            <div class="slider__nav-arrow slider__nav-arrow--left" id="left">to left</div>
            <div class="slider__nav-arrow slider__nav-arrow--right" id="right">to right</div>
        </div>
        <div class="slider__nav-dots" id="slider-dots">
            <div class="slider__nav-dot slider__nav-dot--active" data-id="1"></div>
            <div class="slider__nav-dot" data-id="2"></div>
            <div class="slider__nav-dot" data-id="3"></div>
            <div class="slider__nav-dot" data-id="4"></div>
            <div class="slider__nav-dot" data-id="5"></div>
        </div>
    </div>
</div>

<!-- Highlights - jumbotron -->
<div class="jumbotron top-space">
    <div class="container">

        <h3 class="text-center thin">Pourquoi utiliser notre plateforme?</h3>

        <div class="row">
            <div class="col-md-4 col-sm-6 highlight">
                <div class="h-caption"><h4><i class="fa fa-cogs fa-5"></i>Nos services</h4></div>
                <div class="h-body ">
                    <p>Enregistrement de vehicule avec toutes ses informations y compris celles du conducteur</p>
                    <p>Enregistrement de passage de vehicule</p>
                    <p>Génération de facture par sms après chaque lavage</p>
                    <p>Possibilité de fideliser vos clients</p>
                    <p>Possibilité de voir le reporting de toutes vos activité</p>
                    <p>Abonnement par mois pour pouvoir profiter plienement de notre plateforme</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 highlight">
                <div class="h-caption"><h4><i class="fa fa-flash fa-5"></i>Rapidité</h4></div>
                <div class="h-body text-center">
                    <p>Utilisation facile et très fluide de la plateforme</p>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 highlight">
                <div class="h-caption ">
                    <div class="widget-body">
                        <p class="follow-me-icons">
                            <i class="fa fa-mobile-phone fa-5"></i>
                            <i class="fa fa-tablet fa-5"></i>
                            <i class="fa fa-desktop fa-5"></i>
                        </p>
                        <br><br><br><br>
                        <h4>Accecible sur plusieurs écrans</h4>
                    </div>
                </div>
                <div class="h-body text-center">

                    <p>Note plateforme est responsive, c'est a dire qu'elle est capable de s'afficher correctement sur n'importe quel écran. </p>
                </div>
            </div>
        </div> <!-- /row  -->

    </div>
</div>
<!-- /Highlights -->

<!-- container -->
<div class="container">


</div>	<!-- /container -->

<!-- Social links. @TODO: replace by link/instructions in template -->
<section id="social">
    <div class="container">
        <div class="wrapper clearfix">
            <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style">
                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                <a class="addthis_button_tweet"></a>
                <a class="addthis_button_linkedin_counter"></a>
                <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
            </div>
            <!-- AddThis Button END -->
        </div>
    </div>
</section>
<!-- /social links -->
@endsection

