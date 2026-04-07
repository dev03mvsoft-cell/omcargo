<?php
$path_prefix = "../";
$is_root = false;
include '../includes/header.php';
?>
<?php include '../includes/sidebar.php'; ?>

<style>
    :root {
        --p-x: 30px;
    }

    @media (max-width: 768px) {
        :root {
            --p-x: 15px;
        }
    }

    .main-area {
        background: #f8fafc;
        min-height: 100vh;
    }

    .form-section {
        background: #fff;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        padding: 30px;
        margin-bottom: 30px;
    }

    .form-label {
        display: block;
        font-size: 11px;
        font-weight: 800;
        color: #64748b;
        text-transform: uppercase;
        margin-bottom: 10px;
        letter-spacing: 0.5px;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1.5px solid #e2e8f0;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 700;
        color: #01172a;
        outline: none;
        transition: all 0.2s;
        background: #fff;
    }

    .form-control:focus {
        border-color: #000;
        box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.03);
    }

    .btn-save {
        background: var(--primary);
        color: #fff;
        border: none;
        font-size: 12px;
        font-weight: 850;
        padding: 12px 30px;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s;
    }
</style>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px var(--p-x); position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h2 style="font-size: 18px; font-weight: 900; color: #01172a; margin: 0; letter-spacing: -0.5px;">Register Transport Partner</h2>
            <p style="font-size: 11px; color: #94a3b8; font-weight: 700; margin-top: 2px; text-transform: uppercase;">Onboard new logistics provider to the fleet network</p>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <button type="button" onclick="window.history.back()" class="btn" style="background: #fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 12px; font-weight: 800; padding: 10px 20px; border-radius: 6px;">CANCEL SLIP</button>
            <button type="submit" form="transport-form" class="btn-save">ACTIVE PARTNER PROFILE</button>
        </div>
    </header>

    <div class="content-padding" style="padding: 30px var(--p-x);">
        <form id="transport-form" action="index.php" method="POST">
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px; align-items: start;">
                <!-- Left: Primary Details -->
                <div>
                    <div class="form-section">
                        <h3 style="font-size: 14px; font-weight: 900; color: #01172a; margin: 0 0 25px 0; border-bottom: 1.5px solid #f1f5f9; padding-bottom: 15px;">Transport Identification</h3>

                        <div style="display: grid; grid-template-columns: 1fr; gap: 25px;">
                            <div class="form-group">
                                <label class="form-label">Transport Company Name</label>
                                <input type="text" name="company_name" class="form-control" placeholder="Enter Registered Legal Name" required>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                                <div class="form-group">
                                    <label class="form-label">Commercial Hub Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="ops@company.om" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">FLEET ID (AUTO-GEN)</label>
                                    <input type="text" class="form-control" value="OMC-TRNS-<?php echo rand(1000, 9999); ?>" readonly style="background: #f8fafc; color: #94a3b8; border-style: dashed;">
                                </div>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                                <div class="form-group">
                                    <label class="form-label">Contact Node 01 (Primary)</label>
                                    <input type="tel" name="contact_1" class="form-control" placeholder="+968 XXXX XXXX" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Contact Node 02 (Standby)</label>
                                    <input type="tel" name="contact_2" class="form-control" placeholder="+968 XXXX XXXX">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Registered Office Address</label>
                                <textarea name="address" class="form-control" rows="3" placeholder="Enter Full Physical Business Location" style="resize: none;"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 style="font-size: 14px; font-weight: 900; color: #01172a; margin: 0 0 25px 0; border-bottom: 1.5px solid #f1f5f9; padding-bottom: 15px;">Fleet Capabilities</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px;">
                            <div class="form-group">
                                <label class="form-label">Partner Category</label>
                                <select class="form-control">
                                    <option>REGULAR CARRIER</option>
                                    <option>PREMIUM PARTNER</option>
                                    <option>OVER-SIZE CARRIER</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Primary Route</label>
                                <input type="text" class="form-control" placeholder="e.g. Muscat - Salalah">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Truck Limit</label>
                                <input type="number" class="form-control" placeholder="10">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Meta/Status -->
                <div>
                    <div class="form-section" style="padding: 20px; background: #fafafa;">
                        <h4 style="font-size: 10px; font-weight: 950; color: #94a3b8; text-transform: uppercase; margin-bottom: 15px;">Compliance Check</h4>
                        <div style="display: flex; flex-direction: column; gap: 12px;">
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                                <input type="checkbox" checked style="accent-color: #000;">
                                <span style="font-size: 11px; font-weight: 700; color: #475569;">Verified Commercial License</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                                <input type="checkbox" checked style="accent-color: #000;">
                                <span style="font-size: 11px; font-weight: 700; color: #475569;">Active Insurance Bond</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                                <input type="checkbox" style="accent-color: #000;">
                                <span style="font-size: 11px; font-weight: 700; color: #475569;">Priority Access Key</span>
                            </label>
                        </div>
                    </div>

                    <div style="padding: 20px; border-radius: 12px; border: 1.5px dashed #e2e8f0; text-align: center;">
                        <i class="fa-solid fa-cloud-arrow-up" style="font-size: 24px; color: #94a3b8; margin-bottom: 10px;"></i>
                        <p style="font-size: 10px; font-weight: 900; color: #64748b; margin: 0;">BRAND LOGO / PERMIT</p>
                        <input type="file" style="display: none;" id="logo-up">
                        <button type="button" onclick="document.getElementById('logo-up').click()" style="margin-top: 10px; background: #fff; border: 1.5px solid #000; padding: 5px 15px; border-radius: 4px; font-size: 9px; font-weight: 900; cursor: pointer;">SELECT FILE</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

<?php include '../includes/footer.php'; ?>