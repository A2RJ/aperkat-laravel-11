Update major aperkat:
[x] auth dengan laravel socialite
[x] manajemen struktur tree gunakan form dinamis
    [x] struktur berelasi dengan jabatan dan jabatan berelasi dengan status pengajuan dan jabatan berelasi dengan user
	[x] assign user approval tree (POV pengaju)
	[x] preview tree
	[x] delete
[x] crud hak akses
	[ ] static middleware for all hak akses
[x] crud user
	[x] berkaitan dengan struktur tree, hak akses
[ ] crud ppuf
	[ ] import
	[ ] add
	[ ] edit
	[ ] delete
	[ ] delete selected - minor
	[ ] cari, filter bulan tahun dan user
	[ ] print tor
[ ] crud pengajuan
	[ ] add, setiap add akan menyimpan memang struktur tree by user ke table submission tree status (submission_id, user_id, status, message)
	[ ] edit
	[ ] delete
	[ ] delete selected - minor
	[ ] cari, filter bulan tahun dan user
	[ ] detail, ambil tree by pengaju relasi ke 
	[ ] user tree dan status pengajuan
	[ ] aksi terima dan revisi yang akan disimpan ke table submission tree status akan verifikasi berdasarkan user_id dan status sebelumnya
	[ ] history akan menyimpan submission tree status history(submission_id, user_id, status, message) dengan detail
[ ] pengajuan sub divisi (dalam 1 tabel dengan filter)
	[ ] perlu disetujui
	[ ] selesai
	[ ] sedang di proses
[ ] keuangan
	[ ] upload pencairan
	[ ] periksa lpj keuangan
	[ ] periksa lpj kegiatan
[ ] notifikasi email dan WA


[ ] # NOTES
- Bagaimana jika table struktur tree disimpan ke table user?
- Bagaimana jika table submission struktur tree disimpan ke table submisson?
- Bagaimana jika table submission struktur tree history disimpan ke table submisson?
- SOLUSI: BOLEH JUGA
- Untuk structure tree hanya awal saja dan mulai dari dir.keuangan akan dan selanjutnya sudah tetap dan tidak berubah
