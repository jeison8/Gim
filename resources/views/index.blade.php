@extends('layouts.app')

@section('content')

 
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <a id="bgndVideo" class="player"
      data-property="{videoURL:'https://www.youtube.com/watch?v=w-cRWOjlk8c',showYTLogo:false, showAnnotations: false, showControls: false, cc_load_policy: false, containment:'#home-section',autoPlay:true, mute:true, startAt:255, stopAt: 271, opacity:1}">
    </a>

    <div class="intro-section" id="home-section" style="background-color: #ccc;">
      <div class="container">

        <div class="row align-items-center">
          <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">

            <center>
              <div class="card" style="width: 300px; border: none;">
                <form method="POST" id="consult-form" action="{{ route('users.consult') }}">
                <div class="card-body" style="background-color:#f23a2e">
                    <h5 class="card-title font-weight-bold mb-2"  style="color: white">Documento<small></small></h5>
                </div>
                <div class="card-body mx-auto text-center">
                    <div class="col-md-12">
                      @csrf
                      <input type="text" class="form-control" name="consult">   
                    </div>
                    <center>
                      <div class="col-md-9">
                        <a href="" onclick="event.preventDefault(); document.getElementById('consult-form').submit();"class="btn btn-flat red-text p-1 my-1 mr-0 mml-1" style="color:#f23a2e">consultar</a>
                      </div>  
                    </center>           
                </div>
                </form>
              </div>
            </center>

            <br>
            <p class="lead mx-auto desc mb-5">Blessing es más que un Club Deportivo, es un espacio donde sentirse bien y encontrarse con los amigos, Bienvenido al Club.</p>
          </div>
        </div>

      </div>
    </div>

    <div class="schedule-wrap">
      <div class="d-md-flex align-items-center">
        <div class="hours mr-md-5 mb-4 mb-lg-0">
          <h3 style="color:white;">HORARIOS:</h3> 
        </div>
        <div>
          <strong class="d-block">Lunes a viernes</strong>
          Abierto: 5:00am &mdash;
          Cierre: 9:00pm
          <strong class="d-block">Sabados</strong>
          Abierto: 8:00am &mdash;
          Cierre: 2:00pm
          <strong class="d-block">Domingos y festivos</strong>
          Abierto: 9:00am &mdash;
          Cierre: 12:00pm 
        </div>
      </div>
    </div>


    <div class="site-section" id="fit-section">
      <div class="container">

        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8 section-heading">
            <span class="subheading">Mantente sano</span>
            <h2 class="heading mb-3">Consigue un cuerpo perfecto</h2>
            <p>una persona puede ponerse en forma en mes y medio y tres meses, aunque todo dependerá de si ha hecho deporte, del tiempo que lleva practicándolo, de las horas a la semana que entrena, que esperas para empezar?.</p>
          </div>
        </div>

        <!-- Slider -->
        <div class="owl-carousel nonloop-block-14 block-14" data-aos="fade">
          <div class="slide">
            <div class="ftco-feature-1">
              <span class="icon flaticon-fit"></span>
              <div class="ftco-feature-1-text">
                <h2>Estar en forma</h2>
                <p>Todos los dias practica ejercicio al menos una hora.</p>
              </div>
            </div>
          </div>

          <div class="slide">
            <div class="ftco-feature-1">
              <span class="icon flaticon-gym-1"></span>
              <div class="ftco-feature-1-text">
                <h2>Únete al Club</h2>
                <p>No ingieras alcohol, tabaco, ni otras sustancias que destruyan nuestro cuerpo.</p>
              </div>
            </div>
          </div>

          <div class="slide">
            <div class="ftco-feature-1">
              <span class="icon flaticon-vegetables"></span>
              <div class="ftco-feature-1-text">
                <h2>Comer vegetales</h2>
                <p>Las verduras son componentes esenciales de una dieta saludable.</p>
              </div>
            </div>
          </div>

          <div class="slide">
            <div class="ftco-feature-1">
              <span class="icon flaticon-fruit-juice"></span>
              <div class="ftco-feature-1-text">
                <h2>Jugos de frutas</h2>
                <p>Los zumos naturales mejoran el bienestar de nuestro organismo gracias a las propiedades que estos poseen.</p>
              </div>
            </div>
          </div>
          
          <div class="slide">
            <div class="ftco-feature-1">
              <span class="icon flaticon-stationary-bike"></span>
              <div class="ftco-feature-1-text">
                <h2>Calentamiento corporal</h2>
                <p>Esta tarea es importante para poder realizar nuestra practica deportiva al 100%.</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

    <div class="bgimg" style="background-image: url('images/bg_2.jpg');"  data-stellar-background-ratio="0.5">

      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-7">
            <h2 class="">Obtenga el resultado que desea</h2>
            <p class="lead mx-auto desc mb-5">Confiamos en que usted está de acuerdo que hacer ejercicios y actividades físicas con regularidad es importante y ¡que está listo para empezar a hacerlo! </p>
          </div>
        </div>
      </div>

    </div>

    <div class="site-section" id="classes-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8  section-heading">
            <span class="subheading">Clases Fitness</span>
            <h2 class="heading mb-3">Clases</h2>
            <p>Clases exclusivas de diferentes modalidades de entrenamiento, intensa y dinámica, con foco cardiovascular y neuromuscular de corta duración y resultados rápidos.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="class-item d-flex align-items-center">
              <a href="single.html" class="class-item-thumbnail">
                <img src="{{asset('images/rumba.jpg')}}" alt="Image" style="height: 80px">
              </a>
              <div class="class-item-text">
                
                <h2><a href="single.html">Clase de rumba #1</a></h2>
                <span>Guillermo Tobar</span>,
                <span>60 minutes</span>
              </div>
            </div>

            <div class="class-item d-flex align-items-center">
              <a href="single.html" class="class-item-thumbnail">
                <img src="{{asset('images/box.png')}}" alt="Image" style="height: 80px;">
              </a>
              <div class="class-item-text">
                
                <h2><a href="single.html">Clase de kick boxing #2</a></h2>
                <span>Guillermo Tobar</span>,
                <span>60 minutos</span>
              </div>
            </div>

                     
          </div>
          <div class="col-lg-6">
            <div class="class-item d-flex align-items-center">
              <a href="single.html" class="class-item-thumbnail">
                <img src="{{asset('images/circuito.jpg')}}" alt="Image" style="height: 80px;">
              </a>
              <div class="class-item-text">
                
                <h2><a href="single.html">Clase de circuito #3</a></h2>
                <span>Guillermo Tobar</span>,
                <span>60 minutos</span>
              </div>
            </div>
            
            <div class="class-item d-flex align-items-center">
              <a href="single.html" class="class-item-thumbnail">
                <img src="{{asset('images/pilates.jpg')}}" alt="Image" style="height: 80px;">
              </a>
              <div class="class-item-text">
                
                <h2><a href="single.html">Clase de pilates #4</a></h2>
                <span>Guillermo Tobar</span>,
                <span>60 minutos</span>
              </div>
            </div>
            
            
           
          </div>
        </div>
      </div>
    </div>
    
    
    <div class="site-section" id="trainer-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5" data-aos="fade-up">
          <div class="col-md-8  section-heading">
            <span class="subheading">Entrenadores</span>
            <h2 class="heading mb-3">Nuestros Entrenadores</h2>
            <p>Ofrecen la mejor experiencia de entrenamiento que te permitirá cumplir tus objetivos.</p>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0 col-md-6 text-center" data-aos="fade-up" data-aos-delay="">
            <div class="person">
              <img src="{{asset('images/guille.jpg')}}" alt="Image" class="img-fluid" style="width:100px; height: 100px">
              <h3>Guillermo Tobar</h3>
              <p class="position">Entrenador</p>
              <p> Entrenador titulado con más de veinte años de experiencia como entrenador y preparador físico de todo tipo de deportistas.</p>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0 col-md-6 text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="person">
              <img src="{{asset('images/cris.jpg')}}" alt="Image" class="img-fluid" style="width:100px; height: 100px">
              <h3>Cristian Arbelaez</h3>
              <p class="position">Entrenador</p>
              <p>Entrenador titulado, con una amplia experiencia entrenando a deportistas de todos los niveles en deportes de resistencia.</p>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="person">
              <img src="images/person_1.jpg" alt="Image" class="img-fluid" style="width:100px; height: 100px">
              <h3>El Menor</h3>
              <p class="position">Entrenador</p>
              <p>Entrenador junior en curso de estudio de fisioterapia y ciencia corporal.</p>
            </div>
          </div>
        
        </div>
      </div>
    </div>


  </div>
  <!-- .site-wrap -->

  



@endsection
