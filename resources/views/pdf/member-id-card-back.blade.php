@php
    $backBg = url('assets/images/id_card/back.jpg');
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member ID Card (Back)</title>
    <style>
        /* Custom page size for CR80 ID card: 85.6mm x 53.98mm */
        @page {
            size: 85.6mm 53.98mm;
            margin: 0;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            margin: 0;
            padding: 0;
            width: 85.6mm;
            height: 53.98mm;
        }

        .id-card {
            width: 85.6mm;
            height: 53.98mm;
            background-image: url('{{ $backBg }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            overflow: hidden;
        }

        @media print {
            .id-card {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                color-adjust: exact;
            }
        }
    </style>
</head>
<body>
    <div class="id-card">
        <!-- Back side only shows background image -->
    </div>
</body>
</html>
