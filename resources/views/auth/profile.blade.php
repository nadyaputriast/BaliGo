<!DOCTYPE html>
<html>

<head>
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        .form-container {
            max-width: 80%;
            margin: auto;
        }

        html,
        body {
            overflow: hidden;
            margin: 0;
            padding: 0;
            height: 100%;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-image: linear-gradient(45deg, #AAD4F5, #203D54);
            color: #fff;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .card {
            height: auto;
            border-radius: 15px;
            border: none;
            background-image: linear-gradient(45deg, #AAD4F5, #203D54);
            box-shadow: 8px 4px 4px #203D54;
        }

        .text-pur {
            color: #203D54;
        }

        .btn-bg-cst1 {
            background-color: #203D54;
            color: #fff;
            border-radius: 25px;
        }

        .btn-bg-cst1:hover {
            background: #455ede;
            color: #fff;
        }

        .img-left {
            border-radius: 10px;
        }

        .form-control,
        .form-select {
            background: #374151;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

        .form-control::placeholder,
        .form-select {
            color: #cbd5e1;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: #203D54;
            color: #fff;
            border-color: #455ede;
            box-shadow: 0 0 0 2px rgba(69, 94, 222, 0.5);
        }

        .letspace-2 {
            letter-spacing: 2px;
        }

        .cst-shadow {
            box-shadow: 8px 4px 4px #203D54;
        }
    </style>
</head>

<body>
    <div class="form-container mt-3">
        <span class="d-flex justify-content-between align-items-center p-3">
            <h1 class="text-center">Profile</h1>
            <a href="{{ route('welcome') }}" class="btn btn-light opacity-50">Back To Website</a>
        </span>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('profile') }}" class="card p-4">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6 mt-2">
                    <label for="nama_user" class="form-label">Nama:</label>
                    <input type="text" name="nama_user" id="nama_user" class="form-control"
                        value="{{ old('nama_user', $user->nama_user) }}" required>
                </div>
                <div class="col-md-6 mt-2">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                        <option value="Laki-laki"
                            {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                        </option>
                        <option value="Perempuan"
                            {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>
                </div>
                <div class="col-md-6 mt-2">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" name="username" id="username" class="form-control"
                        value="{{ old('username', $user->username) }}" required>
                </div>
                <div class="col-md-6 mt-2">
                    <label for="no_telepon" class="form-label">No Telepon:</label>
                    <input type="text" name="no_telepon" id="no_telepon" class="form-control"
                        value="{{ old('no_telepon', $user->no_telepon) }}">
                </div>
                <div class="col-md-6 mt-2">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="{{ old('email', $user->email) }}" required>
                </div>
                <div class="col-md-6 mt-2">
                    <label for="password" class="form-label">Password Baru (opsional):</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="col-md-6 mt-2">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password Baru:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-bg-cst1">Update Profile</button>
        </form>
    </div>
</body>
</html>