<x-manager>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Chambres</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Chambres</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Chambres dataTable
                </div>
                <div>
                    <a href="{{ route('chambres.create') }}" class="btn btn-primary">Create chambre</a>
                </div>

                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Hotel name</th>
                                <th>Chambre description</th>
                                <th>Capacite</th>
                                <th>Categorie</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Hotel name</th>
                                <th>Chambre description</th>
                                <th>Capacite</th>
                                <th>Categorie</th>
                                <th>Options</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($chambres ?? [] as $chambre)
                                <tr>
                                    <td>{{ $chambre->hotel->name }}</td>
                                    <td>{{ $chambre->description }}</td>
                                    <td>{{ $chambre->capacite }}<div class="bi-star-fill"></div>
                                    </td>
                                    <td>{{ $chambre->categorie->name }}</td>
                                    <td>
                                        <div class="d-flex ">

                                            <a href="{{ route('chambres.show', $chambre) }}"
                                                class="btn btn-success mx-2">Details</a>

                                            <a href="{{ route('chambres.edit', $chambre) }}"
                                                class="btn btn-secondary mx-2">Edit</a>

                                            <form action="{{ route('chambres.destroy', $chambre) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger mx-2" type="submit">Delete</button>
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
