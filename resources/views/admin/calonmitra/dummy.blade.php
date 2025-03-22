<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Calon Mitra</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        input, select, button { width: 100%; margin-bottom: 10px; padding: 8px; }
        .alert { padding: 10px; background: #d4edda; color: #155724; margin-bottom: 15px; }
    </style>
</head>
<body>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <form action="{{ route('sendCalonMitra') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="nama" required>

        <label>NIK:</label>
        <input type="text" name="nik" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Telepon:</label>
        <input type="text" name="phone" required>

        <label>Lokasi:</label>
        <input type="text" name="lokasi" required>

        <label>Kota:</label>
        <select name="kota" required>
            <option value="">Pilih Kota</option>
            <option value="Jakarta">Jakarta</option>
            <option value="Bandung">Bandung</option>
            <option value="Surabaya">Surabaya</option>
        </select>

        <button type="submit">Kirim</button>
    </form>

</body>
</html>
