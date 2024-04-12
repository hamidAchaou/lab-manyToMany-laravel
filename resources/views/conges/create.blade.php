<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ isset($conge) ? 'Edit Conge' : 'Add Conge' }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ isset($conge) ? route('conges.update', $conge->id) : route('conges.store') }}">
                            @csrf
                            @if (isset($conge))
                                @method('PUT')
                            @endif

                            <!-- Dropdown for selecting users -->
                            <div class="mb-3 row">
                                <label for="user_id" class="col-md-4 col-form-label text-end">Users</label>
                                <div class="col-md-6">
                                    <select id="user_id" name="user_id" class="form-select @error('user_id') is-invalid @enderror" required>
                                        <option value="" disabled selected>Select a user</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ (isset($conge) && $conge->user_id == $user->id) ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Date Debut input -->
                            <div class="mb-3 row">
                                <label for="date_debut" class="col-md-4 col-form-label text-end">Date Debut</label>
                                <div class="col-md-6">
                                    <input id="date_debut" type="date" class="form-control @error('date_debut') is-invalid @enderror" name="date_debut"
                                        value="{{ isset($conge) ? $conge->date_debut : old('date_debut') }}" required autofocus>
                                    @error('date_debut')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Date Fin input -->
                            <div class="mb-3 row">
                                <label for="date_fin" class="col-md-4 col-form-label text-end">Date Fin</label>
                                <div class="col-md-6">
                                    <input id="date_fin" type="date" class="form-control @error('date_fin') is-invalid @enderror" name="date_fin"
                                        value="{{ isset($conge) ? $conge->date_fin : old('date_fin') }}" required>
                                    @error('date_fin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit button -->
                            <div class="mb-0 row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ isset($conge) ? 'Update' : 'Add' }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap 5 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@3.3.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
