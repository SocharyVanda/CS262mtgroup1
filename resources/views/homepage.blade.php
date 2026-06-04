@extends('layout')
@section('title', 'STEM Cambodia - Home')
@section('content')

<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://i.pinimg.com/1200x/e5/06/25/e50625aafcb8cdc0df2ac6231c5d912a.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://www.pocket-lint.com/why-pinterest-is-the-only-relaxing-social-media-app/" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</div>
</section>
<!-- Explore Section (Bento Grid) -->
<section class="max-w-container-max mx-auto px-gutter py-lg py-xl">
<h2 class="text-headline-md font-headline-md text-on-surface mb-md">Explore Subjects</h2>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-md">
<!-- Science -->
<a class="group relative overflow-hidden rounded-xl bg-surface-bright border border-outline-variant p-md flex flex-col justify-between h-48 ambient-shadow transition-all duration-300 items-center" href="#">

<div class="bg-primary/10 w-12 h-12 flex items-center justify-center rounded-lg mb-4 group-hover:bg-primary/20 transition-colors">
<span class="material-symbols-outlined text-primary">science</span>
</div>
<div>
<h3 class="text-headline-md font-headline-md text-on-surface text-lg text-center">Science</h3>

</div>
</a>
<!-- Technology -->
<a class="group relative overflow-hidden rounded-xl bg-surface-bright border border-outline-variant p-md flex flex-col justify-between h-48 ambient-shadow transition-all duration-300 items-center" href="#">

<div class="bg-tertiary/10 w-12 h-12 flex items-center justify-center rounded-lg mb-4 group-hover:bg-tertiary/20 transition-colors">
<span class="material-symbols-outlined text-tertiary">devices</span>
</div>
<div>
<h3 class="text-headline-md font-headline-md text-on-surface text-lg text-center">Technology</h3>

</div>
</a>
<!-- Engineering -->
<a class="group relative overflow-hidden rounded-xl bg-surface-bright border border-outline-variant p-md flex flex-col justify-between h-48 ambient-shadow transition-all duration-300 items-center" href="#">

<div class="bg-secondary/10 w-12 h-12 flex items-center justify-center rounded-lg mb-4 group-hover:bg-secondary/20 transition-colors">
<span class="material-symbols-outlined text-secondary">precision_manufacturing</span>
</div>
<div>
<h3 class="text-headline-md font-headline-md text-on-surface text-lg text-center">Engineering</h3>

</div>
</a>
<!-- Math -->
<a class="group relative overflow-hidden rounded-xl bg-surface-bright border border-outline-variant p-md flex flex-col justify-between h-48 ambient-shadow transition-all duration-300 items-center" href="#">

<div class="bg-on-primary-fixed-variant/10 w-12 h-12 flex items-center justify-center rounded-lg mb-4 group-hover:bg-on-primary-fixed-variant/20 transition-colors">
<span class="material-symbols-outlined text-on-primary-fixed-variant">calculate</span>
</div>
<div>
<h3 class="text-headline-md font-headline-md text-on-surface text-lg text-center">Mathematics</h3>

</div>
</a>
</div>
</section>

<div class="card">
  <h5 class="card-header">Featured</h5>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

</main>
@endsection