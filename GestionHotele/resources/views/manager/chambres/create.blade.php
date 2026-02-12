<x-manager>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create a chambre</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('chambres.store') }}" method="POST" enctype="multipart/form-data">

                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="hotel_id" id="hotel_id"
                                                        type="number" placeholder="Enter the hotel id" />
                                                    <label for="hotel_id">Hotel</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" name="rating" id="rating"
                                                        type="number" placeholder="Enter the hotel's star rating"
                                                         />
                                                    <label for="rating">Quantity</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" name="price_per_night" id="price_per_night"
                                                        type="number" placeholder="Enter the chambre price per night"
                                                         />
                                                    <label for="price_per_night">prix per night</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <label for="categorie">Choose a catagorie:</label>
                                            <select id="categorie" name="categorie">
                                                @foreach($categories as $categorie)
                                                <option value="{{ $categorie->name }}">{{ $categorie->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-floating mb-3">
                                            @foreach($categories as $categorie)
                                            <label>
                                                <input type="checkbox" name="categorie" value="{{ $categorie->name }}">
                                                {{ $categorie->name }}
                                            </label>
                                            @endforeach
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" name="description" id="description" maxlength="255"></textarea>
                                            <label for="description">Description</label>
                                        </div>

                                        <div class="form-floating mb-2 mb-md-0">
                                            <input class="form-control" name="image" id="image" type="file"
                                                placeholder="Link an image" />
                                            <label for="image">Link an Image</label>
                                        </div>

                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" name="hotel-create"
                                                    class="btn btn-primary btn-block">Create</button></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

</x-manager>
