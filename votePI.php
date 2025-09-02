<?php
    session_start();

    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>🚀 PEMILU RAYA ORSATRENS TEBUIRENG MASA KHIDMAT 2024/2025</title>
    <link rel="stylesheet" href="style/style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="logo.jpg">
</head>
<body>

<div class="wrapper">
    <div class="title">
        Pilih presiden-wakil presiden ORSATRENS TEBUIRENG Masa Bakti 2024/2025
    </div>
    <form method="post" action="submit_response.php" onsubmit="return validateForm()">
        <div class="container">
            <label class="option_item">
            <input type="checkbox" class="checkbox" name="question" value="Paslon Nomor 1" id="question1" onclick="uncheckOtherCheckbox('question2')">
                <div class="option_inner kandidat_1">
                    <div class="image">
                        <img src="style/1cewe.jpg" alt="Facebook">
                    </div>
                    <div class="name">Afnan Hasna & Valencia Putri</div>
                    <button type="button" onclick="showCandidateInfo(1)">Tentang Paslon 01</button>
                </div>
            </label>
            <label class="option_item">
                <input type="checkbox" class="checkbox" name="question" value="Paslon Nomor 2" id="question2" onclick="uncheckOtherCheckbox('question1')">
                <div class="option_inner kandidat_2">
                    <div class="image">
                        <img src="style/2cewe.jpg" alt="">
                    </div>
                    <div class="name">Tsabitah Ade & Gadiza Fatimah</div>
                    <button type="button" onclick="showCandidateInfo(2)">Tentang Paslon 02</button>
                </div>
            </label>
        </div>
        <div class="submit_button">
            <button class="collect_btn">VOTE !</button>
        </div>
    </form>
</div>

<div id="candidateModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2 id="candidateTitle"></h2>
      <p id="candidateInfo"></p>
    </div>
</div>

<script>
    function uncheckOtherCheckbox(checkboxId) {
        var checkbox = document.getElementById(checkboxId);
        if (checkbox.checked) {
            checkbox.checked = false;
        }
    }

    function validateForm() {
        var checkbox1 = document.getElementById('question1');
        var checkbox2 = document.getElementById('question2');

        if (!checkbox1.checked && !checkbox2.checked) {
            alert('Silakan pilih salah satu kandidat untuk melanjutkan.');
            return false;
        }
        return true;
    }

    function showCandidateInfo(candidateNumber) {
    var candidateInfo = {
        1: `
    <div style='padding: 20px;'>
        <p style='text-align: center;'><strong>VISI</strong></p>
        <p style='text-align: center;'><em>Mengoptimalkan potensi siswa berkarakter untuk meraih prestasi dalam bidang akademik maupun non akademik melalui pembinaan yang holistik dan progresif</em></p>
        <br>
        <p style='text-align: center;'><strong>MISI</strong></p>
        <ul style='text-align: justify; padding: 0;'>
            <li>Mengasah keterampilan siswa di berbagai bidang melalui program kerja ORSATRENS</li>
            <li>Mendukung siswa dalam mengembangkan minat dan bakat serta berkompetisi di berbagai bidang</li>
            <li>Membentuk karakter siswa dengan menanamkan nilai-nilai luhur 5 prinsip dasar Tebuireng melalui berbagai kegiatan yang mengasah keterampilan sosial dan emosional</li>
        </ul>
    </div>
        `,
        2: `
    <div style='padding: 20px;'>
        <p style='text-align: center;'><strong>VISI</strong></p>
        <p style='text-align: center;'><em>Menjadikan ORSTARENS sebagai organisasi yang progresif, responsibel serta membangun kolaborasi antara pihak sekolah dan organisasi lain untuk menjadikan lingkungan sekolah yang lebih produktif</em></p>
        <br>
        <p style='text-align: center;'><strong>MISI</strong></p>
        <ul style='text-align: justify; padding: 0;'>
            <li>Mengembangkan dan mengoptimalkan progam kerja dan kegiatan ORSATRENS yang berbasis inovasi dengan mendorong anggota untuk menciptakan ide dan solusi baru yang relevan</li>
            <li>Membangun komunikasi yang optimal antara anggota untuk memaksimalkan program kerja dan komunikasi eksternal dengan pihak sekolah dan organisasi lain secara terbuka dan transparan untuk memperkuat kolaborasi dan hubungan antar sesama</li>
            <li>Membangun tingkat kesadaran akan tanggung jawab anggota melalui pelaksaan progam kerja dan kegiatan ORSATRENS</li>
        </ul>
    </div>
        `
    };

    var modal = document.getElementById("candidateModal");
    var title = document.getElementById("candidateTitle");
    var info = document.getElementById("candidateInfo");
    var span = document.getElementsByClassName("close")[0];

    title.textContent = "Informasi Paslon " + candidateNumber;
    info.innerHTML = candidateInfo[candidateNumber];
    modal.style.display = "block";

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}
</script>
</body>
</html>