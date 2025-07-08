<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

# BE - Mini Social Media

Proyek ini merupakan backend dari aplikasi **Mini Social Media** yang dibangun menggunakan Laravel. Aplikasi ini mendukung otentikasi pengguna menggunakan **JWT (JSON Web Token)**, serta menyediakan fitur-fitur dasar media sosial seperti:

- Registrasi & Login
- Proteksi endpoint menggunakan JWT
- Membuat, membaca, mengedit, dan menghapus postingan
- Memberi komentar dan like
- Fitur pesan (chat sederhana)
- Soft delete & restore
- Validasi dan struktur response JSON yang konsisten
- Middleware untuk route yang membutuhkan otentikasi

---

## 🔗 Dokumentasi API

📄 Dokumentasi lengkap bisa diakses melalui Postman di link berikut:

[👉 Klik untuk membuka dokumentasi API](https://universal-escape-970850.postman.co/workspace/REST---EXPRESS~66979de3-733d-4e25-aa0a-f100ba727dd2/collection/30874010-41e06da0-432b-42b6-92f2-b7a2450067df?action=share&creator=30874010&active-environment=30874010-c2025e68-092e-4be0-9fd7-8cac2d9f4a7b)

---

## 🚀 Cara Instalasi

1. Clone repository:

   ```bash
   git clone https://github.com/ihsanzakyf/be-mini-social-media.git
   cd be-mini-social-media
   ```

2. Install Dependency:

```bash
composer install
```

3. Buat file .env dan generate app key:

```bash
cp .env.example .env
php artisan key:generate
```

4. Konfigurasi database di file .env:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=user_database
DB_PASSWORD=password_database
```

5. Jalankan migrasi:

```bash
php artisan migrate
```

6. php artisan jwt:secret:

```bash
php artisan jwt:secret
```

7. Jalankan server:

```bash
php artisan serve
```
