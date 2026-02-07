<x-admin>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Misc</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Misc</li>
            </ol>
            <div>
                <a href="/admin/create-miscs" class="btn btn-primary my-2">Create a misc</a>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tags dataTable
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


                                            <a href=""
                                                class="btn btn-secondary mx-2">Edit</a>

                                            <form action="{{ route('miscs.destroy', "tag!$tag->id") }}" method="POST">
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


                                            <a href=""
                                                class="btn btn-secondary mx-2">Edit</a>

                                            <form action="{{ route('miscs.destroy', "property!$property->id") }}" method="POST">
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

                                            <a href=""
                                                class="btn btn-secondary mx-2">Edit</a>

                                            <form action="{{ route('miscs.destroy', "category!$category->id") }}" method="POST">
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

</x-admin>
