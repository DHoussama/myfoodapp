@extends('layoutforhome')
@section("title", "Paradise")
@section('content')


<section class="gallery" id="gallery">
    <video class="video-slide active" autoplay muted loop>
        <source src="videos/vid2.mp4" type="video/mp4">
    </video>
    <video class="video-slide" autoplay muted loop>
        <source src="videos/vid1.mp4" type="video/mp4">
    </video>
    <div class="content active">
        <h5>HamHama Paradise </h5>
        <p>We will serve the most delicious tunisian food in Hungary soon.</p>
        <a  href="https://www.willflyforfood.net/tunisian-food/" target="_blank">Read More</a>
    </div>
    <div class="content" >
        <h5>After Life</h5>
        <p>Afterlife Records is an electronic music label established in 2016 by artists Carmine Conte and Matteo Milleri, also known as the duo of Tale Of Us.
        The record label is known for its melodic techno-beats and dreamy sounds and has worked with artists such as Eric Prydz, ANNA, Mathame, Kevin de Vries and more.</p>
        <a href="https://www.after.life/events" target="_blank" >Read More</a>
    </div>
    
     <div class="slider-navigation">
        <div class="nav-btn active" style="background-color: green;"></div>
        <div class="nav-btn" style="background-color: green;"></div>
      </div>

    
    
</section>




  
@endsection
