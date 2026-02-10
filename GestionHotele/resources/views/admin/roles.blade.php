<x-admin>

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Roles</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Roles</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Roles dataTable
                </div>
                <div>
                    <a href="{{ route('role.create') }}" class="btn btn-primary mx-2 my-2">Create a Role</a>
                </div>

                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                              
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($roles ?? [] as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    
                                    <td>
                                        <div class="d-flex ">

                                            <a href="{{ route('role.edit', $role) }}"
                                                class="btn btn-secondary mx-2">Edit</a>

                                            <form action="{{ route('role.destroy', $role) }}"
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