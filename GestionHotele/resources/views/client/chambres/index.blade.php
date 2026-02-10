<x-main>
        <section>
            <form method='GET' action='{{ route("chambres.index") }}'>
                <select name='tag'>
                    <option value=''>Tous les tags</option>
                    @foreach ($allTags as $tag)
                        <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                    @endforeach
                </select>
                <select name='property'>
                    <option value=''>Toutes les propriétés</option>
                    @foreach ($allProperties as $prop)
                        <option value='{{ $prop->id }}'>{{ $prop->name }}</option>
                    @endforeach
                </select>
                <button type='submit'>Filtrer</button>
            </form>
        </section>
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                        src="{{ asset('storage/' . ($chambre->hotel->image ?? 'images/default.jpg')) }}" /></div>
                <div class="col-md-6">
                    @foreach ($chambres as $chambre)
                        <h1 class="display-5 fw-bolder">{{ $chambre->hotel->name }}</h1>
                    <!-- Hotel reviews-->
                    <div class="d-flex small text-warning mb-2">
                        <div class="bi-star-fill"></div>
                    @endforeach
                    </div>
                    <p class="lead">{{ $chambre->hotel->description }}</p>
                    <div class="mb-5">
                        <p><span class="text-primary">Adresse : </span> {{ $chambre->address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Chambres</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-5">
                    @foreach ($chambres ?? [] as $chambre)
                        <div class="card h-100">
                            <!-- Chambre image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                alt="..." />
                            <!-- Chambre details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Chambre name-->
                                    <h5 class="fw-bolder">{{$chambre->number}}</h5>
                                    <!-- Chambre price-->
                                    {{$chambre->price_per_night}}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View
                                        details</a></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-main>
