<x-admin>
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
                                    <form action="" method="POST">

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
                                                    <select name="type" class="form-control">
                                                        <option value=""></option>
                                                        <option value="tag">Tag</option>
                                                        <option value="property">Property</option>
                                                        <option value="category">Category</option>
                                                    </select>
                                                    <label for="rating">Type</label>
                                                </div>
                                            </div>
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

</x-admin>
