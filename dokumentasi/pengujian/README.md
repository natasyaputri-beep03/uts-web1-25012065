# Dokumentasi Pengujian UTS Web I

## Aplikasi Kantin Kampus

Dokumentasi ini berisi skenario pengujian aplikasi pemesanan makanan dan minuman menggunakan PHP Native.

| ID  | Skenario Pengujian                        | Hasil yang Diharapkan                              | Hasil Aktual | Status      |
| --- | ----------------------------------------- | -------------------------------------------------- | ------------ | ----------- |
| U01 | Membuka halaman menu                      | Daftar menu tampil                                 | Belum diuji  | Belum diuji |
| U02 | Mencari nama menu                         | Menu yang sesuai tampil                            | Belum diuji  | Belum diuji |
| U03 | Memasukkan jumlah kosong                  | Pesanan ditolak                                    | Belum diuji  | Belum diuji |
| U04 | Memasukkan jumlah negatif                 | Pesanan ditolak                                    | Belum diuji  | Belum diuji |
| U05 | Memasukkan jumlah desimal                 | Pesanan ditolak                                    | Belum diuji  | Belum diuji |
| U06 | Memasukkan jumlah 0 atau lebih dari 10    | Pesanan ditolak                                    | Belum diuji  | Belum diuji |
| U07 | Memasukkan kode menu tidak valid          | Pesanan ditolak                                    | Belum diuji  | Belum diuji |
| U08 | Menambahkan menu ke keranjang             | Jumlah dan subtotal dihitung                       | Belum diuji  | Belum diuji |
| U09 | Memeriksa diskon                          | Diskon 10% berlaku untuk subtotal minimal Rp50.000 | Belum diuji  | Belum diuji |
| U10 | Menghapus item dan mengosongkan keranjang | Item dapat dihapus dan keranjang dapat dikosongkan | Belum diuji  | Belum diuji |
| U11 | Memuat ulang halaman setelah pemesanan    | Pesanan tidak ditambahkan ulang                    | Belum diuji  | Belum diuji |

## Bukti Pengujian

Simpan screenshot setiap pengujian pada folder ini setelah pengujian dilakukan.

Catatan: Kolom hasil aktual dan status harus diperbarui sesuai hasil pengujian sebenarnya.

## Cara Menjalankan Pengujian

1. Jalankan server PHP lokal.
2. Buka aplikasi Kantin Kampus melalui browser.
3. Uji pencarian menu dan pemesanan.
4. Periksa validasi jumlah pesanan.
5. Periksa isi keranjang dan perhitungan diskon.
6. Uji fitur hapus item dan kosongkan keranjang.
7. Ambil screenshot hasil pengujian dan simpan di folder ini.
