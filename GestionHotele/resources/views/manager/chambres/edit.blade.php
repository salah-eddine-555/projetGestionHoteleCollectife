<x-manager>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Edit a chambre</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('chambres.update', $chambre) }}" method="POST" enctype="multipart/form-data">

                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="quantity" id="chambre-name"
                                                    type="numbre" placeholder="Enter the chambre name" value="{{$chambre->quantity}}" />
                                                <label for="quantity">quantity</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" name="capacite" id="capacite"
                                                    type="number" placeholder="Enter the chambre's capacite"
                                                    max="5" min="1" value="{{$chambre->capacite}}" />
                                                <label for="capacite">Capacité</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" name="price_per_night" id="price_per_night"
                                                    type="number" placeholder="Enter the chambre's price per night"
                                                    value="{{$chambre->price_per_night}}" />
                                                <label for="price_per_night">price per night</label>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="categorie">Choose a catagorie:</label>
                                    <select id="categorie" name="categorie">
                                        @foreach($categories as $categorie)
                                        <option value="{{ $categorie->name }}">{{ $categorie->name }}</option>
                                        @endforeach
                                    </select>

                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="description" id="description" maxlength="255">{{$chambre->description}}</textarea>
                                        <label for="description">Description</label>
                                    </div>

                                    <div class="form-floating mb-2 mb-md-0">
                                        <input class="form-control" name="image" id="image" type="file"
                                            placeholder="Link an image" />
                                        <label for="image">Link an Image</label>
                                    </div>

                                    <div class="mt-4 mb-0">
                                        <div class="d-grid">
                                            <button type="submit" name="chambre-edit"
                                                class="btn btn-primary btn-block">Edit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

</x-manager>