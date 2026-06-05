@extends('layout')
@section('title', 'STEM Cambodia - Home')
@section('content')

<header class="relative flex min-h-[80svh] flex-col justify-center px-12 pt-0 pb-0 bg-surface dark:bg-inverse-surface overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-transparent pointer-events-none"></div>
    
    <div class="relative z-10 mx-auto grid w-full max-w-7xl items-center gap-12 lg:grid-cols-12">
        
        <div class="flex flex-col justify-center lg:col-span-7 space-y-3">
            
            <h1 class="text-4xl font-extrabold tracking-tight text-on-surface dark:text-surface-container-high sm:text-5xl md:text-6xl">
                Advancing Cambodia's 
                <span class="block mt-1 text-primary dark:text-primary-fixed-dim relative h-[1.2em] overflow-hidden">
                    <span class="absolute inset-0 animate-text-slide opacity-0">Future Through STEM</span>
                    <span class="absolute inset-0 animate-text-slide-delayed-1 opacity-0">Innovation & Tech</span>
                    <span class="absolute inset-0 animate-text-slide-delayed-2 opacity-0">Youth Education</span>
                </span>
            </h1>

            <p class="max-w-2xl text-base text-on-surface-variant dark:text-outline-variant sm:text-lg md:text-xl leading-relaxed">
                STEMBODIAN provides high-impact educational programs and interactive resources that equip students with critical skills, driving sustainable progress across Cambodia's growing STEM sectors.
            </p>
        </div>

        <div class="flex items-center justify-center lg:col-span-5">
            <div class="relative w-full max-w-[400px] aspect-square rounded-2xl bg-surface-container-low mb-20">
                <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/STEM-Mark.png" 
                     class="w-full h-full object-contain drop-shadow-lg" 
                     alt="STEM Cambodia Circular Diagram">
            </div>
        </div>
    </div>
</header>




<section class="py-16 px-12 bg-surface-container-low dark:bg-inverse-surface/50 border-t border-b border-outline-variant">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-extrabold tracking-tight text-on-surface dark:text-surface-container-high mb-12 text-center">Why Choose STEM?</h2>
        
        <div class="flex flex-col border-t border-outline-variant/60">
            <div class="flex flex-col md:flex-row items-center gap-6 py-8 border-b border-outline-variant/60 group hover:bg-surface/50 dark:hover:bg-surface-container-low/30 transition-colors px-4 rounded-lg">
                <div class="text-4xl font-black text-primary dark:text-primary-fixed-dim opacity-30 w-16 md:text-left text-center">01</div>
                <div class="flex-grow grid grid-cols-1 md:grid-cols-2 gap-4">
                    <h3 class="text-xl font-bold text-on-surface dark:text-surface-container-high flex items-center justify-center md:justify-start">Critical Thinking</h3>
                    <p class="text-base text-on-surface-variant dark:text-outline-variant flex items-center text-center md:text-left">Developing the ability to analyze and solve complex problems logically.</p>
                </div>
            </div>
            
            <div class="flex flex-col md:flex-row items-center gap-6 py-8 border-b border-outline-variant/60 group hover:bg-surface/50 dark:hover:bg-surface-container-low/30 transition-colors px-4 rounded-lg">
                <div class="text-4xl font-black text-primary dark:text-primary-fixed-dim opacity-30 w-16 md:text-left text-center">02</div>
                <div class="flex-grow grid grid-cols-1 md:grid-cols-2 gap-4">
                    <h3 class="text-xl font-bold text-on-surface dark:text-surface-container-high flex items-center justify-center md:justify-start">Future-Ready Careers</h3>
                    <p class="text-base text-on-surface-variant dark:text-outline-variant flex items-center text-center md:text-left">Preparing for the fastest-growing and highest-impact job markets globally.</p>
                </div>
            </div>
            
            <div class="flex flex-col md:flex-row items-center gap-6 py-8 border-b border-outline-variant/60 group hover:bg-surface/50 dark:hover:bg-surface-container-low/30 transition-colors px-4 rounded-lg">
                <div class="text-4xl font-black text-primary dark:text-primary-fixed-dim opacity-30 w-16 md:text-left text-center">03</div>
                <div class="flex-grow grid grid-cols-1 md:grid-cols-2 gap-4">
                    <h3 class="text-xl font-bold text-on-surface dark:text-surface-container-high flex items-center justify-center md:justify-start">Innovation</h3>
                    <p class="text-base text-on-surface-variant dark:text-outline-variant flex items-center text-center md:text-left">Empowering the next generation to build better technology, software, and systems.</p>
                </div>
            </div>
        </div>
    </div>
</section>


</div>
</section>
<!-- Explore Section (Bento Grid) -->
<section class="max-w-container-max mx-auto px-gutter py-lg py-xl">
<h2 class="text-headline-md font-headline-md text-on-surface mb-md">Explore Subjects</h2>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-md">
<!-- Science -->
<a class="group relative overflow-hidden rounded-xl bg-surface-bright border border-outline-variant p-md flex flex-col justify-between h-48 ambient-shadow transition-all duration-300 items-center" href="http://cs262mtgroup1.test/science">

<div class="bg-primary/10 w-12 h-12 flex items-center justify-center rounded-lg mb-4 group-hover:bg-primary/20 transition-colors">
<span class="material-symbols-outlined text-primary">science</span>
</div>
<div>
<h3 class="text-headline-md font-headline-md text-on-surface text-lg text-center">Science</h3>

</div>
</a>
<!-- Technology -->
<a class="group relative overflow-hidden rounded-xl bg-surface-bright border border-outline-variant p-md flex flex-col justify-between h-48 ambient-shadow transition-all duration-300 items-center" href="http://cs262mtgroup1.test/technology">

<div class="bg-tertiary/10 w-12 h-12 flex items-center justify-center rounded-lg mb-4 group-hover:bg-tertiary/20 transition-colors">
<span class="material-symbols-outlined text-tertiary">devices</span>
</div>
<div>
<h3 class="text-headline-md font-headline-md text-on-surface text-lg text-center">Technology</h3>

</div>
</a>
<!-- Engineering -->
<a class="group relative overflow-hidden rounded-xl bg-surface-bright border border-outline-variant p-md flex flex-col justify-between h-48 ambient-shadow transition-all duration-300 items-center" href="http://cs262mtgroup1.test/engineering">

<div class="bg-secondary/10 w-12 h-12 flex items-center justify-center rounded-lg mb-4 group-hover:bg-secondary/20 transition-colors">
<span class="material-symbols-outlined text-secondary">precision_manufacturing</span>
</div>
<div>
<h3 class="text-headline-md font-headline-md text-on-surface text-lg text-center">Engineering</h3>

</div>
</a>
<!-- Math -->
<a class="group relative overflow-hidden rounded-xl bg-surface-bright border border-outline-variant p-md flex flex-col justify-between h-48 ambient-shadow transition-all duration-300 items-center" href="http://cs262mtgroup1.test/mathematics">

<div class="bg-on-primary-fixed-variant/10 w-12 h-12 flex items-center justify-center rounded-lg mb-4 group-hover:bg-on-primary-fixed-variant/20 transition-colors">
<span class="material-symbols-outlined text-on-primary-fixed-variant">calculate</span>
</div>
<div>
<h3 class="text-headline-md font-headline-md text-on-surface text-lg text-center">Mathematics</h3>

</div>
</a>
</div>
</section>





</main>
@endsection