<?php
$path_prefix = "../";
$is_root = false;
include '../includes/header.php';

// Mock Data for Editing
$client = [
    'name' => 'Anatolia Operations Team',
    'company_name' => 'ANATOLIA TILE & STONE',
    'email' => 'ops@anatolia.ca',
    'contact_1' => '9988 7766',
    'contact_2' => '9988 7700',
    'gst_no' => '24AAACA1234A1Z5',
    'address' => '8300 Huntington Rd, Vaughan, ON L4H 4Z5, Canada'
];
?>
<?php include '../includes/sidebar.php'; ?>

<style>
    :root { --p-x: 30px; }
    @media (max-width: 768px) { :root { --p-x: 15px; } }
    body { overflow-x: hidden; width: 100%; }
    .main-area { width: 100%; overflow-x: hidden; position: relative; }
    
    .form-section { background: #fff; border: 1.5px solid #f1f5f9; border-radius: 12px; padding: 30px; margin-bottom: 30px; }
    .section-title { font-size: 14px; font-weight: 850; color: #01172a; margin-bottom: 25px; display: flex; align-items: center; gap: 10px; border-bottom: 1.5px solid #f8fafc; padding-bottom: 15px; text-transform: uppercase; }
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; font-size: 11px; font-weight: 800; color: #64748b; margin-bottom: 8px; text-transform: uppercase; }
    .form-input { width: 100%; padding: 12px 15px; border-radius: 8px; border: 1.5px solid #e2e8f0; font-size: 13px; font-weight: 600; color: #0f172a; outline: none; transition: all 0.2s; }
    .form-input:focus { border-color: #000; }
</style>

<!-- MAIN AREA START -->
<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 20px var(--p-x); position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <span style="font-size: 9px; font-weight: 950; color: #ef4444; text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 4px;">EDIT MODE • ID: CLT-1029</span>
            <h1 class="page-title" style="font-size: 18px; font-weight: 800; margin: 0; letter-spacing: -0.5px;">Update Client Profile</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 600; margin-top: 2px;">Modify corporate credentials and communication nodes</p>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <button type="button" onclick="window.history.back()" class="btn" style="background: #fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 12px; font-weight: 800; padding: 10px 20px; border-radius: 6px;">CANCEL</button>
            <button type="submit" form="client-edit-form" class="btn" style="background: var(--primary); color: #fff; font-size: 13px; font-weight: 850; padding: 10px 30px; border-radius: 6px; border: none; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">PUBLISH UPDATES</button>
        </div>
    </header>

    <div class="content-padding" style="padding: 30px var(--p-x);">
        <form id="client-edit-form" action="index.php" method="POST">
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px; align-items: start;">
                <!-- Left: Primary Details -->
                <div>
                    <div class="form-section">
                        <h3 class="section-title"><i class="fa-solid fa-pen-to-square"></i> Identification Audit</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                            <div class="form-group" style="grid-column: span 2;">
                                <label>Client Full Name</label>
                                <input type="text" name="name" value="<?php echo $client['name']; ?>" class="form-input">
                            </div>
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" name="company_name" value="<?php echo $client['company_name']; ?>" class="form-input">
                            </div>
                            <div class="form-group">
                                <label>GSTIN / TAX ID</label>
                                <input type="text" name="gst_no" value="<?php echo $client['gst_no']; ?>" class="form-input" style="text-transform: uppercase;">
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 class="section-title"><i class="fa-solid fa-map-location-dot"></i> Address Management</h3>
                        <div class="form-group">
                            <label>Registered Office Address</label>
                            <textarea name="address" class="form-input" style="height: 120px; resize: none;"><?php echo $client['address']; ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Right: Communication -->
                <div>
                    <div class="form-section">
                        <h3 class="section-title"><i class="fa-solid fa-headset"></i> Communication Audit</h3>
                        <div class="form-group">
                            <label>Corporate Email</label>
                            <input type="email" name="email" value="<?php echo $client['email']; ?>" class="form-input">
                        </div>
                        <div class="form-group">
                            <label>Primary Contact</label>
                            <div style="display: flex; gap: 10px;">
                                <input type="text" value="+968" style="width: 70px; text-align: center; background: #f8fafc;" class="form-input" readonly>
                                <input type="text" name="contact_1" value="<?php echo $client['contact_1']; ?>" class="form-input">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Secondary Contact</label>
                            <div style="display: flex; gap: 10px;">
                                <input type="text" value="+968" style="width: 70px; text-align: center; background: #f8fafc;" class="form-input" readonly>
                                <input type="text" name="contact_2" value="<?php echo $client['contact_2']; ?>" class="form-input">
                            </div>
                        </div>
                    </div>

                    <div class="form-section" style="border: 1.5px solid #dbeafe; background: #eff6ff;">
                        <h3 class="section-title" style="color: #2563eb; border-color: #dbeafe;"><i class="fa-solid fa-shield-check"></i> Security Status</h3>
                        <div style="padding: 15px; background: #fff; border-radius: 8px; border: 1.5px solid #dbeafe;">
                            <p style="font-size: 11px; font-weight: 850; color: #1e3a8a; margin-bottom: 5px;">LAST MODIFIED</p>
                            <p style="font-size: 10px; color: #3b82f6; font-weight: 700; margin: 0;">ADMIN • 24 MAR 2026 • 11:20 AM</p>
                        </div>
                        <div style="margin-top: 15px;">
                            <button type="button" class="btn" style="width: 100%; border: 1.5px solid #ef4444; color: #ef4444; font-size: 10px; font-weight: 850; padding: 10px; border-radius: 6px; background: #fff;">ARCHIVE CLIENT PROFILE</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
