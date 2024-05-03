
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angkasa Raya</title>
    <link rel="stylesheet" href="/style\dashboard.css">
    <link rel="icon" type="image/x-icon" href="\asset/image 1.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <button class="btn-sidebar" id="sidebar-toggle">
                <img src="asset/list_6767791 1.png" alt="">
            </button>
            <h1 class="title">ANGKASA RAYA</h1>
            <button class="btn-logout" id="btn-logout" onclick="location.href=''">
                <img src="asset/logout_7828466 1.png" alt=""><h2>Logout</h2>
            </button>
        </div>
        <div id="sidebar" class="sidebar">
            <img src="asset/image 1.png" alt="">
            <button class="btn-on-sidebar">
                <img src="asset/home_10263239 1.png" alt="">
                <h5>Beranda</h5>
            </button>
            <button class="btn-on-sidebar">
                <img src="asset/study_6650383 1.png" alt="">
                <h5>Kelas</h5>
            </button>
            <button class="btn-on-sidebar">
                <img src="asset/book_13362754 1.png" alt="">
                <h5>Mata Pelajaran</h5>
            </button>
            <button class="btn-on-sidebar">
                <img src="asset/report_3333989 1.png" alt="">
                <h5>Silabus</h5>
            </button>
            <button class="btn-on-sidebar">
                <img src="asset/reading-book_4173183 1.png" alt="">
                <h5>Akun</h5>
            </button>
        </div>
        <div class="right-sidebar">
            <button class="btn-jdwl">JADWAL</button>
            <select name="hari" class="btn-hari" id="hari">
                <option value="">Senin</option>
                <option value="">Selasa</option>
                <option value="">Rabu</option>
                <option value="">Kamis</option>
                <option value="">Jumat</option>
                <img src="asset/Group.png" alt="">
            </select>
            <div class="guru1">
                <div class="kiri">
                    <img src="" alt="">
                    <span></span>
                </div>
                <div class="kanan">
                    
                    </div>
                </div>
                <div class="guru2"></div>
                <div class="guru3"></div>
                <div class="guru4"></div>
            </div>
            <div class="info">
                <div class="guru">
                    <h2 class="guruh2">Guru</h2>
                    <img src="asset/teacher_3485639 1.png" alt="">
                    <h2 class="angkah"><?php echo (mysqli_num_rows($result))?></h2>
                </div>
                <div class="matpel">
                    <h2 class="matpelh2">Mata Pelajaran</h2>
                    <img src="asset/book_13362754 1.png" alt="">
                    <h2 class="matpelh">39</h2>
                </div>
                <div class="kls">
                    <h2 class="klsh2">Kelas</h2>
                    <img src="asset/study_6650383 1.png" alt="">
                    <h2 class="klsh">58</h2>
                </div>
                <div class="slbs">
                    <h2 class="slbsh2">Silabus</h2>
                    <img src="asset/report_3333989 1.png" alt="">
                    <h2 class="silahh">67</h2>
                </div>
            </div>
            <form id='form' class="form" method="POST" enctype="multipart/form-data">
                <div class="content">
                    <div class="btn-content">       
                        <button id="btn-tambah" class="btn-tambah" type="submit" name="submit" value="tambah">Tambah</button>
                        <button id="btn-edit" class="btn-edit" type="submit" name="submit" value="edit">Edit</button>
                        <button id="btn-hapus" class="btn-hapus" type="submit" name="submit" onclick="confirmDelete(event)">Hapus</button>
                    </div>
                    <div class="table-content">
                        <h2>Teacher List</h2>
                        <table>
                            <thead class="head">
                                <tr>
                                    <th>ID Guru</th>
                                    <th>Nama Guru</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Wali Kelas</th>
                                    <th>NO Telepon</th>
                                    <th>Foto Guru</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr id='db' class='db'>";
                        echo "<td>" . $row["id_guru"] . "</td>";
                        echo "<td>" . $row["nama_guru"] . "</td>";
                        echo "<td>" . $row["mata_pelajaran"] . "</td>";
                        echo "<td>" . $row["wali_kelas"] . "</td>";
                        echo "<td>" . $row["nohp"] . "</td>";
                        echo "<td><img src='/fotoguru/". $row["foto_guru"]. "' alt='' width='250' height='150'></td>";
                        echo "</tr>";
                    }
                    
                } else {
                    echo "<td> 0 results </td>";
                }
                ?>
                <tr>
                    <td><input type="text" id="idguru" class="idguru" name="id_guru"  placeholder="ID Guru"></td>
                    <td><input type="text" id="namagur" class="namagur" name="nama_guru"  placeholder="Nama Guru"></td>
                    <td><input type="text" id="matpel" class="matpel" name="mata_pelajaran"  placeholder="Mata Pelajaran"></td>
                    <td><input type="text" id="walkel" class="walkel" name="wali_kelas" placeholder="Wali Kelas"></td>
                    <td><input type="text" id="telp" class="telp" name="nohp"  placeholder="Nomer Telepon"></td>
                    <td><input type="file" id="foto_guru" class="foto_guru" name="foto_guru" ></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</form>
</div>
<script src="js\dashboard.js"></script>
</body>
</html>
