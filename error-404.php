<?php
/**
 * OMAN CARGO MOVERS - Operational Error Recovery
 * This function triggers a high-fidelity 404 state.
 * Usage: include_once('error-404.php'); show_not_found();
 */
function show_not_found() {
    header("HTTP/1.1 404 Not Found");
    // The rest of the page content will render below if this file is included
}

// Logic to determine path depth for assets
$path_prefix = "";
// Detect if we are in a subfolder (like admin/ or admin/factory-stuffing/)
$request_uri = $_SERVER['REQUEST_URI'];
$depth = substr_count(trim($request_uri, '/'), '/');

// Adjustment for local development folder 'omancargo'
if (strpos($request_uri, '/omancargo/') !== false) {
    $depth--; 
}

for($i = 0; $i < $depth; $i++) {
    $path_prefix .= "../";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Operation Lost | Oman Cargo Movers</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <style>
        :root {
            --primary: #2563eb;
            --slate-900: #0f172a;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #fff;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            color: var(--slate-900);
        }
        .container {
            text-align: center;
            max-width: 600px;
            padding: 40px;
            position: relative;
        }
        .error-code {
            font-size: 180px;
            font-weight: 900;
            margin: 0;
            line-height: 1;
            background: linear-gradient(135deg, #1e293b 0%, #2563eb 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -10px;
            animation: float 4s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        .icon-box {
            font-size: 60px;
            color: #e2e8f0;
            position: absolute;
            z-index: -1;
            animation: spin 20s linear infinite;
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        h1 {
            font-size: 32px;
            font-weight: 850;
            margin-top: -20px;
            letter-spacing: -1px;
        }
        p {
            color: #64748b;
            font-size: 14px;
            font-weight: 600;
            line-height: 1.6;
            margin-bottom: 40px;
        }
        .btn-home {
            background: var(--slate-900);
            color: #fff;
            text-decoration: none;
            padding: 16px 40px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.2);
        }
        .btn-home:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(15, 23, 42, 0.3);
            background: var(--primary);
        }
        .deco-1 { top: 10%; left: -20%; }
        .deco-2 { bottom: 10%; right: -20%; font-size: 100px; opacity: 0.5; }
    </style>
</head>
<body>
    <div class="icon-box deco-1"><i class="fa-solid fa-ship"></i></div>
    <div class="icon-box deco-2"><i class="fa-solid fa-boxes-packing"></i></div>

    <div class="container">
        <p style="font-size: 10px; font-weight: 900; color: var(--primary); text-transform: uppercase; letter-spacing: 3px; margin-bottom: 10px;">Security Alert: Missing Parameters</p>
        <h2 class="error-code">404</h2>
        <h1>Lost in <span style="color: var(--primary);">Logistics?</span></h1>
        <p>The operational manifest you are looking for has been moved, archived, or never existed in the current port registry. Please verify the coordinate or return to base.</p>
        
        <div style="display: flex; gap: 15px; justify-content: center;">
            <a href="<?php echo $path_prefix; ?>index.php" class="btn-home">
                <i class="fa-solid fa-house-chimney"></i> Return to Base
            </a>
            <a href="javascript:history.back()" class="btn-home" style="background: #fff; color: var(--slate-900); border: 2px solid #e2e8f0; box-shadow: none;">
                <i class="fa-solid fa-arrow-left"></i> Previous Stage
            </a>
        </div>

        <div style="margin-top: 60px; padding-top: 30px; border-top: 1px dashed #e2e8f0;">
            <p style="font-size: 11px; margin: 0;">Error Ref: <span style="font-family: monospace; font-weight: 900; color: #1e293b;">PORT_ERR_COORD_INVALID</span></p>
        </div>
    </div>
</body>
</html>
