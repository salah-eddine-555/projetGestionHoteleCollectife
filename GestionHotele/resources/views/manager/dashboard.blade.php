<x-manager>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Total hotels</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Total chambres</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Hotels
                    </div>
                    
                    <div class="card-body">
                        <div>
                                <a href="{{ route('hotels.create') }}" class="btn btn-primary mx-2 my-2">Create a hotel</a>
                        </div>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Rating</th>
                                    <th>Description</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Rating</th>
                                    <th>Description</th>
                                    <th>Options</th>
                                </tr>
                            </tfoot>
                            <tbody>

@foreach ($hotels ?? [] as $hotel)
                                <tr>
                                    <td>{{ $hotel->name }}</td>
                                    <td>{{ $hotel->address }}</td>
                                    <td>{{ $hotel->rating }}<div class="bi-star-fill"></div>
                                    </td>
                                    <td>{{ $hotel->description }}</td>
                                    <td>
                                        <div class="d-flex ">

                                            <a href="{{ route('hotels.show', $hotel) }}"
                                                class="btn btn-success mx-2">Details</a>

                                            <a href="{{ route('hotels.edit', $hotel) }}"
                                                class="btn btn-secondary mx-2">Edit</a>

                                            <form action="{{ route('hotels.destroy', $hotel) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger mx-2"
                                                 type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </main>

</x-manager>
