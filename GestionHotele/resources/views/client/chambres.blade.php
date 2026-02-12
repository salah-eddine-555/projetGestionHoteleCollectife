<x-main>


    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Find your hostel</h1>
                <p class="lead fw-normal text-white-50 mb-0">With StayEase</p>
                @if (Auth::check())
                    <p class="lead fw-normal text-white-50 mb-0">Welcome {{ Auth::user()->firstname }}</p>
                @endif
                <h1 class="display-4 fw-bolder">Find your hostel</h1>
                <p class="lead fw-normal text-white-50 mb-0">With StayEase</p>


            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <form method="get" action="{{ route('chambres.index') }}">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="startDate" class="form-control dateInputStart" id="startDate" type="date"
                                min="2026-02-09" />
                            <label for="startDate">Start Date</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="endDate" class="form-control dateInputEnd" id="startDate" type="date" />
                            <label for="endDate">Start Date</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <select class="form-control " name='tag'>
                            <option value=''>Tous les tags</option>
                            @foreach ($allTags as $tag)
                                <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class = "col-md-6">
                        <select class="form-control " name='property'>
                            <option value=''>Toutes les propriétés</option>
                            @foreach ($allProperties as $prop)
                                <option value='{{ $prop->id }}'>{{ $prop->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class = "col-md-6">
                        <select class="form-control " name='category'>
                            <option value=''>Toutes les categories</option>
                            @foreach ($allCategories as $category)
                                <option value='{{ $category->id }}'>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button class="btn btn-primary">Filter</button>
                </div>
            </form>

        </div>
    </section>

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                @foreach ($chambres ?? [] as $chambre)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Chambre image-->
                            <img class="card-img-top" src="{{ asset('storage/' . ($chambre->image ?? 'images/default.jpg')) }}" alt="Image" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Hotel name-->
                                    <h5 class="fw-bolder">{{ $chambre->hotel->name }}</h5>
                                    <!-- Hotel reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div >{{ $chambre->capacite }}</div>
                                    </div>

                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div >{{ $chambre->categorie->name }}</div>
                                    </div>

                                </div>
                            </div>
                            <!-- Hotel actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                        href="{{ route('chambres.show', $chambre) }}">View
                                        details</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
 --}}
                @for ($i = 0; $i < sizeof($chambres); $i++)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Hotel image-->
                            <img class="card-img-top"
                                src="{{ asset('storage/' . ($chambres[$i]->image ?? 'default.jpg')) }}"
                                alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Hotel name-->
                                    <h5 class="fw-bolder">{{ $chambres[$i]->capacite }}</h5>
                                    <!-- Hotel reviews-->
                                    <div class="d-flex justify-content-center small text-success mb-2">
                                        <div>{{ $chambres[$i]->capacite }}</div>
                                    </div>

                                    <div class="d-flex justify-content-center small text-primary mb-2">
                                        <div>{{ $chambres[$i]->capacite }}</div>
                                    </div>

                                </div>
                            </div>
                            <!-- Hotel actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                        href="{{ route('chambres.show', $chambres[$i]->id) }}">View
                                        details</a></div>
                            </div>
                        </div>
                    </div>
                @endfor

            </div>
            
        </div>
    </section>
    {{ $chambres->links('pagination::bootstrap-5') }}


</x-main>
