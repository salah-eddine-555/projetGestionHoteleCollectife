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
                                    <form action="{{ route('miscs.update', "$type!$misc->id") }}" method="POST">

                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-3">
                                            <div class="">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="name" id="misc-name"
                                                        type="text" placeholder="Enter the misc name" value="{{$misc->name}}" />
                                                    <label for="name">Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" name="misc-edit"
                                                    class="btn btn-primary btn-block">edit</button></div>
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
