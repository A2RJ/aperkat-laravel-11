@extends('layout.index')

@section('title', 'Role | APERKAT')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Role</h6>
                </div>

                <div class="card-body">
                    <a class="btn btn-primary mb-4" href="#" data-toggle="modal" data-target="#addModal">
                        Add Role
                    </a>

                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}.
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            An error occurred with that action, please try again.
                        </div>
                    @endif

                    <!-- Card Body -->
                    <div class="table-responsive ">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Supervisor</th>
                                    <th scope="col">Subordinates</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration + $roles->firstItem() - 1 }}</th>
                                        <td>{{ $role->role }}</td>
                                        <td>{{ $role->user?->name }} <br> ({{ $role->user?->email }})</td>
                                        <td>{{ $role->parent?->role }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($role->children as $child)
                                                    <li>{{ $child->role }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-sm btn-success mr-1 mb-1" href="#" data-toggle="modal"
                                                    data-target="#editModal{{ $role->id }}">
                                                    <i class="fas fa-fw fa-edit"></i>
                                                </a>

                                                <form action="{{ route('role.destroy', $role->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger bg-danger "
                                                        onclick="return confirm('Are you sure you want to delete this item?')">
                                                        <i class="fas fa-fw fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="float-right ">
                            {{ $roles->links() }}
                        </div>
                    </div>
                </div>

                <!-- Add Modal-->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Role Form</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('role.store') }}" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-12 mb-3">
                                            <label for="role">Role</label>
                                            <input type="text" class="form-control @error('role') is-invalid @enderror"
                                                id="role" name="role" required>
                                            @error('role')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3 d-flex flex-column">
                                            <label for="parent_id">Supervisor</label>
                                            <select
                                                class="w-100 border rounded selectpicker @error('parent_id') is-invalid @enderror"
                                                id="parent_id" name="parent_id" data-live-search="true" required>
                                                <option>Choose Supervisor</option>
                                                @foreach ($supervisors as $supervisor)
                                                    <option value="{{ $supervisor->id }}">{{ $supervisor->role }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('parent_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3 d-flex flex-column">
                                            <label for="user_id">User</label>
                                            <select
                                                class="w-100 border rounded selectpicker @error('user_id') is-invalid @enderror"
                                                id="user_id" name="user_id" data-live-search="true" required>
                                                <option>Choose User</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Edit modal --}}
                @foreach ($roles as $role)
                    <div class="modal fade" id="editModal{{ $role->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Role Form</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('role.update', ['role' => $role->id]) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-row">
                                            <div class="col-12 mb-3">
                                                <label for="role">Role</label>
                                                <input type="text"
                                                    class="form-control @error('role') is-invalid @enderror"
                                                    id="role" name="role" required value="{{ $role->role }}">
                                                @error('role')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3 d-flex flex-column">
                                                <label for="parent_id">Supervisor</label>
                                                <select
                                                    class="w-100 border rounded selectpicker @error('parent_id') is-invalid @enderror"
                                                    id="parent_id" name="parent_id" data-live-search="true" required>
                                                    <option>Choose Supervisor</option>
                                                    @foreach ($supervisors as $supervisor)
                                                        <option value="{{ $supervisor->id }}"
                                                            {{ $role->role == $supervisor->role ? 'disabled' : '' }}
                                                            {{ $role->parent?->role == $supervisor->role ? 'selected' : '' }}>
                                                            {{ $supervisor->role }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('parent_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3 d-flex flex-column">
                                                <label for="user_id">User</label>
                                                <select
                                                    class="w-100 border rounded selectpicker @error('user_id') is-invalid @enderror"
                                                    id="user_id" name="user_id" data-live-search="true" required>
                                                    <option>Choose User</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}"
                                                            {{ $role->user?->name == $user->name ? 'selected' : '' }}>
                                                            {{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('user_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-secondary" type="button"
                                                data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection

    @section('scriptjs')
        <script src="/sb-admin-2/vendor/bootstrap-select/bootstrap-select.min.js"></script>
        <script type="text/javascript" charset="utf-8">
            $(function() {
                $('.selectpicker').selectpicker()
            });
        </script>
    @endsection
