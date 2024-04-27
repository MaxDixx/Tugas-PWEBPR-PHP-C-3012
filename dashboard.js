const sidebarToggle = document.getElementById('sidebar-toggle');
const sidebar = document.getElementById('sidebar');
const onsidebar = document.getElementById('btn-on-sidebar');

sidebarToggle.addEventListener('click', function() {
  sidebar.classList.toggle('active');
  if (sidebar.classList.contains('active')) {
    onsidebar.classList.toggle('active');
  } else {
    onsidebar.classList.remove('active');
  }
});

const btnTambah = document.getElementById('btn-tambah');
const btnEdit = document.getElementById('btn-edit');
const btnHapus = document.getElementById('btn-hapus');
const form = document.getElementById('form');
const label = document.getElementById('idguru');
const label1 = document.getElementById('namagur');
const label2 = document.getElementById('matpel');
const label3 = document.getElementById('walkel');
const label4 = document.getElementById('telp');

function changevaltmbh() {
  btnTambah.value = 'tambah';
}

function changevaledit() {
  btnEdit.value = 'edit';
}

function changevalhps() {
  btnHapus.value = 'hapus';
}

const tableRows = document.querySelectorAll('.db');

tableRows.forEach((row) => {
  row.addEventListener('click', () => {
    row.classList.add('selected');
    const idGuru = row.cells[0].textContent;
    const namaGuru = row.cells[1].textContent;
    const mataPelajaran = row.cells[2].textContent;
    const waliKelas = row.cells[3].textContent;
    const notelp = row.cells[4].textContent;
    row.style.backgroundColor = '#1b5da';
    label.value = idGuru;
    label1.value = namaGuru;
    label2.value = mataPelajaran;
    label3.value = waliKelas;
    label4.value = notelp;
      const selectedRow = document.querySelector('tbody tr.selected');
      if (selectedRow) {
        const idGuru = selectedRow.cells[0].textContent;
        const namaGuru = selectedRow.cells[1].textContent;
        const mataPelajaran = selectedRow.cells[2].textContent;
        const waliKelas = selectedRow.cells[3].textContent;
        const notelp = selectedRow.cells[4].textContent;
        
        label.value = idGuru;
        label1.value = namaGuru;
        label2.value = mataPelajaran;
        label3.value = waliKelas;
        label4.value = notelp;
      };
  });
});
