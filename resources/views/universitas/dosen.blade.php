@extends('layout.master')

@section('title', 'Data Dosen')

@section('dsnaktif', 'active')

@section('konten')
<div class="row">
            <div class="col-md-2">
                <?php
                    // $angka = 20
                ?>
                {{$angka = 100}}

                @if(($angka >= 0) and ($angka < 50))
                    <div class="alert alert-danger">
                        Tidak Lulus
                    </div>
                @elseif(($angka >= 50) and ($angka <= 100))
                    <div class="alert alert-success">
                        Lulus
                    </div>
                @endif

                @if($nilai != null)
                    @foreach($nilai as $nl)
                        @if(($nl >= 0) and ($nl < 50))
                            <div class="alert alert-danger">
                                Tidak Lulus yeah
                            </div>
                        @elseif(($nl >= 50) and ($nl <= 100))
                            <div class="alert alert-success">
                                Lulus yeah
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="alert alert-success">
                        Tidak ada data yeah
                    </div>
                @endif

                @switch($angka)
                    @case(0)
                        <div class="alert alert-dark">
                            Tidak ikut ujian
                        </div>
                    @break
                    @case(75)
                        <div class="alert alert-dark">
                            Lumayan
                        </div>
                    @break
                    @case(100)
                        <div class="alert alert-dark">
                            Sempurna
                        </div>
                    @break
                    @default
                        <div class="alert alert-dark">
                            Nilai Tidak Valid
                        </div>
                @endswitch

                @for($i = 0 ; $i < 5 ; $i++)
                    <div class="alert alert-success">
                        Laravel {{$i}}
                    </div>
                @endfor

                <?php $j = 0; ?>

                @while($j < 5)
                    <div class="alert alert-success">
                        Laravel while {{$j}}
                    </div>
                    <?php $j++; ?>
                @endwhile

                

                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        Teknik Informatika
                    </a>
                    @foreach($nama as $nm)
                    <a href="#" class="list-group-item list-group-item-action">{{ $nm }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-5">
                <h1>Data Dosen</h1>
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="https://uknow.uky.edu/sites/default/files/styles/uknow_story_image/public/GettyImages-1160947136%20%281%29.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                        </div>
                        <div class="carousel-item">
                        <img src="https://demolay.org/wp-content/uploads/2018/12/Vacation.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                        </div>
                        <div class="carousel-item">
                        <img src="https://travellersworldwide.com/wp-content/uploads/2022/05/shutterstock_1938868960.png.webp" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                @include('universitas.konten')
                <div class="row">
                    <div class="col-md-6">
                        <h1>Grid Kiri</h1>
                    </div>
                    <div class="col-md-6">
                        <h1>Grid Kanan</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Accordion Item #1
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Accordion Item #2
                        </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Accordion Item #3
                        </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <ul class="list-group">
                    <li class="list-group-item active" aria-current="true">An active item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                    <li class="list-group-item">A fourth item</li>
                    <li class="list-group-item">And a fifth one</li>
                </ul>
            </div>
        </div>
    </div>
@endsection