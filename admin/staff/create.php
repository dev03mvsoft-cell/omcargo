<?php
$path_prefix = "../";
$is_root = false;
include '../includes/header.php';
?>
<?php include '../includes/sidebar.php'; ?>

<style>
    :root { --p-x: 30px; }
    @media (max-width: 768px) { :root { --p-x: 15px; } }
    .main-area { background: #f8fafc; min-height: 100vh; }
    .form-section { background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; padding: 30px; margin-bottom: 30px; }
    .form-label { display: block; font-size: 11px; font-weight: 800; color: #64748b; text-transform: uppercase; margin-bottom: 10px; letter-spacing: 0.5px; }
    .form-control { width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 13px; font-weight: 700; color: #01172a; outline: none; transition: all 0.2s; background: #fff; }
    .form-control:focus { border-color: #000; box-shadow: 0 0 0 3px rgba(0,0,0,0.03); }
</style>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px var(--p-x); position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h2 style="font-size: 18px; font-weight: 900; color: #01172a; margin: 0; letter-spacing: -0.5px;">Onboard New Personnel</h2>
            <p style="font-size: 11px; color: #94a3b8; font-weight: 700; margin-top: 2px; text-transform: uppercase;">Building the Oman Cargo Operations Team</p>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <button type="button" onclick="window.history.back()" class="btn" style="background: #fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 12px; font-weight: 800; padding: 10px 20px; border-radius: 6px;">CANCEL</button>
            <button type="submit" form="staff-form" class="btn" style="background: #2563eb; color: #fff; font-size: 13px; font-weight: 700; padding: 10px 30px; border-radius: 6px; border: none; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">PUBLISH STAFF PROFILE</button>
        </div>
    </header>

    <div class="content-padding" style="padding: 30px var(--p-x);">
        <form id="staff-form" action="index.php" method="POST">
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px; align-items: start;">
                <!-- Left: Identity & Contact -->
                <div>
                    <div class="form-section">
                        <h3 style="font-size: 14px; font-weight: 950; color: #01172a; margin: 0 0 25px 0; border-bottom: 1.5px solid #f1f5f9; padding-bottom: 15px;">Identity Nodes</h3>
                        
                        <div style="display: grid; grid-template-columns: 1fr; gap: 25px;">
                            <div class="form-group">
                                <label class="form-label">Legal Full Name</label>
                                <input type="text" name="full_name" class="form-control" placeholder="Enter Full Legal Identity" required>
                            </div>

                            <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 20px;">
                                <div class="form-group">
                                    <label class="form-label">Professional Role</label>
                                    <select class="form-control" required>
                                        <option value="">SELECT POSITION...</option>
                                        <option>OPERATIONS MANAGER</option>
                                        <option>FLEET SUPERVISOR</option>
                                        <option>CONTAINER INSPECTOR</option>
                                        <option>DOCUMENTATION CLERK</option>
                                        <option>LOGISTICS COORDINATOR</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Employee ID (STF)</label>
                                    <input type="text" class="form-control" value="OMC-STF-<?php echo rand(100, 999); ?>" readonly style="background: #f8fafc; color: #94a3b8; border-style: dashed;">
                                </div>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                                <div class="form-group">
                                    <label class="form-label">Primary Connect Number</label>
                                    <input type="tel" name="contact_1" class="form-control" placeholder="+968 XXXX XXXX" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Emergency Connect Node</label>
                                    <input type="tel" name="contact_2" class="form-control" placeholder="+968 XXXX XXXX">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Residential Hub Address (HQ/Base)</label>
                                <textarea name="address" class="form-control" rows="3" placeholder="Enter Residential Location for Logistics Coordination" style="resize: none;"></textarea>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right: Profile Meta -->
                <div>
                    <div class="form-section" style="padding: 24px; background: #fafafa;">
                        <h4 style="font-size: 10px; font-weight: 950; color: #94a3b8; text-transform: uppercase; margin-bottom: 15px;">Personnel Compliance</h4>
                        <div style="display: flex; flex-direction: column; gap: 12px;">
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                                <input type="checkbox" checked style="accent-color: #000;">
                                <span style="font-size: 11px; font-weight: 700; color: #475569;">Verified Identity Document</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                                <input type="checkbox" checked style="accent-color: #000;">
                                <span style="font-size: 11px; font-weight: 700; color: #475569;">Safety Protocol Certified</span>
                            </label>
                        </div>
                    </div>

                    <div style="padding: 30px; border-radius: 12px; border: 1.5px dashed #e2e8f0; text-align: center; background: #fff;">
                        <i class="fa-solid fa-camera-retro" style="font-size: 28px; color: #94a3b8; margin-bottom: 15px;"></i>
                        <p style="font-size: 10px; font-weight: 900; color: #64748b; margin: 0;">EMPLOYEE HEADSHOT</p>
                        <p style="font-size: 8px; color: #94a3b8; margin-top: 5px;">(JPEG/PNG • MIN 300x300)</p>
                        <button type="button" style="margin-top: 15px; background: #fff; border: 1.5px solid #000; padding: 6px 20px; border-radius: 4px; font-size: 9px; font-weight: 950; cursor: pointer;">UPLOAD PHOTO</button>
                    </div>

                    <div style="margin-top: 20px; padding: 20px; background: #fef2f2; border: 1.5px solid #fee2e2; border-radius: 8px;">
                        <p style="font-size: 10px; font-weight: 850; color: #ef4444; margin: 0;">SECURITY NOTICE</p>
                        <p style="font-size: 9px; color: #ef4444; opacity: 0.8; margin-top: 4px; line-height: 1.4;">Personnel contact data is strictly internal. Dual-node verification is mandatory for management roles.</p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

<?php include '../includes/footer.php'; ?>
