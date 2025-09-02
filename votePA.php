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
    <title>🚀 PEMILU RAYA ORSATRENS TEBUIRENG MASA KHIDMAT 2025/2026</title>
    <link rel="stylesheet" href="style/style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="logo.jpg">
</head>
<body>

<div class="wrapper">
    <div class="title">
        Pilih presiden-wakil presiden ORSATRENS TEBUIRENG Masa Khidmat 2025/2026
    </div>
    <form method="post" action="submit_response.php" onsubmit="return validateForm()">
        <div class="container">
            <label class="option_item">
            <input type="checkbox" class="checkbox" name="question" value="Paslon Nomor 1" id="question1" onclick="uncheckOtherCheckbox('question2')">
                <div class="option_inner kandidat_1">
                    <div class="image">
                        <img src="style/11cowo.jpg" alt="Facebook">
                    </div>
                    <div class="name">ORANG GANTENG & GANTENG</div>
                    <button type="button" onclick="showCandidateInfo(1)">Tentang Paslon 01</button>
                </div>
            </label>
            <label class="option_item">
                <input type="checkbox" class="checkbox" name="question" value="Paslon Nomor 2" id="question2" onclick="uncheckOtherCheckbox('question1')">
                <div class="option_inner kandidat_2">
                    <div class="image">
                        <img src="style/22cowo.jpg" alt="">
                    </div>
                    <div class="name">ORANG GANTENG & GANTENG</div>
                    <button type="button" onclick="showCandidateInfo(2)">Tentang Paslon 02</button>
                </div>
            </label>
        </div>
        <div class="submit_button">
            <button class="collect_btn">VOTE!</button>
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
        <p style='text-align: center;'><em>INI VISI</em></p>
        <br>
        <p style='text-align: center;'><strong>MISI</strong></p>
        <ul style='text-align: justify; padding: 0;'>
            <li>INI</li>
            <li>MISI</li>
            <li>PASLON 1</li>
        </ul>
    </div>
        `,
        2: `
<div style='padding: 20px;'>
    <p style='text-align: center; margin-top=0px;'><strong>VISI</strong></p>
    <p style='text-align: center;'><em>INI VISI</em></p>
    <br>
    <p style='text-align: center;'><strong>MISI</strong></p>
    <ul style='text-align: justify; padding: 0;'>
        <li>INI</li>
        <li>MISI</li>
        <li>PASLON 2</li>
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