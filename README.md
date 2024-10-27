# Aturan Push ke GitHub

Dokumen ini menjelaskan aturan dan konvensi yang harus diikuti saat melakukan push ke repositori GitHub.

## Format Pesan Commit

Untuk menjaga konsistensi dan memudahkan pelacakan perubahan, gunakan format berikut saat membuat pesan commit:

### Frontend

Untuk perubahan pada bagian frontend, gunakan format:

## FE-feat:<fitur yang dikerjakan>

Contoh:
- `FE-feat:tambah halaman login`
- `FE-feat:perbaiki responsive design pada dashboard`

### Backend

Untuk perubahan pada bagian backend, gunakan format:

## BE-feat:<fitur yang dikerjakan>

Contoh:
- `BE-feat:implementasi autentikasi JWT`
- `BE-feat:optimasi query database untuk laporan bulanan`

## Pedoman Tambahan

1. Pastikan untuk melakukan `pull dari branch utama` lalu `membuat branch baru` saat melakukan perubahan.
2. Usahakan `setiap commit fokus pada satu perubahan` atau fitur spesifik.
3. Berikan deskripsi yang `jelas dan ringkas` pada pesan commit.
4. Lakukan `composer update` setelah melakukan pull dari branch utama
5. Jika ada perubahan yang mempengaruhi baik frontend maupun backend, buat commit terpisah untuk masing-masing bagian.
6. Lakukan `pull request/PR` di github anda **saat selesai melakukan pengerjaan** dan akan dilakukan **review** oleh PM/teman lain
