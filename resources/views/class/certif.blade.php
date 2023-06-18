<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .certificate {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            background-color: #f5f5f5;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .description {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .name {
            font-size: 20px;
            font-weight: bold;
            margin-top: 40px;
        }

        .signature {
            margin-top: 80px;
            text-align: right;
        }

        .signature img {
            max-width: 150px;
        }
    </style>
</head>

<body>
<div class="certificate">
    <div class="header">
        <h2 class="title">CERTIFICAT D'ACHÈVEMENT</h2>
        <p class="subtitle">Superbe Réussite</p>
    </div>

    <div class="content">
        <p class="description">Félicitations à <span class="name">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</span> pour avoir accompli avec succès la formation "{{ $certif->title }}".</p>
        <p class="description">Ce certificat atteste de la participation active et de la réalisation exemplaire dans le domaine.</p>
        <p class="description">Nous sommes fiers de vous décerner ce certificat en reconnaissance de vos efforts et de votre engagement.</p>
    </div>

    <div class="signature">
        <img src="/images/deco/SIGNATURE.svg" alt="Signature">
    </div>
</div>
</body>

</html>

