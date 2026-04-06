<?php
$path_prefix = "admin/";
$is_root = true;
$is_client_portal = true;
include 'admin/includes/header.php';
?>
<?php include 'admin/includes/sidebar.php'; ?>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px 40px; position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h1 class="page-title" style="font-size: 18px; font-weight: 900; color: #01172a; margin: 0; letter-spacing: -0.5px;">Client Profile Settings</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 700; margin-top: 2px; text-transform: uppercase;">Manage Corporate Identity & Contact Registry</p>
        </div>
        <div style="display: flex; gap: 12px;">
            <button type="reset" form="profile-form" class="btn" style="background: #fff; border: 1.5px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800; padding: 10px 20px; border-radius: 6px;">DISCARD CHANGES</button>
            <button type="submit" form="profile-form" class="btn" style="background: #2563eb; color: #fff; border: none; font-size: 11px; font-weight: 800; padding: 10px 20px; border-radius: 6px; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">SAVE PROFILE UPDATES</button>
        </div>
    </header>

    <div class="content-padding" style="padding: 30px 40px;">
        <form id="profile-form">
            <div style="display: grid; grid-template-columns: 280px 1fr; gap: 40px;">
                
                <!-- LEFT: Profile Navigation/Avatar -->
                <div style="display: flex; flex-direction: column; gap: 5px;">
                    <div style="background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; padding: 30px; text-align: center; margin-bottom: 20px;">
                        <div style="position: relative; width: 100px; height: 100px; margin: 0 auto 20px auto;">
                            <div style="width: 100%; height: 100%; background: #eff6ff; color: #2563eb; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 32px; font-weight: 900;">AT</div>
                            <div style="position: absolute; bottom: 0; right: 0; width: 32px; height: 32px; background: #fff; border: 1.5px solid #e2e8f0; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #64748b; cursor: pointer;"><i class="fa-solid fa-camera" style="font-size: 12px;"></i></div>
                        </div>
                        <h3 style="font-size: 15px; font-weight: 900; color: #01172a; margin: 0;">ANATOLIA TILE & STONE</h3>
                        <p style="font-size: 10px; font-weight: 700; color: #94a3b8; margin: 4px 0 0 0;">ID: OMC-TRNS-882-C</p>
                        <div style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #f1f5f9; display: flex; justify-content: center;">
                            <span style="font-size: 9px; font-weight: 950; background: #f0fdf4; color: #16a34a; padding: 4px 12px; border-radius: 100px; border: 1px solid #dcfce7;">VERIFIED ENTITY</span>
                        </div>
                    </div>

                    <div style="background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; overflow: hidden;">
                        <div style="padding: 12px 16px; background: #f8fafc; border-bottom: 1.5px solid #e2e8f0; font-size: 10px; font-weight: 850; color: #64748b;">QUICK STATS</div>
                        <div style="padding: 15px 20px;">
                            <div style="margin-bottom: 12px;">
                                <p style="font-size: 9px; font-weight: 800; color: #94a3b8; margin: 0;">TOTAL JOBS</p>
                                <p style="font-size: 13px; font-weight: 900; color: #1e293b; margin: 2px 0 0 0;">128</p>
                            </div>
                            <div>
                                <p style="font-size: 9px; font-weight: 800; color: #94a3b8; margin: 0;">MEMBER SINCE</p>
                                <p style="font-size: 13px; font-weight: 900; color: #1e293b; margin: 2px 0 0 0;">JAN 2024</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT: Form Sections -->
                <div style="display: flex; flex-direction: column; gap: 30px;">
                    
                    <!-- Section: Company Details -->
                    <div style="background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; padding: 30px;">
                        <h3 style="font-size: 13px; font-weight: 850; color: #01172a; margin: 0 0 25px 0; text-transform: uppercase;">Company Identity</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                            <div class="form-group">
                                <label style="display: block; font-size: 10px; font-weight: 850; color: #64748b; text-transform: uppercase; margin-bottom: 8px;">Official Name</label>
                                <input type="text" class="form-input" value="ANATOLIA TILE & STONE" style="width: 100%; padding: 12px; border: 1.5px solid #e2e8f0; border-radius: 6px; font-size: 13px; font-weight: 700;">
                            </div>
                            <div class="form-group">
                                <label style="display: block; font-size: 10px; font-weight: 850; color: #64748b; text-transform: uppercase; margin-bottom: 8px;">Registeration / GST ID</label>
                                <input type="text" class="form-input" value="24AAACA1234A1Z5" style="width: 100%; padding: 12px; border: 1.5px solid #e2e8f0; border-radius: 6px; font-size: 13px; font-weight: 700;">
                            </div>
                            <div class="form-group" style="grid-column: span 2;">
                                <label style="display: block; font-size: 10px; font-weight: 850; color: #64748b; text-transform: uppercase; margin-bottom: 8px;">Business Category</label>
                                <select style="width: 100%; padding: 12px; border: 1.5px solid #e2e8f0; border-radius: 6px; font-size: 13px; font-weight: 700;">
                                    <option>Import / Export Corporation</option>
                                    <option selected>Manufacturing & Distribution</option>
                                    <option>Logistics Aggregator</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Section: Contact Contacts -->
                    <div style="background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; padding: 30px;">
                        <h3 style="font-size: 13px; font-weight: 850; color: #01172a; margin: 0 0 25px 0; text-transform: uppercase;">Operational Contact</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                            <div class="form-group">
                                <label style="display: block; font-size: 10px; font-weight: 850; color: #64748b; text-transform: uppercase; margin-bottom: 8px;">Liaison Official Name</label>
                                <input type="text" class="form-input" value="Sanjay Kumar" style="width: 100%; padding: 12px; border: 1.5px solid #e2e8f0; border-radius: 6px; font-size: 13px; font-weight: 700;">
                            </div>
                            <div class="form-group">
                                <label style="display: block; font-size: 10px; font-weight: 850; color: #64748b; text-transform: uppercase; margin-bottom: 8px;">Work Email</label>
                                <input type="email" class="form-input" value="ops@anatolia.ca" style="width: 100%; padding: 12px; border: 1.5px solid #e2e8f0; border-radius: 6px; font-size: 13px; font-weight: 700;">
                            </div>
                        </div>
                    </div>

                    <!-- Section: Registered Address -->
                    <div style="background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; padding: 30px;">
                        <h3 style="font-size: 13px; font-weight: 850; color: #01172a; margin: 0 0 25px 0; text-transform: uppercase;">Corporate Registry Address</h3>
                        <div class="form-group">
                             <textarea style="width: 100%; padding: 12px; border: 1.5px solid #e2e8f0; border-radius: 6px; font-size: 13px; font-weight: 700; height: 100px; resize: none;">Bldg 441, Al-Khuwair, Muscat, Oman. PIN: 112</textarea>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</main>

<style>
    .form-input:focus {
        border-color: #2563eb !important;
        outline: none;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.05);
    }
</style>

<?php include 'admin/includes/footer.php'; ?>
