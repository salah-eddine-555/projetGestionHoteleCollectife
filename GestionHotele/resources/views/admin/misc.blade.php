<x-admin>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Misc</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Misc</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tags dataTable
                </div>
                <div>
                    <a href="/admin-category/create" class="btn btn-primary"></a>
                </div>

                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Options</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($tags ?? [] as $tag)
                                <tr>
                                    <td>{{ $tag->name }}</td>
                                    <td>
                                        <div class="d-flex ">

                                            <a href="{{ route('site.show', $tag) }}"
                                                class="btn btn-success mx-2">Details</a>

                                            <a href="{{ route('tag.edit', $tag) }}"
                                                class="btn btn-secondary mx-2">Edit</a>

                                            <form action="{{ route('tag.destroy', $tag) }}" method="POST">
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

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Properties dataTable
                </div>
                <div>
                    <a href="/admin-category/create" class="btn btn-primary"></a>
                </div>

                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Options</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($properties ?? [] as $property)
                                <tr>
                                    <td>{{ $property->name }}</td>
                                    <td>
                                        <div class="d-flex ">

                                            <a href="{{ route('site.show', $property) }}"
                                                class="btn btn-success mx-2">Details</a>

                                            <a href="{{ route('property.edit', $property) }}"
                                                class="btn btn-secondary mx-2">Edit</a>

                                            <form action="{{ route('property.destroy', $property) }}" method="POST">
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

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Categories dataTable
                </div>
                <div>
                    <a href="/admin-category/create" class="btn btn-primary"></a>
                </div>

                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Options</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($categories ?? [] as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <div class="d-flex ">

                                            <a href="{{ route('site.show', $category) }}"
                                                class="btn btn-success mx-2">Details</a>

                                            <a href="{{ route('category.edit', $category) }}"
                                                class="btn btn-secondary mx-2">Edit</a>

                                            <form action="{{ route('category.destroy', $category) }}" method="POST">
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

    <x-admin>
