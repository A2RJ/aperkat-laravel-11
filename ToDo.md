Update major aperkat:
[x] auth dengan laravel socialite
[ ] manajemen struktur tree gunakan form dinamis
	[ ] assign user approval tree (POV pengaju)
	[ ] preview tree
	[ ] delete
[ ] crud hak akses
	[ ] static middleware for all hak akses
[ ] crud user
	[ ] berkaitan dengan struktur tree, hak akses
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
