<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="gray-bg">
    <form method="post" action="<?php echo base_url('kirimotp') ?>">
        <input type="text" name="nomor" placeholder="Nomor Tujuan" required>
        <hr>
        <textarea name="pesan" placeholder="Pesan Lengkap" rows="5" required></textarea>
        <hr>
        <button type="submit">Kirim Pesan</button>
    </form>
</body>
</html>