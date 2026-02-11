<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method='GET' action='{{ route("chambres.index") }}'>
        <select name='tag'>
            <option value=''>Tous les tags</option>
                @foreach ($allTags as $tag)
            <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                @endforeach
            </select>
            <select name='property'>
            <option value=''>Toutes les propriétés</option>
                @foreach ($allProperties as $prop)
            <option value='{{ $prop->id }}'>{{ $prop->name }}</option>
                @endforeach
        </select>
        <button type='submit'>Filtrer</button>
    </form>

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
                    <a href="/admin-category/create" class="btn btn-primary"></a>
                </div>

                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Hotel name</th>
                                <th>Hotel address</th>
                                <th>Capacite</th>
                                <th>Categorie</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Hotel name</th>
                                <th>Hotel address</th>
                                <th>Capacite</th>
                                <th>Categorie</th>
                                <th>Options</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($chambres ?? [] as $chambre)
                                <tr>
                                    <td>{{ $chambre->name }}</td>
                                    <td>{{ $chambre->address }}</td>
                                    <td>{{ $chambre->capacite }}<div class="bi-star-fill"></div>
                                    </td>
                                    <td>{{ $chambre->categorie }}</td>
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

</body>
</html>
