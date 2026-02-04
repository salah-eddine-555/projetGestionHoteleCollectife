<x-admin>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Hotels</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Hotels</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Hotels dataTable
                </div>
                <div>
                    <a href="/admin-category/create" class="btn btn-primary"></a>
                </div>

                <div class="card-body">
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

</x-admin>
