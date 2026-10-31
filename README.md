# FidzzTeck — Agency Digital & Software Development Website

Website profil agensi digital modern dan responsif dibangun menggunakan **Laravel 12**, **Tailwind CSS v4**, dan **Vite**, dilengkapi dengan **Panel Admin Lengkap** untuk mengelola layanan, portofolio proyek, pesan konsultasi (inquiry), profil founder, branding, FAQ, dan pengaturan website.

---

## 🚀 Fitur Utama

- **Landing Page Modern & HD**:
  - Hero Section dengan visual mockup multi-device (Laptop, Tablet, Smartphone) responsif.
  - Section Layanan (Website Development, Web Application, Sistem Informasi Custom, UI/UX Design).
  - Section Portofolio Proyek Terintegrasi Database.
  - Section Profil Founder & Our Tech Stack.
  - Section Alur Kerja Terstruktur (Discovery, Planning, Design & Development, Launch & Support).
  - Formulir Konsultasi Proyek (Inquiry) tervalidasi dan tersimpan di database.
  - Section Pertanyaan Umum (FAQ) interaktif.
- **Panel Kendali Admin**:
  - Dashboard statistik ringkasan proyek, layanan, FAQ, dan pesan baru.
  - CRUD Kelola Proyek (upload gambar, kategori, tech stack, slug, urutan, status draft/publish).
  - CRUD Kelola Layanan.
  - Manajemen Pesan Masuk (Inquiry) dengan filter status, tombol langsung WhatsApp (otomatis terisi pesan pembuka), dan balasan email.
  - Pengaturan Umum Website (Nama, tagline, teks hero, kontak, lokasi, SEO metadata).
  - Kelola Branding (Ganti logo utama, favicon, dan foto founder dengan live preview).
  - Kelola Profil Founder (Biografi, jabatan, daftar keahlian).
  - Kelola FAQ (Tanya Jawab).

---

## 🛠️ Tech Stack

- **Backend**: Laravel 12 (PHP 8.2+)
- **Frontend**: Blade Templating, Tailwind CSS v4, JavaScript
- **Database**: SQLite (default, siap diganti MySQL/PostgreSQL via `.env`)
- **Build Tool**: Vite 6

---

## 📦 Panduan Instalasi Lokal

Ikuti langkah-langkah berikut untuk menjalankan project ini di komputer lokal:

### 1. Clone Repository
```bash
git clone https://github.com/USERNAME/REPO_NAME.git
cd fidzzmedia
```

### 2. Install Dependensi PHP & Node.js
```bash
composer install
npm install
```

### 3. Konfigurasi Environment (`.env`)
Salin file `.env.example` menjadi `.env`:
```bash
# Windows PowerShell
copy .env.example .env

# Atau Linux/macOS
cp .env.example .env
```

Buat kunci aplikasi (APP_KEY):
```bash
php artisan key:generate
```

### 4. Setup Database & Migrasi
Buat file database SQLite (jika menggunakan SQLite) dan jalankan migrasi beserta data awal (seeders):
```bash
php artisan migrate --seed
```

### 5. Hubungkan Storage Link (Upload Aset)
```bash
php artisan storage:link
```

### 6. Build Aset Frontend
```bash
npm run build
```

### 7. Jalankan Server Lokal
```bash
php artisan serve
```
Buka browser di alamat: **`http://127.0.0.1:8000`**

---

## 🔐 Kredensial Administrator Default

Setelah menjalankan `php artisan migrate --seed`, akun administrator default dapat digunakan untuk masuk ke admin panel:

- **URL Login Admin**: `http://127.0.0.1:8000/login`
- **Email**: `admin@fidzzteck.com`
- **Password**: `admin123`

*(Disarankan segera mengubah kata sandi atau email di database/admin untuk keperluan lingkungan produksi).*

---

## 🛡️ Keamanan & Privasi

- File rahasia `.env`, file database lokal `*.sqlite`, file log `storage/logs/`, serta folder dependensi `vendor/` dan `node_modules/` **secara otomatis diabaikan** oleh `.gitignore`.
- Jangan pernah meng-commit file `.env` asli atau data sensitif ke publik repository.

---

## 📄 Lisensi

Project ini dilisensikan di bawah lisensi terbuka [MIT License](LICENSE).
