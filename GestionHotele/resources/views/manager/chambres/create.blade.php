<x-manager>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create a hotel</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('chambres.store') }}" method="POST" enctype="multipart/form-data">

                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="name" id="hotel-name"
                                                        type="text" placeholder="Enter the hotel name" />
                                                    <label for="name">Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" name="rating" id="rating"
                                                        type="number" placeholder="Enter the hotel's star rating"
                                                        max="5" min="0" />
                                                    <label for="rating">Rating</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="address" id="address" type="text"
                                                placeholder="Enter the hotel's address" />
                                            <label for="address">Address</label>
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
