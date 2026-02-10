<x-main>
    <!-- Product section-->

    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                        src="{{ asset('storage/' . ($hotel->image ?? 'images/default.jpg')) }}" /></div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">Chambre {{ $chambre->number }}</h1>
                    <h3>Hotel {{ $chambre->hotel->name }}</h3>
                    <!-- Hotel reviews-->
                    <div class="d-flex small text-warning mb-2">
                        <div class="bi-star-fill"></div>
                    </div>
                    <p class="lead">{{ $chambre->hotel->description }}</p>
                    <div class="mb-5">
                        <p><span class="text-primary">Adresse : </span> {{ $chambre->hotel->address }}</p>
                        <p><span class="text-primary"> Prix : </span>{{ $chambre->price_per_night }} €/nuit</p>
                        <p>Capacité : {{ $chambre->capacite }} personnes</p>
                        <h3>Tags</h3>
                        @foreach ($chambre->tags as $tag)
                            <span class="badge">{{ $tag->name }}</span>
                        @endforeach
                        <h3>Propriétés</h3>
                        @foreach ($chambre->properties as $property)
                            <span>{{ $property->name }}</span>
                        @endforeach
                    </div>
                    <form method="post" action="">
                        @csrf
                        <div class="form-floating mb-3">
                            <input name="startDate" class="form-control dateInputStart" id="startDate" type="date" min="2026-02-09"/>
                            <label for="startDate">Start Date</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="startDate" class="form-control dateInputEnd" id="startDate" type="date"/>
                            <label for="startDate">Start Date</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <button class="btn btn-primary">Reserve</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


</x-main>
