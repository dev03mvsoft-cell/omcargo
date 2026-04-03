<?php

/**
 * Global Admin Header Layout
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>AI Logistics Portal - Oman Cargo Movers</title>
    <!-- CDNs -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo $path_prefix; ?>../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CKEditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/44.1.0/classic/ckeditor.js"></script>
    <style>
        .ck-editor__editable {
            min-height: 150px !important;
            font-size: 11px !important;
        }

        .material-symbols-rounded {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            font-size: 20px;
        }

        .extraction-header {
            background: linear-gradient(135deg, white 0%, #eff6ff 100%);
            border: 1px dashed var(--primary);
            padding: 40px;
            border-radius: 20px;
            position: relative;
            margin-bottom: 40px;
        }

        .grid-custom {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 40px;
        }

        @media (max-width: 1200px) {
            .grid-custom {
                grid-template-columns: 1fr;
            }
        }

        .sub-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        /* DATA INPUT WITH ZERO-OVERFLOW INSET FOCUS */
        .data-input {
            border: none;
            background: transparent;
            width: 100%;
            height: 100%;
            font-weight: 950;
            font-family: inherit;
            font-size: 0.75rem;
            color: #000;
            padding: 6px;
            outline: none;
            text-align: center;
            transition: all 0.2s;
            display: block;
            box-sizing: border-box;
            resize: none;
            margin: 0;
        }

        .data-input:focus {
            background: #f0f7ff;
            box-shadow: inset 0 0 0 3px var(--primary);
        }

        /* THE ULTIMATE INVOICE GRID PARITY */
        .classic-table {
            width: 100%;
            border-collapse: collapse;
            border: 3px solid #000;
            background: white;
            min-width: 1200px;
            -webkit-print-color-adjust: exact;
            table-layout: fixed;
        }

        .classic-table th {
            border: 2px solid #000;
            padding: 8px 4px;
            font-size: 9px;
            font-weight: 950;
            color: #000;
            text-align: center;
        }

        .classic-table td {
            border: 2px solid #000;
            vertical-align: middle;
            height: 32px;
            padding: 0;
            position: relative;
            overflow: hidden;
        }

        .cat-label {
            font-size: 11px;
            font-weight: 950;
            border: none;
            width: 100%;
            height: 100%;
            display: block;
            padding: 8px;
            text-transform: uppercase;
            text-align: center;
            outline: none;
            transition: all 0.2s;
            box-sizing: border-box;
        }

        .cat-label:focus {
            background: #f0f7ff;
            box-shadow: inset 0 0 0 3px var(--primary);
        }

        .footer-label {
            font-size: 11px;
            font-weight: 950;
            color: #000;
            padding: 4px;
        }

        .sign-box {
            border: 2px solid #000;
            border-radius: 4px;
            height: 120px;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding: 15px;
            background: #fff;
            position: relative;
            margin-top: 24px;
        }

        .sign-label {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 0.65rem;
            font-weight: 950;
            color: #000;
            text-transform: uppercase;
        }

        .registry-row {
            display: grid;
            grid-template-columns: 1fr 1.2fr 48px;
            gap: 20px;
            align-items: center;
            margin-bottom: 16px;
        }
    </style>
</head>

<body>
    <div class="dashboard-container">