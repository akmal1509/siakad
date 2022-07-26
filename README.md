<h1 align="center">Sistem Informasi Akademik Sekolah! 👋</h1>

## Fitur

- Autentikasi Admin,Guru,Operator,Siswa
- User & CRUD
- Jadwal & CRUD
- Kelas & CRUD
- Mata Pelajaran & CRUD
- Guru & CRUD
- Siswa & CRUD
- Rapot
- Dan lain-lain

---

## Default Account for testing

**Admin Default Account**

- email: admin@gmail.com
- Password: 12345678

---

## Install

1. **Clone Repository**

```bash
cd namafolder
composer install
cp .env.example .env
```

2. **Buka `.env` lalu ubah baris berikut sesuai dengan database yang ingin dipakai**

```bash
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

3. **Instalasi website**

```bash
php artisan key:generate
php artisan migrate --seed
```

4. **Jalankan website**

```bash
php artisan serve
```

5. **Note: Sebelum isi rapot dan nilai isi predikat terlebih dahulu oleh guru**

## License

- Copyright © 2022 Rizky Al Kusaeri.

