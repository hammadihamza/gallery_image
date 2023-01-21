<?php
require_once "nav.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style>
        <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800&display=swap');


:root {
	/* Base font size */
	font-size: 10px;
}

*,
*::before,
*::after {
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;
    text-decoration: none;
}

body {
	background-color: #2c3e50;
    font-size: 14px;
  height: 100vh;
  line-height: 1.6;
}

.collapse-content {
  width: 50vw;
  margin: auto;
  box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
}
.collapse-content {
  width: 50vw;
  margin: 30px auto;
  box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
}

.collapse {
  background: #fff;
}

.collapse a {
  display: block;
  font-size: 1rem;
  font-weight: 500;
  padding: 0.9rem 1.8rem;
  color: #F2A622;
  position: relative;
  background: #2A2A2A;
}

.collapse a:hover {
    opacity:.8;
}

.collapse a:before {
  content: "";
  border-top: 7px solid #fff;
  border-left: 7px solid transparent;
  border-right: 7px solid transparent;
  position: absolute;
  top: 25px;
  right: 30px;
}

.inner-content {
  padding: 1.8rem;
}

.content {
  max-height: 0em;
  transition: 0.3s linear 0s;
  overflow: hidden;
}

.collapse + .collapse a {
  border-top: 1px solid rgba(255, 255, 255, 0.7);
}

h3 {
  margin-bottom: 15px;
}

.collapse:target .content {
  max-height: 15em;
}

.collapse:target a:before {
  transform: rotate(-90deg);
}

@media (max-width: 768px) {
  .collapse-content {
    width: 80vw;
    margin: auto;
    box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
  }
}
@media (max-width: 425px) {
  body {
    line-height: 1.3;
  }
  .collapse-content {
    width: 80vw;
  }
  .inner-content {
    padding: 1.2rem;
  }
  .inner-content h3 {
    margin-bottom: 0.3rem;
  }
}
@media (max-width: 320px) {
  body {
    line-height: 1.3;
  }
  .collapse-content {
    width: 80vw;
  }
  .inner-content {
    padding: 0.8rem;
  }
  .inner-content h3 {
    margin-bottom: 0.3rem;
  }
}

    </style>
</head>
<body>
    <div class="collapse-content">
      <div class="collapse" id="AA">
        <a class="AA" href="#AA"
          > Qu'est-ce qu'une galerie d'images ?</a
        >
        <div class="content">
          <div class="inner-content">
            Nous pouvons utiliser le système de galerie pour présenter et organiser nos images. Comme le système est basé en ligne, toute personne disposant de l'URL peut afficher et télécharger des images.
          </div>
        </div>
      </div>
      <div class="collapse" id="BB">
        <a class="BB" href="#BB"
          >Mise en route</a
        >
        <div class="content">
          <div class="inner-content">
           Nous devons suivre quelques étapes avant de créer notre système de galerie avec PHP. Nous devons configurer notre environnement de serveur Web (si vous ne l'avez pas déjà fait) et nous assurer que les extensions requises sont activées.
          </div>
        </div>
      </div>
      <div class="collapse" id="CC">
        <a class="CC" href="#CC"
          >Conditions</a
        >
        <div class="content">
          <div class="inner-content">
            Serveur Web - Si vous n'avez pas installé de package de solution de serveur Web local, je vous recommande de télécharger et d'installer XAMPP. XAMPP est un package de solution de serveur Web open source.
Extension PHP PDO — Comme nous allons utiliser l'extension PHP PDO, assurez-vous qu'elle est activée. C'est généralement le cas par défaut, mais dans certaines circonstances, ce n'est peut-être pas le cas.
          </div>
        </div>
      </div>
      <div class="collapse" id="DD">
        <a class="DD" href="#DD"
          >Librairies utilisées pour côté front-end</a
        >
        <div class="content">
          <div class="inner-content">
            <ul>
    <li>AOS</li>
    <li>Fancybox</li>
</ul>
<p>Il est recommandé d'utiliser cette application web en ligne pour bien fonctionner, et surtout pour les dépendances de ces librairies.
    Que je les ai utilisés pour rendre les pages plus attrayantes
          </div>
        </div>
      </div>
</body>
</html>