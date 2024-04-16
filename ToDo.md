- STEP PER STEP
[ ] User
    - ppuf
    - ubah pengajuan saat direvisi dengan cara ambil semua status dan check status terakhir, jika status.status = false maka tombol ubah tampil
    - ubah dan tampilkan RAB
    - tambah detail rab yang disetujui di table dan form
    - aksi edit saat direvisi oleh atasan
    - status pengajuan pada table
    - validasi require if pada form pengajuan form pengajuan
    - ubah message pada pesan history 
    - [ ] validasi jika sudah 2 belum lakukan LPJ maka tidak bisa input pengajuan
    - [ ] add cc into email notification
[ ] Atasan
    - ppuf semua sub divisi
    - pengajuan semua sub divisi
    - terima pengajuan
[ ] Dir Keuangan
    - pengajuan semua sub divisi
    - crud periode
    - tambah ke periode -> nominal rab disetujui dan pilih periode
[ ] Wr II
    - pengajuan semua sub divisi - untuk need approval menjadi list pencairan berdasarkan role_id dan disbursement_period_id != null
    - pilih periode lalu terima semua
    - Tambah filter periode
    - Filter menunggu persetujuan tampilkan semua dan saat pilih periode maka tampilkan hanya yang belum diterima dan terima yang belum diterima saja
    - selesai dengan periode dll
[ ] Rektor 
    - pengajuan semua sub divisi
[ ] Pencairan
    - pengajuan semua sub divisi
    - upload pencairan bertahap
[ ] Periksa LPJ
    - pengajuan semua sub divisi
    - terima dan revisi lpj
    
Mail::to(Auth::user()->email)->send(new SendStatus('Random banget'));


- Bulan pada form pengajuan otomatis dari RKAT dan tidak bisa diajukan jika sudah lewat bulan
- validasi pengjuan pada tipe program
- lengkapi detail pegajuan pada pesan email
- wr2-dsti-001
- frs-ti-001
- order by month
- simpan prodi pada fakultas
- redirect gagal DK
- type upload lpj
- pesan juga cek
- jika revisi lpj tikda bisa edit     
- batasan 5 slot upload bukan berdasarkan sudah pencairan dan belum lpj 
- lpj bertahap