# 🎓 E-Raport Laravel

Sistem **E-Raport berbasis web** yang dibangun menggunakan Laravel untuk membantu pengelolaan data akademik sekolah secara digital, terstruktur, dan efisien.

---

## 🚀 Fitur Utama

### 👨‍💼 Admin

* Login admin
* Kelola data:

  * Guru
  * Siswa
  * Kelas
  * Mata Pelajaran
* Melihat dan mengelola rapor siswa

### 👨‍🏫 Guru

* Login guru
* Input dan edit nilai siswa
* Melihat data siswa sesuai kelas & mapel

### 👨‍🎓 Siswa

* Login siswa
* Melihat nilai
* Melihat dan cetak rapor (PDF)

---

## 🛠️ Teknologi yang Digunakan

* **Laravel** (Framework PHP)
* **SQLite / MySQL** (Database)
* **Bootstrap** (Frontend UI)
* **Blade Template Engine**
* **DomPDF** (Export PDF)

---

## 🧠 Konsep Sistem

* Multi Authentication (Admin, Guru, Siswa)
* Role-based Access Control (Middleware)
* Relasi Database (One-to-Many & Many-to-Many)
* MVC (Model-View-Controller)

---

## ⚙️ Cara Install & Menjalankan

```bash
# Clone repository
git clone https://github.com/firza655/e-raport.git

# Masuk ke folder project
cd e-raport

# Install dependency
composer install

# Copy file env
cp .env.example .env

# Generate key
php artisan key:generate

# Migrasi database
php artisan migrate

# Jalankan server
php artisan serve
```

---

## 📌 Catatan

* Pastikan sudah mengatur konfigurasi database di file `.env`
* Gunakan akun yang sudah disediakan di seeder
---

## 👨‍💻 Developer

Dibuat oleh:
**Firzatullah Ozza**
S1 Teknik Informatika

---

## ⭐ Penutup

Project ini dibuat sebagai bagian dari pembelajaran dan pengembangan sistem informasi akademik berbasis web menggunakan Laravel.
