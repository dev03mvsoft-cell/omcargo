<?php
$path_prefix = "../";
$is_root = false;
include '../includes/header.php';
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
    .form-input::placeholder { color: #cbd5e1; font-weight: 500; }
</style>

<!-- MAIN AREA START -->
<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 20px var(--p-x); position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <span style="font-size: 9px; font-weight: 950; color: #3b82f6; text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 4px;">CRM MODULE</span>
            <h1 class="page-title" style="font-size: 18px; font-weight: 800; margin: 0; letter-spacing: -0.5px;">Register New Client</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 600; margin-top: 2px;">Onboard corporate partners into the logistics network</p>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <button type="button" onclick="window.history.back()" class="btn" style="background: #fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 12px; font-weight: 800; padding: 10px 20px; border-radius: 6px;">CANCEL</button>
            <button type="submit" form="client-form" class="btn" style="background: #000; color: #fff; font-size: 12px; font-weight: 850; padding: 10px 30px; border-radius: 6px; border: none;">SAVE CLIENT PROFILE</button>
        </div>
    </header>

    <div class="content-padding" style="padding: 30px var(--p-x);">
        <form id="client-form" action="index.php" method="POST">
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px; align-items: start;">
                <!-- Left: Primary Details -->
                <div>
                    <div class="form-section">
                        <h3 class="section-title"><i class="fa-solid fa-address-card"></i> Basic Identification</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                            <div class="form-group" style="grid-column: span 2;">
                                <label>Full Client Name / Primary Contact</label>
                                <input type="text" name="name" required class="form-input" placeholder="e.g. John Doe">
                            </div>
                            <div class="form-group">
                                <label>Company Legal Name</label>
                                <input type="text" name="company_name" required class="form-input" placeholder="e.g. Anatolia Tile & Stone Ltd.">
                            </div>
                            <div class="form-group">
                                <label>GST / Tax Identification Number</label>
                                <input type="text" name="gst_no" required class="form-input" placeholder="e.g. 24AAACA1234A1Z5" style="text-transform: uppercase;">
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 class="section-title"><i class="fa-solid fa-location-dot"></i> Corporate Address</h3>
                        <div class="form-group">
                            <label>Full Registered Office Address</label>
                            <textarea name="address" required class="form-input" style="height: 120px; resize: none;" placeholder="Building No., Street, City, State, Country, Zip Code"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Right: Communication -->
                <div>
                    <div class="form-section">
                        <h3 class="section-title"><i class="fa-solid fa-phone-volume"></i> Contact Network</h3>
                        <div class="form-group">
                            <label>Primary Email Address</label>
                            <input type="email" name="email" required class="form-input" placeholder="ops@company.com">
                        </div>
                        <div class="form-group">
                            <label>Contact Number 01</label>
                            <div style="display: flex; gap: 10px;">
                                <input type="text" value="+968" style="width: 70px; text-align: center; background: #f8fafc;" class="form-input" readonly>
                                <input type="text" name="contact_1" required class="form-input" placeholder="9988 7766">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Contact Number 02 (Optional)</label>
                            <div style="display: flex; gap: 10px;">
                                <input type="text" value="+968" style="width: 70px; text-align: center; background: #f8fafc;" class="form-input" readonly>
                                <input type="text" name="contact_2" class="form-input" placeholder="9988 7766">
                            </div>
                        </div>
                    </div>

                    <div class="form-section" style="background: #f8fafc; border-style: dashed; border-color: #cbd5e1;">
                        <h3 class="section-title" style="color: #64748b; border-color: #e2e8f0;"><i class="fa-solid fa-circle-info"></i> Account Settings</h3>
                        <div class="form-group">
                            <label>Client Category</label>
                            <select class="form-input">
                                <option>Corporate Account (Tier 1)</option>
                                <option>Retail / Small Business</option>
                                <option>Government Agency</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Verification Status</label>
                            <div style="display: flex; align-items: center; gap: 10px; font-size: 12px; font-weight: 700; color: #16a34a; background: #fff; padding: 10px; border-radius: 6px; border: 1.5px solid #dcfce7;">
                                <i class="fa-solid fa-shield-check"></i> PRE-VERIFIED (AI AUDIT)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
