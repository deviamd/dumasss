
SELECT pengaduans.name,pengaduans.laporan,tanggapans.tanggapan,tanggapans.update FROM pengaduans LEFT JOIN tanggapans ON pengaduans.id = tanggapans.pengaduanID;
