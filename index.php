<?php

include_once __DIR__ . "/admins/inc/database.php";

try{
    $db = new pdo("mysql: host=" . Database::HOST . "; port=" . Database::PORT . "; dbname=" . Database::DBNAME . "; charset=utf8;",Database::DBUSER, Database::DBPASS , array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ));
}catch(PDOException $pe){
    echo $pe->getMessage();
}

$req = "SELECT * FROM cartes";
$stmt = $db->prepare($req);
$stmt->execute();
$cartes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>WebConceptSite création de site internet</title>
    <meta name="description" content="Web-concept-site Création de site internet standard, site wordpress, site vitrine, site web e-commerce pour les particuliers et entreprises à Monteux et dans le Vaucluse.">
    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-34685582-1"></script>

    <script>

        window.dataLayer = window.dataLayer || [];

        function gtag(){dataLayer.push(arguments);}

        gtag('js', new Date());



        gtag('config', 'UA-34685582-1');

    </script>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">


  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

  <!-- Template Main CSS File -->

  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/contact.css">
  <link rel="stylesheet" href="assets/css/cartes.css">


</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a
            href="mailto:contact@example.com">laurent.allegre@web-concept-site.fr</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>06 89 38 34 90</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="https://github.com/laurent-allegre" class="twitter"><i class="bi bi-github"></i></a>
        <a href="https://www.linkedin.com/in/laurent-allegre-72225a93/" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </section><!-- End Top Bar-->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div id="logo">
        <h1><a href="index.php">WebConcept<span>Site</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php"><img src="assets/img/logo.png" alt=""></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Accueil</a></li>
          <li><a class="nav-link scrollto" href="#about">Présentation</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= hero Section ======= -->
  <section id="hero">

    <div class="hero-content" data-aos="fade-up">
      <h2>WebConcept<span>Site</span></h2>
      <h3>création de site internet </h3>
      <div>
        <a href="#about" class="btn-get-started scrollto">Commencer</a>
        <a href="#portfolio" class="btn-projects scrollto">Mes Projets</a>
      </div>
    </div>

    <div class="hero-slider swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image: url('assets/img/hero-carousel/1.jpg');"></div>

      </div>
    </div>

  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="col text-center">
          <h4>En accentuant votre présence sur Internet, vous augmenterez votre visibilité.<br>
            Vous pourrez alors, attirer de nouveaux clients et ainsi augmenter votre chiffre d'affaires.
          </h4>
        </div>
        <div class="row mt-5">
          <div class="col-lg-6 about-img">
            <img src="assets/img/log.png" alt="">
          </div>

          <div class="col-lg-6 content">
            <ul>
              <li><i class="bi bi-speedometer" width="64"> POURQUOI UN SITE WEB ?</i>
                <p><strong>- 65 % </strong> des consommateurs déclarent que le site Internet a une influence importante
                  (positive ou négative) sur l’avis qu’ils se font, d’une marque ou des produits et services qu’une
                  entreprise propose.</p>
                <p><strong>- 91 % </strong> des Français vont en ligne pour faire des achats locaux.</p>
                <p><strong>- 83 % </strong> des consommateurs interrogés pensent qu’avoir un site web et utiliser les
                  médias sociaux est un facteur important au moment de choisir.</p>
              </li>
              <li><i class="bi bi-pc-display-horizontal"> ENTIÈREMENT RESPONSIVE.</i>
                <p>Lorsque vous cherchez à atteindre le maximum de clients cibles, il est important que vous disposiez
                  d'un site Web conçu de manière réactive.
                  Un site Web conçu de manière réactive peut offrir des performances fluides dans les smartphones,
                  tablettes, ordinateurs portables et ordinateurs de bureau,
                  ce qui est essentiel pour attirer un maximum de clients.
                </p>
              </li>
              <li><i class="bi bi-globe2"> SEO & ACCESSIBILITÉ</i>
                <p>Référencement naturel boosté par les bonnes pratiques de la sémantique vous avez la garantie d'un
                  référencement SEO efficace et durable.</p>
                <p>un site mobile-friendly (Votre page Web est-elle adaptée aux mobiles ?), critère essentiel avec le déploiement des mises à jour dédiées à ce sujet sur Google depuis 2015 ;</p>
                <p>une exploration optimisé pour les robots d’indexation des moteurs de recherche ;</p>
              </li>
            </ul>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="bg-light">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Services</h2>
          <p>Lorsque vous cherchez à créer une présence en ligne puissante pour votre entreprise, il est important
            que vous ayez un site Web bien conçu pour commencer.
            Vous avez besoin d'un blog, site vitrine, boutique e-commerce pour votre commerce, restaurant, location
            immobilière, cabinet ou encore votre association ? Ou la refonte de votre site web déjà existant ? Je vous
            propose mes services :</p>
        </div>

        <div class="row gy-4">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
              <div class="icon"><i class="bi bi-briefcase"></i></div>
              <h4 class="title">Sites sur mesure</h4>
              <p class="description">Je vous propose de créer votre site web entièrement sur mesure afin de répondre à
                vos besoins spécifiques (création de site vitrine de site E-commerce ...)<br>
                Développement de site Web standard ou sous WordPress.
              </p>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <div class="icon"><i class="bi bi-pc-display-horizontal"></i></div>
              <h4 class="title">Développement Web</h4>
              <p class="description">Création de sites Web et mobile. Programmation Html5 css3 / Bootstrap / Javascript / PHP / Symfony <br>
                 Ainsi que des sites sous cms Wordpress / Woocommerce.</p>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="box">
              <div class="icon"><i class="bi bi-shield-lock"></i></div>
              <h4 class="title">Sécurité Web</h4>
              <p class="description">Nous nous efforçons de garantir que tous nos sites respectent les normes
                d'accessibilité exigées par le World Wide Web Consortium.
                Nos sites Web sont testés dans les navigateurs les plus couramment utilisés avec différentes résolutions
                d'écran.
              </p>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
              <div class="icon"><i class="bi bi-camera-fill"></i></div>
              <h4 class="title">Services-photos et Hébergement</h4>
              <p class="description">Fort d'une grande expérience professionnelle dans la photographie je peux réaliser les photos pour votre site.<br>
                  nous vous conseillons au sujet du choix de votre nom de domaine et de votre hébergement.

              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->
    <section> <!-- Création d'un site web -->
        <div class="row justify-content-center">
            <h2 class="text-center">Les étapes de la création d’un site internet</h2>
            <figure class="snip1390">
                <img src="assets/img/calender.jpg" alt="profile-sample3" class="profile" />
                <figcaption>
                    <h2>rendez vous</h2>
                    <blockquote>On communiquera avec vous par téléphone ou en présentiel afin de recueillir vos besoins.</blockquote>
                </figcaption>
            </figure>
            <figure class="snip1390">
                <img src="assets/img/meeting.jpg" alt="profile-sample3" class="profile" />
                <figcaption>
                    <h2>Planification</h2>
                    <blockquote>Vous nous transmettez votre contenu (photos, textes, idées...) et nous réalisons l'architecture du site.</blockquote>
                </figcaption>
            </figure>

            <figure class="snip1390"><img src="assets/img/desk.jpg" alt="profile-sample6" class="profile" />
                <figcaption>
                    <h2>Création</h2>
                    <blockquote>Nos concepteurs lancent la production de votre site Web et intègrent votre contenu.</blockquote>
                </figcaption>
            </figure>
            <figure class="snip1390"><img src="assets/img/check.jpg" alt="profile-sample6" class="profile" />
                <figcaption>
                    <h2>Validation</h2>
                    <blockquote>Vous validez le développement et la conception et nous donnez le feu vert pour le mettre en ligne.</blockquote>
                </figcaption>
            </figure>
            <figure class="snip1390"><img src="assets/img/shopping.jpg" alt="profile-sample6" class="profile" />
                <figcaption>
                    <h2>Mise en ligne</h2>
                    <blockquote>Nous publions votre site et le rendons visible sur Google et les principaux moteurs de recherche.</blockquote>
                </figcaption>
            </figure>
        </div>

    </section>


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg   bg-light">
      <div class="container">

        <div class="section-title">
          <h2>Mes Réalisations : <span class="h5">Projets qui m'ont permis d'acquérir de l'expérience.</span></h2>

        </div>
          <br>
        <div class="row">
        <!--  <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Tous</li>
              <li data-filter=".perso">Personnel</li>
              <li data-filter=".filter-card">Commerce</li>
              <li data-filter=".filter-web">Location</li>
            </ul>
          </div> -->
        </div>
        <div class="container">
            <div class="row portfolio-container">
                <?php foreach ($cartes as $carte) : ?>
                    <div class="col-12 col-xs-12 col-lg-4 col-md-6 portfolio-item  mb-4">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/<?= $carte['images']; ?>" class="img-fluid" alt="image du site choisis">
                            <div class="portfolio-info">
                                <h4><?= $carte['titre']; ?></h4>
                                <p><?= $carte['info']; ?></p> <br>
                                <p><?= $carte['langages']; ?></p>
                            </div>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/<?= $carte['images']; ?>" data-gall="portfolioGallery" class="venobox"
                                   title="le lien"><i class="bx bx-plus"></i></a>
                                <a href="<?= $carte['liens']; ?>" title="Lien vers le site"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>


      </div>
    </section><!-- End Portfolio Section -->


    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action">
      <div class="container" data-aos="zoom-out">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h2 class="cta-title">Besoin d'un photographe ?</h2>
            <p class="cta-text">Besoin d’images de qualité de votre maison, appartement, de votre hôtel, restaurant…
            <p class="cta-text">Pour vos annonces ou votre site Web… N’hésitez pas contactez-moi.</p>
            </p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="https://www.photo-provence-passion.web-concept-site.fr/">Rendez-vous sur <br> Photo Provence Passion.</a>
          </div>
        </div>
      </div>
    </section><!-- End Call To Action Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact">
      <div class="container bg-light" data-aos="fade-up">
        <div class="section-header">
          <h2>Contact</h2>
          <p>ENVOYEZ-NOUS UN EMAIL Nous vous répondrons dans les plus brefs délais</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>Adresse</h3>
              <address>78 Allée de la Résistance - 84170 Monteux</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3>Téléphone</h3>
              <p><a href="tel:+155895548855">06 89 38 34 90</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">laurent.allegre@web-concept-site.fr</a></p>
            </div>
          </div>

        </div>
      </div>
      <div class="row  tact" data-aos="fade-up" data-aos-delay="100">
        <div class="wrap">
          
          <form action="#">
            <div class="dbl-field">
              <div class="field">
                <input type="text" name="name" placeholder="Entrer votre nom">
                <i class='fas fa-user'></i>
              </div>
              <div class="field">
                <input type="text" name="email" placeholder="Entrer votre  email">
                <i class='fas fa-envelope'></i>
              </div>
            </div>
            <div class="dbl-field">
              <div class="field">
                <input type="text" name="phone" placeholder="Entrer votre téléphone">
                <i class='fas fa-phone-alt'></i>
              </div>
              <div class="field">
                <input type="text" name="website" placeholder="Entrer le sujet">
                <i class='fas fa-globe'></i>
              </div>
            </div>
            <div class="message">
              <textarea placeholder="Ecrire votre message" name="message"></textarea>
              <i class="material-icons">message</i>
            </div>
            <div class="button-area">
              <button type="submit">Envoyer</button>
              <span></span>
            </div>
          </form>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        <a href="./admins/login.php"> &copy;</a> Copyright 2022   <strong> Web Concept Site</strong>. All Rights Reserved
      </div>
      <div class="credits">

        Designed by <a href="https://web-concept-site.fr/">WebConceptSite</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/script.js"></script>
  <script src="assets/js/main.js"></script>
  

</body>

</html>